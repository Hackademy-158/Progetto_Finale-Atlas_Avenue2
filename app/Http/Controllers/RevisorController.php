<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    /**
     * Mostra la dashboard del revisore con il primo articolo da revisionare
     */
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.dashboard', compact('article_to_check'));
    }


    /**
     * Mostra gli articoli in attesa di revisione
     * Show pending articles for review
     */
    public function pending()
    {
        $pending_articles = Article::where('is_accepted', null)
            ->latest()
            ->paginate(10);

        return view('revisor.pending', compact('pending_articles'));
    }

    /**
     * Accetta un articolo e registra l'azione nel log
     */
    public function accepted(Article $article)
    {
        try {
            if ($article->is_accepted !== null) {
                return redirect()->back()->with('error', 'Questo articolo è già stato revisionato');
            }

            $article->update(['is_accepted' => true]);

            Log::info('Articolo accettato:', [
                'article_id' => $article->id,
                'title' => $article->title,
                'revisor' => Auth::user()->name
            ]);

            return redirect()->route('revisor.dashboard')
                ->with('success', "Hai accettato l'articolo {$article->title}");
        } catch (\Exception $e) {
            Log::error('Errore durante accettazione articolo:', [
                'article_id' => $article->id,
                'error' => $e->getMessage()
            ]);

            return redirect()->back()
                ->with('error', "Si è verificato un errore durante l'accettazione dell'articolo");
        }
    }

    /**
     * Rifiuta un articolo e registra l'azione nel log
     */
    public function refused(Article $article)
    {
        try {
            if ($article->is_accepted !== null) {
                return redirect()->back()->with('error', 'Questo articolo è già stato revisionato');
            }

            $article->update(['is_accepted' => false]);

            Log::info('Articolo rifiutato:', [
                'article_id' => $article->id,
                'title' => $article->title,
                'revisor' => Auth::user()->name
            ]);

            return redirect()->route('revisor.dashboard')
                ->with('success', "Hai rifiutato l'articolo {$article->title}");
        } catch (\Exception $e) {
            Log::error('Errore durante rifiuto articolo:', [
                'article_id' => $article->id,
                'error' => $e->getMessage()
            ]);

            return redirect()->back()
                ->with('error', "Si è verificato un errore durante il rifiuto dell'articolo");
        }
    }

    /**
     * Recupera e mostra gli articoli revisionati
     */
    private function getReviewedArticles(Request $request, ?bool $status, string $view)
    {
        $query = Article::whereNotNull('is_accepted')
            ->whereNotNull('revisor_id')
            ->with(['revisor', 'category', 'images']);

        // Filtra per stato se specificato
        // Filter by status if specified
        if ($status !== null) {
            $query->where('is_accepted', $status);
        }

        $articles = $query->latest('updated_at')
            ->paginate(10)
            ->withQueryString();

        return view($view, compact('articles'));
    }

    /**
     * Mostra gli articoli approvat
     */
    public function approved(Request $request)
    {
        $articles = Article::where('is_accepted', true)->paginate(6);
        return view('revisor.approved', compact('articles', 'request'));
    }

    /**
     * Mostra gli articoli rifiutati
     */
    public function showRefusedArticles(Request $request)
    {
        $articles = Article::where('is_accepted', false)->paginate(6);
        return view('revisor.refused', compact('articles', 'request'));
    }

    /**
     * Invia una richiesta email per diventare revisore
     */
    public function becomeRevisor()
    {
        Mail::to(Auth::user()->email)->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('article.index')->with('success', 'Hai richiesto di diventare revisore');
    }

    /**
     * Mostra il form per richiedere di diventare revisore
     * Show the form to request becoming a revisor
     */
    public function formRevisor()
    {
        return view('mail.revisor-form');
    }

    /**
     * Promuove un utente al ruolo di revisore tramite comando Artisan
     * Promote a user to revisor role using Artisan command
     */
    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }
}

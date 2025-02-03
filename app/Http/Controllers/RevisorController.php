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
     * Accetta un articolo e registra l'azione nel log
     */
    public function accept(Article $article)
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
    public function reject(Article $article)
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
     * Mostra gli articoli già revisionati con filtri per stato
     */
    public function approved(Request $request)
    {
        $query = Article::whereNotNull('is_accepted')
            ->whereNotNull('revisor_id')
            ->with(['revisor', 'category', 'images']);

        // Filtra per stato se specificato
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('is_accepted', $request->status);
        }

        $articles = $query->latest('updated_at')
            ->paginate(10)
            ->withQueryString();

        return view('revisor.approved', compact('articles'));
    }

    /**
     * Invia una richiesta email per diventare revisore
     */
    public function becomeRevisor()
    {
        Mail::to('flavio.volpicella@gmail.com')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('article.index')->with('success', 'Hai richiesto di diventare revisore');
    }

    /**
     * Mostra il form per richiedere di diventare revisore
     */
    public function formRevisor()
    {
        return view('mail.revisor-form');
    }

    /**
     * Promuove un utente al ruolo di revisore tramite comando Artisan
     */
    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }
}

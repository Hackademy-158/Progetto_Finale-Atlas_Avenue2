<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article){
        try {
            if($article->is_accepted !== null) {
                return redirect()->back()->with('error', 'Questo articolo è già stato revisionato');
            }

            $article->update(['is_accepted' => true]);
            
            Log::info('Articolo accettato:', [
                'article_id' => $article->id,
                'title' => $article->title,
                'revisor' => Auth::user()->name
            ]);

            return redirect()->route('revisor.index')
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

    public function reject(Article $article){
        try {
            $title = $article->title;

            // Eliminiamo l'articolo invece di marcarlo come rifiutato, quindi visivamente il revisore non lo vedra ha al potere su altri regular users
            $article->delete();
            
            Log::info('Articolo eliminato:', [
                'article_id' => $article->id,
                'title' => $title,
                'revisor' => Auth::user()->name
            ]);

            return redirect()->route('revisor.index')
                ->with('success', "Hai eliminato l'articolo {$title}");
        } catch (\Exception $e) {
            Log::error('Errore durante eliminazione articolo:', [
                'article_id' => $article->id,
                'error' => $e->getMessage()
            ]);

            return redirect()->back()
                ->with('error', "Si è verificato un errore durante l'eliminazione dell'articolo");
        }
    }
}

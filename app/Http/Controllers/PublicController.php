<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PublicController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', only: ['index', 'dashboard']),
        ];
    } 
    /**
     * Questa funzione:
     * 1. Prende i primi 5 articoli più recenti (take(5))
     * 2. Li ordina per data di creazione decrescente (orderBy('created_at', 'desc'))
     * 3. Filtra solo quelli accettati (where('is_accepted', true))
     * 4. Li recupera dal database (get())
     * 5. Passa gli articoli alla vista 'welcome'
     */
    public function home()
    {
        $articles = Article::take(3)->orderBy('created_at', 'desc')->where('is_accepted', true)->get();
        return view('welcome', compact('articles'));
    }

    /**
     * Questa funzione:
     * 1. Recupera il termine di ricerca dalla richiesta ($request->input('query'))
     * 2. Se la query è vuota:
     *    - Mostra tutti gli articoli accettati
     *    - Carica la relazione con la categoria (with('category'))
     *    - Li ordina per data di creazione
     *    - Li pagina in gruppi di 10
     * 3. Se c'è una query di ricerca:
     *    - Usa Laravel Scout per cercare gli articoli (Article::search())
     *    - Filtra solo quelli accettati
     *    - Carica la relazione con la categoria
     *    - Li ordina per data
     *    - Li pagina in gruppi di 10
     * 4. Passa gli articoli e la query alla vista 'article.searched'
     */
    public function searched(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            // Se la query è vuota, reindirizza alla pagina degli articoli
            return redirect()->route('article.index');
        } else {
            $articles = Article::search($query)
                ->query(function ($builder) {
                    $builder->where('is_accepted', true)
                        ->with('category');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('article.searched', compact('articles', 'query'));
        }
    }

    /**
     * Mostra e filtra gli articoli
     * Show and filter articles
     */
    public function index(Request $request)
    {
        // Prepara la query base degli articoli
        $articles = Article::where('is_accepted', true)
            ->with('category');

        // Filtro per categoria
        if ($request->filled('category') && $request->category != 'all') {
            $articles->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->category);
            });
        }

        // Filtro per prezzo
        $minPrice = $request->input('min-price', 0);
        $maxPrice = $request->input('max-price', 9999);
        $articles->whereBetween('price', [$minPrice, $maxPrice]);

        // Filtro per ricerca
        if ($request->filled('query')) {
            $searchTerm = $request->query;
            $articles->where(function ($query) use ($searchTerm) {
                $query->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Ordina e impagina
        $articles = $articles->latest()->paginate(10);

        // Recupera tutte le categorie per il filtro
        $categories = Category::all();

        return view('article.index', compact('articles', 'categories'));
    }
    // Language Change
    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}

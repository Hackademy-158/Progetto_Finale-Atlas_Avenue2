<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller 
{
    public function index()
    {
        $articles = Article::where('is_accepted', true)->latest()->get();
        $categories = Category::all();
        return view('article.index', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        Article::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
        ]);
    }

    /**
     *  Mostra la vista per dei dettagli annuncio
     */
    public function show(Article $article)
    {
        return view('livewire.article-show', compact('article'));
    }
    public function byCategory(Category $category)
    {
        return view('article.byCategory', ['articles' => $category->articles, 'category' => $category]);
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }
}

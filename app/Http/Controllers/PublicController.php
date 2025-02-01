<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $articles = Article::take(5)->orderBy('created_at', 'desc')->where('is_accepted', true)->get();
        return view('welcome', compact('articles'));
    }

    public function searched(Request $request)
    {
        $query = $request->input('query');
        // If there's a query, perform the search
        $articles = Article::search($query)->where('is_accepted', true)->paginate(10);
        return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }
}

// // If query is empty, return all accepted articles
// if (empty($query)) {
//     $articles = Article::where('is_accepted', true)->paginate(10);
//     return view('article.searched', ['articles' => $articles, 'query' => '']);
// } else {
// }
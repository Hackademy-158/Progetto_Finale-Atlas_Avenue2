<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $articles = Article::take(5)->orderBy('created_at', 'desc')->get();
        return view('welcome', compact('articles'));
    }


}

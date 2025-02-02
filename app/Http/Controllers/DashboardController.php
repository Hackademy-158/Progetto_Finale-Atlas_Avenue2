<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $articles = $user->articles()->latest()->take(5)->get();
        
        return view('dashboard.index', compact('user', 'articles'));
    }

    public function articles()
    {
        $articles = auth()->user()->articles()->latest()->paginate(12);
        return view('dashboard.articles', compact('articles'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('dashboard.profile', compact('user'));
    }
}

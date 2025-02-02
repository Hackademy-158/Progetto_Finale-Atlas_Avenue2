<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ArticleIndex extends Component
{
    use WithPagination;

    protected $listeners = ['filter-updated' => '$refresh'];

    #[On('filter-updated')]
    public function render()
    {
        $query = Article::query()->where('is_accepted', true);

        // Apply filters from the sidebar component
        if (request()->has('search')) {
            $search = request()->get('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if (request()->has('category') && request()->get('category')) {
            $query->where('category_id', request()->get('category'));
        }

        if (request()->has('minPrice') && request()->get('minPrice')) {
            $query->where('price', '>=', request()->get('minPrice'));
        }

        if (request()->has('maxPrice') && request()->get('maxPrice')) {
            $query->where('price', '<=', request()->get('maxPrice'));
        }

        if (request()->has('currency') && request()->get('currency')) {
            $query->where('currency', request()->get('currency'));
        }

        $articles = $query->latest()->paginate(12);

        return view('livewire.article-index', [
            'articles' => $articles
        ])->layout('layouts.catalog');
    }
}

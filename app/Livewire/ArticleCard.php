<?php

namespace App\Livewire;

use Livewire\Component;

class ArticleCard extends Component
{
    public $article;
    public $title;
    public $description;
    public $price;

    public function render()
    {
        return view('livewire.article-card');
    }
}

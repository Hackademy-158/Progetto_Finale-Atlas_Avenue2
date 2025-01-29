<?php

namespace App\Livewire;

use Livewire\Component;

class ArticleShow extends Component
{ 
    public $article;
    public $title;
    public $description;
    public $price;
    public function render()
    {
        return view('livewire.article-show');
    }
}

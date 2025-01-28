<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleCreate extends Component
{
    public $title;
    public $price;
    public $description;
    public function store(){
        Article::create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description
        ]);

        session()->flash('success', 'Articolo creato correttamente!');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.article-create');
    }
}

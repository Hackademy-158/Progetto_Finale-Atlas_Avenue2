<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class ArticleEdit extends Component
{
    public $article;

    #[Validate('required|min:4|max:20')]
    public $title;

    #[Validate('required|min:0')]
    public $price;

    #[Validate('required|min:10|max:120')]
    public $description;

    #[Validate('required')]
    public $category_id;

    #[Validate('required')]
    public $currency = 'EUR';

    public $categories;

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.min' => 'Il titolo deve avere almeno 4 caratteri.',
            'title.max' => 'Il titolo non può avere più di 20 caratteri.',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.min' => 'Il prezzo deve essere almeno €0.01.',
            'description.required' => 'La descrizione è obbligatoria.',
            'description.min' => 'La descrizione deve avere almeno 10 caratteri.',
            'description.max' => 'La descrizione non può avere più di 120 caratteri.',
            'category_id.required' => 'Inserire una categoria.',
            'quantity.required' => 'La quantità è obbligatoria.',
            'quantity.min' => 'La quantità deve essere almeno 1.',
            'quantity.max' => 'La quantità non può superare 10.',
            'currency.required' => 'Selezionare una valuta.',
        ];
    }


    public function update()
    {
        $this->validate();
        $this->article->update([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'currency' => $this->currency
        ]);

        session()->flash('success', 'Articolo aggiornato con successo!');
        return redirect()->route('article.show', $this->article);
    }

    public function destroy()
    {
        $this->article->delete();
        return redirect(route('article.create'))->with('success', 'Articolo eliminato con successo!');
    }
    public function mount()
    {
        $this->categories = Category::all();
        $this->title = $this->article->title;
        $this->price = $this->article->price;
        $this->description = $this->article->description;
        $this->category_id = $this->article->category_id;
        $this->currency = $this->article->currency;
    }

    public function render()
    {
        return view('livewire.article-edit');
    }
}

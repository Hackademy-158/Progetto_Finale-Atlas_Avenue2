<?php

namespace App\Livewire;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ArticleCreate extends Component
{
    #[Validate('required|min:3|max:20')]
    public $title;

    #[Validate('required|min:0|numeric|max:9999.99')]
    public $price;

    #[Validate('required|min:10|max:5000')]
    public $description;

    #[Validate('required')]
    public $category_id;

    #[Validate('required')]
    public $currency = 'EUR'; // valore di default per la valuta

    public $categories = [];  // Inizializza come array vuoto invece di null

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
            'description.max' => 'La descrizione non può avere più di 50 caratteri.',
            'category_id.required' => 'Inserire una categoria.',
            'quantity.required' => 'La quantità è obbligatoria.',
            'currency.required' => 'Selezionare una valuta.',
        ];
    }

    public function store()
    {
        $this->validate();
        Auth::user()->articles()->create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'user_id' => Auth::user()->id,
            'category_id' => $this->category_id,
            'currency' => $this->currency
        ]);

        session()->flash('status', 'Articolo creato con successo!');
        $this->reset();
        return redirect()->route('article.index');
    }

    public function mount()
    {
        try {
            $categories = Category::all();
            if ($categories->isEmpty()) {
                session()->flash('error', 'Nessuna categoria trovata nel database.');
            }
            $this->categories = $categories;
        } catch (\Exception $e) {
            session()->flash('error', 'Errore nel caricamento delle categorie: ' . $e->getMessage());
            $this->categories = collect([]);  // Inizializza come collection vuota
        }
    }

    public function render()
    {
        if (!$this->categories) {
            $this->categories = collect([]); // Assicurati che categories non sia mai null
        }
        return view('livewire.article-create');
    }
}

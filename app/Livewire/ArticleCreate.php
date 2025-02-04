<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreArticleRequest;

class ArticleCreate extends Component
{

    use WithFileUploads;

    public $article;
    public $images = [];
    public $temporary_images;

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
        
        $user = Auth::user();
        
        $this->article = Article::create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'user_id' => $user->id,
            'category_id' => $this->category_id,
            'currency' => $this->currency
        ]);

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
                dispatch(new ResizeImage($newImage->path, 300, 300));
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        
        session()->flash('status', 'Articolo creato con successo!');
        $this->cleanForm();
        $this->reset();
        return redirect()->route('article.index');
    }

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.article-create', [
            'categories' => $this->categories
        ]);
    }

    public function updatedTemporaryImages()
    {

        if ($this->validate([
            'temporary_images.*' => 'image|max:2048',
            'temporary_images' => 'max:6',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    protected function cleanForm()
    {
        $this->title = '';
        $this->price = '';
        $this->description = '';
        $this->category_id = '';
        $this->currency = '';
        $this->images = [];
    }
}

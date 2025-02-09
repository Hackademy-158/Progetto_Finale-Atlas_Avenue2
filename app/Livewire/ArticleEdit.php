<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleEdit extends Component
{
    use WithFileUploads;
    
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
    
    #[Validate('')]
    public $temporary_images = [];
    
    public $categories;
    
    public $images = []; 
    public $old_images = [];
    
    public $category;
    public $fileCount = 0;
    
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
        $this->validate([
            'title' => 'required|min:2',
            'description' => 'required|min:10',
            'price' => 'numeric',
            'temporary_images.*' => 'image|max:1024', 
            'temporary_images' => 'max:6', 
        ]);
        
        
        if (!empty($this->temporary_images)) {
            if ($this->old_images) {
                foreach ($this->old_images as $image) {
                    Storage::delete($image->path);
                    $image->delete();
                }
            }
            
            $savedImages = []; 
            
            foreach ($this->temporary_images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $path = $image->store($newFileName, 'public');
                
                $newImage = $this->article->images()->create(['path' => $path]);
                $savedImages[] = $newImage->id; 
            }
            
            
            foreach ($savedImages as $imageId) {
                RemoveFaces::withChain([
                    new ResizeImage($this->article->images()->find($imageId)->path, 800, 800),
                    new GoogleVisionSafeSearch($imageId),
                    new GoogleVisionLabelImage($imageId)
                    ])->dispatch($imageId);
                }
                
                
                File::deleteDirectory(storage_path('/app/livewire-tmp'));
            }
            
            
            $this->article->update([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'category' => $this->category,
            ]);
            
            $this->article->setAccepted(null);
            
            return redirect(route('article.index'))->with('success', ('Articolo modificato correttamente!'));
        }
        
    public function destroy()
    {
        $this->article->delete();
        return redirect(route('article.index'))->with('success', 'Articolo eliminato con successo!');
    }
    public function mount()
    {
        $this->categories = Category::all();
        $this->title = $this->article->title;
        $this->price = $this->article->price;
        $this->description = $this->article->description;
        $this->category_id = $this->article->category_id;
        $this->currency = $this->article->currency;
        $this->old_images = $this->article->images;
    }
    
    public function render()
    {
        return view('livewire.article-edit');
    }
}

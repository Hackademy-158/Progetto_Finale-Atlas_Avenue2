<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use Searchable, HasFactory;

    protected $searchable = [
        'columns' => [
            'articles.title' => 10,
            'articles.description' => 5,
            'categories.name' => 2,
        ]
    ];
    // Funzione per la ricerca tramite determinati campi
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return [
            'id' => $this->getKey(),
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category ? $this->category->name : null,
        ];
    }

// Funzione per la ricerca di un articolo solo se è stato accettato
    public function shouldBeSearchable()
    {
        return $this->is_accepted;
    }
    
    protected $fillable = [
        'title',
        'price',
        'description',
        'is_accepted',
        'revisor_id',
        'user_id', 
        'category_id',
        'currency'
    ];

    protected $appends = ['currency_symbol'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function revisor()
    {
        return $this->belongsTo(User::class, 'revisor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->revisor_id = auth()->id();
        $this->save();
        return true;
    }

    // Se l'articolo è stato accettato, restituisce il simbolo della moneta, altrimenti restituisce la moneta in uso
    public function getCurrencySymbolAttribute()
    {
        $symbols = [
            'EUR' => '€',
            'USD' => '$',
            'GBP' => '£',
            'JPY' => '¥'
        ];
        
        return $symbols[$this->currency] ?? $this->currency;
    }

    public static function revisorPendingRequests()
    {
        return Article::where('is_accepted', null)->count();
    }
}

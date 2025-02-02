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
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category->name ?? null,
        ];
    }
    
    protected $fillable = [
        'title', // Titolo che l'utente ha inserito per l'annuncio
        'description', // Descrizione che l'utente ha inserito per l'annuncio
        'price',  // Prezzo che l'utente ha inserito per l'annuncio
        'user_id', // L'utente che ha creato l'annuncio
        'category_id', // La categoria a cui l'annuncio appartiene
        'is_accepted', // Se l'annuncio è stato approvato o no
        'revisor_id'  // Chi ha revisionato l'annuncio
    ];

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


    public static function revisorPendingRequests()
    {
        return Article::where('is_accepted', null)->count();
    }
}

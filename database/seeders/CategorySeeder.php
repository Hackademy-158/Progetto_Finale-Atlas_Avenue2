<?php

namespace Database\Seeders;

use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $categories = [
        'Elettronica & Tech',     // Dispositivi elettronici, gadget, accessori tech
        'Casa & Arredamento',     // Mobili, decorazioni, accessori casa
        'Moda & Accessori',       // Abbigliamento, scarpe, gioielli
        'Sport & Tempo libero',   // Attrezzature sportive, hobby
        'Libri & Media',          // Libri, film, musica
        'Salute & Bellezza',      // Prodotti benessere, cosmetici
        'Cucina & Food',          // Elettrodomestici cucina, utensili
        'Fai da te & Bricolage',  // Attrezzi, materiali
        'Gaming & Console',       // Videogiochi, console, accessori gaming
        'Arte & Collezionismo'    // Opere d'arte, oggetti da collezione
    ];

    public function run(): void
    {

        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
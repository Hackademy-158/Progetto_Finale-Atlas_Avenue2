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
        'Elettronica_Tech',     // Dispositivi elettronici, gadget, accessori tech
        'Casa_Arredamento',     // Mobili, decorazioni, accessori casa
        'Moda_Accessori',       // Abbigliamento, scarpe, gioielli
        'Sport_Tempo_libero',   // Attrezzature sportive, hobby
        'Libri_Media',          // Libri, film, musica
        'Salute_Bellezza',      // Prodotti benessere, cosmetici
        'Cucina_Food',          // Elettrodomestici cucina, utensili
        'Fai_da_te_Bricolage',  // Attrezzi, materiali
        'Gaming_Console',       // Videogiochi, console, accessori gaming
        'Arte_Collezionismo'    // Opere d'arte, oggetti da collezione
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

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
    public $categories = ['Tecnologia', 'Cucina', 'Benessere', 'Intrattenimento', 'Sport', 'Arredamento', 'Fai da Te', 'Musica', 'Abbigliamento', 'Libri'];

    public function run(): void
    {

        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
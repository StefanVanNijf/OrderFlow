<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuCategory;

class MenuCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = ['Voorgerechten', 'Hoofdgerechten', 'Desserts', 'Dranken', 'Koffie', 'Frisdranken', 'Bieren'];

        foreach ($categories as $categoryName) {
            MenuCategory::create(['name' => $categoryName]);
        }
        
    }
}

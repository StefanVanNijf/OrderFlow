<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table; 

class TablesTableSeeder extends Seeder
{
    public function run()
    {
        for ($tableNumber = 1; $tableNumber <= 12; $tableNumber++) {
            Table::create(['number' => $tableNumber]);
        }
    }
}

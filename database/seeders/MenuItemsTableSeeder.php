<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;
use App\Models\MenuCategory;

class MenuItemsTableSeeder extends Seeder
{
    public function run()
    {
        $menuItems = [
            'Voorgerechten' => [
                ['name' => 'Bruschetta al Pomodoro', 'description' => 'Geroosterd brood met verse tomaten, knoflook, basilicum en olijfolie.', 'price' => 7.50],
                ['name' => 'Calamari Fritti', 'description' => 'Gefrituurde inktvisringen met citroen en pikante tomatensaus.', 'price' => 9.00],
                ['name' => 'Caprese Salade', 'description' => 'Buffelmozzarella, tomaten, verse basilicum en balsamico-glazuur.', 'price' => 8.50],
            ],
            'Hoofdgerechten' => [
                ['name' => 'Gegrilde Zalmfilet', 'description' => 'Geserveerd met citroen-dille saus, seizoensgroenten en aardappelpuree', 'price' => 18.50],
                ['name' => 'Pasta Carbonara', 'description' => 'Romige saus met spek, Parmezaanse kaas en eigeel', 'price' => 14.00],
                ['name' => 'Gegrilde Kip Pesto', 'description' => 'Malse kipfilet met basilicum-pestosaus, geserveerd met geroosterde groenten', 'price' => 16.50]
            ],
            'Desserts' => [
                ['name' => 'Tiramisu', 'description' => 'Traditioneel Italiaans dessert met lagen koffie gedrenkte biscuit, mascarpone en cacao', 'price' => 7.00],
                ['name' => 'Chocolade Lava Cake', 'description' => 'Warme chocoladetaart met een vloeibare chocoladekern, geserveerd met vanille-ijs', 'price' => 8.50]
            ],
            'Dranken' => [
                ['name' => 'Mojito', 'description' => 'Verse munt, limoen, suiker en rum, afgemaakt met bruiswater', 'price' => 9.00],
                ['name' => 'Fruitige Mocktail', 'description' => 'Gemengd fruit met vruchtensap en een vleugje grenadine', 'price' => 6.50]
            ],
            'Koffie' => [
                ['name' => 'Espresso', 'description' => 'Sterke zwarte koffie', 'price' => 2.50],
                ['name' => 'Cappuccino', 'description' => 'Espresso met gestoomde melk en een laagje melkschuim', 'price' => 3.50],
                ['name' => 'Iced Coffee', 'description' => 'Gekoelde koffie met ijsblokjes', 'price' => 4.00]
            ],
            'Frisdranken' => [
                ['name' => 'Verse Sinaasappelsap', 'description' => 'Vers geperst sinaasappelsap', 'price' => 4.50],
                ['name' => 'Citroenlimonade', 'description' => 'Verfrissende limonade met een vleugje citroen', 'price' => 3.50]
            ],
            'Bieren' => [
                ['name' => 'Lokale Pale Ale', 'description' => 'Ambachtelijk gebrouwen pale ale', 'price' => 5.50],
                ['name' => 'Witbier', 'description' => 'Licht en verfrissend tarwebier', 'price' => 4.50]
            ]
        ];
        

        foreach ($menuItems as $categoryName => $items) {
            $category = MenuCategory::firstOrCreate(['name' => $categoryName]);

            foreach ($items as $item) {
                MenuItem::create([
                    'menu_category_id' => $category->id,
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                ]);
            }
        }
    }
}

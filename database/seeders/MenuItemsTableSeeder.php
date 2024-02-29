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
                ['name' => 'Bruschetta al Pomodoro', 'description' => 'Geroosterd brood met verse tomaten, knoflook, basilicum en olijfolie.', 'price' => 7.50, 'image' => asset('img/bruschetta.jpeg')],
                ['name' => 'Calamari Fritti', 'description' => 'Gefrituurde inktvisringen met citroen en pikante tomatensaus.', 'price' => 9.00, 'image' => asset('img/calamari.jpeg')],
                ['name' => 'Caprese Salade', 'description' => 'Buffelmozzarella, tomaten, verse basilicum en balsamico-glazuur.', 'price' => 8.50, 'image' => asset('img/caprese.jpeg')],
            ],
            'Hoofdgerechten' => [
                ['name' => 'Gegrilde Zalmfilet', 'description' => 'Geserveerd met citroen-dille saus, seizoensgroenten en aardappelpuree', 'price' => 18.50, 'image' => asset('img/zalmfilet.jpeg')],
                ['name' => 'Pasta Carbonara', 'description' => 'Romige saus met spek, Parmezaanse kaas en eigeel', 'price' => 14.00, 'image' => asset('img/carbonara.jpeg')],
                ['name' => 'Gegrilde Kip Pesto', 'description' => 'Malse kipfilet met basilicum-pestosaus, geserveerd met geroosterde groenten', 'price' => 16.50, 'image' => asset('img/Gegrilde Kip Pesto.jpeg')]
            ],
            'Desserts' => [
                ['name' => 'Tiramisu', 'description' => 'Traditioneel Italiaans dessert met lagen koffie gedrenkte biscuit, mascarpone en cacao', 'price' => 7.00, 'image' => asset('img/Tiramisu.jpeg')],
                ['name' => 'Chocolade Lava Cake', 'description' => 'Warme chocoladetaart met een vloeibare chocoladekern, geserveerd met vanille-ijs', 'price' => 8.50, 'image' => asset('img/Chocolade Lava Cake.jpeg')]
            ],
            'Dranken' => [
                ['name' => 'Mojito', 'description' => 'Verse munt, limoen, suiker en rum, afgemaakt met bruiswater', 'price' => 9.00, 'image' => asset('img/Mojito.jpeg')],
                ['name' => 'Fruitige Mocktail', 'description' => 'Gemengd fruit met vruchtensap en een vleugje grenadine', 'price' => 6.50, 'image' => asset('img/Fruitige Mocktail.jpeg')]
            ],
            'Koffie' => [
                ['name' => 'Espresso', 'description' => 'Sterke zwarte koffie', 'price' => 2.50, 'image' => asset('img/Espresso.jpeg')],
                ['name' => 'Cappuccino', 'description' => 'Espresso met gestoomde melk en een laagje melkschuim', 'price' => 3.50, 'image' => asset('img/Cappuccino.jpeg')],
                ['name' => 'Iced Coffee', 'description' => 'Gekoelde koffie met ijsblokjes', 'price' => 4.00, 'image' => asset('img/Iced Coffee.jpeg')]
            ],
            'Frisdranken' => [
                ['name' => 'Verse Sinaasappelsap', 'description' => 'Vers geperst sinaasappelsap', 'price' => 4.50, 'image' => asset('img/Verse Sinaasappelsap.jpeg')],
                ['name' => 'Citroenlimonade', 'description' => 'Verfrissende limonade met een vleugje citroen', 'price' => 3.50, 'image' => asset('img/Citroenlimonade.jpeg')]
            ],
            'Bieren' => [
                ['name' => 'Lokale Pale Ale', 'description' => 'Ambachtelijk gebrouwen pale ale', 'price' => 5.50, 'image' => asset('img/Lokale Pale Ale.jpeg')],
                ['name' => 'Witbier', 'description' => 'Licht en verfrissend tarwebier', 'price' => 4.50, 'image' => asset('img/Witbier.jpeg')]
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
                    'image' => $item['image'],
                ]);
            }
        }
    }
}

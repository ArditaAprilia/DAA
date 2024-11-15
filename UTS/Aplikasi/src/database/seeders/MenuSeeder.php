<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Nasi Goreng Spesial',
                'description' => 'Nasi goreng dengan tambahan telur, ayam, dan kerupuk.',
                'price' => 25000.00,
                'category' => 'Makanan',
                'availability' => true,
            ],
            
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}

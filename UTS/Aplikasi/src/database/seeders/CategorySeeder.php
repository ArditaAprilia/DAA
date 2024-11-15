<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Makanan Utama', 'description' => 'Kategori untuk makanan utama seperti nasi, pasta, dan daging.'],
            ['name' => 'Minuman', 'description' => 'Kategori untuk berbagai jenis minuman, baik panas maupun dingin.'],
            
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

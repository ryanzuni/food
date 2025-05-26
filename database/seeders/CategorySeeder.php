<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Makanan Berat'],
            ['name' => 'Makanan Ringan'],
            ['name' => 'Minuman'],
            ['name' => 'Dessert'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

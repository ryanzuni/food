<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    public function run()
    {
        Food::create([
            'name' => 'Nasi Goreng Spesial',
            'description' => 'Nasi goreng dengan telur, ayam, dan kerupuk.',
            'image' => 'nasi_goreng.png',
            'category' => 'Nasi'
        ]);
        Food::create([
            'name' => 'Sate Ayam',
            'description' => 'Sate ayam dengan bumbu kacang yang lezat.',
            'image' => 'sateayam.jpg',
            'category' => 'Sate'
        ]);
        Food::create([
            'name' => 'Mie Goreng',
            'description' => 'Mie goreng pedas dengan sayuran segar.',
            'image' => 'miegoreng.jpg',
            'category' => 'Mie'
        ]);
    }
}

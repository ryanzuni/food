<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua kategori unik dari tabel 'foods'
        $categories = Food::select('category')->distinct()->pluck('category');

        // Ambil 4 makanan yang sedang diskon
        $discountedFoods = Food::where('is_discount', true)->limit(4)->get();

        // Ambil 4 makanan terlaris berdasarkan sold_count
        $bestSellers = Food::orderByDesc('sold_count')->limit(4)->get();

        // Kirim data ke view
        return view('home', compact('categories', 'discountedFoods', 'bestSellers'));
    }
}

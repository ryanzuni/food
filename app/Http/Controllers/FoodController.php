<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function showCategory($category)
    {
        $decodedCategory = urldecode($category);

        $foods = Food::where('category', $decodedCategory)->get();

        return view('menu', compact('foods', 'decodedCategory'));
    }
}

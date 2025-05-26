<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class MenuController extends Controller
{
    public function showByCategory($category)
    {
        $foods = Food::where('category', urldecode($category))->get();

        return view('menu', compact('foods', 'category'));
    }
}

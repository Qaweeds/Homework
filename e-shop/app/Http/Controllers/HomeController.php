<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        $products = Product::query()->limit(10)->with('category')->inRandomOrder()->get();
        $categories = Category::query()->limit(4)->inRandomOrder()->get();

        return view('home', compact('products', 'categories'));
    }
}

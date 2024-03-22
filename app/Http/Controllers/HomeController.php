<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve 6 random recipes
        $randomRecipes = Recipe::inRandomOrder()->limit(6)->get();

        // Pass random recipes to the view
        return view('index', ['randomRecipes' => $randomRecipes]);   
    }

    public function aboutus()
    {
        return view('aboutus.aboutus');
    }
}

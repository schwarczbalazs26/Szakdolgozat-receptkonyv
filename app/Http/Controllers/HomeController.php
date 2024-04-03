<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $randomRecipes = Recipe::inRandomOrder()->limit(6)->get();

        
        return view('index', ['randomRecipes' => $randomRecipes]);   
    }

    public function aboutus()
    {
        return view('aboutus.aboutus');
    }

}

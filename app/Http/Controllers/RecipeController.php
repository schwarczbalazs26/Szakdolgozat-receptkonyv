<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function show($id)
     {
         $recipe = Recipe::findOrFail($id);
         return view('recipes.show', ['recipe' => $recipe]);
     }

    public function index()
    {
        return view('recipes.index');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

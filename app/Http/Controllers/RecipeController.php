<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   /**
 * Display a listing of the resource.
 */
public function index(Request $request)
{
    $query = $request->input('search');

    $recipes = Recipe::query()
        ->when($query, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })
        ->get();

    return view('recipes.index', compact('recipes'));
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.show', ['recipe' => $recipe]);
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

    /**
     * Search for recipes.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $recipes = Recipe::query()
            ->where('title', 'like', '%' . $query . '%')
            ->get();

        return response()->json($recipes);
    }
}

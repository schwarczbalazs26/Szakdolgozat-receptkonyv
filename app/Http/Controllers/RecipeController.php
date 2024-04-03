<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Allergen;
use Illuminate\Support\Facades\Config;

class RecipeController extends Controller
{

    public function showUploadForm()
    {
        if (auth()->check()) {
            return view('recipeupload.recipeupload');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            return $this->searchRecipes($query);
        } else {
            return $this->filterRecipes($request);
        }
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
    public function searchRecipes($query)
    {
        $recipes = Recipe::query()
            ->where('title', 'like', '%' . $query . '%')
            ->orderBy('id', 'desc')
            ->paginate(9);

        $allergens = Allergen::all();
        $prep_time = Config::get('enums.prep_time');
        $difficulty = Config::get('enums.difficulty');

        return view('recipes.index', compact('recipes', 'allergens', 'difficulty', 'prep_time'));
    }

    /**
     * Filter recipes based on request parameters.
     */
    public function filterRecipes(Request $request)
    {
        $allergens = Allergen::all();
        $difficulties = Config::get('enums.difficulty');
        $recipes = Recipe::orderBy('id', 'desc')->paginate(9);

        $selectedAllergens = $request->input('allergens', []);
        $selectedDifficulties = $request->input('difficulties', []);

        $filteredRecipes = Recipe::query()
            ->when(count($selectedAllergens) > 0, function ($query) use ($selectedAllergens) {
                $query->whereHas('allergens', function ($q) use ($selectedAllergens) {
                    $q->whereIn('id', $selectedAllergens);
                });
            })
            ->when(count($selectedDifficulties) > 0, function ($query) use ($selectedDifficulties) {
                $query->whereIn('difficulty', $selectedDifficulties);
            })
            ->orderBy('id', 'desc')
            ->paginate(9);

        return view('recipes.index', [
            'recipes' => $recipes,
            'filteredRecipes' => $filteredRecipes,
            'allergens' => $allergens,
            'difficulties' => $difficulties,
            'lastPage' => $filteredRecipes->lastPage(),
        ]);
    }

    public function recipeUploadIndex()
    {
        $allergens = Allergen::all();
        $prep_time = Config::get('enums.prep_time');
        $difficulty = Config::get('enums.difficulty');

        return view('recipeupload.recipeupload', compact('allergens', 'prep_time', 'difficulty'));
    }

}

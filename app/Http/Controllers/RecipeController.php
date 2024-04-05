<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Allergen;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Auth;
class RecipeController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query');

        $recipes = Recipe::query()
            ->where('title', 'like', '%' . $query . '%')
            ->get();

        return response()->json($recipes);
    }

    public function showUploadForm()
    {

        $allergens = Allergen::all();
        $prep_time = Config::get('enums.prep_time');
        $difficulty = Config::get('enums.difficulty');
        return view('recipeupload.recipeupload', compact('difficulty', 'allergens', 'prep_time'));
    }

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
        $validatedData = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:100',
            'instructions' => 'required|string',
            'difficulty' => 'required|integer',
            'prep_time' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'allergens' => 'nullable|array',
        ]);

        $userId = Auth::user()->id;
        $allergens = $request->input('allergens');

        $difficultyEnum = ['beginner', 'novice', 'medium', 'hard', 'expert'];
        $difficulty = $difficultyEnum[$validatedData['difficultyIndex'] - 1];

        $prepTimeEnum = ['5-15 min', '15-30 min', '30-45 min', '45-60 min', '60+ min'];
        $prepTime = $prepTimeEnum[$validatedData['prepTimeIndex'] - 1];
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid('recipe_') . '.' . 'png';
            $image->storeAs('public/storage/userimages', $filename);
        } else {
            $filename = null;
        }

        $recipe = new Recipe;
        $recipe->user_id = $userId;
        $recipe->title = $validatedData['title'];
        $recipe->description = $validatedData['description'];
        $recipe->instructions = $validatedData['instructions'];
        $recipe->difficulty = $difficulty;
        $recipe->prep_time = $prepTime;
        $recipe->image = $filename;

        $recipe->save();


        if ($allergens) {
            $recipe->allergens()->attach($allergens);
        }

        //  return redirect()->back()->with('success', 'Recipe submitted successfully!');
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
     * Currently WIP
     */
    public function filterRecipes(Request $request)
    {
        $allergens = Allergen::all();
        $difficulties = Config::get('enums.difficulty');

        $selectedAllergens = $request->input('allergens', []);
        $selectedDifficulties = $request->input('difficulties', []);

        $recipesQuery = Recipe::query();

        $recipesQuery = $recipesQuery->when(count($selectedAllergens) > 0, function ($query) use ($selectedAllergens) {
            $query->whereHas('allergens', function ($q) use ($selectedAllergens) {
                $q->whereIn('id', $selectedAllergens);
            });
        })
            ->when(count($selectedDifficulties) > 0, function ($query) use ($selectedDifficulties) {
                $query->whereIn('difficulty', $selectedDifficulties);
            });

        $recipes = $recipesQuery->orderBy('id', 'desc')->paginate(9);

        return view('recipes.index', [
            'recipes' => $recipes,
            'allergens' => $allergens,
            'difficulties' => $difficulties,
            'lastPage' => $recipes->lastPage()
        ]);
    }
}

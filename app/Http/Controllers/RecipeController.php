<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Allergen;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\models\Ingredient;

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
        $amounts = Config::get('enums.amount');
        $allergens = Allergen::all();
        $prep_time = Config::get('enums.prep_time');
        $difficulty = Config::get('enums.difficulty');
        return view('recipeupload.recipeupload', compact('difficulty', 'allergens', 'prep_time', 'amounts'));
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
            'difficulty' => 'required|string',
            'prep_time' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'allergens' => 'nullable|array',
            'ingredients' => 'required|array',
            'ingredients.*' => 'string',
            'quantities' => 'required|array',
            'quantities.*' => 'numeric',
            'amounts' => 'required|array',
            'amounts.*' => 'string',
        ]);
        $ingredients = $request->input('ingredients');
        $amounts = $request->input('amounts');
        $allergens = $request->input('allergens');

        if (strcmp($validatedData['prep_time'], "60") == 0) {
            // if its 60 then add "+ min"
            $prepTime = $validatedData['prep_time'] . "+ min";
        } else $prepTime = $validatedData['prep_time'] . " min"; //else just add " min"

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid('recipe_') . '.' . 'png';
            $image->storeAs('public/', $filename);
        } else {
            $filename = null;
        }

        $recipe = new Recipe;
        $recipe->user_id = Auth::user()->id;
        $recipe->title = $validatedData['title'];
        $recipe->description = $validatedData['description'];
        $recipe->instructions = $validatedData['instructions'];
        $recipe->difficulty = $validatedData['difficulty'];
        $recipe->prep_time = $prepTime;
        $recipe->filename = $filename;

        $recipe->save();

        $ingredients = $request->input('ingredients');

        if ($ingredients) {
            foreach ($validatedData['ingredients'] as $key => $ingredientName) {
                $existingIngredient = Ingredient::where('name', $ingredientName)->first();
                
                if (!$existingIngredient) { //check if doesn't exist and then upload it
                    $newIngredient = new Ingredient;
                    $newIngredient->name = ucwords(strtolower($ingredientName));    //normalise the name for the database
                    $newIngredient->save();
                    $selectedAmountName = $amounts[$key];
                    $recipe->ingredients()->attach($newIngredient->id, ['amount' => $selectedAmountName, 'quantity' => $validatedData['quantities'][$key]]);
                } else {
                    $selectedAmountName = $amounts[$key];   //if it exists just upload it
                    $recipe->ingredients()->attach($existingIngredient->id, ['amount' => $selectedAmountName, 'quantity' => $validatedData['quantities'][$key]]);
                }
            }
        }

        if ($allergens) {
            foreach ($allergens as $allergenName) {
                // retrieve ID of allergen
                $allergen = Allergen::where('name', $allergenName)->first();
                if ($allergen) {
                    // if exists, attach it
                    $recipe->allergens()->attach($allergen->id);
                }
            }
        }

        return redirect('/recipes')->with('success', 'Recipe submitted successfully!');
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

<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');
Route::get('/aboutus', 'App\Http\Controllers\HomeController@aboutus')->name('aboutus');
Route::get('/recipes', 'App\Http\Controllers\RecipeController@index')->name('recipes.index');
Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show');
Route::get('/search', [RecipeController::class, 'search']);
Route::post('/search', [RecipeController::class, 'search']);
Route::post('/recipes', [RecipeController::class, 'filterRecipes'])->name('recipes.filter');
Route::get('/recipeupload/recipeupload', [RecipeController::class, 'showUploadForm'])->name('recipeupload.index')->middleware('auth');
Route::post('/recipeupload/recipeupload', [RecipeController::class, 'store'])->name('recipes.store')->middleware('auth');
Route::post('/comments', [CommentsController::class,'store'])->name('comments.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

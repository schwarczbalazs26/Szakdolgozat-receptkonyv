<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class recipe extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'recipes';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredient_table', 'recipe_id', 'ingredient_id')->withPivot('amount','quantity');
    }
    
    public function allergens(){
        return $this->belongsToMany(Allergen::class, 'recipe_allergen_table', 'recipe_id', 'allergen_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recipes(){
        return $this->belongsToMany(Recipe::class, 'recipe_ingredient_table', 'ingredient_id', 'recipe_id');
    }
}

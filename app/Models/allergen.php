<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recipes(){
        return $this->belongsToMany(Recipe::class, 'recipe_allergen_table', 'allergen_id', 'recipe_id');
    }
}
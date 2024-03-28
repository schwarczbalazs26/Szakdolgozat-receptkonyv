<?php

namespace Database\Seeders;

use App\Models\Allergen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllergenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $allergens = [
            'Celery',
            'Gluten',
            'Crustaceans',
            'Eggs',
            'Fish',
            'Lupin',
            'Milk',
            'Molluscs',
            'Mustard',
            'Nuts',
            'Peanuts',
            'Sesame seeds',
            'Soya',
            'Sulphur Dioxide',
        ];

        foreach ($allergens as $allergen) {
            Allergen::create(['name' => $allergen]);
        }
    }
}
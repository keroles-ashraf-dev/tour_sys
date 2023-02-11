<?php

namespace Database\Seeders;

use App\Models\Deal;
use App\Models\Tour;
use App\Models\TourTranslation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tours = Tour::factory(10)->create()->each(function ($tour) {

            foreach (config('app.app_locales') as $code => $name) {

                TourTranslation::create([
                    'tour_id' => $tour->id,
                    'locale' => $code,
                    'name' => fake($code)->realText(50),
                ]);
            }

            Deal::create([
                'tour_id' => $tour->id,
                'min_adults_count' => 2,
                'min_children_count' => null,
                'adult_discount' => 0.8,
                'child_discount' => null,
            ]);
            
            Deal::create([
                'tour_id' => $tour->id,
                'min_adults_count' => 4,
                'min_children_count' => null,
                'adult_discount' => 0.7,
                'child_discount' => null,
            ]);
        });
    }
}

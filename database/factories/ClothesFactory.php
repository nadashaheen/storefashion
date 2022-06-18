<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clothes>
 */
class ClothesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'title'=>$this->faker->sentence,
            'description'=>$this->faker->text(200),
            'price'=>$this->faker->numberBetween(1,5000),
            'size'=>$this->faker->text(5),
            'active'=>Str::ascii('yes'),
            'featured'=>Str::ascii('yes'),
            'image_name'=> $this->faker->imageUrl,
            'category_id'=>Category::all()->random(),

        ];
    }
}

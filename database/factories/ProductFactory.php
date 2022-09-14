<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => Category::pluck('id')->random() , 
            'user_id' => User::pluck('id')->random() , 
            'name' => $this->faker->name(),
            'quantity' => $this->faker->randomDigit(),
            'description' => $this->faker->text(),
            'small_description' => $this->faker->text(),
            'original_price' => $this->faker->randomDigit(),
            'selling_price' => $this->faker->randomDigit(),
            'meta_title' => $this->faker->title(),
            'meta_description' => $this->faker->text(),
            'meta_keywords' => $this->faker->name(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

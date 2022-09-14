<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            // 'status' => $this->faker->randomDigit(),
            // 'popular' => $this->faker->randomDigit(),
            'meta_title' => $this->faker->title(),
            'meta_description' =>$this->faker->text(),
            'meta_keywords' => $this->faker->name(),
            // 'category_picture' => ''
            'created_at' => now(),
            'updated_at' => now() , 
        ];
    }
}

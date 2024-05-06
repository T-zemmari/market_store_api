<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
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
    public function definition(): array
    {
        $name = $this->faker->word;
        $description = $this->faker->sentence;
        $image = $this->faker->imageUrl();
        $parent = Category::exists() ? Category::inRandomOrder()->first()->id : rand(1,5);
        $display = $this->faker->randomElement(['default', 'featured']);

        return [
            'name' => $name,
            'parent' => $parent,
            'description' => $description,
            'display' => $display,
            'image' => $image,
        ];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (Category $category) {
    //         $numberOfProducts = rand(1, 10);
    //         $products = Product::factory($numberOfProducts)->create(['category_id' => $category->id]);
    //         $category->products()->saveMany($products);
    //     });
    // }
}

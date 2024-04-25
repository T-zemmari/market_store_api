<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
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
    public function definition(): array
    {

        $sku = $this->generateUniqueSKU();

        return [
            'category_id' => Category::factory(), // Asociamos aleatoriamente el producto a una categoría existente
            'name' => $this->faker->word(),
            'slug' => null,
            'sku' => $sku,
            'type' => 'simple',
            'status' => 'publish',
            'featured' => $this->faker->boolean(),
            'catalog_visibility' => 'visible',
            'description' => $this->faker->sentence,
            'short_description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'regular_price' => $this->faker->randomFloat(2, 10, 1000),
            'sale_price' => $this->faker->randomFloat(2, 5, 500),
            'on_sale' => $this->faker->boolean(50),
            'stock_quantity' => $this->faker->numberBetween(0, 100),
            'stock_status' => $this->faker->randomElement(['instock', 'outofstock']),
            'weight' => $this->faker->numberBetween(1, 10) . 'kg',
            'dimensions' => $this->faker->randomNumber(2) . 'x' . $this->faker->randomNumber(2) . 'x' . $this->faker->randomNumber(2) . 'cm',
            'parent_id' => null,
            'image' => $this->faker->imageUrl(),
            'meta_data' => null,
            'variation' => false,
        ];
    }

    protected function generateUniqueSKU(): string
    {
        do {
            $sku = $this->faker->numberBetween(10000, 999999);
        } while (Product::where('sku', $sku)->exists());

        return $sku;
    }
}

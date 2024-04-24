<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'customer_type' => $this->faker->randomElement(['individual', 'business']),
            'email' => $this->faker->unique()->email(),
            'password' => $this->faker->password(),
            'adress' => $this->faker->streetAddress(),
            'postal_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'phone' => $this->faker->phoneNumber(),
            'is_paying_customer' => $this->faker->randomElement([0,1]),
            'avatar_url' => $this->faker->imageUrl(),
        ];
    }
}

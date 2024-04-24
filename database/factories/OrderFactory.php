<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['pending', 'processing', 'completed', 'failed']);

        $orderDate = $this->faker->dateTimeBetween('-1 year', 'now');
        $completedDate = $status === 'completed' ? $this->faker->dateTimeBetween($orderDate, 'now') : null;

        // Obtenemos una lista de productos aleatorios
        $products = Product::inRandomOrder()->limit(3)->get();

        // Calculamos el total del pedido basado en los precios de los productos
        $subtotal = $products->sum(function ($product) {
            return $product->price;
        });

        // Aplicamos cualquier descuento aleatorio al subtotal
        $discount = $this->faker->randomFloat(2, 0, 1);
        $subtotal -= $discount;

        // Aplicamos una tarifa de envío aleatoria
        $shippingTotal = $this->faker->randomFloat(2, 0, 50);

        // Calculamos el impuesto como un porcentaje del subtotal
        $taxPercentage = $this->faker->randomFloat(2, 0, 10);
        $taxAmount = $subtotal * ($taxPercentage / 100);

        // Calculamos el total del pedido incluyendo impuestos y tarifa de envío
        $total = $subtotal + $taxAmount + $shippingTotal;

        // Construimos el array de line_items con información completa de los productos
        $lineItems = [];
        foreach ($products as $product) {
            $lineItems[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $this->faker->numberBetween(1, 5),
            ];
        }

        return [
            'customer_id' => Customer::factory(),
            'customer_ip_address' => $this->faker->ipv4,
            'status' => $status,
            'currency' => 'EUR',
            'discount_total' => $discount,
            'shipping_total' => $total - $taxAmount,
            'tax_type' => 'sales_tax',
            'total_tax' => $taxAmount,
            'prices_include_tax' => $this->faker->boolean(),
            'shipping_total_with_tax' => $total,
            'payment_method' => 'credit_card',
            'payment_method_title' => 'Credit Card',
            'date_paid' => $status === 'completed' ? $this->faker->dateTimeBetween($completedDate, 'now') : null,
            'date_completed' => $completedDate,
            'line_items' => json_encode($lineItems),
            'coupon_lines' => json_encode([]),
        ];
    }
}

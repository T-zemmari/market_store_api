<?php

namespace App\Http\Resources;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $include_orders = $request->query('orders') == 'true' ?? 'false';
        $orders = [];
        if ($include_orders) {
            $info_orders = Order::where('customer_id', $this->id)->get();
            if ($info_orders->count() > 0) {
                foreach ($info_orders as $order) {

                    $lineItems = collect(json_decode($order->line_items))->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'name' => $item->name,
                            'price' => $item->price,
                            'quantity' => $item->quantity,
                        ];
                    })->toArray();

                    $couponLines = collect(json_decode($order->coupon_lines))->map(function ($coupon) {
                        return [
                            'id' => $coupon->id,
                            'code' => $coupon->code,
                            'discount' => $coupon->discount,
                        ];
                    })->toArray();

                    $orders[] = [
                        'id' => $order->id,
                        'customer_id' => $order->customer_id,
                        'status' => $order->status,
                        'currency' => $order->currency,
                        'discount_total' => $order->discount_total,
                        'shipping_total' => $order->shipping_total,
                        'tax_type' => $order->tax_type,
                        'total_tax' => $order->total_tax,
                        'shipping_total_with_tax' => $order->shipping_total_with_tax,
                        'billing' => $order->billing,
                        'shipping' => $order->shipping,
                        'payment_method' => $order->payment_method,
                        'payment_method_title' => $order->payment_method_title,
                        'date_paid' => $order->date_paid,
                        'date_completed' => $order->date_completed,
                        'line_items' => $lineItems,
                        'coupon_lines' => $couponLines,
                        'created_at' => $order->created_at->format('Y-m-d H:i:s'),
                        'updated_at' => $order->updated_at->format('Y-m-d H:i:s'),
                    ];
                }
            }
        }

        $info = [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'customer_type' => $this->customer_type,
            'email' => $this->email,
            'adress' => $this->adress,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'phone' => $this->phone,
            'is_paying_customer' => $this->is_paying_customer,
            'avatar_url' => $this->avatar_url,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];

        if ($include_orders == 'true') {
            $info['orders'] = $orders;
        }

        return $info;
    }
}

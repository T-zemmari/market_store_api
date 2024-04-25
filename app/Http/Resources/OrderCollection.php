<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->collection->transform(function ($order) {
                return [
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
                    'line_items' => collect(json_decode($order->line_items))->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'name' => $item->name,
                            'price' => $item->price,
                            'quantity' => $item->quantity,
                        ];
                    })->toArray(),
                    'coupon_lines' => collect(json_decode($order->coupon_lines))->map(function ($coupon) {
                        return [
                            'id' => $coupon->id,
                            'code' => $coupon->code,
                            'discount' => $coupon->discount,
                        ];
                    })->toArray(),
                    'created_at' => $order->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $order->updated_at->format('Y-m-d H:i:s'),
                ];
            }),
        ];
    }
}

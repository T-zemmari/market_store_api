<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $lineItems = collect(json_decode($this->line_items))->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
            ];
        })->toArray();

        $couponLines = collect(json_decode($this->coupon_lines))->map(function ($coupon) {
            return [
                'id' => $coupon->id,
                'code' => $coupon->code,
                'discount' => $coupon->discount,
            ];
        })->toArray();

        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'status' => $this->status,
            'currency' => $this->currency,
            'discount_total' => $this->discount_total,
            'shipping_total' => $this->shipping_total,
            'tax_type' => $this->tax_type,
            'total_tax' => $this->total_tax,
            'shipping_total_with_tax' => $this->shipping_total_with_tax,
            'billing' => $this->billing,
            'shipping' => $this->shipping,
            'payment_method' => $this->payment_method,
            'payment_method_title' => $this->payment_method_title,
            'date_paid' => $this->date_paid,
            'date_completed' => $this->date_completed,
            'line_items' => $lineItems,
            'coupon_lines' => $couponLines,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}

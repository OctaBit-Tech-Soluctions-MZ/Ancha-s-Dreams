<?php

namespace App\Services;

use App\Models\MyCourse;
use App\Models\MyProduct;

class OrderItemDeliveryService{

    public function deliver($orderItem, $user_id)
    {
        $item = $orderItem->itemable;

        switch (get_class($item)) {
            case \App\Models\Course::class:
                MyCourse::firstOrCreate([
                    'user_id' => $user_id,
                    'course_id' => $item->id,
                    'order_id' => $orderItem->order_id
                ]);
                break;

            case \App\Models\Product::class:
                MyProduct::firstOrCreate([
                    'user_id' => $user_id,
                    'product_id' => $item->id,
                    'order_id' => $orderItem->order_id
                ]);
                break;

            default:
                throw new \Exception("Tipo de item desconhecido: " . get_class($item));
        }
    }

    public function reverter($orderItem, $order)
    {
        $item = $orderItem->itemable;

        switch (get_class($item)) {
            case \App\Models\Course::class:
                MyCourse::where('order_id', $order->id)->firstOrFail()
                ->delete();
                break;

            case \App\Models\Product::class:
                MyProduct::where('order_id', $order->id)->firstOrFail()
                ->delete();
                break;

            default:
                throw new \Exception("Tipo de item desconhecido: " . get_class($item));
        }
    }
}
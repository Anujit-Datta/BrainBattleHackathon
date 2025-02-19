<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $fillable = [
        'student_id',
        'order_time',
        'status',
        'total_price',
    ];

    public static function create(Request $data): Order
    {

        $total = 0;
        foreach($data->items as $item) {
            $total += $item['quantity'] * $item['price'];
        }

        $order = new Order();
        $order->student_id = $data['student_id'];
        $order->order_time = $data['order_time'];
        $order->status = 'Order placed';
        $order->total_price = $total;
        $order->save();

        foreach($data->items as $item) {
            $orderItem = new OrderItems();
            $orderItem->order_id = $order->id;
            $orderItem->item_id = $item['item_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->save();
        }

        return $order;
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }




}

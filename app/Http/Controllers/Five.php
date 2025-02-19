<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Five extends Controller
{
    public function store(Request $request): array
    {
        $validated = $request->validate([
            'student_id' => 'required',
            'order_time' => 'required|date_format:Y-m-d\TH:i:s\Z',
            'items' => 'required|array',
        ]);

        $order = Order::create($request);


        return [
            "order_id" => $order->id,
            "status" => "order placed",
            "total_price" => $order->total_price,
        ];
    }
}

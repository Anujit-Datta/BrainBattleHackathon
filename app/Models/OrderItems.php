<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItems extends Model
{
    protected $fillable = [
        'item_id',
        'quantity',
        'price',
    ];

    public function orderId(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

}

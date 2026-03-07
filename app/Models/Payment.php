<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Payment extends Model
{
    //

    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'currency',
        'gateway_order_id',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}

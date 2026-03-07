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
        'gateway_order_id',
        'country_id',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}

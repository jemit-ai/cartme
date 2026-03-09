<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{

    use HasFactory;

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

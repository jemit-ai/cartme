<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Invoice;


class Order extends Model
{
    use HasFactory; 


    protected $fillable = [
        'total_amount',
        'status',
        'billing_first_name',
        'billing_last_name',
        'billing_email',
        'billing_phone',
        'billing_address',
        'billing_city',
        'billing_state',
        'billing_postcode',
        'billing_country',
        'payment_method',
    ];

    /*protected $casts = [
        'order_items' => 'array',
    ];*/

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

}
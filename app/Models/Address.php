<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $fillable = [
        'user_id',
        'guest_token',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'postal_code',
        'country',
        'phone',
        'is_default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

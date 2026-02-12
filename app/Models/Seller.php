<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Authenticatable
{
    use HasFactory;
 
    protected $fillable = [ 
        'name',
        'email',
        'password',
    ];

    protected $hidden = [ 
        'password',
    ];

        

}

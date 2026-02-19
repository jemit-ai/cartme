<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
   
    use HasFactory;

    protected $table = 'currency';
    
    protected $fillable = [
        'code',
        'rate',
        'is_base',
    ];


}

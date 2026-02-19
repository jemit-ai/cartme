<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Country;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'sku',
        'price',
        'stock',
        'status',
        'image',
        'category_id',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }    

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'product_country')
            ->withPivot('price', 'currency_code', 'status')->withTimestamps();
    }

    
}

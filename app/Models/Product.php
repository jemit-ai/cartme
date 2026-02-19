<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Country;
use App\Models\Category;

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
        //return $this->belongsTo(Category::class);

        return $this->belongsToMany(Category::class, 'category_product')
            ->withPivot('category_id', 'product_id')->withTimestamps();
    }    

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'product_country')
            ->withPivot('price', 'currency_code', 'status')->withTimestamps();
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Country;
use App\Models\Category;
use App\Models\Order;
use App\Models\Cart;

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

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details_product')->withPivot('order_id','product_id','quantity','price')->withTimestamps();
    }

    /*public function cartItems()
    {
        return $this->hasMany(Cart::class, 'cart_items')->where('cart_id','product_id','quantity')->withTimestamps();
    }*/

    public function cartItems()
    {
        return $this->belongsToMany(Cart::class, 'cart_items')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    
}

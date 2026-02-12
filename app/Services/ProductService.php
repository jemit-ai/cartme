<?php

namespace App\Services;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Throwable;
use Exception;
use App\Models\Category;



class ProductService
{
    
    public function getPaginatedProducts($perPage = 10, $search = null)
    {
        try {
            $query = Product::with('category');

            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('sku', 'LIKE', "%{$search}%");
                });
            }

            return $query->paginate($perPage);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return collect(); // Return empty collection or handle as needed
        }
    }

    public function getProductById($id)
    {
        try {
            return Product::find($id);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public function createProduct($data)
    {
        try {
            return Product::create($data);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public function updateProduct($id, $data)
    {
        try {
            $product = Product::find($id);
            if($product){
                $product->update($data);
                return $product;
            }
            return null;
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public function deleteProduct($id)
    {
        try {
            $product = Product::find($id);
            if($product){
                $product->delete();
                return true;
            }
            return false;
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return false;
        }

    }

}
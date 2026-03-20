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
    
    public function getPaginatedProducts_ii($perPage = 10, $search = null)
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

    public function getPaginatedProducts($countryId, $perPage = 12, $search = null)
    {
    
        Log::info('Territory ID: '.$countryId);
        
        try {

            Log::info('Territory ID#: '.$countryId);

            $query = Product::whereHas('countries', function ($q) use ($countryId) {

                    $q->where('country_id', $countryId);

            })->with([

                'countries' => function ($q) use ($countryId) {
                     $q->where('country_id', $countryId);
                },

                'category'

            ]);

            Log::info('Query: '.$query->toSql());

            return $query->paginate($perPage);

        } catch (Throwable $th) {

            Log::error($th->getMessage());
            return collect(); // Return empty collection or handle as needed

        }
    }

    public function getProducts()
    {
        $guest_token = $data['guest_token'] ?? null;
        $user_id     = $data['user_id'] ?? null;

        try {
            return Product::all();
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
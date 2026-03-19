<?php
namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseApiController;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends BaseApiController
{
    public $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    public function index(Request $request)
    {
        try {
            $products = $this->productService->getPaginatedProducts($request->per_page, $request->search); 
            return $this->successResponse($products, 'Products fetched successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->errorResponse('Failed to fetch products', 500);
        }
    }
}

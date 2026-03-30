<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\CategoryService;
use App\Http\Controllers\API\BaseApiController;
use Illuminate\Support\Facades\Log;

class CategoryController extends BaseApiController
{
    
    public $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getCategories(Request $request)
    {
        try {
            $data = $request->all();
            $countryId = $data['country_id'];
            Log::info('Country ID: '.$countryId);
            $categories = $this->categoryService->getCategories($countryId,$request->per_page); 
            return $this->successResponse($categories, 'Categories fetched successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->errorResponse('Failed to fetch categories', 500);
        }
    }


}

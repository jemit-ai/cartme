<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Throwable;
use Exception;
use App\Models\Category;

class CategoryService
{
    public function getCategories($countryId, $perPage = 10)
    {
        try {
            $categories = Category::where('country_id', $countryId)->paginate($perPage);
            return $categories;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }
}



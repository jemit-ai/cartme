<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = $this->productService->getPaginatedProducts(10, $search)->withQueryString();
        return view('admin.products.products', compact('products')); 
    }

    public function create(){

        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
        
    }
    
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $data['image'] = 'uploads/products/' . $imageName;
        }

        $product = $this->productService->createProduct($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    public function edit($id){

        
        Log::info('Product ID: ' . $id);

        $product = $this->productService->getProductById($id);

        if(!$product){
            return redirect()->route('admin.products.index')->with('error','Product not found');
        }

        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));

    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $data['image'] = 'uploads/products/' . $imageName;
        }

        $product = $this->productService->updateProduct($id, $data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id){

        $product = Product::find($id);

        if(!$product){
            return redirect()->route('admin.products.index')->with('error','Product not found');
        }

        $product->delete();

        return redirect()->route('admin.products.index');
    }

    public function import()
    {
        return view('admin.products.import');
    }

    public function importPost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:10240',
        ]);

        $file = $request->file('file');
        $handle = fopen($file->getRealPath(), 'r');
        
        // Skip header row
        $header = fgetcsv($handle);
        
        // Map header to columns
        $header = array_map('strtolower', $header);
        
        $importedCount = 0;
        $updatedCount = 0;

        while (($row = fgetcsv($handle)) !== false) {
            $data = array_combine($header, $row);
            
            if (empty($data['sku'])) continue;

            $productData = [
                'name'        => $data['name'] ?? 'Unnamed Product',
                'sku'         => $data['sku'],
                'price'       => $data['price'] ?? 0,
                'stock'       => $data['stock'] ?? 0,
                //'category_id' => $data['category_id'] ?? null,
                'status'      => isset($data['status']) ? (int)$data['status'] : 1,
            ];

            $product = Product::where('sku', $data['sku'])->first();
            
            if ($product) {
                $product->update($productData);
                $updatedCount++;
            } else {
                Product::create($productData);
                $importedCount++;
            }
        }

        fclose($handle);
        
        return redirect()->back()->with('success', "Import complete: {$importedCount} new products added, {$updatedCount} products updated.");
    }

    public function exportTemplate()
    {
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=products_template.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['name', 'sku', 'price', 'stock', 'status'];

        $callback = function() use($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            
            // Example row
            fputcsv($file, ['Sample Product', 'SKU123', '99.99', '50', '1']);
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}

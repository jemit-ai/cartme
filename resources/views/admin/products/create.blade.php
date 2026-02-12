@extends('layouts.admin')

@section('title', 'Add New Product')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h3 class="text-3xl font-bold text-gray-800 tracking-tight">Add New Product</h3>
            <p class="text-gray-500 mt-1">Create a new product in your inventory</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-gray-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Products
        </a>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <form action=" {{ route('admin.products.store') }} " method="POST" enctype="multipart/form-data" class="p-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Column: Basic Info -->
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Product Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none @error('name') border-red-500 @enderror"
                               placeholder="Enter product name">
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sku" class="block text-sm font-semibold text-gray-700 mb-2">SKU (Stock Keeping Unit)</label>
                        <input type="text" name="sku" id="sku" value="{{ old('sku') }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none @error('sku') border-red-500 @enderror"
                               placeholder="e.g. PRD-001">
                        @error('sku')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Price ($)</label>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none @error('price') border-red-500 @enderror"
                                   placeholder="0.00">
                            @error('price')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="stock" class="block text-sm font-semibold text-gray-700 mb-2">Initial Stock</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none @error('stock') border-red-500 @enderror"
                                   placeholder="0">
                            @error('stock')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Right Column: Media & Status -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Product Image</label>
                        <div class="relative group">
                            <div class="w-full h-48 rounded-2xl border-2 border-dashed border-gray-200 flex flex-col items-center justify-center bg-gray-50 overflow-hidden relative">
                                <div id="placeholder-content" class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-xs text-gray-400">Click to upload image</span>
                                </div>
                                <img src="" id="preview-image" class="hidden w-full h-full object-cover">
                                <input type="file" name="image" id="image-upload" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewFile()">
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                        <select name="category_id" id="category_id" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none appearance-none bg-no-repeat bg-right @error('category_id') border-red-500 @enderror"
                                style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23a1a1aa%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E'); background-position: right 1rem center; background-size: 1.5em;'>
                            <option value="">Select Category</option>
                            @isset($categories)
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <div class="flex items-center gap-4">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" name="status" value="1" class="sr-only peer" {{ old('status', '1') == '1' ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                <span class="ml-3 text-sm font-medium text-gray-700">Active</span>
                            </label>
                        </div>
                        @error('status')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-8 border-t border-gray-100 flex justify-end gap-3">
                <a href=" {{ route('admin.products.index') }} " 
                   class="px-6 py-3 rounded-xl border border-gray-200 text-gray-600 font-semibold hover:bg-gray-50 transition-all">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-10 py-3 rounded-xl bg-gray-900 text-white font-semibold hover:bg-gray-800 shadow-lg shadow-gray-200 transition-all transform active:scale-95">
                    Create Product
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewFile() {
        const preview = document.getElementById('preview-image');
        const placeholder = document.getElementById('placeholder-content');
        const file = document.getElementById('image-upload').files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.classList.remove('hidden');
            if (placeholder) placeholder.classList.add('hidden');
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.classList.add('hidden');
            if (placeholder) placeholder.classList.remove('hidden');
        }
    }
</script>
@endsection

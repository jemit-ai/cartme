@extends('layouts.admin')

@section('title', 'Import Products')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h3 class="text-3xl font-bold text-gray-800 tracking-tight">Import Products</h3>
            <p class="text-gray-500 mt-1">Bulk upload products using a CSV or Excel file</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-gray-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Products
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg flex items-center gap-3">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg flex items-center gap-3">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Main Import Card -->
        <div class="md:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <form action=" {{ route('admin.products.import.post') }} " method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    
                    <div class="space-y-6">
                        <div class="relative group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Upload File</label>
                            <div class="w-full h-64 rounded-2xl border-2 border-dashed border-gray-200 flex flex-col items-center justify-center bg-gray-50 transition-all group-hover:border-blue-400 group-hover:bg-blue-50 relative overflow-hidden">
                                <div id="upload-placeholder" class="flex flex-col items-center p-6 text-center">
                                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-4 transition-transform group-hover:scale-110">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-gray-700 font-semibold mb-1">Drop your file here or click to browse</h4>
                                    <p class="text-xs text-gray-400">Supported formats: .csv, .xlsx, .xls (Max 10MB)</p>
                                </div>
                                <div id="file-info" class="hidden flex flex-col items-center p-6">
                                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <h4 id="filename-display" class="text-gray-700 font-semibold truncate max-w-xs">file_name.csv</h4>
                                    <button type="button" onclick="resetFile()" class="mt-2 text-xs text-red-500 hover:text-red-700 underline">Remove file</button>
                                </div>
                                <input type="file" name="file" id="file-input" class="absolute inset-0 opacity-0 cursor-pointer" onchange="handleFileSelect()">
                            </div>
                            @error('file')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-amber-50 rounded-xl border border-amber-100">
                            <svg class="w-5 h-5 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-xs text-amber-800">
                                Make sure your file follows the required format. Duplicate SKUs will be updated with new information.
                            </p>
                        </div>

                        <div class="pt-4 flex items-center justify-end gap-3">
                            <button type="submit" 
                                    class="w-full md:w-auto px-8 py-3 rounded-xl bg-gray-900 text-white font-semibold hover:bg-gray-800 shadow-lg shadow-gray-200 transition-all transform active:scale-95 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                Start Import
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Instructions/Template Card -->
        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h4 class="text-lg font-bold text-gray-800 mb-4">Download Template</h4>
                <p class="text-sm text-gray-500 mb-6">Use our pre-formatted template to ensure your data is imported correctly.</p>
                <a href="{{ route('admin.products.export-template') }}" class="flex items-center justify-center gap-2 w-full py-3 px-4 bg-blue-50 text-blue-600 font-semibold rounded-xl hover:bg-blue-100 transition-colors border border-blue-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 12l3 3m0 0l3-3m-3 3V10"></path>
                    </svg>
                    Download .CSV
                </a>
            </div>

            <div class="bg-gray-900 rounded-2xl shadow-sm p-6 text-white">
                <h4 class="text-lg font-bold mb-4">Required Fields</h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li class="flex items-center gap-2">
                        <div class="w-1.5 h-1.5 bg-green-500 rounded-full"></div>
                        <span><strong class="text-white">name</strong> - Product title</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <div class="w-1.5 h-1.5 bg-green-500 rounded-full"></div>
                        <span><strong class="text-white">sku</strong> - Unique identifier</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <div class="w-1.5 h-1.5 bg-green-500 rounded-full"></div>
                        <span><strong class="text-white">price</strong> - Numeric value</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <div class="w-1.5 h-1.5 bg-gray-500 rounded-full"></div>
                        <span><strong class="text-white">stock</strong> - Default is 0</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <div class="w-1.5 h-1.5 bg-gray-500 rounded-full"></div>
                        <span><strong class="text-white">category_id</strong> - ID from categories</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function handleFileSelect() {
        const input = document.getElementById('file-input');
        const placeholder = document.getElementById('upload-placeholder');
        const fileInfo = document.getElementById('file-info');
        const filenameDisplay = document.getElementById('filename-display');

        if (input.files && input.files[0]) {
            filenameDisplay.textContent = input.files[0].name;
            placeholder.classList.add('hidden');
            fileInfo.classList.remove('hidden');
        }
    }

    function resetFile() {
        const input = document.getElementById('file-input');
        const placeholder = document.getElementById('upload-placeholder');
        const fileInfo = document.getElementById('file-info');
        
        input.value = '';
        placeholder.classList.remove('hidden');
        fileInfo.classList.add('hidden');
    }
</script>
@endsection

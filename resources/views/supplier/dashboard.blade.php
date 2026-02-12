@extends('layouts.supplier')

@section('title', 'Supplier Dashboard')

@section('content')
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h3 class="text-3xl font-bold text-gray-800 tracking-tight">Supplier Overview</h3>
            <p class="text-gray-500 mt-1">Manage your inventory and track performance.</p>
        </div>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow-lg transition-all duration-300 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add Stock
        </button>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Stock Value Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h4 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Stock Value</h4>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">$245,000</span>
                </div>
                <div class="bg-green-100 p-2 rounded-lg text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-green-500 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    +3.2%
                </span>
                <span class="text-gray-400 ml-2">vs last month</span>
            </div>
        </div>

        <!-- Total Products Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h4 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Products</h4>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">1,250</span>
                </div>
                <div class="bg-blue-100 p-2 rounded-lg text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-green-500 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    +120
                </span>
                <span class="text-gray-400 ml-2">new added</span>
            </div>
        </div>

        <!-- Pending Orders Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h4 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Low Stock Alerts</h4>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">8</span>
                </div>
                <div class="bg-red-100 p-2 rounded-lg text-red-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-red-500 font-medium flex items-center">
                    Action required
                </span>
                <span class="text-gray-400 ml-2">items below threshold</span>
            </div>
        </div>

        <!-- Performance Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h4 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Fulfillment Rate</h4>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">98.5%</span>
                </div>
                <div class="bg-purple-100 p-2 rounded-lg text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-green-500 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    +0.5%
                </span>
                <span class="text-gray-400 ml-2">vs last month</span>
            </div>
        </div>
    </div>

    <!-- Inventory Overview -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h4 class="text-lg font-bold text-gray-800">Recent Inventory Movements</h4>
            <a href="#" class="text-sm text-blue-600 hover:text-blue-700 font-medium hover:underline">View Inventory</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="p-4 font-medium">Product Name</th>
                        <th class="p-4 font-medium">SKU</th>
                        <th class="p-4 font-medium">Category</th>
                        <th class="p-4 font-medium">Stock Level</th>
                        <th class="p-4 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 font-semibold text-gray-900">Cotton T-Shirt</td>
                        <td class="p-4 font-mono text-gray-500">TSH-001-BLK</td>
                        <td class="p-4">Apparel</td>
                        <td class="p-4 font-medium">1,200</td>
                        <td class="p-4"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">In Stock</span></td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 font-semibold text-gray-900">Leather Wallet</td>
                        <td class="p-4 font-mono text-gray-500">WLT-055-BRN</td>
                        <td class="p-4">Accessories</td>
                        <td class="p-4 font-medium">45</td>
                        <td class="p-4"><span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Low Stock</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

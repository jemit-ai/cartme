@extends('layouts.seller')

@section('title', 'Seller Dashboard')

@section('content')
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h3 class="text-3xl font-bold text-gray-800 tracking-tight">Seller Overview</h3>
            <p class="text-gray-500 mt-1">Track your store performance and sales.</p>
        </div>
        <button class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow-lg transition-all duration-300 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add Product
        </button>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Earnings Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h4 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Earnings</h4>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">$12,450.00</span>
                </div>
                <div class="bg-green-100 p-2 rounded-lg text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-green-500 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    +15.2%
                </span>
                <span class="text-gray-400 ml-2">vs last month</span>
            </div>
        </div>

        <!-- Sales Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h4 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Products Sold</h4>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">340</span>
                </div>
                <div class="bg-blue-100 p-2 rounded-lg text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-green-500 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    +5.8%
                </span>
                <span class="text-gray-400 ml-2">vs last month</span>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h4 class="text-gray-500 text-sm font-medium uppercase tracking-wider">New Orders</h4>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">25</span>
                </div>
                <div class="bg-purple-100 p-2 rounded-lg text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-yellow-500 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path></svg>
                    12 Pending
                </span>
                <span class="text-gray-400 ml-2">needs action</span>
            </div>
        </div>

        <!-- Reviews Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h4 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Rating</h4>
                    <div class="flex items-center mt-1">
                        <span class="text-2xl font-bold text-gray-900 mr-2">4.8</span>
                        <div class="flex text-yellow-400 text-sm">
                            ★★★★★
                        </div>
                    </div>
                </div>
                <div class="bg-yellow-100 p-2 rounded-lg text-yellow-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-gray-500">Based on 120 reviews</span>
            </div>
        </div>
    </div>

    <!-- Recent Sales Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h4 class="text-lg font-bold text-gray-800">Recent Sales</h4>
            <a href="#" class="text-sm text-green-600 hover:text-green-700 font-medium hover:underline">View All Sales</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="p-4 font-medium">Product</th>
                        <th class="p-4 font-medium">Buyer</th>
                        <th class="p-4 font-medium">Date</th>
                        <th class="p-4 font-medium">Price</th>
                        <th class="p-4 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gray-200 flex-shrink-0"></div>
                            <span class="font-semibold text-gray-900">Wireless Headphones</span>
                        </td>
                        <td class="p-4">Michael B.</td>
                        <td class="p-4">Today, 2:30 PM</td>
                        <td class="p-4 font-medium">$199.00</td>
                        <td class="p-4"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Shipped</span></td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gray-200 flex-shrink-0"></div>
                            <span class="font-semibold text-gray-900">Smart Watch Series 5</span>
                        </td>
                        <td class="p-4">Sarah K.</td>
                        <td class="p-4">Yesterday</td>
                        <td class="p-4 font-medium">$249.50</td>
                        <td class="p-4"><span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Processing</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

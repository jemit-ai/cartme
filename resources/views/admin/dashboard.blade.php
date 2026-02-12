@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h3 class="text-3xl font-bold text-gray-800 tracking-tight">Dashboard Overview</h3>
            <p class="text-gray-500 mt-1">Welcome back, here's what's happening today.</p>
        </div>
        <div class="flex items-center gap-4">
             @if($pendingOrdersCount > 0)
                <div class="bg-red-50 text-red-700 px-4 py-2 rounded-lg border border-red-100 flex items-center gap-2 animate-pulse">
                    <span class="relative flex h-3 w-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                    </span>
                    <span class="font-bold">{{ $pendingOrdersCount }} New Orders Pending</span>
                </div>
            @endif
            <button class="bg-gray-900 hover:bg-gray-800 text-white px-5 py-2 rounded-lg shadow-lg transition-all duration-300 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Generate Report
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Revenue Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h4 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Revenue</h4>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">${{ number_format($totalRevenue, 2) }}</span>
                </div>
                <div class="bg-green-100 p-2 rounded-lg text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-green-500 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    +12.5%
                </span>
                <span class="text-gray-400 ml-2">from last month</span>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h4 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Orders</h4>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">{{ number_format($totalOrders) }}</span>
                </div>
                <div class="bg-blue-100 p-2 rounded-lg text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-green-500 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    +8.2%
                </span>
                <span class="text-gray-400 ml-2">from last month</span>
            </div>
        </div>

        <!-- Products Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h4 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Products</h4>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">{{ number_format($totalProducts) }}</span>
                </div>
                <div class="bg-purple-100 p-2 rounded-lg text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-red-500 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>
                    -2.4%
                </span>
                <span class="text-gray-400 ml-2">from last month</span>
            </div>
        </div>

        <!-- Users Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h4 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Active Users</h4>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">{{ number_format($totalUsers) }}</span>
                </div>
                <div class="bg-yellow-100 p-2 rounded-lg text-yellow-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-green-500 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    +5.7%
                </span>
                <span class="text-gray-400 ml-2">from last month</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Orders Section -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h4 class="text-lg font-bold text-gray-800">Recent Orders</h4>
                    <a href="{{ route('admin.orders.index') }}" class="text-sm text-gray-600 hover:text-gray-900 font-medium hover:underline">View All</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                                <th class="p-4 font-medium">Order ID</th>
                                <th class="p-4 font-medium">Customer</th>
                                <th class="p-4 font-medium">Status</th>
                                <th class="p-4 font-medium">Date</th>
                                <th class="p-4 font-medium">Amount</th>
                                <th class="p-4 font-medium">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                            @forelse($recentOrders as $order)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4 font-bold text-gray-900">#ORD-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td class="p-4 flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-600">
                                        {{ strtoupper(substr($order->billing_first_name, 0, 1) . substr($order->billing_last_name, 0, 1)) }}
                                    </div>
                                    {{ $order->billing_first_name }} {{ $order->billing_last_name }}
                                </td>
                                <td class="p-4">
                                    @php
                                        $statusClasses = [
                                            'pending' => 'bg-yellow-100 text-yellow-700',
                                            'paid' => 'bg-green-100 text-green-700',
                                            'shipped' => 'bg-blue-100 text-blue-700',
                                            'completed' => 'bg-green-100 text-green-700',
                                            'cancelled' => 'bg-red-100 text-red-700',
                                        ];
                                        $class = $statusClasses[strtolower($order->status)] ?? 'bg-gray-100 text-gray-700';
                                    @endphp
                                    <span class="{{ $class }} px-3 py-1 rounded-full text-xs font-semibold capitalize">{{ $order->status }}</span>
                                </td>
                                <td class="p-4">{{ $order->created_at->format('M d, Y') }}</td>
                                <td class="p-4 font-medium">${{ number_format($order->total_amount, 2) }}</td>
                                <td class="p-4">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="text-gray-500 hover:text-gray-900">View</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-gray-500 font-medium">No recent orders found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Notification / Recent Activity Feed -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-bold text-gray-800">Order Alerts</h4>
                    <span class="bg-gray-100 text-gray-600 px-2 py-0.5 rounded text-xs font-bold">{{ $recentPendingOrders->count() }}</span>
                </div>
                
                <div class="space-y-6">
                    @forelse($recentPendingOrders as $pendingOrder)
                    <div class="flex gap-4 relative">
                        <div class="flex-shrink-0 w-2 h-2 mt-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.5)]"></div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">New Order #ORD-{{ str_pad($pendingOrder->id, 5, '0', STR_PAD_LEFT) }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">From {{ $pendingOrder->billing_first_name }} {{ $pendingOrder->billing_last_name }}</p>
                            <p class="text-xs text-blue-600 font-medium mt-1">${{ number_format($pendingOrder->total_amount, 2) }} &bull; {{ $pendingOrder->created_at->diffForHumans() }}</p>
                            <a href="{{ route('admin.orders.show', $pendingOrder->id) }}" class="mt-2 inline-block text-xs font-bold text-gray-900 hover:underline">Process Order &rarr;</a>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-gray-200 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="text-gray-400 text-sm">All caught up! No pending orders.</p>
                    </div>
                    @endforelse
                </div>

                @if($pendingOrdersCount > 5)
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="block text-center text-sm font-bold text-gray-900 hover:bg-gray-50 py-2 rounded-lg transition-colors">
                        View All {{ $pendingOrdersCount }} Pending &rarr;
                    </a>
                </div>
                @endif
            </div>
            
            <!-- Quick Stats -->
            <div class="mt-8 bg-gray-900 rounded-2xl p-6 text-white shadow-xl shadow-gray-200">
                <h5 class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4">Performance</h5>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm opacity-80">Order Fulfillment</span>
                    <span class="text-sm font-bold">92%</span>
                </div>
                <div class="w-full bg-gray-800 rounded-full h-1.5 mb-6">
                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 92%"></div>
                </div>
                <p class="text-xs text-gray-400 leading-relaxed">
                    Fulfillment rate is up <span class="text-green-400">+4%</span> this week. Keep it up!
                </p>
            </div>
        </div>
    </div>
@endsection

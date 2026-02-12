@extends('layouts.admin')

@section('title', 'Order Details')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6 flex justify-between items-center">
        <div>
            <a href="{{ route('admin.orders.index') }}" class="text-gray-500 hover:text-gray-900 flex items-center mb-2">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Orders
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Order #{{ $order->id }}</h1>
        </div>
        <div>
            <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm font-medium">{{ ucfirst($order->status) }}</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Order Items -->
        <div class="md:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-4 border-b border-gray-100 font-semibold text-gray-800">Order Items</div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs font-semibold uppercase">
                                <th class="px-6 py-3">Product</th>
                                <th class="px-6 py-3">Price</th>
                                <th class="px-6 py-3 text-center">Qty</th>
                                <th class="px-6 py-3 text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($order->items as $item)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 bg-gray-100 rounded mr-3 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <div class="text-sm font-medium text-gray-900">{{ $item->product->name }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">${{ number_format($item->price, 2) }}</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600">{{ $item->quantity }}</td>
                                <td class="px-6 py-4 text-sm text-right font-semibold text-gray-900">${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-50 font-semibold text-gray-900 text-sm">
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-right">Order Total</td>
                                <td class="px-6 py-4 text-right underline underline-offset-4 decoration-2 decoration-gray-900">${{ number_format($order->total_amount, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <h3 class="font-semibold text-gray-800 mb-4 border-b border-gray-100 pb-2">Customer Details</h3>
                <div class="text-sm space-y-3">
                    <div>
                        <span class="text-gray-500 block">Name</span>
                        <span class="font-medium text-gray-900">{{ $order->billing_first_name }} {{ $order->billing_last_name }}</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block">Email</span>
                        <span class="font-medium text-gray-900">{{ $order->billing_email }}</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block">Phone</span>
                        <span class="font-medium text-gray-900">{{ $order->billing_phone }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <h3 class="font-semibold text-gray-800 mb-4 border-b border-gray-100 pb-2">Shipping/Billing Address</h3>
                <div class="text-sm text-gray-600 leading-relaxed italic">
                    {{ $order->billing_address }}<br>
                    {{ $order->billing_city }}, {{ $order->billing_state }} {{ $order->billing_postcode }}<br>
                    {{ $order->billing_country }}
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <h3 class="font-semibold text-gray-800 mb-4 border-b border-gray-100 pb-2">Payment</h3>
                <div class="text-sm">
                    <span class="text-gray-500 block">Method</span>
                    <span class="font-medium text-gray-900">{{ strtoupper($order->payment_method) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

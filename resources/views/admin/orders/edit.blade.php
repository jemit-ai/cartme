@extends('layouts.admin')

@section('title', 'Edit Order Status')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <a href="{{ route('admin.orders.index') }}" class="text-gray-500 hover:text-gray-900 flex items-center mb-2">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Orders
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Edit Order #{{ $order->id }}</h1>
    </div>

    <div class="max-w-xl">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Order Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <div class="p-4 bg-gray-50 rounded-lg mb-6">
                    <h3 class="text-sm font-semibold text-gray-800 mb-2">Order Summary</h3>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-500">Customer:</span>
                        <span class="font-medium text-gray-900">{{ $order->billing_first_name }} {{ $order->billing_last_name }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Total Amount:</span>
                        <span class="font-bold text-gray-900">${{ number_format($order->total_amount, 2) }}</span>
                    </div>
                </div>

                <div class="flex space-x-3">
                    <button type="submit" class="bg-gray-900 text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition duration-200">
                        Update Status
                    </button>
                    <a href="{{ route('admin.orders.index') }}" class="bg-white border border-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-50 transition duration-200 text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

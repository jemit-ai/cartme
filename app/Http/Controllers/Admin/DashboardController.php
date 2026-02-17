<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;


class DashboardController extends Controller
{
    public function index()
    {
        //echo $unreadCount = auth()->guard('admin')->user()->unreadNotifications()->count();

        $totalOrders = Order::count();
        $totalRevenue = Order::where('status', 'paid')->orWhere('status', 'shipped')->sum('total_amount');
        $totalProducts = Product::count();
        $totalUsers = User::count();

        $recentOrders = Order::latest()->take(10)->get();

        // Notification: Pending orders
        $pendingOrdersCount = Order::where('status', 'pending')->count();
        $recentPendingOrders = Order::where('status', 'pending')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalRevenue',
            'totalProducts',
            'totalUsers',
            'recentOrders',
            'pendingOrdersCount',
            'recentPendingOrders'
        ));
    }
}

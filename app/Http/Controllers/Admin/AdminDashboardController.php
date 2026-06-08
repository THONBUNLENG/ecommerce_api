<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_revenue' => Order::where('status', 'paid')
                ->orWhere('status', 'delivered')
                ->sum('total'),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'total_products' => Product::count(),
            'total_customers' => User::count(),
            'low_stock' => Product::where('stock_quantity', '<', 10)
                ->where('stock_status', '!=', 'out_of_stock')
                ->count(),
            'active_products' => Product::where('is_active', true)->count(),
            'inactive_products' => Product::where('is_active', false)->count(),
        ];

        $recentOrders = Order::with('user')->latest()->take(10)->get();
        $topProducts = Product::where('is_popular', true)
            ->orWhere('is_latest_drop', true)
            ->latest()
            ->take(6)
            ->get();

        return view('admin.dashboard.index', compact('stats', 'recentOrders', 'topProducts'));
    }
}

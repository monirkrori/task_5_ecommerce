<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        // Get input values from the request
        $search = $request->input('search');
        $status = $request->input('status'); // Get the selected order status

        // Return analytics data
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $totalRevenue = Order::sum('total_price'); // Total orders price

        // Get the recent 5 orders
        $recentOrders = Order::with(['user', 'product'])
            ->latest();

        // If we have a search term
        if ($search) {
            $recentOrders->where(function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) { // Search for customer name
                    $q->where('name', 'like', "%{$search}%");
                })
                    ->orWhereHas('product', function ($q) use ($search) { // Search for product name
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhere('id', 'like', "%{$search}%");
            });
        }

        // If we have a selected status
        if ($status) {
            $recentOrders->where('status', $status); // Filter by order status
        }

        // Take 5 orders
        $recentOrders = $recentOrders->take(5)->get();


        return view('dashboard.index', compact('totalProducts', 'totalOrders', 'totalUsers', 'totalRevenue', 'recentOrders', 'search', 'status'));
    }
}

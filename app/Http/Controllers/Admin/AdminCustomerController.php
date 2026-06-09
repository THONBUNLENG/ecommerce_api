<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $customers = $query->latest()->paginate(15)->appends($request->query());

        return view('admin.customers.index', compact('customers'));
    }

    public function show(Request $request, $id)
    {
        $customer = User::findOrFail($id);
        $orders = Order::where('user_id', $customer->id)->latest()->paginate(10)->appends($request->query());

        return view('admin.customers.show', compact('customer', 'orders'));
    }
}

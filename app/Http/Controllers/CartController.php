<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = [];
        $subtotal = 0;

        if (auth()->check()) {
            $cartItems = Cart::with(['product.category'])->where('user_id', auth()->id())->get();
            $subtotal = $cartItems->sum('subtotal');
        }

        return view('cart', compact('cartItems', 'subtotal'));
    }

    public function add(Request $request, $productId)
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Login required'], 401);
        }

        $productId = (int) $request->route('productId');
        $product = Product::findOrFail($productId);

        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + 1
            ]);
        } else {
            $cartItem = Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        return response()->json(['message' => 'Added to cart', 'cart_count' => Cart::where('user_id', auth()->id())->count()]);
    }

    public function update(Request $request, $itemId)
    {
        $cartItem = Cart::where('user_id', auth()->id())->find($itemId);
        
        if (!$cartItem) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $cartItem->update(['quantity' => $request->quantity]);

        $subtotal = $cartItem->product->price * $request->quantity;

        return response()->json([
            'message' => 'Cart updated',
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format(Cart::where('user_id', auth()->id())->get()->sum('subtotal'), 2)
        ]);
    }

    public function remove($itemId)
    {
        Cart::where('user_id', auth()->id())->where('id', $itemId)->delete();

        return response()->json(['message' => 'Removed from cart']);
    }

    public function showCheckout()
    {
        $cartItems = [];
        $subtotal = 0;

        if (auth()->check()) {
            $cartItems = Cart::with(['product.category'])->where('user_id', auth()->id())->get();
            $subtotal = $cartItems->sum('subtotal');
        }

        return view('checkout', compact('cartItems', 'subtotal'));
    }

    public function processCheckout(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|size:2',
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer',
            'card_number' => 'nullable|string|max:25',
            'expiry' => 'nullable|string|max:10',
            'cvv' => 'nullable|string|max:10',
        ]);

        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum('subtotal');
        $tax = $subtotal * 0.08;
        $total = $subtotal + $tax;

        $order = \App\Models\Order::create([
            'order_id' => uniqid('ORD-'),
            'amount' => $subtotal,
            'status' => 'pending',
            'payment_method' => $validated['payment_method'],
            'user_id' => auth()->id(),
            'total' => $total,
        ]);

        foreach ($cartItems as $item) {
            $order->orderDetails()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('view-products')->with('status', 'Order placed successfully! Order ID: ' . $order->order_id);
    }
}

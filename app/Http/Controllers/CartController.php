<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

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
}
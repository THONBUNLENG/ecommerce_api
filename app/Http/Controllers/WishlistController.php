<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = [];
        if (auth()->check()) {
            $wishlistItems = Wishlist::with(['product.category'])->where('user_id', '=', auth()->id())->get();
        }
        return view('wishlist', compact('wishlistItems'));
    }

    public function add(Request $request, $productId)
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Login required'], 401);
        }

        $productId = (int) $request->route('productId');
        $product = Product::findOrFail($productId);

        Wishlist::firstOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $productId,
        ]);

        return response()->json(['message' => 'Added to wishlist']);
    }

    public function remove($productId)
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Login required'], 401);
        }

        $userId = auth()->id();

        Wishlist::where('user_id', '=', $userId)
            ->where('product_id', '=', $productId)
            ->delete();

        return response()->json(['message' => 'Removed from wishlist']);
    }
}
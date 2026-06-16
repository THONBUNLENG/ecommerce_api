<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(10);
        return view('products.index',compact('categories','products'));
    }

    public function getProductDetails($id){
        $product = Product::with(['category', 'images', 'variations.color', 'variations.size'])->findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();
        return view('products.show', compact('product', 'relatedProducts'));
    }
    public function filterProducts($cateId){
        $products = Product::where('category_id',$cateId)->paginate(10);
        return response()->json($products);
    }
}

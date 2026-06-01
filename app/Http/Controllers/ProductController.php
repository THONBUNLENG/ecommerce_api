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
        $product = Product::with('variations')->find($id);
        return response()->json($product);

    }
    public function filterProducts($cateId){
        $products = Product::where('category_id',$cateId)->paginate(10);
        return response()->json($products);
    }
}

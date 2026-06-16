<?php

namespace App\Http\Controllers;

use App\Models\Product;

class FeaturedCollectionController extends Controller
{
    public function __invoke()
    {
        $products = Product::query()
            ->where('is_active', true)
            ->where(function ($query) {
                $query->where('is_popular', true)
                    ->orWhere('is_latest_drop', true);
            })
            ->orderByDesc('is_popular')
            ->orderByDesc('is_latest_drop')
            ->orderByDesc('created_at')
            ->paginate(12);

        if ($products->isEmpty()) {
            $products = Product::query()
                ->where('is_active', true)
                ->orderByDesc('created_at')
                ->paginate(12);
        }

        return view('featured-collection', compact('products'));
    }
}

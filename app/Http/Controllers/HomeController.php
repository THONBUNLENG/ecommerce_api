<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $slides = Slide::orderBy('order')
            ->take(3)
            ->get();

        $promotions = Promotion::latest()
            ->take(2)
            ->get();

        $products = Product::where('is_popular', true)
            ->latest()
            ->take(8)
            ->get();

        $latestDrops = Product::where('is_latest_drop', true)
            ->latest()
            ->take(8)
            ->get();

        $trustedImages = collect(File::files(public_path('img/trusted')))
            ->map(fn ($file) => $file->getFilename())
            ->filter(fn ($filename) => preg_match('/\.(png|jpe?g|gif)$/i', $filename))
            ->reject(fn ($filename) => in_array($filename, ['1.png', '2.png', '3.png']))
            ->sort()
            ->values();

        return view('home', compact(
            'slides',
            'promotions',
            'products',
            'latestDrops',
            'trustedImages'
        ));
    }
}

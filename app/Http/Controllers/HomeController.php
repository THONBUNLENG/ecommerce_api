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
            ->sort(function ($a, $b) {
                preg_match('/(\d+)/', $a, $ma);
                preg_match('/(\d+)/', $b, $mb);
                $na = isset($ma[1]) ? (int)$ma[1] : 0;
                $nb = isset($mb[1]) ? (int)$mb[1] : 0;
                if ($na === $nb) return 0;
                return ($na < $nb) ? -1 : 1;
            })
            ->values();

        $peopleImages = collect(range(1, 8))
            ->map(fn ($n) => "{$n}.png")
            ->filter(fn ($filename) => File::exists(public_path("img/people/{$filename}")))
            ->values();

        return view('home', compact(
            'slides',
            'promotions',
            'products',
            'latestDrops',
            'trustedImages',
            'peopleImages'
        ));
    }
}

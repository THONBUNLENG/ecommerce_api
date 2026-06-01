<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home',[
            'slides'=> Slide::take(3)->orderBy('order')->get(),
            'promotions'=> Promotion::take(2)->latest()->get(),
            'products'=> Product::where('is_popular',true)->take(8)->get(),
            'latest_drops'=> Product::where('is_latest_drop',true)->take(8)->get(),
        ]);
    }
}

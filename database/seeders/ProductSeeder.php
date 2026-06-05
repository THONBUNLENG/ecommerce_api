<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id')->toArray();
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );

        $names = [
            'Velvet Evening Gown', 'Silk Caftan Dress', 'Structured Blazer',
            'Pleated Midi Skirt', 'Cashmere Sweater', 'Leather Biker Jacket',
            'Satin Slip Dress', 'Tailored Wide-Leg Pants'
        ];

        $descriptions = [
            'Luxurious velvet evening gown with gold chain detailing.',
            'Flowing silk caftan in soft blush with hand-stitched edging.',
            'Oversized structured blazer in black with satin lapels.',
            'Pleated metallic midi skirt in champagne gold.',
            'Ultra-soft cashmere knit in ivory turtleneck.',
            'Premium lambskin leather biker jacket with quilted panels.',
            'Bias-cut satin slip dress with delicate trim.',
            'High-waisted wide-leg trousers in Italian wool.'
        ];

        for ($i = 1; $i <= 8; $i++) {
            Product::create([
                'name' => $names[$i - 1],
                'description' => $descriptions[$i - 1],
                'price' => rand(180, 950) + 0.99,
                'stock_quantity' => rand(5, 50),
                'image_url' => "img/people/{$i}.png",
                'category_id' => $categories[array_rand($categories)] ?? 1,
                'user_id' => $user->id,
                'is_popular' => true,
                'is_latest_drop' => false,
            ]);
        }
    }
}

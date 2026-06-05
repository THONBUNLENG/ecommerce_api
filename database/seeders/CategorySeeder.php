<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Dresses', 'Outerwear', 'Knitwear', 'Bottoms', 'Accessories'];
        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}

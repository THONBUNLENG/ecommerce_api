<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    public function run(): void
    {
        $sizes = [
            ['name' => 'S', 'code' => 'S'],
            ['name' => 'M', 'code' => 'M'],
            ['name' => 'L', 'code' => 'L'],
            ['name' => 'XL', 'code' => 'XL'],
            ['name' => 'XXL', 'code' => 'XXL'],
            ['name' => '20', 'code' => '20'],
            ['name' => '30', 'code' => '30'],
            ['name' => '40', 'code' => '40'],
        ];

        foreach ($sizes as $size) {
            \App\Models\Size::firstOrCreate(
                ['name' => $size['name']],
                ['code' => $size['code']]
            );
        }
    }
}

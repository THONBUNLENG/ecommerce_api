<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $colors = [
            ['name' => 'Black', 'code' => '#000000'],
            ['name' => 'White', 'code' => '#FFFFFF'],
            ['name' => 'Red', 'code' => '#EF4444'],
            ['name' => 'Blue', 'code' => '#3B82F6'],
            ['name' => 'Green', 'code' => '#10B981'],
            ['name' => 'Yellow', 'code' => '#F59E0B'],
            ['name' => 'Purple', 'code' => '#8B5CF6'],
            ['name' => 'Pink', 'code' => '#EC4899'],
            ['name' => 'Orange', 'code' => '#F97316'],
            ['name' => 'Gray', 'code' => '#6B7280'],
            ['name' => 'Navy', 'code' => '#1E3A8A'],
            ['name' => 'Brown', 'code' => '#924200'],
        ];

        foreach ($colors as $color) {
            \App\Models\Color::firstOrCreate(
                ['name' => $color['name']],
                ['code' => $color['code']]
            );
        }
    }
}

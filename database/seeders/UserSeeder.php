<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'adminLooma@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('Looma@admin'),
                'role' => 'admin',
            ]
        );
    }
}

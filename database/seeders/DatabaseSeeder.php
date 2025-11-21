<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Admin Account
        User::create([
            'name' => 'Admin Noiré',
            'email' => 'admin@noire.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        // Seed Test User (opsional)
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);
    }
}

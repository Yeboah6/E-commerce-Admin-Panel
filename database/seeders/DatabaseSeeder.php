<?php

namespace Database\Seeders;

use App\Models\AdminLogin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\AdminLogin::create([
            'username' => 'Admin',
            'email' => 'ecommerce@admin.com',
            'password' => Hash::make('1234567890')
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Aditya NS',
            'email' => 'adityanamansingh@gmail.com',
            'password' => '$2y$12$Zm6Ei2YVtCwbDqVu.nSQQOlEco1T3gPyRL.B8opIqFGGtbCm/Xi/y',
        ]);

        // Create test user
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '$2y$12$A9o8jswcIrEYA2b9xiUaMeOAlICIN8z8/CHtlq/jbt4b6rx0VFgIe',
        ]);

        $this->call([
            ServiceSeeder::class,
            StaticPageSeeder::class,
            PortfolioSeeder::class,
            ContactSeeder::class,
            BlogSeeder::class,
        ]);
    }
}

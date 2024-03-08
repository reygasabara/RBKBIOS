<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'username' => env('USER_USERNAME'),
            'email' => env('USER_EMAIL'),
            'email_verified_at' => now(),
            'password' => env('USER_PASSWORD'),
            'remember_token' => Str::random(10),
        ]);
    }
}

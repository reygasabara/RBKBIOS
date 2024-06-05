<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'name' => 'Administrator',
            'username' => env('USER_USERNAME'),
            'email' => env('USER_EMAIL'),
            'email_verified_at' => now(),
            'password' => env('USER_PASSWORD'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('admin');
    }
}

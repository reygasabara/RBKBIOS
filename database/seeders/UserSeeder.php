<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'name' => 'Administrator',
            'username' => 'adminrsbk',
            'email' => 'adminrsbk@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('adminrsb99'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('Super Admin');
    }
}

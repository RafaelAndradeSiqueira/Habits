<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Rafael',
            'email' => 'rafaz10000@gmail.com',
            'email_verified_at' => now(),
            'password' => '12345678',
            'remember_token' => null,
        ]);
    }
}

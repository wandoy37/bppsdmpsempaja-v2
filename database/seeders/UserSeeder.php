<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'wandi',
            'email' => 'riswandi035@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordS'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);
    }
}

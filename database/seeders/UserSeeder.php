<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'Viktor',
            'email' => 'viktorzafirovski3@gmail.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
        User::create([
            'username' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('Admin123'),
            'role' => 'admin',
        ]);
    }
}

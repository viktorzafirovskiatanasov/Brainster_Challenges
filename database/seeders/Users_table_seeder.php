<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'admin@example.com',
                'role' => 'admin',
                'password' => Hash::make('password123'),
            ]
        ];

        // Insert data into the users table
        DB::table('users')->insert($users);
    
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
        {
            User::create([
                'email' => 'admin@admin.com',
                'username' => 'admin', 
                'vaiiradmins' => 'ja',
                'password' => 'password',
                // Set the value of vaiirarsts for admin user
            ]);
        }
}

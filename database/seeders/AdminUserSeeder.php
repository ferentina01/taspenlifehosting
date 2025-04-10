<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Taspen',
            'email' => 'admintaspen@gmail.com',
            'password' => Hash::make('admin123'),
            
            'user_type' => 'admin'
        ]);
    }
}

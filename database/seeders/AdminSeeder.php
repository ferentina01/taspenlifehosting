<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'feren@gmail.com', //   email admin 
            'password' => bcrypt('feren123'), //   password admin
            'user_type' => 'admin', // Menandakan bahwa ini adalah akun admin
        ]);
    }
}
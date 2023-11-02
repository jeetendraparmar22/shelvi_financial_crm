<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add users to db
        User::create([
            'name' => 'Jigar Suthar',
            'email' => 'jigarsuthar5656@gmail.com',
            'mobile_no' => '9898105656',
            'password' => 'shelvi@5656',
            'user_type' => 'admin',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                "name" => "admin_1",
                "email" => "admin_1@gmail.com",
                "password" => Hash::make("admin_1"),
            ],
            [
                "name" => "admin_2",
                "email" => "admin_2@gmail.com",
                "password" => Hash::make("admin_2")
            ],
            [
                "name" => "admin_3",
                "email" => "admin_3@gmail.com",
                "password" => Hash::make("admin_3")
            ],
        ];

        User::insert($user);
    }
}

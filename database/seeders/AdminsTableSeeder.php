<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // You can adjust the number of admins you want to seed
        $numberOfAdmins = 2;

        for ($i = 1; $i <= $numberOfAdmins; $i++) {
            DB::table('admins')->insert([
                'name' => "Admin $i",
                'email' => "admin$i@example.com",
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // You may hash your passwords
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'image_url' => 'admins/user5.png',
            ]);
        }
    }
}

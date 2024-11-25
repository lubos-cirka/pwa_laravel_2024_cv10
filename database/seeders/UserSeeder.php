<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'firstname'         => 'Firstname', 
            'lastname'          => 'Lastname', 
            'email'             => 'name@gmail.com', 
            'email_verified_at' => now(),
            'password'          => bcrypt('password'), 
            'remember_token'    => Str::random(10),
            'created_at'        => now(),
        ]);        
        User::factory()->count(20)->create();
    }
}

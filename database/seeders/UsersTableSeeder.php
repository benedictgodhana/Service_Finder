<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => '1',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'activation_token' => Str::random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                
            ],

            [
                'name' => 'serviceprovider',
                'email' => 'serviceprovider@gmail.com',
                'role' => '2',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'activation_token' => Str::random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
               
            ],
            [
                'name' => 'customer',
                'email' => 'customer@gmail.com',
                'role' => '0',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'activation_token' => Str::random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
               
            ],
            // Add more user records as needed
        ];

        // Insert the seed data into the users table
        User::insert($users);
    }
    }


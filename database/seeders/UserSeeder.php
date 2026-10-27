<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'paloma',
                'email' => 'user1@example.com',
                'password' => Hash::make('12345678')
            ],

            [
                'name' => 'rio',
                'email' => 'user2@example.com',
                'password' => Hash::make('12345678')
            ],

            [
            'name' => 'juan',
            'email' => 'user3@example.com',
            'password' => Hash::make('12345678')
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Jake',
            'email' => 'jake@gmail.com',
            'password' => bcrypt('password123')
        ]);
        $user->profile()->create([
            'phone' => '123557890',
            'address' => 'USA'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create(['name' => 'John Doe']);
        Student::create(['name' => 'Jane Smith']);
        Student::create(['name' => 'Bob Brown']);
    }
}

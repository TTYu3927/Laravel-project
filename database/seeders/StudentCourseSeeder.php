<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;



class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = Student::first();
        $student->courses()->attach([1,2]);

        $student2 = Student::find(2);//use find() to get the second student
        $student2->courses()->attach([2,3]);
        
        $courses = Course::first();
        $courses->students()->attach([1,2,3]);

        $courses2 = Course::find(2);//use find() to get the second course
        $courses2->students()->attach([1,2]);

    }
}

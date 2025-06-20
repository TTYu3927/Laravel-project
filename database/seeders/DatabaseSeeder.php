<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Database\Seeders\PostSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\TagSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\StudentCourseSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Category::factory(10)->create();
        $this->call([
            PostSeeder::class,
            CommentSeeder::class,
            TagSeeder::class,
            StudentSeeder::class,
            CourseSeeder::class,
            StudentCourseSeeder::class,
        ]);

        
        
    }
}

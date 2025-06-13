<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     Post::factory()->count(5)->create();
    // }
    public function run()
    {
        Post::factory(5)->create()->each(function ($post) {
            $tagIds = Tag::inRandomOrder()->take(4)->pluck('id');
            $post->tags()->attach($tagIds);
        });
    }
}

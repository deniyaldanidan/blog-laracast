<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::truncate();
        DB::statement("Delete from users");
        DB::statement("Delete from blogs");
        // Blog::truncate();
        Category::truncate();
        Comment::truncate();

        $users = User::factory()->count(8)->create();
        $categories = Category::factory()->count(15)->create();



        for ($i = 0; $i < 120; $i++) {
            $blog = Blog::factory()->create([
                "user_id" => $users->random()->id,
                "category_id" => $categories->random()->id
            ]);

            for ($j = 0; $j < rand(0, 8); $j++) {
                Comment::factory()->create([
                    "user_id" => $users->random()->id,
                    "blog_id" => $blog->id
                ]);
            }
        }


    }
}

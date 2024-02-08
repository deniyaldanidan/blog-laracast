<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Blog::truncate();
        Category::truncate();

        $users = User::factory()->count(6)->create();
        $categories = Category::factory()->count(15)->create();



        for ($i = 0; $i < 100; $i++) {
            Blog::factory()->create([
                "user_id" => $users->random()->id,
                "category_id" => $categories->random()->id
            ]);
        }


    }
}

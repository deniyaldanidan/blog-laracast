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
        $categories = Category::factory()->count(4)->create();


        foreach ($users as $user) {
            for ($i = 0; $i < rand(3, 10); $i++) {
                Blog::factory()->create([
                    "user_id" => $user->id,
                    "category_id" => $categories->random()->id
                ]);
            }
        }

    }
}

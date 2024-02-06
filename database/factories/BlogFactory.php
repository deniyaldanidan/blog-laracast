<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(5);
        return [
            'title' => $title,
            'slug' => Str::of($title)->slug("-"),
            "excerpt" => $this->faker->sentence(7),
            "body" => $this->faker->paragraph(10),
            "category_id" => Category::factory(),
            "user_id" => User::factory()
        ];
    }
}

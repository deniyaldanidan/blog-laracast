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
        $title = $this->faker->realTextBetween(90, 130, 4);
        $paragraphs = [];

        for ($i = 0; $i < 10; $i++) {
            array_push($paragraphs, $this->faker->paragraph(15));
        }

        return [
            'title' => $title,
            'slug' => Str::of($title)->trim()->slug("-") . rand(2000, 5000),
            "excerpt" => $this->faker->realTextBetween(180, 220, 5),
            "body" => implode("\n", $paragraphs),
            "category_id" => Category::factory(),
            "user_id" => User::factory()
        ];
    }
}

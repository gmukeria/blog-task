<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image_middle' => "https://www.image.com/photo.jpg",
            'image_large' => "https://www.image.com/photo.jpg",
            'user_id' => function () {
                return User::factory()->create()->id;
            },

            'title' => 'fake title',
            'desc' => 'fake desc',
            'text' => 'fake text',
        ];
    }
}

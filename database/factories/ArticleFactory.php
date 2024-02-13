<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence,
            "slug"  => $this->faker->slug,
            "content"   => $this->faker->paragraph(10),
            "image" => $this->faker->image('public/storage/images/articles', 640, 480, null, false),
            "status"    => $this->faker->randomElement(["active","inactive"]),
            "category_id"   => Category::get()->random()->id,
        ];
    }
}

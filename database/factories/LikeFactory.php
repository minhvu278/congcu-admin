<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $likeableType = $this->faker->randomElement([
            Article::class,
            Comment::class,
        ]);

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'likeable_id' => $likeableType::factory(),
            'likeable_type' => $likeableType,
            'reactions' => $this->faker->randomElement(['like', 'love', 'haha', 'wow', 'sad', 'angry']),
        ];
    }
}

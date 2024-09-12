<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    public function run()
    {
        Like::truncate();

        $article = Article::inRandomOrder()->first();
        $users = User::inRandomOrder()->take(2)->get();

        foreach ($users as $user) {
            Like::create([
                'user_id' => $user->id,
                'likeable_id' => $article->id,
                'likeable_type' => 'App\Models\Article',
                'reactions' => 'like',
            ]);
        }

        $comment = Comment::inRandomOrder()->first();

        foreach ($users as $user) {
            Like::create([
                'user_id' => $user->id,
                'likeable_id' => $comment->id,
                'likeable_type' => 'App\Models\Comment',
                'reactions' => 'love',
            ]);
        }
    }
}

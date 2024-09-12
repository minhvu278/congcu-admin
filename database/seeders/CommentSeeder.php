<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        Comment::truncate();

        $comments = [
            [
                'article_id' => Article::inRandomOrder()->first()->id,
                'user_id' => User::inRandomOrder()->first()->id,
                'content' => 'Bài viết rất hữu ích, cảm ơn tác giả!',
                'status' => 'approved',
            ],
            [
                'article_id' => Article::inRandomOrder()->first()->id,
                'user_id' => User::inRandomOrder()->first()->id,
                'content' => 'Mình không đồng ý với một số điểm trong bài viết này.',
                'status' => 'pending',
            ],
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}

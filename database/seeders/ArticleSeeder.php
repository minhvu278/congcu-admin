<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        Article::truncate();

        $articles = [
            [
                'title' => 'Công nghệ AI đang phát triển mạnh mẽ',
                'slug' => 'cong-nghe-ai-dang-phat-trien',
                'content' => 'Trí tuệ nhân tạo đang ngày càng trở nên quan trọng trong mọi lĩnh vực...',
                'excerpt' => 'Trí tuệ nhân tạo đang ngày càng trở nên quan trọng...',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::where('slug', 'cong-nghe')->first()->id,
                'is_featured' => true,
            ],
            [
                'title' => 'Cách chăm sóc sức khỏe mùa đông',
                'slug' => 'cach-cham-soc-suc-khoe-mua-dong',
                'content' => 'Mùa đông là thời điểm dễ mắc các bệnh liên quan đến hô hấp...',
                'excerpt' => 'Mùa đông là thời điểm dễ mắc bệnh...',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::where('slug', 'suc-khoe')->first()->id,
                'is_featured' => false,
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}

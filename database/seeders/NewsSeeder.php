<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run()
    {
        News::truncate();

        $news = [
            [
                'title' => 'Tin tức mới nhất về AI',
                'slug' => 'tin-tuc-ai',
                'content' => 'AI đang tiếp tục thay đổi cách con người sống và làm việc...',
                'status' => 'published',
            ],
            [
                'title' => 'Cập nhật tình hình dịch bệnh',
                'slug' => 'cap-nhat-dich-benh',
                'content' => 'Dịch bệnh vẫn đang có những diễn biến phức tạp...',
                'status' => 'draft',
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}

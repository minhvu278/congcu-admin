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
                'content' => 'Trí tuệ nhân tạo (AI) đang ngày càng khẳng định vị trí trong nhiều lĩnh vực từ y tế đến công nghiệp.',
                'excerpt' => 'AI phát triển mạnh mẽ trong mọi lĩnh vực...',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::where('slug', 'cong-nghe')->first()->id,
                'is_featured' => true,
            ],
            [
                'title' => 'Tác động của Blockchain tới tài chính thế giới',
                'slug' => 'blockchain-va-tai-chinh',
                'content' => 'Blockchain đang thay đổi cách các giao dịch tài chính hoạt động với tính bảo mật và minh bạch cao.',
                'excerpt' => 'Blockchain tác động mạnh mẽ tới tài chính...',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::where('slug', 'tai-chinh')->first()->id,
                'is_featured' => true,
            ],
            [
                'title' => 'Ứng dụng công nghệ 5G vào cuộc sống',
                'slug' => 'cong-nghe-5g',
                'content' => '5G không chỉ cải thiện tốc độ truy cập internet mà còn tạo ra nhiều cơ hội phát triển mới cho các ngành công nghiệp.',
                'excerpt' => '5G đang cách mạng hóa kết nối...',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::where('slug', 'cong-nghe')->first()->id,
                'is_featured' => false,
            ],
            [
                'title' => 'Cách chăm sóc sức khỏe mùa đông',
                'slug' => 'cach-cham-soc-suc-khoe-mua-dong',
                'content' => 'Mùa đông là thời điểm dễ mắc các bệnh liên quan đến hô hấp. Hãy chăm sóc sức khỏe bằng cách giữ ấm và bổ sung vitamin C.',
                'excerpt' => 'Mùa đông và cách chăm sóc sức khỏe...',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::where('slug', 'suc-khoe')->first()->id,
                'is_featured' => false,
            ],
            [
                'title' => 'Giáo dục trực tuyến đang thay đổi thế giới',
                'slug' => 'giao-duc-truc-tuyen',
                'content' => 'Nền tảng giáo dục trực tuyến đã mở ra cơ hội học tập cho hàng triệu người trên thế giới.',
                'excerpt' => 'Giáo dục trực tuyến mang đến cơ hội mới...',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::where('slug', 'giao-duc')->first()->id,
                'is_featured' => false,
            ],
            [
                'title' => 'Những phát hiện khoa học mới về vũ trụ',
                'slug' => 'phat-hien-ve-vu-tru',
                'content' => 'Các nhà khoa học đã phát hiện ra những hành tinh có khả năng tồn tại sự sống trong hệ mặt trời.',
                'excerpt' => 'Khám phá mới về vũ trụ...',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::where('slug', 'khoa-hoc')->first()->id,
                'is_featured' => true,
            ],
            [
                'title' => 'Tác động của biến đổi khí hậu',
                'slug' => 'bien-doi-khi-hau',
                'content' => 'Biến đổi khí hậu đang tác động tiêu cực đến hệ sinh thái và cuộc sống của con người.',
                'excerpt' => 'Biến đổi khí hậu ảnh hưởng đến trái đất...',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::where('slug', 'khoa-hoc')->first()->id,
                'is_featured' => false,
            ],
            [
                'title' => 'Thời trang bền vững - xu hướng tương lai',
                'slug' => 'thoi-trang-ben-vung',
                'content' => 'Thời trang bền vững đang trở thành xu hướng mới, giảm thiểu tác động tiêu cực đến môi trường.',
                'excerpt' => 'Thời trang bền vững và tương lai...',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::where('slug', 'thoi-trang')->first()->id,
                'is_featured' => false,
            ],
            [
                'title' => 'Lợi ích của Yoga đối với sức khỏe tinh thần',
                'slug' => 'loi-ich-cua-yoga',
                'content' => 'Yoga không chỉ giúp cơ thể dẻo dai mà còn giúp tăng cường sức khỏe tinh thần, giảm căng thẳng.',
                'excerpt' => 'Yoga và sức khỏe tinh thần...',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::where('slug', 'suc-khoe')->first()->id,
                'is_featured' => true,
            ],
            [
                'title' => 'Khám phá những địa danh du lịch nổi tiếng',
                'slug' => 'dia-danh-du-lich',
                'content' => 'Các điểm đến du lịch nổi tiếng với vẻ đẹp thiên nhiên và văn hóa đặc sắc.',
                'excerpt' => 'Những địa danh du lịch hấp dẫn...',
                'status' => 'published',
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::where('slug', 'du-lich')->first()->id,
                'is_featured' => false,
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}

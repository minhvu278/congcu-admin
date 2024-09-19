<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use App\Traits\TruncateTable;

class NewsSeeder extends Seeder
{
    use TruncateTable;
    public function run()
    {
        $this->truncateTable('news');

        $news = [
            [
                'title' => 'Tin tức mới nhất về công nghệ AI',
                'slug' => 'tin-tuc-ai',
                'content' => 'AI tiếp tục là chủ đề nóng với nhiều phát triển mới trong việc ứng dụng vào cuộc sống hàng ngày.',
                'status' => 'published',
            ],
            [
                'title' => 'Xu hướng du lịch bền vững 2024',
                'slug' => 'du-lich-ben-vung-2024',
                'content' => 'Du lịch bền vững ngày càng được nhiều người quan tâm khi kết hợp giữa trải nghiệm và bảo vệ môi trường.',
                'status' => 'published',
            ],
            [
                'title' => 'Khám phá vũ trụ: Những phát hiện mới',
                'slug' => 'kham-pha-vu-tru',
                'content' => 'Các nhà khoa học đã khám phá thêm nhiều thông tin về những hành tinh có tiềm năng hỗ trợ sự sống.',
                'status' => 'published',
            ],
            [
                'title' => 'Tình hình dịch bệnh toàn cầu năm 2024',
                'slug' => 'tinh-hinh-dich-benh-2024',
                'content' => 'Các chuyên gia y tế cảnh báo về sự bùng phát của các loại dịch bệnh mới trong năm 2024.',
                'status' => 'draft',
            ],
            [
                'title' => 'Thời trang và môi trường: Sự liên kết không thể tách rời',
                'slug' => 'thoi-trang-va-moi-truong',
                'content' => 'Ngành thời trang đang dần chuyển mình để trở nên thân thiện hơn với môi trường.',
                'status' => 'published',
            ],
            [
                'title' => 'Khoa học và tương lai của năng lượng tái tạo',
                'slug' => 'nang-luong-tai-tao',
                'content' => 'Năng lượng tái tạo tiếp tục là tâm điểm của các dự án nghiên cứu và phát triển toàn cầu.',
                'status' => 'published',
            ],
            [
                'title' => 'Sức khỏe tinh thần trong thế giới hiện đại',
                'slug' => 'suc-khoe-tinh-than',
                'content' => 'Sức khỏe tinh thần ngày càng được quan tâm hơn trong cuộc sống bận rộn của thế kỷ 21.',
                'status' => 'published',
            ],
            [
                'title' => 'Blockchain và cách mạng trong lĩnh vực tài chính',
                'slug' => 'blockchain-tai-chinh',
                'content' => 'Blockchain đang thay đổi cách thức hoạt động của ngành tài chính với tính minh bạch và an toàn.',
                'status' => 'published',
            ],
            [
                'title' => 'Những tiến bộ trong y học năm 2024',
                'slug' => 'y-hoc-2024',
                'content' => 'Các công nghệ y học mới tiếp tục hỗ trợ việc chẩn đoán và điều trị bệnh nhanh chóng và chính xác hơn.',
                'status' => 'published',
            ],
            [
                'title' => 'Cách mạng công nghệ 5G và sự thay đổi của cuộc sống',
                'slug' => 'cach-mang-cong-nghe-5g',
                'content' => 'Công nghệ 5G đang làm thay đổi cách chúng ta kết nối và làm việc hàng ngày.',
                'status' => 'published',
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}

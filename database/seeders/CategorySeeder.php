<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Traits\TruncateTable;

class CategorySeeder extends Seeder
{
    use TruncateTable;
    public function run()
    {
        $this->truncateTable('categories');

        $categories = [
            ['name' => 'Công nghệ', 'slug' => 'cong-nghe'],
            ['name' => 'Khoa học', 'slug' => 'khoa-hoc'],
            ['name' => 'Giáo dục', 'slug' => 'giao-duc'],
            ['name' => 'Sức khỏe', 'slug' => 'suc-khoe'],
            ['name' => 'Thời trang', 'slug' => 'thoi-trang'],
            ['name' => 'Tài chính', 'slug' => 'tai-chinh'],
            ['name' => 'Du lịch', 'slug' => 'du-lich'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

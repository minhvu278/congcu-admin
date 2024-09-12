<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::truncate();

        $categories = [
            ['name' => 'Công nghệ', 'slug' => 'cong-nghe'],
            ['name' => 'Khoa học', 'slug' => 'khoa-hoc'],
            ['name' => 'Giáo dục', 'slug' => 'giao-duc'],
            ['name' => 'Sức khỏe', 'slug' => 'suc-khoe'],
            ['name' => 'Thời trang', 'slug' => 'thoi-trang'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run()
    {
        Tag::truncate();

        $tags = [
            ['name' => 'Công nghệ', 'slug' => 'cong-nghe'],
            ['name' => 'Sức khỏe', 'slug' => 'suc-khoe'],
            ['name' => 'Giáo dục', 'slug' => 'giao-duc'],
            ['name' => 'Khoa học', 'slug' => 'khoa-hoc'],
            ['name' => 'Thời trang', 'slug' => 'thoi-trang'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}

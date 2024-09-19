<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use App\Traits\TruncateTable;


class TagSeeder extends Seeder
{
    use TruncateTable;
    public function run()
    {
        $this->truncateTable('tags');

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

<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory(20)->create()->each(function ($article) {
            $article->categories()->attach(Category::inRandomOrder()->take(rand(1, 3))->pluck('id'));
            $article->tags()->attach(Tag::inRandomOrder()->take(rand(1, 3))->pluck('id'));
        });
    }
}

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
        Article::factory(10)->create()->each(function ($article) {
            $article->category_id = Category::inRandomOrder()->first()->id;
            $article->save();

            $article->tags()->attach(Tag::inRandomOrder()->take(rand(1, 3))->pluck('id'));
        });
    }
}

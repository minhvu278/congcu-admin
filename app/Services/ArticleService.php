<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Arr;

class ArticleService
{
    public function getAllArticles()
    {
        return Article::with('categories', 'tags')->paginate(10);
    }

    public function createArticle(array $data)
    {
        $article = Article::create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'content' => $data['content'],
            'excerpt' => $data['excerpt'],
            'image' => $data['image'] ?? null,
            'status' => $data['status'],
            'user_id' => auth()->id(),
            'published_at' => $data['published_at'] ?? null,
            'is_featured' => isset($data['is_featured']),
        ]);

        $categories = Arr::flatten($data['categories'] ?? []);
        $article->categories()->sync($categories);

        $tags = Arr::flatten($data['tags'] ?? []);
        $article->tags()->sync($tags);

        return $article;
    }

    public function updateArticle(Article $article, array $data)
    {
        $article->update([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'content' => $data['content'],
            'excerpt' => $data['excerpt'],
            'image' => $data['image'] ?? null,
            'status' => $data['status'],
            'published_at' => $data['published_at'] ?? null,
            'is_featured' => isset($data['is_featured']),
        ]);

        $categories = array_filter(Arr::flatten($data['categories'] ?? []));
        $article->categories()->sync($categories);

        $tags = array_filter(Arr::flatten($data['tags'] ?? []));
        $article->tags()->sync($tags);

        return $article;
    }

    public function deleteArticle(Article $article)
    {
        return $article->delete();
    }
}

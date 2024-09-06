<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    public function getPaginatedArticles(int $perPage = 10)
    {
        return Article::paginate($perPage);
    }

    public function createArticle(array $data)
    {
        $data['user_id'] = auth()->id();
        $article = Article::create($data);
        if (isset($data['tags'])) {
            $article->tags()->attach($data['tags']);
        }

        return $article;
    }

    public function updateArticle(Article $article, array $data)
    {
        $article->update($data);

        if (isset($data['tags'])) {
            $article->tags()->sync($data['tags']);
        }

        return $article;
    }

    public function deleteArticle(Article $article)
    {
        return $article->delete();
    }
}

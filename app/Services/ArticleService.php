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
        $data['is_featured'] = $data['is_featured'] ?? false;
        return Article::create($data);
    }

    public function updateArticle(Article $article, array $data)
    {
        $data['is_featured'] = $data['is_featured'] ?? false;
        return $article->update($data);
    }

    public function deleteArticle(Article $article)
    {
        return $article->delete();
    }
}

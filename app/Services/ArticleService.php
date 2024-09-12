<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    public function store($data)
    {
        return DB::transaction(function () use ($data) {
            $article = new Article();

            if (isset($data['image'])) {
                $article->image = $data['image']->store('articles', 'public');
            }

            $article->title = $data['title'];
            $article->slug = $data['slug'];
            $article->content = $data['content'];
            $article->excerpt = $data['excerpt'];
            $article->status = $data['status'];
            $article->user_id = $data['user_id'] ?? auth()->id();
            $article->category_id = $data['category_id'];
            $article->is_featured = $data['is_featured'] ?? false;
            $article->published_at = $data['published_at'] ?? null;
            $article->save();

            if (isset($data['tags'])) {
                $article->tags()->sync($data['tags']);
            }

            return $article;
        });
    }

    public function update($id, $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $article = Article::findOrFail($id);

            if (isset($data['image'])) {
                if ($article->image) {
                    Storage::disk('public')->delete($article->image);
                }
                $article->image = $data['image']->store('articles', 'public');
            }

            $article->title = $data['title'];
            $article->slug = $data['slug'];
            $article->content = $data['content'];
            $article->excerpt = $data['excerpt'];
            $article->status = $data['status'];
            $article->user_id = $data['user_id'] ?? $article->user_id;
            $article->category_id = $data['category_id'];
            $article->is_featured = $data['is_featured'] ?? false;
            $article->published_at = $data['published_at'] ?? $article->published_at;

            $article->save();

            if (isset($data['tags'])) {
                $article->tags()->sync($data['tags']);
            }

            return $article;
        });
    }

    public function delete($id)
    {
        return DB::transaction(function () use ($id) {
            $article = Article::findOrFail($id);
            $article->tags()->detach();
            return $article->delete();
        });
    }

    public function paginate($perPage = 10)
    {
        return Article::with('category', 'tags', 'user')->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function findById($id)
    {
        return Article::with('category', 'tags', 'user')->findOrFail($id);
    }
}

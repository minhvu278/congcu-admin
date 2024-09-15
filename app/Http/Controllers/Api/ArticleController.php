<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category', 'tags', 'user')->get();

        return response()->json($articles);
    }

    public function featured()
    {
        $featuredArticles = Article::where('is_featured', true)->select('title', 'image', 'slug')->get();

        return response()->json($featuredArticles);
    }

    public function titlesAndImages()
    {
        $articles = Article::select('title', 'image', 'slug')->get();

        return response()->json($articles);
    }

    public function show($slug)
    {
        $article = Article::with('category', 'tags', 'user')->where('slug', $slug)->first();

        if (!$article) {
            return response()->json(['message' => 'Bài viết không tồn tại'], 404);
        }

        return response()->json($article);
    }
}

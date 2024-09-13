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
        $featuredArticles = Article::where('is_featured', true)->get();

        return response()->json($featuredArticles);
    }

    public function titlesAndImages()
    {
        $articles = Article::select('title', 'image')->get();

        return response()->json($articles);
    }
}

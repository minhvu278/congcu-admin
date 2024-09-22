<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->get('limit', 6);
        $page = $request->get('page', 1);
        $offset = ($page - 1) * $limit;

        $articles = Article::with('user')
            ->orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($limit)
            ->get();

        $articles->transform(function ($article) {
            if ($article->image) {
                $article->image = url('storage/' . $article->image);
            }
            return $article;
        });

        $total = Article::count();

        return response()->json([
            'articles' => $articles,
            'total' => $total
        ]);
    }

    public function featured()
    {
        $featuredArticles = Article::where('is_featured', true)
            ->select('id', 'title', 'image', 'slug')
            ->get();

        $featuredArticles->transform(function ($article) {
            if ($article->image) {
                $article->image = url('storage/' . $article->image);
            }
            return $article;
        });

        return response()->json($featuredArticles);
    }

    public function titlesAndImages()
    {
        $articles = Article::select('title', 'image', 'slug')->paginate(6);

        $articles->getCollection()->transform(function ($article) {
            if ($article->image) {
                $article->image = url('storage/' . $article->image);
            }
            return $article;
        });

        return response()->json($articles);
    }

    public function show($slug)
    {
        $article = Article::with('category', 'tags', 'user')->where('slug', $slug)->first();

        if (!$article) {
            return response()->json(['message' => 'The article does not exist'], 404);
        }

        if ($article->image) {
            $article->image = url('storage/' . $article->image);
        }

        return response()->json($article);
    }
}

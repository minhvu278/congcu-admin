<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return response()->json($news);
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();

        if (!$news) {
            return response()->json(['message' => 'Tin tức không tồn tại'], 404);
        }

        return response()->json($news);
    }

}

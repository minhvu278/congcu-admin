<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(6);
        return response()->json($news);
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();

        if (!$news) {
            return response()->json(['message' => 'News does not exist'], 404);
        }

        return response()->json($news);
    }

}

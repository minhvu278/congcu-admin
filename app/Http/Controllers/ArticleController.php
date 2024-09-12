<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(Request $request)
    {
        $articles = $this->articleService->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories', 'tags'));
    }

    public function store(ArticleRequest $request)
    {
        $this->articleService->store($request->validated());
        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    public function edit($id)
    {
        $article = $this->articleService->findById($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $this->articleService->update($id, $request->validated());
        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        $this->articleService->delete($id);
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}

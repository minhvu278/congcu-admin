<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Services\NewsService;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index()
    {
        $news = $this->newsService->paginate(10);
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(NewsRequest $request)
    {
        $this->newsService->store($request->validated());
        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    public function edit($id)
    {
        $news = $this->newsService->findById($id);
        return view('news.edit', compact('news'));
    }

    public function update(NewsRequest $request, $id)
    {
        $this->newsService->update($id, $request->validated());
        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    public function destroy($id)
    {
        $this->newsService->delete($id);
        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }
}

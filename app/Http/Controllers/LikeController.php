<?php

namespace App\Http\Controllers;

use App\Services\LikeService;

class LikeController extends Controller
{
    protected $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function index()
    {
        $likes = $this->likeService->paginate(10);
        return view('likes.index', compact('likes'));
    }

    public function destroy($id)
    {
        $this->likeService->delete($id);
        return redirect()->route('likes.index')->with('success', 'Like deleted successfully.');
    }
}

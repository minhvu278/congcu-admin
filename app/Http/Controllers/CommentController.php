<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index()
    {
        $comments = $this->commentService->paginate(10);
        return view('comments.index', compact('comments'));
    }

    public function updateStatus(Request $request, $id)
    {
        $status = $request->input('status');
        $this->commentService->updateStatus($id, $status);
        return redirect()->route('comments.index')->with('success', 'Comment status updated successfully.');
    }

    public function destroy($id)
    {
        $this->commentService->delete($id);
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}

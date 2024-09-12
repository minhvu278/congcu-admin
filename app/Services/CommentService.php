<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentService
{
    public function updateStatus($id, $status)
    {
        return DB::transaction(function () use ($id, $status) {
            $comment = Comment::findOrFail($id);
            $comment->status = $status;
            $comment->save();

            return $comment;
        });
    }

    public function delete($id)
    {
        return DB::transaction(function () use ($id) {
            $comment = Comment::findOrFail($id);
            return $comment->delete();
        });
    }

    public function paginate($perPage = 10)
    {
        return Comment::with('article', 'user')->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function findById($id)
    {
        return Comment::with('article', 'user')->findOrFail($id);
    }
}

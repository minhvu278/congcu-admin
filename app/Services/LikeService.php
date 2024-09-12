<?php

namespace App\Services;

use App\Models\Like;
use Illuminate\Support\Facades\DB;

class LikeService
{
    public function delete($id)
    {
        return DB::transaction(function () use ($id) {
            $like = Like::findOrFail($id);
            return $like->delete();
        });
    }

    public function paginate($perPage = 10)
    {
        return Like::with('likeable', 'user')->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function findById($id)
    {
        return Like::with('likeable', 'user')->findOrFail($id);
    }
}

<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsService
{
    public function store($data)
    {
        return DB::transaction(function () use ($data) {
            $news = new News();

            if (isset($data['image'])) {
                $news->image = $data['image']->store('news', 'public');
            }

            $news->title = $data['title'];
            $news->slug = $data['slug'];
            $news->content = $data['content'];
            $news->status = $data['status'];
            $news->save();

            return $news;
        });
    }

    public function update($id, $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $news = News::findOrFail($id);

            if (isset($data['image'])) {
                if ($news->image) {
                    Storage::disk('public')->delete($news->image);
                }
                $news->image = $data['image']->store('news', 'public');
            }

            $news->title = $data['title'];
            $news->slug = $data['slug'];
            $news->content = $data['content'];
            $news->status = $data['status'];
            $news->save();

            return $news;
        });
    }

    public function delete($id)
    {
        return DB::transaction(function () use ($id) {
            $news = News::findOrFail($id);

            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            return $news->delete();
        });
    }

    public function paginate($perPage = 10)
    {
        return News::paginate($perPage);
    }

    public function findById($id)
    {
        return News::findOrFail($id);
    }
}

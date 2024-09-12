<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public function paginate($perPage = 10)
    {
        return Tag::orderBy('created_at', 'desc')->paginate($perPage);
    }
    public function getAllTags()
    {
        return Tag::all();
    }

    public function createTag(array $data)
    {
        return Tag::create($data);
    }

    public function updateTag(Tag $tag, array $data)
    {
        return $tag->update($data);
    }

    public function deleteTag(Tag $tag)
    {
        return $tag->delete();
    }
}

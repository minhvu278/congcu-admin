<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles,slug,' . $this->article->id ?? '',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published,archived',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'published_at' => 'nullable|date',
            'is_featured' => 'boolean',
        ];
    }
}

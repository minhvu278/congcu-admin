<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class   ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:articles,slug,' . $this->route('article'),
            'content' => 'required',
            'excerpt' => 'nullable|string',
            'image' => 'nullable|image',
            'status' => 'required|in:draft,published,archived',
            'category_id' => 'required|exists:categories,id',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:tags,name,' . $this->tag->id,
            'slug' => 'required|string|max:255|unique:tags,slug,' . $this->tag->id,
        ];
    }
}

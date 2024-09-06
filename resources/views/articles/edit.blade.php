@extends('adminlte::page')

@section('title', 'Edit Article')

@section('content_header')
    <h1>Edit Article</h1>
@stop

@section('content')
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        <x-input name="title" label="Title" :value="$article->title" />
        <x-input name="slug" label="Slug" :value="$article->slug" />
        <x-ckeditor name="content" :value="old('content', $article->content ?? '')" />
        <x-input name="excerpt" label="Excerpt" :value="$article->excerpt" />
        <x-input name="image" label="Image URL" :value="$article->image" />
        <x-input name="category_id" type="select" label="Category" :options="$categories->pluck('name', 'id')" :value="$article->category_id" />
        <x-select2 name="tags" :options="$tags->pluck('name', 'id')" :selected="old('tags', isset($article) ? $article->tags->pluck('id')->toArray() : [])" />
        <x-input name="status" type="select" label="Status" :options="['draft' => 'Draft', 'published' => 'Published', 'archived']" :value="$article->status" />
        <div class="form-group">
            <input type="checkbox" name="is_featured" id="is_featured" {{ old('is_featured', $article->is_featured ?? false) ? 'checked' : '' }}>
            <label for="is_featured">Featured Article</label>
        </div>

        <button type="submit" class="btn btn-warning">Update Article</button>
    </form>
@stop

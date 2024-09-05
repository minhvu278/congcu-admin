@extends('adminlte::page')

@section('title', 'Edit Article')

@section('content_header')
    <h1>Edit Article</h1>
@stop

@section('content')
    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-input name="title" label="Article Title" :value="$article->title" />
        <x-input name="slug" label="Slug" :value="$article->slug" />
        <x-textarea name="content" label="Content">{{ old('content', $article->content) }}</x-textarea>
        <x-input name="excerpt" label="Excerpt" :value="$article->excerpt" />
        <x-input name="image" type="file" label="Featured Image" />
        <x-select name="status" label="Status" :options="['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived']" :value="$article->status" />
        <x-select name="categories[]" label="Categories" :options="$categories->pluck('name', 'id')" multiple :value="$article->categories->pluck('id')->toArray()" />
        <x-select name="tags[]" label="Tags" :options="$tags->pluck('name', 'id')" multiple :value="$article->tags->pluck('id')->toArray()" />
        <x-input name="published_at" type="date" label="Published At" :value="$article->published_at ? $article->published_at->format('Y-m-d') : ''" />
        <x-checkbox name="is_featured" label="Feature this article" :checked="$article->is_featured" />

        <button type="submit" class="btn btn-warning">Update Article</button>
    </form>
@stop

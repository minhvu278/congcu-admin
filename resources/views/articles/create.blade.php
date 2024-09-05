@extends('adminlte::page')

@section('title', 'Create Article')

@section('content_header')
    <h1>Create Article</h1>
@stop

@section('content')
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-input name="title" label="Article Title" :value="old('title')" />
        <x-input name="slug" label="Slug" :value="old('slug')" />
        <x-textarea name="content" label="Content">{{ old('content') }}</x-textarea>
        <x-input name="excerpt" label="Excerpt" :value="old('excerpt')" />
        <x-input name="image" type="file" label="Featured Image" />
        <x-select name="status" label="Status" :options="['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived']" :value="old('status')" />
        <x-select name="categories[]" label="Categories" :options="$categories->pluck('name', 'id')" :value="old('categories', [])" />
        <x-select name="tags[]" label="Tags" :options="$tags->pluck('name', 'id')" :value="old('tags', [])" />
        <x-input name="published_at" type="date" label="Published At" :value="old('published_at')" />
        <x-checkbox name="is_featured" label="Feature this article" :checked="old('is_featured')" />

        <button type="submit" class="btn btn-success">Create Article</button>
    </form>
@stop

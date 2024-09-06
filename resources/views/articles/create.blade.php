@extends('adminlte::page')

@section('title', 'Create Article')

@section('content_header')
    <h1>Create Article</h1>
@stop

@section('content')
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <x-input name="title" label="Title" :value="old('title')" />
        <x-input name="slug" label="Slug" :value="old('slug')" />
        <x-ckeditor name="content" :value="old('content', $article->content ?? '')" />

        <x-input name="excerpt" label="Excerpt" :value="old('excerpt')" />
        <x-input name="image" label="Image URL" :value="old('image')" />
        <x-input name="category_id" type="select" label="Category" :options="$categories->pluck('name', 'id')" :value="old('category_id')" />
        <x-select2 name="tags" :options="$tags->pluck('name', 'id')" :selected="old('tags', isset($article) ? $article->tags->pluck('id')->toArray() : [])" />
        <x-input name="status" type="select" label="Status" :options="['draft' => 'Draft', 'published' => 'Published', 'archived']" :value="old('status')" />
        <div class="form-group">
            <input type="checkbox" name="is_featured" id="is_featured" {{ old('is_featured', $article->is_featured ?? false) ? 'checked' : '' }}>
            <label for="is_featured">Featured Article</label>
        </div>

        <button type="submit" class="btn btn-success">Create Article</button>
    </form>
@stop

@vite(['resources/js/app.js', 'resources/css/app.css'])

@push('js')
    <script>
        $(document).ready(function() {
            if (typeof CKEDITOR !== 'undefined' && document.querySelector('.ckeditor')) {
                CKEDITOR.replace('content');
            } else {
                console.log('CKEditor is not defined');
            }
        });
    </script>
@endpush

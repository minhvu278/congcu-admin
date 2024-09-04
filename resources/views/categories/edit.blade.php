@extends('adminlte::page')

@section('title', 'Edit Category')

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <x-input name="name" label="Category Name" :value="$category->name" />
        <x-input name="slug" label="Slug" :value="$category->slug" />

        <button type="submit" class="btn btn-warning">Update Category</button>
    </form>
@stop

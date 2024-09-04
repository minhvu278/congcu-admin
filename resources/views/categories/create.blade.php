@extends('adminlte::page')

@section('title', 'Create Category')

@section('content_header')
    <h1>Create Category</h1>
@stop

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <x-input name="name" label="Category Name" :value="old('name')" />
        <x-input name="slug" label="Slug" :value="old('slug')" />

        <button type="submit" class="btn btn-success">Create Category</button>
    </form>
@stop

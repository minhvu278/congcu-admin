@extends('adminlte::page')

@section('title', 'Create Tag')

@section('content_header')
    <h1>Create Tag</h1>
@stop

@section('content')
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <x-input name="name" label="Tag Name" :value="old('name')" />
        <x-input name="slug" label="Slug" :value="old('slug')" />

        <button type="submit" class="btn btn-success">Create Tag</button>
    </form>
@stop

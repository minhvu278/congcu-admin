@extends('adminlte::page')

@section('title', 'Edit Tag')

@section('content_header')
    <h1>Edit Tag</h1>
@stop

@section('content')
    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <x-input name="name" label="Tag Name" :value="$tag->name" />
        <x-input name="slug" label="Slug" :value="$tag->slug" />

        <button type="submit" class="btn btn-warning">Update Tag</button>
    </form>
@stop

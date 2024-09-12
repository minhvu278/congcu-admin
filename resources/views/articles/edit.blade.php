@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Edit Article</h1>
        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('articles.form', ['article' => $article])
            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>
@endsection

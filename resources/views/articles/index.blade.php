@extends('adminlte::page')

@section('title', 'Articles')

@section('content_header')
    <h1>Articles</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('articles.create') }}" class="btn btn-success mb-3">Add New Article</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>
                    @foreach($article->categories as $category)
                        {{ $category->name }}@if(!$loop->last), @endif
                    @endforeach
                </td>
                <td>{{ ucfirst($article->status) }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $articles->links() }}
    </div>
@stop

@section('js')
    <script>
        setTimeout(function() {
            $('.alert').alert('close');
        }, 3000);
    </script>
@stop

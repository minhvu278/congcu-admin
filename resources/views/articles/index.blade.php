@extends('adminlte::page')

@section('title', 'Articles')

@section('content_header')
    <h1>Articles</h1>
@stop

@section('content')
    @include('partials.alerts')
    <a href="{{ route('articles.create') }}" class="btn btn-success mb-3">Create Article</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Category</th>
            <th>Author</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->status }}</td>
                <td>{{ $article->category->name }}</td>
                <td>{{ $article->user->name }}</td>
                <td>
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" width="100">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $article->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
@endsection

@section('js')
    <script>
        setTimeout(function () {
            $('.alert').alert('close');
        }, 3000);
    </script>
@stop

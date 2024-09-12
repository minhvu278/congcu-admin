@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h1>Tags</h1>
@stop

@section('content')
    @include('partials.alerts')
    <a href="{{ route('tags.create') }}" class="btn btn-success mb-3">Add New Tag</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $index => $tag)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->slug }}</td>
                <td>
                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $tags->links() }}
    </div>
@stop

@section('js')
    <script>
        setTimeout(function() {
            $('.alert').alert('close');
        }, 3000);
    </script>
@stop

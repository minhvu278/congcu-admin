@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Add New Category</a>

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
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('js')
    <script>
        setTimeout(function() {
            $('.alert').alert('close');
        }, 3000);
    </script>
@stop

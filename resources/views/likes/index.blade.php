@extends('adminlte::page')

@section('title', 'Likes')

@section('content_header')
    <h1>Likes</h1>
@stop

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Reaction</th>
            <th>On (Article/Comment)</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($likes as $index => $like)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $like->user->name }}</td>
                <td>{{ $like->reactions }}</td>
                <td>{{ $like->likeable->title ?? $like->likeable->content }}</td>
                <td>
                    <form action="{{ route('likes.destroy', $like->id) }}" method="POST">
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
        {{ $likes->links() }}
    </div>
@endsection

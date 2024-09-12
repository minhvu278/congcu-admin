@extends('adminlte::page')

@section('title', 'News')

@section('content_header')
    <h1>News</h1>
@stop

@section('content')
    @include('partials.alerts')
    <a href="{{ route('news.create') }}" class="btn btn-success mb-3">Create News</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($news as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="News Image" width="100">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('news.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline;">
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
        {{ $news->links() }}
    </div>
@endsection

@section('js')
    <script>
        setTimeout(function () {
            $('.alert').alert('close');
        }, 3000);
    </script>
@stop


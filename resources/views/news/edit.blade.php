@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Edit News</h1>
        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('news.form')
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection

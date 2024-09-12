@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Create Article</h1>
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('articles.form')
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection

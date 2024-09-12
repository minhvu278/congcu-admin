@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Create News</h1>
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('news.form')
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection

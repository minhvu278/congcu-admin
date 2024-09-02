@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" name="role" id="role" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="author" {{ $user->role == 'author' ? 'selected' : '' }}>Author</option>
                <option value="subscriber" {{ $user->role == 'subscriber' ? 'selected' : '' }}>Subscriber</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update User</button>
    </form>
@stop

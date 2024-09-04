@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <x-input name="name" label="Name" :value="$user->name" />
        <x-input name="email" type="email" label="Email" :value="$user->email" />
        <x-input name="role" type="select" label="Role" :value="$user->role" :options="['admin' => 'Admin', 'author' => 'Author', 'subscriber' => 'Subscriber']" />

        <button type="submit" class="btn btn-warning">Update User</button>
    </form>
@stop

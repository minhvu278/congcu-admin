@extends('adminlte::page')

@section('title', 'Create User')

@section('content_header')
    <h1>Create User</h1>
@stop

@section('content')
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <x-input name="name" label="Name" :value="old('name')" />
        <x-input name="email" type="email" label="Email" :value="old('email')" />
        <x-input name="role" type="select" label="Role" :value="old('role')" :options="['admin' => 'Admin', 'author' => 'Author', 'subscriber' => 'Subscriber']" />
        <x-input name="password" type="password" label="Password" />

        <button type="submit" class="btn btn-success">Create User</button>
    </form>
@stop

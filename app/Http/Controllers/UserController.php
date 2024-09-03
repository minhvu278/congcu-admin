<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getPaginatedUsers();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $this->userService->createUser($request->validated());
            session()->flash('success', 'User created successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create user.');
        }

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $this->userService->updateUser($user, $request->validated());
            session()->flash('success', 'User updated successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update user.');
        }

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        try {
            $this->userService->deleteUser($user);
            session()->flash('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete user.');
        }

        return redirect()->route('users.index');
    }
}

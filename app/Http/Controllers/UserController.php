<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();

        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::all();

        return view('users.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        //
        $input = $request->validated();

        $user = new User(Arr::only($input, ['fname', 'lname', 'email', 'password']));
        $role = Role::findOrFail($input['role_id']);

        $role->users()->save($user);

        return redirect()->route('users.index')->with('success', 'User successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('users.show', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        $input = $request->validated();

        $user->update(Arr::only($input, ['fname', 'lname', 'email', 'password', 'role_id']));

        return redirect()->route('users.index')->with('success', 'User successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

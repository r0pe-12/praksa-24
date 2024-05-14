@extends('adminlte::page')
@section('plugins.Datatables', true)

@section('content_header')
    <div class="d-flex justify-content-between w-100">
        <h1>Users</h1>
        <a href="{{ route('users.create') }}">
            <button class="btn btn-primary">Create New User</button>
        </a>
    </div>
@endsection

@section('content')
    <table id="userdatatable" class="table table-striped table-bordered w-100">
        <thead>
        <tr>
            <th>Role</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.show', $user) }}" class="btn btn-outline-primary mx-2"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@extends('adminlte::page')
@section('plugins.Datatables', true)

@section('content_header')
    <div class="d-flex justify-content-between w-100">
        <h1>Posts</h1>
        <a href="{{ route('posts.create') }}">
            <button class="btn btn-primary">Create New Post</button>
        </a>
    </div>
@endsection

@section('content')
    <table id="userdatatable" class="table table-striped table-bordered w-100">
        <thead>
        <tr>
            <th>User</th>
            <th>Title</th>
            <th>Date</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->user->fname }} {{ $post->user->lname }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary mx-2"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

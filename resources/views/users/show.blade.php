@extends('adminlte::page')
@section('plugins.Datatables', true)

@section('content_header')
    <div class="d-flex justify-content-between w-100">
        <h1>Show user</h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab"
                               aria-controls="info" aria-selected="true">Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab"
                               aria-controls="settings" aria-selected="false">Edit user</a>
                        </li>
                    </ul>

                </div>
                <div class="card-body box-profile">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel"
                             aria-labelledby="info-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div
                                        class="d-flex align-items-center justify-content-center text-center h-100 mb-5">
                                        <div>
                                            <h2 class="h2 mt-2 font-weight-semibold">{{ $user->fname }} {{ $user->lname }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                                            <p class="text-muted">
                                                <a href="mailto:{{ $user->email }}"
                                                   class="link-primary"> {{$user->email}}
                                                </a>
                                            </p>

                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <form action="{{ route('users.update', $user) }}" method="post">
                                @method('PATCH')
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <x-adminlte-input label="{{ __('adminlte::adminlte.first_name') }}"
                                                          placeholder="{{ __('adminlte::adminlte.first_name') }}"
                                                          type="text"
                                                          value="{{ $user->fname }}"
                                                          name="fname" class="form-control" id="fname"/>
                                    </div>
                                    <div class="col-md-6">
                                        <x-adminlte-input label="{{ __('adminlte::adminlte.last_name') }}"
                                                          placeholder="{{ __('adminlte::adminlte.last_name') }}"
                                                          type="text"
                                                          value="{{ $user->lname }}"
                                                          name="lname" class="form-control" id="lname"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-adminlte-select2 name="role_id" label="Role"
                                                            data-placeholder="Choose role">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </x-slot>
                                            @foreach($roles as $role)
                                                <option
                                                    {{ $role->id === $user->role_id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>
                                    <div class="col-md-6">
                                        <x-adminlte-input label="{{ __('adminlte::adminlte.email') }}"
                                                          placeholder="{{ __('adminlte::adminlte.email') }}"
                                                          type="email"
                                                          value="{{ $user->email }}"
                                                          name="email" class="form-control" id="email"/>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

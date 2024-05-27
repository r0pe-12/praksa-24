@extends('adminlte::page')
@section('plugins.Datatables', true)

@section('content_header')
    <div class="d-flex justify-content-between w-100">
        <h1>New User</h1>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input enable-old-support label="{{ __('adminlte::adminlte.first_name') }}"
                                          placeholder="{{ __('adminlte::adminlte.first_name') }}" type="text"
                                          name="fname" class="form-control" id="fname"/>
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-input enable-old-support label="{{ __('adminlte::adminlte.last_name') }}"
                                          placeholder="{{ __('adminlte::adminlte.last_name') }}" type="text"
                                          name="lname" class="form-control" id="lname"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-select2 enable-old-support name="role_id" label="Role"
                                            data-placeholder="Choose role">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </x-slot>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-input enable-old-support label="{{ __('adminlte::adminlte.email') }}"
                                          placeholder="{{ __('adminlte::adminlte.email') }}" type="email"
                                          name="email" class="form-control" id="email"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input label="{{ __('adminlte::adminlte.password') }}"
                                          placeholder="{{ __('adminlte::adminlte.password') }}" type="password"
                                          name="password"
                                          class="form-control" id="password"/>
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-input label="{{ __('adminlte::adminlte.password') }}"
                                          placeholder="{{ __('adminlte::adminlte.password') }}" type="password"
                                          name="password_confirmation"
                                          class="form-control" id="password_confirmation"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

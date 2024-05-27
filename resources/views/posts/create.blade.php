@extends('adminlte::page')
@section('plugins.Select2', true)
@section('plugins.Summernote', true)

@section('content_header')
    <div class="d-flex justify-content-between w-100">
        <h1>New Post</h1>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input enable-old-support label="Title"
                                          placeholder="Title" type="text"
                                          name="title" class="form-control" id="title"/>
                    </div>
                    <div class="col-md-6">
                        @php
                            $config = [
                                "placeholder" => "Select post categories",
                                "allowClear" => true,
                            ];
                        @endphp
                        <x-adminlte-select2 id="sel2Category" name="category[]" label="Categories"
                                            :config="$config" multiple>
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-tag"></i>
                                </div>
                            </x-slot>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @php
                            $config = [
                                "height" => "100",
                                "toolbar" => [
                                    // [groupName, [list of button]]
                                    ['style', ['bold', 'italic', 'underline', 'clear']],
                                    ['font', ['strikethrough', 'superscript', 'subscript']],
                                    ['fontsize', ['fontsize']],
                                    ['color', ['color']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['height', ['height']],
                                    ['view', ['fullscreen', 'codeview', 'help']],
                                ],
                            ]
                        @endphp
                        <x-adminlte-text-editor name="description" label="Description"
                                                placeholder="Post description" :config="$config"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

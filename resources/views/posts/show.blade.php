@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Select2', true)
@section('plugins.Summernote', true)

@section('content_header')
    <div class="d-flex justify-content-between w-100">
        <h1>Show Post</h1>
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
                               aria-controls="settings" aria-selected="false">Edit post</a>
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
                                            <h2 class="h2 mt-2 font-weight-semibold">{{ $post->title  }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                                            <p class="text-muted">
                                                <a href="mailto:{{ $post->user->email }}"
                                                   class="link-primary"> {{$post->user->email}}
                                                </a>
                                            </p>

                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div
                                        class="d-flex align-items-start text-center h-100 mb-5">
                                        <div>
                                            <h2 class="h4 mt-2 font-weight-semibold">{!! $post->description !!}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <form action="{{ route('posts.update', $post) }}" method="post">
                                @method('PATCH')
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <x-adminlte-input enable-old-support label="Title"
                                                          placeholder="Title" type="text"
                                                          value="{{ $post->title }}"
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
                                                <option {{ $post->categories->contains($category) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
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
                                                ],
                                            ]
                                        @endphp
                                        <x-adminlte-text-editor name="description" label="Description"
                                                                placeholder="Post description" :config="$config">
                                            {{ $post->description }}
                                        </x-adminlte-text-editor>
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

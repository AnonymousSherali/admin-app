@extends('admin.layout.layout')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form name="cmsForm" id="cmsForm"
                                    @if (empty($CmsPages['id'])) action="{{ url('admin/add-edit-cms-page') }}" @else action="{{ url('admin/add-edit-cms-page/'. $CmsPages['id']) }}" @endif
                                    method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Title*</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Enter Page Title" @if (!empty($CmsPages['title'])) value="{{ $CmsPages['title'] }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="url">URL*</label>
                                            <input type="text" class="form-control" id="url" name="url"
                                                placeholder="Enter Page URL" @if (!empty($CmsPages['url'])) value="{{ $CmsPages['url'] }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description*</label>
                                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Description">@if (!empty($CmsPages['description'])) {{ $CmsPages['description'] }} @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_title">Meta Title</label>
                                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                                placeholder="Enter Meta Title" @if (!empty($CmsPages['meta_title'])) value="{{ $CmsPages['meta_title'] }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_description">Meta Description</label>
                                            <input type="text" class="form-control" id="meta_description"
                                                name="meta_description" placeholder="Enter Meta Description" @if (!empty($CmsPages['meta_description'])) value="{{ $CmsPages['meta_description'] }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords</label>
                                            <input type="text" class="form-control" id="meta_keywords"
                                                name="meta_keywords" placeholder="Enter Meta Keywords" @if (!empty($CmsPages['meta_keywords'])) value="{{ $CmsPages['meta_keywords'] }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">{{ $title }}</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

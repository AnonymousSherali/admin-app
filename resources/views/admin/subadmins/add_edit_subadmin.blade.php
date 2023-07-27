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

                                @if (Session::has('error_message'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error:</strong> {{ Session::get('error_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <form name="subadminForm" id="subadminForm"
                                    @if (empty($subadmindata['id'])) action="{{ url('admin/add-edit-subadmin') }}" @else action="{{ url('admin/add-edit-subadmin/' . $subadmindata['id']) }}" @endif
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name*</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Subadmin Name"
                                                @if (!empty($subadmindata['name'])) value="{{ $subadmindata['name'] }}" @endif>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="mobile">Mobile*</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile"
                                                placeholder="Enter Subadmin Mobile"
                                                @if (!empty($subadmindata['mobile'])) value="{{ $subadmindata['mobile'] }}" @endif>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input @if ($subadmindata['id'] != '') disabled="" @else required="" @endif
                                                type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter Subadmin Email"
                                                @if (!empty($subadmindata['email'])) value="{{ $subadmindata['email'] }}" @endif>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" id="password" name="password"
                                                placeholder="Enter Subadmin Password"
                                                @if (!empty($subadmindata['password'])) value="{{ $subadmindata['password'] }}" @endif>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                            @if (!empty($subadmindata['image']))
                                                <a href="{{ url('admin/images/photos/' . $subadmindata['image']) }}"
                                                    target="_blank">View Photo</a>
                                                <input type="hidden" name="current_image"
                                                    value="{{ $subadmindata['image'] }}">
                                            @endif
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

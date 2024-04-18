@extends('admin.layout')
@section('title')
    Dashboard
@endsection
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Starter Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 pb-3">
                        @include('admin.inc.errors')
                        <form action="{{ url('dashboard/admins/store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-4">


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Confirm password</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4 ">
                                        <div class="form-group">
                                            <label> Role
                                            </label>
                                            <select class="custom-select form-control" name="role_id">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="div d-flex justify-content-center row">

                                    <button type="submit" class="btn btn-primary col-4 m-3">Create</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger col-4 m-3">Back</a>
                                </div>
                            </div>



                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

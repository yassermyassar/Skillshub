@extends('admin.layout')
@section('title')
    Dashboard - Admins
@endsection
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Admins</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Admins</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">admin</h3>
                                <div class="card-tools">
                                    {{-- <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div> --}}
                                    <a href="{{ url('dashboard/admins/create') }}" class="btn btn-primary">
                                        Add Admin
                                    </a>


                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Verified</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->role->role }}</td>
                                                <td>
                                                    @if ($admin->email_verified_at !== null)
                                                        <span class="badge bg-success">yes</span>
                                                    @else
                                                        <span class="badge bg-danger">no</span>
                                                    @endif
                                                </td>

                                                <td>



                                                    @if ($admin->role->role == 'admin')
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ url("dashboard/admins/promote/$admin->id") }}"><i
                                                                class="fas fa-level-up-alt"></i></a>
                                                        <a class="btn btn-sm btn-secondary"><i
                                                                class="fas fa-toggle-on"></i></a>
                                                    @else
                                                        <a class="btn btn-sm btn-danger"
                                                            href="{{ url("dashboard/admins/demote/$admin->id") }}"><i
                                                                class="fas fa-level-down-alt"></i></a>
                                                        <a class="btn btn-sm btn-secondary"><i
                                                                class="fas fa-toggle-on"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>


                                </table>
                                <div class="d-flex justify-content-center my-2">

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

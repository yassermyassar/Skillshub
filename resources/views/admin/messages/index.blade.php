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
                        <h1 class="m-0 text-dark">Messages</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Messages</li>
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
                                <h3 class="card-title">Messages</h3>
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


                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Body</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($messages as $message)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->email }}</td>
                                                <td>{{ $message->subject ?? '...' }}</td>
                                                <td>{{ $message->body }}</td>


                                                <td>



                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ url("dashboard/messages/show/$message->id") }}"><i
                                                            class="fas fa-eye"></i></a>


                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>


                                </table>
                                {{-- <div class="d-flex justify-content-center my-2">
                                    {{ $messages->links() }}
                                </div> --}}

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

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
                            <li class="breadcrumb-item"><a class="link-secondary" href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a class="link-secondary"
                                    href="{{ url('dashboard/messages') }}">Messages</a></li>
                            <li class="breadcrumb-item active">Replay</li>
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
                                <h3 class="card-title">Replay</h3>
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

                                    <tbody>


                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $message->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $message->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Subject</th>
                                            <td>{{ $message->subject ?? '...' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Body</th>
                                            <td>{{ $message->body }}</td>
                                        </tr>





                                    </tbody>


                                </table>


                            </div>


                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Send Respond</h3>
                            </div>
                            <div class="card-body pb-3">
                                @include('admin.inc.errors')
                                <form action="{{ url("dashboard/messages/respond/$message->id") }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf






                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label>Body</label>
                                        <textarea rows="4" name="body" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Send Respond</button>
                                        <a class="btn btn-danger" href="{{ url()->previous() }}">Back</a>
                                    </div>




                                </form>


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

@extends('admin.layout')
@section('title')
    Dashboard - Score
@endsection
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Students</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/students') }}">Students</a></li>


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
                                <h3 class="card-title">Student Score</h3>
                                <div class="card-tools">






                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Exam</th>
                                            <th>Score</th>
                                            <th>Time mins.</th>
                                            <th>At</th>
                                            <th>Status</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->name('en') }}</td>
                                                <td>{{ $exam->pivot->score }}</td>
                                                <td>
                                                    {{ $exam->pivot->time_mins }}
                                                </td>
                                                <td>
                                                    {{ Carbon\Carbon::parse($exam->pivot->created_at)->format('d M, Y') }}

                                                </td>
                                                <td>{{ $exam->pivot->status }}</td>
                                                <td>



                                                    @if ($exam->pivot->status == 'closed')
                                                        <a href="{{ url("dashboard/students/open-exam/$exam->id/$students->id") }}"
                                                            class="btn btn-sm btn-secondary"><i
                                                                class="fas fa-lock-open"></i></a>
                                                    @else
                                                        <a href="{{ url("dashboard/students/close-exam/$exam->id/$students->id") }}"
                                                            class="btn btn-sm btn-danger"><i class="fas fa-lock"></i></a>
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

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
                        <h1 class="m-0 text-dark">Home</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">

                    <div class="col-lg-4 col-md-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ \App\Models\User::where('role_id', 3)->count() }}<sup style="font-size: 20px"></sup>
                                </h3>
                                <p>Students Number</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ url('dashboard/students') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ \App\Models\User::where('role_id', 2)->count() }}<sup style="font-size: 20px"></sup>
                                </h3>
                                <p>Admins Number</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ url('dashboard/admins') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ \App\Models\User::where('role_id', 1)->count() }}</h3>
                                <p>Super Admin</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <a href="{{ url('dashboard/admins') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                            <div class="info-box-content">
                                <a href="{{ url('dashboard/messages') }}" class="link-primary"><span
                                        class="info-box-text text-bg-info ">Messages</span></a>
                                <span class="info-box-number">{{ \App\Models\Message::count() }}</span>
                            </div>

                        </div>

                    </div>
                    <div class="col-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                            <div class="info-box-content">
                                <a href="{{ url('dashboard/categories') }}"> <span
                                        class="info-box-text">Categories</span></a>

                                <span class="info-box-number">{{ \App\Models\Cat::count() }}</span>
                            </div>

                        </div>

                    </div>
                    <div class="col-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
                            <div class="info-box-content">
                                <a href="{{ url('dashboard/skills') }}"> <span class="info-box-text">Skills</span></a>

                                <span class="info-box-number">{{ \App\Models\Skill::count() }}</span>
                            </div>

                        </div>

                    </div>
                    <div class="col-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                            <div class="info-box-content">
                                <a href="{{ url('dashboard/skills') }}"><span class="info-box-text">Exams</span></a>

                                <span class="info-box-number">{{ \App\Models\Exam::count() }}</span>
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

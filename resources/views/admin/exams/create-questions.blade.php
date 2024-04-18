@extends('admin.layout')
@section('title')
    Dashboard - Add Questions
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
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>
                            <li class="breadcrumb-item active">Add Exam: Step 2</li>
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
                        <form action="{{ url("dashboard/exams/$exam_id/questions/store") }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @include('admin.inc.errors')
                                @for ($i = 1; $i <= $question_no; $i++)
                                    <h5>Question {{ $i }}</h5>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" name="titles[]" class="form-control">
                                            </div>


                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Right Ans.</label>
                                                <input type="number" name="right_anss[]" class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">option 1</label>
                                                <input type="text" name="option_1s[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">option 2</label>
                                                <input type="text" name="option_2s[]" class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">option 3</label>
                                                <input type="text" name="option_3s[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">option 4</label>
                                                <input type="text" name="option_4s[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                                <button type="submit" class="btn btn-primary">Create Exam</button>
                            </div>
                        </form>
                    </div>



                </div>

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

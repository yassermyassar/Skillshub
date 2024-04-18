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
                        <h1 class="m-0 text-dark">Update Exam Questions</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>
                            <li class="breadcrumb-item "><a
                                    href="{{ url("dashboard/exams/$exam->id") }}">{{ $exam->name('en') }}</a></li>
                            <li class="breadcrumb-item "><a href="{{ url("dashboard/exams/show/$exam->id") }}">Exam
                                    Questions</a></li>

                            <li class="breadcrumb-item"><a></a>Update Exam
                                Question</li>
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
                        <form action="{{ url("dashboard/exams/edit/$exam->id/$question->id") }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @include('admin.inc.errors')
                                @for ($i = 1; $i < $exam->question_no; $i++)
                                    <h5>Question {{ $i }}</h5>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" name="title" value="{{ $question->title }}" va
                                                    class="form-control">
                                            </div>


                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Right Ans.</label>
                                                <input type="number" value="{{ $question->right_ans }}" name="right_ans"
                                                    class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">option 1</label>
                                                <input type="text" value="{{ $question->option_1 }}" name="option_1"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">option 2</label>
                                                <input type="text" value="{{ $question->option_2 }}" name="option_2"
                                                    class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">option 3</label>
                                                <input type="text" value="{{ $question->option_3 }}" name="option_3"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">option 4</label>
                                                <input type="text" value="{{ $question->option_4 }}" name="option_4"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                                <button type="submit" class="btn btn-primary">Update Questions</button>
                            </div>
                        </form>
                    </div>



                </div>

            </div>


        </div>
    </div>

    <!-- /.container-fluid -->

    <!-- /.content -->

    <!-- /.content-wrapper -->
@endsection

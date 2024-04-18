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
                        <h1 class="m-0 text-dark">Create Exam</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Exam</li>
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
                        <form action="{{ url('dashboard/exams/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name(en)</label>
                                            <input type="text" name="name_en" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Name(ar)</label>
                                            <input type="text" name="name_ar" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description (en)</label>
                                    <input type="text" name="desc_en" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description (ar)</label>
                                    <input type="text" name="desc_ar" class="form-control">
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Skills
                                            </label>
                                            <select class="custom-select form-control" name="skill_id">
                                                @foreach ($skills as $skill)
                                                    <option value="{{ $skill->id }}">{{ $skill->name('en') }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label> Image
                                            </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="img">
                                                    <label class="custom-file-label">Choose
                                                        file</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Question_no.</label>
                                                <input type="text" name="question_no" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Difficulty</label>
                                                <input type="number" name="difficulty" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Duration mins.</label>
                                                <input type="number" name="duration" class="form-control">
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                            <a class="btn btn-danger" href="{{ url()->previous() }}">Back</a>
                                        </div>
                                    </div>
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

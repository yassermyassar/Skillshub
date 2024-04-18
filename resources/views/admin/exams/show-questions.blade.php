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
                        <h1 class="m-0 text-dark">Exam Question</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}"></a>Exams</li>
                            <li class="breadcrumb-item active">{{ $exam->name('en') }}</li>

                            <li class="breadcrumb-item"><a href="{{ url("dashboard/exams/show/$exam->id") }}"></a>Exam
                                Question</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Options</th>
                        <th>Right Ans.</th>

                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($exam->questions as $question)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $question->title }}</td>
                            <td>
                                {{ $question->option_1 }} <br> |
                                {{ $question->option_2 }} <br> |
                                {{ $question->option_3 }} <br> |
                                {{ $question->option_4 }} <br> |

                            </td>
                            <td>{{ $question->right_ans }}</td>

                            <td>
                                <a href="{{ url("dashboard/exams/edit/$exam->id/$question->id") }}"
                                    class="btn btn-sm btn-info ">
                                    <i class="fas fa-edit"></i> </a>



                                {{-- <a href="{{ url("dashboard/skills/delete/$skill->id") }}" class="btn btn-sm btn-danger"><i
                                        class="fas fa-trash"></i></a>
                                <a href="{{ url("dashboard/skills/toggle/$skill->id") }}"
                                    class="btn btn-sm btn-secondary"><i class="fas fa-toggle-on"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach


                </tbody>


            </table>


        </div>
        <a href="{{ url('dashboard/exams') }}" class="btn ml-4 btn-sm btn-danger">
            Back To Exams</a>
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Back</a>
    </div>
    <!-- /.content-wrapper -->
@endsection

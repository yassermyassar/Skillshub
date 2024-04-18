@extends('admin.layout')

@section('title')
    Dashboard - Exams
@endsection


@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Exams</h1>
                        @include('admin.inc.errors')
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Exams</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @include('admin.inc.messages')
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Exams</h3>
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
                                    <a href="{{ url('dashboard/exams/create') }}" class="btn btn-primary">
                                        Add Exam
                                    </a>


                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name(en)</th>
                                            <th>Name(ar)</th>
                                            <th>Skill</th>
                                            <th>Ques no.</th>
                                            <th>image</th>
                                            <th>Active</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $exam->name('en') }}</td>
                                                <td>{{ $exam->name('ar') }}</td>
                                                <td>{{ $exam->skill->name('en') }}</td>
                                                <td>{{ $exam->question_no }}</td>
                                                <td><img src="{{ asset("uploads/$exam->img") }}" height="40px"</td>
                                                <td>
                                                    @if ($exam->active)
                                                        <span class="badge bg-success">yes</span>
                                                    @else
                                                        <span class="badge bg-danger">no</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url("dashboard/exams/show/$exam->id") }}"
                                                        class="btn btn-sm btn-success ">
                                                        <i class="fas fa-eye"></i> </a>


                                                    <a href="{{ url("dashboard/exams/show/$exam->id/questions") }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-question"></i> </a>
                                                    <a href="{{ url("dashboard/exams/edit/$exam->id") }}"
                                                        class="btn btn-sm btn-info edit-btn">
                                                        <i class="fas fa-edit"></i> </a>



                                                    <a href="{{ url("dashboard/exams/delete/$exam->id") }}"
                                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                    <a href="{{ url("dashboard/exams/toggle/$exam->id") }}"
                                                        class="btn btn-sm btn-secondary"><i
                                                            class="fas fa-toggle-on"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>


                                </table>
                                <div class="d-flex justify-content-center my-2">
                                    {{ $exams->links() }}
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
    {{-- <div class="modal fade" id="modal-add" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('admin.inc.errors')
                    <form method="POST" id="form-add" action="{{ url('dashboard/skills/store') }}"
                        enctype="multipart/form-data">
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
                            <div class="row">
                                <div class="col-4 ">
                                    <div class="form-group">
                                        <label> Categories
                                        </label>
                                        <select class="custom-select form-control" name="cat_id">
                                            @foreach ($cats as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name('en') }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="col-8">
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




                            </div>


                        </div>


                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" form="form-add" class="btn btn-primary">Save changes</button>
                </div>
            </div>

        </div>

    </div> --}}


    {{-- <div class="modal fade" id="modal-ssadd" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('admin.inc.errors')
                    <form method="POST" id="form-add" action="{{ url('dashboard/skills/store') }}"
                        enctype="multipart/form-data">
                        @csrf

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
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label> Image
                                    </label>
                                    <select class="custom-select form-control" name="cat_id">
                                        @foreach ($cats as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="img">
                                            <label class="custom-file-label">Choose
                                                file</label>
                                        </div>

                                    </div>
                                </div>
                            </div>




                        </div>


                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" form="form-add" class="btn btn-primary">Save changes</button>
                </div>
            </div>

        </div>

    </div> --}}

    {{-- <div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form-edit" action="{{ url('dashboard/skills/update') }}">
                        @csrf
                        <input type="hidden" name="id" id="form-edit-id">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name(en)</label>
                                    <input type="text" name="name_en" id="form-edit-name-en" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name(ar)</label>
                                    <input type="text" name="name_ar" id="form-edit-name-ar" class="form-control">
                                </div>
                            </div>




                        </div>

                        <div class="row">
                            <div class="col-4 ">
                                <div class="form-group">
                                    <label> Categories
                                    </label>
                                    <select class="custom-select form-control" name="cat_id" id="form-edit-cat-id">
                                        @foreach ($cats as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name('en') }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label> Image
                                    </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="img"
                                                id="form-edit-img">
                                            <label class="custom-file-label">Choose
                                                file</label>
                                        </div>

                                    </div>
                                </div>
                            </div>




                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" form="form-edit" class="btn btn-primary">Save changes</button>
                </div>
            </div>

        </div>

    </div> --}}
@endsection
@section('scripts')
    <script>
        $('.edit-btn').click(function() {
            let id = $(this).attr('data-id')
            let catId = $(this).attr('data-cat-id')
            let nameEn = $(this).attr('data-name-en')
            let nameAr = $(this).attr('data-name-ar')
            let img = $(this).attr('data-img')
            console.log(id, nameAr, nameEn, img, catId)
            $('#form-edit-id').val(id)
            $('#form-edit-cat-id').val(catId)
            $('#form-edit-name-en').val(nameEn)
            $('#form-edit-name-ar').val(nameAr)
            $('#form-edit-img').val(img)

        })
    </script>
@endsection

@extends('admin.layout')
@section('title')
    Categories
@endsection
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Categories</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
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
                                <h3 class="card-title">All Categories</h3>
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-add">
                                        Add Category
                                    </button>


                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name(En)</th>
                                            <th>Name(Ar)</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($cats as $cat)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $cat->name('en') }}</td>
                                                <td>{{ $cat->name('ar') }}</td>
                                                <td>
                                                    @if ($cat->active)
                                                        <span class="badge bg-success">yes</span>
                                                    @else
                                                        <span class="badge bg-danger">no</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info edit-btn"
                                                        data-toggle="modal" data-id="{{ $cat->id }}"
                                                        data-name-en="{{ $cat->name('en') }}"
                                                        data-name-ar="{{ $cat->name('ar') }}" data-toggle="modal"
                                                        data-target="#modal-edit">
                                                        <i class="fas fa-edit"></i> </button>



                                                    <a href="{{ url("dashboard/categories/delete/$cat->id") }}"
                                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                    <a href="{{ url("dashboard/categories/toggle/$cat->id") }}"
                                                        class="btn btn-sm btn-secondary"><i
                                                            class="fas fa-toggle-on"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>


                                </table>
                                <div class="d-flex justify-content-center my-2">
                                    {{ $cats->links() }}
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


    <div class="modal fade" id="modal-add" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form-add" action="{{ url('dashboard/categories/store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name(en)</label>
                                <input type="text" name="name_en" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name(ar)</label>
                                <input type="text" name="name_ar" class="form-control">
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

    </div>

    <div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form-edit" action="{{ url('dashboard/categories/update') }}">
                        @csrf
                        <input type="hidden" name="id" id="form-edit-id">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name(en)</label>
                                <input type="text" name="name_en" id="form-edit-name-en" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name(ar)</label>
                                <input type="text" name="name_ar" id="form-edit-name-ar" "
                                                                                                                        class="form-control">
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

                                                                                        </div>
@endsection
@section('scripts')
    <script>
        $('.edit-btn').click(function() {
            let id = $(this).attr('data-id')
            let nameEn = $(this).attr('data-name-en')
            let nameAr = $(this).attr('data-name-ar')
            console.log(id, nameAr, nameEn)
            $('#form-edit-id').val(id)
            $('#form-edit-name-en').val(nameEn)
            $('#form-edit-name-ar').val(nameAr)
        })
    </script>
@endsection

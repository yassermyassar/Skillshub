@extends('web.layout')

@section('title')
    Show skill : {{ $skill->name('en') }}
@endsection
@section('main')
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('img/page-background.jpg') }})"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url("/categories/show/$skill->cat_id") }}">{{ $skill->cat->name() }}</a></li>
                        <li>{{ $skill->name() }}</li>
                    </ul>
                    <h1 class="white-text">{{ $skill->name() }}</h1>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Blog -->
    <div id="blog" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- main blog -->
                <div id="main" class="col-md-12">

                    <!-- row -->
                    <div class="row">


                        <!-- single exam -->

                        @foreach ($skill->exams as $exam)
                            <div class="col-md-6 ">
                                <div class="single-blog">
                                    <div class="blog-img">

                                        <a href="{{ url("exam/show/$exam->id") }}">
                                            <img src="{{ asset("uploads/$exam->img") }}" width="300px" height="400px"
                                                alt="">
                                        </a>
                                    </div>
                                    <h4><a href="{{ url('exam/show/$exam->id') }}">{{ $exam->name() }}</a></h4>
                                    <div class="blog-meta">
                                        <span>{{ Carbon\Carbon::parse($exam->created_at)->format('d M, Y') }}</span>
                                        <div class="pull-right">
                                            <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i>
                                                    {{ $exam->users->count() }}</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- /single exam -->

                </div>
                <!-- /row -->

                <!-- row -->

                <!-- /row -->
            </div>
            <!-- /main blog -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

    </div>
    <!-- /Blog -->
@endsection

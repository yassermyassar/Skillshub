@extends('web.layout')

@section('title')
    Home
@endsection
@section('main')
    <!-- Home -->
    <div id="home" class="hero-area">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('img/home-background.jpg') }})"></div>
        <!-- /Backgound Image -->

        <div class="home-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="white-text">@lang('web.bigtitle')</h1>
                        <p class="lead white-text">@lang('web.secondTitle')</p>
                        <a class="main-button icon-button" href="#">@lang('web.startbutton')</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Home -->

    <!-- Courses -->
    <div id="courses" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">
                <div class="section-header text-center">
                    <h2>@lang('web.sectiontitle')</h2>
                    <p class="lead">@lang('web.sectiontext')</p>
                </div>
            </div>
            <!-- /row -->

            <!-- courses -->
            <div id="courses-wrapper">

                <!-- row -->
                <div class="row">

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('uploads/exams/exam1.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="{{ url('categories') }}">@lang('web.exam1title')</a>
                            <div class="course-details">
                                <span class="course-category">@lang('web.design')</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('uploads/exams/exam2.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">@lang('web.exam2title') </a>
                            <div class="course-details">
                                <span class="course-category">@lang('web.programming')</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('uploads/exams/exam3.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">@lang('web.exam3title')</a>
                            <div class="course-details">
                                <span class="course-category">@lang('web.drawing')</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('uploads/exams/exam4.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">@lang('web.exam4title')</a>
                            <div class="course-details">
                                <span class="course-category">@lang('web.webdevelopment')</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                </div>
                <!-- /row -->

                <!-- row -->
                <div class="row">

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('uploads/exams/exam5.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">@lang('web.exam5title')</a>
                            <div class="course-details">
                                <span class="course-category">@lang('web.webdevelopment')</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('uploads/exams/exam6.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">@lang('web.exam6title')</a>
                            <div class="course-details">
                                <span class="course-category">@lang('web.programming')</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('uploads/exams/exam7.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">@lang('web.exam7title')</a>
                            <div class="course-details">
                                <span class="course-category">@lang('web.photography')</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->


                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset('uploads/exams/exam8.jpg') }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">@lang('web.exam8title')</a>
                            <div class="course-details">
                                <span class="course-category">@lang('web.typography')</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                </div>
                <!-- /row -->

            </div>
            <!-- /courses -->

            <div class="row">
                <div class="center-btn">
                    <a class="main-button icon-button" href="#">@lang('web.morecourses')</a>
                </div>
            </div>

        </div>
        <!-- container -->

    </div>
    <!-- /Courses -->



    <!-- Contact CTA -->
    <div id="contact-cta" class="section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('img/cta.jpg') }})"></div>
        <!-- Backgound Image -->

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2 class="white-text">@lang('web.contact')</h2>
                    <p class="lead white-text">@lang('web.contacttitle')</p>
                    <a class="main-button icon-button" href="contact.html">@lang('web.contactbutton')</a>
                </div>

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact CTA -->

    <!-- Footer -->
@endsection

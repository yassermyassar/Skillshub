@extends('web/layout')
@section('main')
    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="{{ url('/') }}">{{ __('web.home') }}</a></li>
                        <li>{{ __('web.signup') }}</li>
                    </ul>
                    <h1 class="white-text">{{ __('web.signword') }}</h1>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- login form -->
                <div class="col-md-6 col-md-offset-3">
                    <div class="contact-form">
                        <h4>{{ __('web.signup') }}</h4>
                        <form method="post" action="/register">
                            @csrf
                            <input class="input" type="text" name="name" placeholder="{{ __('web.name') }}">
                            <input class="input" type="email" name="email" placeholder="{{ __('web.email') }}">
                            <input class="input" type="password" name="password" placeholder="{{ __('web.password') }}">
                            <input class="input" type="password" name="password_confirmation"
                                placeholder="{{ __('web.confirm-password') }}">
                            <button type="submit"
                                class="main-button icon-button pull-right">{{ __('web.signup') }}</button>
                        </form>
                    </div>
                </div>
                <!-- /login form -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact -->
@endsection

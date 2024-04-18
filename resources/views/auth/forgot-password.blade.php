@extends('web/layout')
@section('title')
    Login
@endsection
@section('main')
    <!-- Hero-area -->


    <!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- login form -->
                <div class="col-md-6 col-md-offset-3">
                    <div class="contact-form">
                        <h4>{{ __('web.forgotpassword') }}</h4>
                        @include('web.inc.messages')
                        <form method="POST" action="/forgot-password">
                            @csrf
                            <input class="input" type="email" name="email" placeholder="{{ __('web.email') }}">

                            <br>
                            <button type="submit" class="main-button icon-button pull-right">
                                {{ __('web.signin') }}</button>
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

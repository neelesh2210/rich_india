@extends('frontend.layouts.app')
@section('content')
    <div class="page-banner-area">
        <div class="container">
            <div class="page-banner-content">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <h2>Login to The Success Preneur</h2>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <ul>
                            <li> <a href="/">Home</a></li>
                            <li>Login to  The Success Preneur</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="login-area ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6 d-lg-block d-md-block d-none">
                    <img class="signIn__desktop" src="{{ asset('frontend/images/login.png') }}">
                </div>
                <div class="col-md-6 col-xs-12 m-auto">
                    <div class="login-form">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="row">
                                @if ($errors->has('error'))
                                    <div class="text-danger">{{ $errors->first('error') }}</div>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Enter Email Id</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email Id" />
                                        @if ($errors->has('email'))
                                            <div class="text-danger lbl_msg">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control" name="password" id="password"
                                                value="" placeholder="Enter Password..." autocomplete="new-password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($errors->has('password'))
                                            <div class="text-danger lbl_msg">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                                        <p>
                                            <input type="checkbox" id="test1">
                                            <label for="test1">Remember me</label>
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password-wrap">
                                        <a href="{{ route('forgot.password') }}" class="lost-your-password">Forgot your
                                            password ?</a>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="send-btn text-center mb-3">
                                        <button type="submit" class="default-btn disabled">Submit <i
                                                class="ri-arrow-right-line"></i></button>
                                    </div>
                                </div>
                                {{-- <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="account-text">
                                    <p>Don’t have an account? <a href="{{route('signup')}}">Register now</a></p>
                                </div>
                            </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });
    </script>
@endsection

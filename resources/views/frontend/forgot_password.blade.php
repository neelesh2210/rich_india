@extends('frontend.layouts.app')
@section('content')
<div class="main-wrapper log-wrap login-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-lg-auto">
                <div class="login-box">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="login-left">
                                <img src="{{ asset('frontend/images/forgate-password.png') }}" alt="Alternate Text" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="login-wrapper">
                                <div class="loginbox">
                                    <div class="w-100">
                                        <h1 class="gordita-bold">Forgot Password</h1>
                                        <form action="{{route('send.mail.forgot.password')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                @if($errors->has('error'))
                                                    <div class="text-danger">{{ $errors->first('error') }}</div>
                                                @endif
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Enter Email Id</label>
                                                        <input type="email" name="email" class="form-control" placeholder="Email Id" />
                                                        @if($errors->has('email'))
                                                        <div class="text-danger lbl_msg">{{ $errors->first('email') }}</div>
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="fpsw-sec">
                                                    <div class="forgot">
                                                        <span><a href="{{route('signin')}}" class="forgot-link">Login To RichIND</a></span>
                                                    </div>
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary btn-start w-100">Submit <i class="ri-arrow-right-line"></i></button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('frontend.layouts.app')
@section('content')

<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <h2>Forgot Password</h2>
                </div>
                <div class="col-lg-5 col-md-6">
                    <ul>
                        <li> <a href="/">Home</a></li>
                        <li>Forgot Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="login-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-6">
                <img class="signIn__desktop" src="{{ asset('frontend/images/forgate-password.png') }}">
            </div>
            <div class="col-md-6 col-xs-12 m-auto">
                <div class="login-form">
                    <form action="{{route('send.mail.forgot.password')}}" method="POST">
                        @csrf
                        <div class="row">
                            @if($errors->has('error'))
                                <div class="text-danger">{{ $errors->first('error') }}</div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Enter Email Id</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email Id" />
                                    @if($errors->has('email'))
                                    <div class="text-danger lbl_msg">{{ $errors->first('email') }}</div>
                                @endif
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password-wrap">
                                    <a href="{{route('signin')}}" class="lost-your-password">Login To RichIND</a>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="send-btn text-center mb-3">
                                    <button type="submit" class="default-btn disabled">Submit <i class="ri-arrow-right-line"></i></button>
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
@endsection

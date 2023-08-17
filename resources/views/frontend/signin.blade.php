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
                                <img src="{{asset('frontend/assets/images/Login.webp')}}" alt="Alternate Text" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="login-wrapper">
                                <div class="loginbox">
                                    <div class="w-100">
                                        <h1 class="gordita-bold">Login To Richind</h1>
                                        <span class="animate-border" style="margin-bottom: 12px;"></span>
                                        <form action="{{ route('login') }}" method="POST">
                                            @csrf
                                       @if ($errors->has('error'))
                                            <div class="text-danger">{{ $errors->first('error') }}</div>
                                        @endif
                                            <div>
                                                <div class="form-group">
                                                    <label class="form-control-label">Email Address</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Email Id" />
                                                    @if ($errors->has('email'))
                                                        <div class="text-danger lbl_msg">{{ $errors->first('email') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label">Password</label>
                                                    <input type="password" class="form-control" name="password" id="password"
                                                    value="" placeholder="Enter your Password" autocomplete="new-password">
                                                    @if ($errors->has('password'))
                                                    <div class="text-danger lbl_msg">{{ $errors->first('password') }}</div>
                                                     @endif
                                                </div>
                                            </div>
                                            <div class="fpsw-sec d-flex">
                                                <div class="forgot">
                                                    <span>
                                                        <a class="forgot-link" href="{{ route('forgot.password') }}">Forgot Password?</a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-grid">
                                                <input type="submit" value="Proceed" class="btn btn-primary btn-start" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="google-bg text-center">
                                    <p class="mb-0">New User? <a href="#">Create an Account</a></p>
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

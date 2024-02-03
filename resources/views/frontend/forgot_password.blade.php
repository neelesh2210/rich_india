@extends('frontend.layouts.app')
@section('content')
    <!-- <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div>
        <div class="page-header__overlay"></div>
        <div class="container text-center">
            <h2 class="page-header__title">Forgot Password</h2>
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><span>Forgot Password</span></li>
            </ul>
        </div>
    </section> -->
    <section class="login-page">
        <div class="container">
            <div class="login-page__area">
                <div class="row">
                    <div class="col-lg-6 wow fadeInUp animated" data-wow-delay="400ms">
                        <div class="login-page__wrap login-page__wrap--right">
                            <img src="{{ asset('frontend/assets/images/reset-password.jpg') }}" alt="Alternate Text"
                                class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp animated" data-wow-delay="300ms">
                        <div class="login-page__wrap">
                            <h3 class="login-page__wrap__title">Forgot Password</h3>
                            <form action="{{ route('send.mail.forgot.password') }}" method="POST"  class="login-page__form">
                                @csrf
                                    @if ($errors->has('error'))
                                        <div class="text-danger">{{ $errors->first('error') }}</div>
                                    @endif
                                    <div>
                                        <div class="login-page__form-input-box">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email Id" />
                                            @if ($errors->has('email'))
                                                <div class="text-danger lbl_msg">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                        @if (Session::has('success'))
                                            <div class="alert alert-success" role="alert">{{ Session::get('success') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="fpsw-sec">
                                        <div class="login-page__forgot-password m-0">
                                            <span class="text-right"><a href="{{ route('signin') }}" class="forgot-link">Login To
                                                    RichIND</a></span>
                                        </div>
                                        <div class="d-grid mt-2">
                                            <button type="submit" class="richind-btn richind-btn-second w-100"><span
                                                    class="richind-btn__curve"></span>Submit</button>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="account-text">
                                                        <p>Don’t have an account? <a href="{{route('signup')}}">Register now</a></p>
                                                    </div>
                                                </div> --}}

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

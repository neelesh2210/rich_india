@extends('frontend.layouts.app')
@section('content')
     <!-- breadcrumb-area -->
     <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('frontend/assets/img/bg/breadcrumb_bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Forgot</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{route('index')}}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Forgot</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape-wrap">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape01.svg')}}" alt="img" class="alltuchtopdown">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape02.svg')}}" alt="img" data-aos="fade-right" data-aos-delay="300">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape03.svg')}}" alt="img" data-aos="fade-up" data-aos-delay="400">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape04.svg')}}" alt="img" data-aos="fade-down-left" data-aos-delay="400">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape05.svg')}}" alt="img" data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>
    <!-- breadcrumb-area-end -->

        <!-- Forget-area -->
        <section class="singUp-area section-py-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="singUp-wrap">
                            <h2 class="title text-center">Welcome RichInd!</h2>
                            <p class="text-center">Forgot Password!</p>
                            <form action="{{ route('send.mail.forgot.password') }}" method="POST"  class="account__form">
                                @csrf
                                    @if ($errors->has('error'))
                                        <div class="text-danger">{{ $errors->first('error') }}</div>
                                    @endif
                                    <div>
                                        <div class="form-grp">
                                            <input type="email" name="email" placeholder="Email Id" />
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
                                            <span class="text-right"><a href="{{ route('index') }}" class="forgot-link">Login To
                                                    RichIND</a></span>
                                        </div>
                                        <div class="d-grid mt-2">
                                            <button type="submit" class="btn btn-two arrow-btn w-100"><span
                                                    class="richind-btn__curve"></span>Submit</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Forget-area-end -->

@endsection

@extends('frontend.layouts.app')
@section('content')
     <!-- breadcrumb-area -->
     <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('frontend/assets/img/bg/breadcrumb_bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Login</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{route('index')}}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Login</span>
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

    <!-- singUp-area -->
    <section class="singUp-area section-py-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="singUp-wrap">
                        <h2 class="title text-center">Welcome back!</h2>
                        <p class="text-center">Hey there! Ready to log in? Just enter your username and password below and you'll be back in action in no time. Let's go!</p>
                        <form action="{{ route('login') }}" method="POST" class="account__form" id="login-form">
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
                                <div class="form-grp">
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" name="password" id="password"
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
                                {{-- <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                    value="" placeholder="Enter your Password" autocomplete="new-password">
                                    @if ($errors->has('password'))
                                    <div class="text-danger lbl_msg">{{ $errors->first('password') }}</div>
                                     @endif
                                </div> --}}
                            </div>
                            <div class="account__check">
                                <div class="account__check-remember">
                                    <input type="checkbox" name="save-data" class="form-check-input" id="save-data">
                                    <label for="save-data" class="form-check-label">Remember me</label>
                                </div>
                                <div class="account__check-forgot">
                                    <a href="{{ route('forgot.password') }}">Forgot Password?</a>
                                </div>
                            </div>
                            <button type="button" id="login_button_id" class="btn btn-two arrow-btn w-100" onclick="submitLoginForm()"><span class="richind-btn__curve"></span>Login <i class="icon-arrow"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- singUp-area-end -->


    @push('js')
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

        function submitLoginForm(){
            $('#login_button_id').attr('disabled',true);
            $('#login-form').submit();
        }
    </script>
@endpush
@endsection

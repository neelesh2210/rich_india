@extends('frontend.layouts.app')
@section('content')
    <!-- <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div>
        <div class="page-header__overlay"></div>
        <div class="container text-center">
            <h2 class="page-header__title">Login</h2>
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="{{route('index')}}">Home</a></li>
                <li><span>Login</span></li>
            </ul>
        </div>
    </section> -->
    <section class="login-page">
        <div class="container">
            <div class="login-page__area">
                <div class="row">
                    <div class="col-lg-6 wow fadeInUp animated" data-wow-delay="400ms">
                        <div class="login-page__wrap login-page__wrap--right">
                            <img src="{{ asset('frontend/assets/images/Login.webp') }}" alt="Alternate Text" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp animated" data-wow-delay="300ms">
                        <div class="login-page__wrap">
                            <h3 class="login-page__wrap__title">Login</h3>
                            <form action="{{ route('login') }}" method="POST" class="login-page__form" id="login-form">
                                @csrf
                                @if ($errors->has('error'))
                                    <div class="text-danger">{{ $errors->first('error') }}</div>
                                @endif
                                <div>
                                    <div class="login-page__form-input-box">
                                        <input type="email" name="email" class="form-control" placeholder="Email Id" />
                                        @if ($errors->has('email'))
                                            <div class="text-danger lbl_msg">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="login-page__form-input-box">
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
                                    {{-- <div class="form-group">
                                        <label class="form-control-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                        value="" placeholder="Enter your Password" autocomplete="new-password">
                                        @if ($errors->has('password'))
                                        <div class="text-danger lbl_msg">{{ $errors->first('password') }}</div>
                                         @endif
                                    </div> --}}
                                </div>
                                <div class="login-page__checked-box">
                                    <input type="checkbox" name="save-data" id="save-data">
                                    <label for="save-data"><span></span>Remember Me?</label>
                                    <div class="login-page__forgot-password">
                                        <a href="{{ route('forgot.password') }}">Forgot Passowrd?</a>
                                    </div>
                                </div>
                                <button type="button" id="login_button_id" class="richind-btn richind-btn-second w-100" onclick="submitLoginForm()"><span class="richind-btn__curve"></span>Login <i class="icon-arrow"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

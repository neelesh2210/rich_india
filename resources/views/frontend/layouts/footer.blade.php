@php
    $whatsapp = websiteData('whatsapp');
    $email = websiteData('email');
    $facebook = socialMediaLink('facebook');
    $linkedin = socialMediaLink('linkedin');
    $instagram = socialMediaLink('instagram');
    $youtube = socialMediaLink('youtube');
    $address = websiteData('address');
@endphp
<footer class="main-footer">
    <div class="main-footer__bg" style="background-image: url({{ asset('frontend/assets/images/shapes/footer-bg-1.png') }});"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-5 wow fadeInUp" data-wow-delay="100ms">
                <div class="main-footer__about">
                    <a href="{{ route('index') }}" class="main-footer__logo">
                        <img src="{{ asset('frontend/assets/images/logo-light.png') }}" alt="richind" width="213" height="55">
                    </a>
                    <p class="main-footer__about__text">Richind is a E -learning plateform . this plateform helps people to make own personal brand on social media and create passive income.</p>
                    <div class="main-footer__social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6 col-md-4 wow fadeInUp" data-wow-delay="200ms">
                <div class="main-footer__navmenu main-footer__widget01">
                    <h3 class="main-footer__title">Important Links</h3>
                    <ul>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('term_and_condition') }}">Term and Conditions</a></li>
                        <li><a href="{{ route('cancel_and_refund_policy') }}">Cancelation and Refund</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-6 col-md-3 wow fadeInUp" data-wow-delay="300ms">
                <div class="main-footer__navmenu main-footer__widget02">
                    <h3 class="main-footer__title">Quick Links</h3>
                    <ul>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('course') }}">Our Courses</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('index') }}">Login / Signup</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-md-5 wow fadeInUp" data-wow-delay="400ms">
                <div class="main-footer__newsletter">
                    <h3 class="main-footer__title">Contact Us</h3>
                    <ul class="main-footer__info-list">
                        <li><span class="icon-Location"></span>{{ $address }}</li>
                        <li><span class="icon-Telephone"></span><a href="tel:+91-{{ $whatsapp }}">+91-{{ $whatsapp }}</a></li>
                        <li><span class="icon-Email"></span><a href="mailto:{{ $email }}">{{ $email }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<section class="copyright text-center">
    <div class="container wow fadeInUp" data-wow-delay="400ms">
        <p class="copyright__text">©<span class="dynamic-year"></span>Richind. All Rights Reserved. Design & Developed By <a href="https://techuptechnologies.com/affiliate-marketing-website-development-company/" target="_blank">Techup Technologies.</a></p>
    </div>
</section>

<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
        <div class="logo-box">
            <a href="index.html" aria-label="logo image"><img src="{{ asset('frontend/assets/images/logo-light.png') }}" width="183" height="48" alt="richind" /></a>
        </div>
        <div class="mobile-nav__container"></div>
        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fas fa-envelope"></i>
                <a href="mailto:{{ $email }}">{{ $email }}</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:+91-{{ $whatsapp }}">+91-{{ $whatsapp }}</a>
            </li>
        </ul>
        <div class="mobile-nav__social">
            <a href="{{ $facebook }}"><i class="fab fa-facebook-f"></i></a>
            <a href="{{ $linkedin }}"><i class="fab fa-linkedin-in"></i></a>
            <a href="{{ $instagram }}"><i class="fab fa-instagram"></i></a>
            <a href="{{ $youtube }}"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</div>
<a href="#" class="scroll-top">
    <svg class="scroll-top__circle" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</a>


@include('frontend.layouts.js')

<!-- Start Login Model -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" class="login-page__form" id="login_form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="login-page__area">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-danger d-none" id="error_div">Credintial does not Matched!</div>
                            <div>
                                <div class="login-page__form-input-box">
                                    <input type="email" name="email" class="form-control" placeholder="Email Id" />
                                </div>
                                <div class="login-page__form-input-box">
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control" name="password" id="password" value="" placeholder="Enter Password..." autocomplete="new-password">
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
                            <div class="login-page__checked-box">
                                <input type="checkbox" name="save-data" id="save-data">
                                <label for="save-data"><span></span>Remember Me?</label>
                                <div class="login-page__forgot-password">
                                    <a href="#" class="btn-second-modal within-first-modal" data-bs-toggle="modal" data-bs-target="#forgotModal" data-bs-dismiss-modal="modal">Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="richind-btn richind-btn-second w-100" onclick="submitLoginForm()"><span class="richind-btn__curve"></span>Login <i class="icon-arrow"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Login Model --}}
{{-- End Forget Password Model --}}
<div class="modal fade" id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('send.mail.forgot.password') }}" method="POST" class="login-page__form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotModalLabel">Forgot Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="login-page__area">
                    <div class="row">
                        <div class="col-lg-12 wow fadeInUp animated" data-wow-delay="300ms">
                            <div>
                                <div class="login-page__form-input-box">
                                    <input type="email" name="email" class="form-control" placeholder="Email Id" />
                                </div>
                            </div>
                            <div class="fpsw-sec">
                                <div class="login-page__forgot-password ms-0 mb-2">
                                    <span class="text-right"><a data-bs-toggle="modal" data-bs-target="#loginModal" class="forgot-link btn-second-modal-close">Login To RichIND</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="richind-btn richind-btn-second w-100"><span class="richind-btn__curve"></span>Submit <i class="icon-arrow"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Forget Password Model --}}
<script>
    var within_first_modal = false;
    $('.btn-second-modal').on('click', function() {
        if ($(this).hasClass('within-first-modal')) {
            within_first_modal = true;
            $('#loginModal').modal('hide');
        }
        $('#forgotModal').modal('show');
    });

    $('.btn-second-modal-close').on('click', function() {
        $('#forgotModal').modal('hide');
        if (within_first_modal) {
            $('#loginModal').modal('show');
            within_first_modal = false;
        }
    });

    $('.btn-toggle-fade').on('click', function() {
        if ($('.modal').hasClass('fade')) {
            $('.modal').removeClass('fade');
            $(this).removeClass('btn-success');
        } else {
            $('.modal').addClass('fade');
            $(this).addClass('btn-success');
        }
    });

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

<script>

    function submitLoginForm(){
        $.ajax({
            type: 'POST',
            url: "{{ route('login') }}",
            data: $('#login_form').serialize(),
            success: function(data) {
                $('#error_div').addClass('d-none');
                window.location.replace(data);
            },
            error: function(request, status, error) {
                $('#error_div').removeClass('d-none');
            }
        });
    }

</script>

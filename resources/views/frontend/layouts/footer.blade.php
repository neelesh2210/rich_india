@php
    $whatsapp = websiteData('whatsapp');
    $email = websiteData('email');
    $facebook = socialMediaLink('facebook');
    $linkedin = socialMediaLink('linkedin');
    $instagram = socialMediaLink('instagram');
    $youtube = socialMediaLink('youtube');
    $address = websiteData('address');
@endphp
<footer class="footer__area">
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer__widget">
                        <div class="logo mb-35">
                            <a href="#"><img src="{{ asset('frontend/assets/img/logo/logo.png')}}" alt="img"></a>
                        </div>
                        <div class="footer__content">
                            <p>when an unknown printer took galley of type and scrambled it to make pspecimen bookt
                                has.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Important Links</h4>
                        <div class="footer__link">
                            <ul class="list-wrap">
                                <li><a href="#">FAQ's</a></li>
                                <li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('term_and_condition') }}">Term and Conditions</a></li>
                                <li><a href="{{ route('cancel_and_refund_policy') }}">Cancelation and Refund</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Quick Links</h4>
                        <div class="footer__link">
                            <ul class="list-wrap">
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('course') }}">Our Courses</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                <li><a href="{{ route('index') }}">Login / Signup</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Get In Touch</h4>
                        <div class="footer__contact-content">
                            <ul class="list-wrap">
                                <li><i class="fas fa-phone-volume"></i> : +91-{{ $whatsapp }}</li>
                                <li><i class="fas fa-envelope-open-text"></i> : {{ $email }}</li>
                                <li><i class="fas fa-map-marker-alt"></i> : {{ $address }}</li>
                            </ul>
                            <ul class="list-wrap footer__social">
                                <a href="{{ $facebook }}"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ $linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                <a href="{{ $instagram }}"><i class="fab fa-instagram"></i></a>
                                <a href="{{ $youtube }}"><i class="fab fa-youtube"></i></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <div class="copy-right-text">
                        <p>© 2020-2024 Richind. All Rights Reserved. Design & Developed By <a href="#">Techup
                                Technologies.</a></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer__bottom-menu">
                        <ul class="list-wrap">
                            <li><a href="#">Term of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@include('frontend.layouts.js')

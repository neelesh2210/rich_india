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
                    <a href="{{route('index')}}" class="main-footer__logo">
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
                        <li><a href="{{route('privacy_policy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('term_and_condition')}}">Term and Conditions</a></li>
                        <li><a href="{{route('cancel_and_refund_policy')}}">Cancelation and Refund</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-6 col-md-3 wow fadeInUp" data-wow-delay="300ms">
                <div class="main-footer__navmenu main-footer__widget02">
                    <h3 class="main-footer__title">Quick Links</h3>
                    <ul>
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="{{route('blog')}}">Blog</a></li>
                        <li><a href="{{route('course')}}">Our Courses</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        <li><a href="{{route('signin')}}">Login / Signup</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-md-5 wow fadeInUp" data-wow-delay="400ms">
                <div class="main-footer__newsletter">
                    <h3 class="main-footer__title">Contact Us</h3>
                    <ul class="main-footer__info-list">
                        <li><span class="icon-Location"></span>{{$address}}</li>
                        <li><span class="icon-Telephone"></span><a href="tel:+91-{{$whatsapp}}">+91-{{$whatsapp}}</a></li>
                        <li><span class="icon-Email"></span><a href="mailto:{{$email}}">{{$email}}</a></li>
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
                <a href="mailto:{{$email}}">{{$email}}</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:+91-{{$whatsapp}}">+91-{{$whatsapp}}</a>
            </li>
        </ul>
        <div class="mobile-nav__social">
            <a href="{{$facebook}}"><i class="fab fa-facebook-f"></i></a>
            <a href="{{$linkedin}}"><i class="fab fa-linkedin-in"></i></a>
            <a href="{{$instagram}}"><i class="fab fa-instagram"></i></a>
            <a href="{{$youtube}}"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</div>
<a href="#" class="scroll-top">
    <svg class="scroll-top__circle" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</a>

@include('frontend.layouts.js')

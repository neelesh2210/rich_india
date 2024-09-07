@php
    if (!isset($website_data)) {
        $website_data = App\Models\Admin\WebsiteSetting::where(function ($query) {
            $query
                ->where('type', 'trainers')
                ->orWhere('type', 'students')
                ->orWhere('type', 'live_training')
                ->orWhere('type', 'community_earning')
                ->orWhere('type', 'whatsapp')
                ->orWhere('type', 'address')
                ->orWhere('type', 'email');
        })->pluck('content', 'type');
    }

    if (!isset($website_social_link)) {
        $website_social_link = App\Models\Admin\WebsiteSetting::where('type', 'social')
            ->where(function ($query) {
                $query
                    ->where('content', 'facebook')
                    ->orWhere('content', 'youtube')
                    ->orWhere('content', 'instagram')
                    ->orWhere('content', 'linkedin');
            })->pluck('url', 'content');
    }
@endphp
<footer class="footer__area">
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer__widget">
                        <div class="logo mb-35">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="footer__content">
                            <p>when an unknown printer took galley of type and scrambled it to make pspecimen bookt has.</p>
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
                                <li><a href="{{ route('signin') }}">Login / Signup</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Get In Touch</h4>
                        <div class="footer__contact-content">
                            <ul class="list-wrap">
                                @isset($website_data['whatsapp'])
                                    <li><i class="fas fa-phone-volume"></i> : +91-{{$website_data['whatsapp']}}</li>
                                @endisset

                                @isset($website_data['email'])
                                    <li><i class="fas fa-envelope-open-text"></i> : {{$website_data['email']}}</li>
                                @endisset

                                @isset($website_data['address'])
                                    <li><i class="fas fa-map-marker-alt"></i> : {{$website_data['address']}}</li>
                                @endisset
                            </ul>
                            <ul class="list-wrap footer__social">
                                @isset($website_social_link['facebook'])
                                    <li><a href="{{$website_social_link['facebook']}}"><i class="fab fa-facebook-f"></i></a></li>
                                @endisset

                                @isset($website_social_link['instagram'])
                                    <li><a href="{{$website_social_link['instagram']}}"><i class="fab fa-instagram"></i></a></li>
                                @endisset

                                @isset($website_social_link['whatsapp'])
                                    <li><a href="{{$website_social_link['whatsapp']}}"><i class="fab fa-whatsapp"></i></a></li>
                                @endisset

                                @isset($website_social_link['linkedin'])
                                    <li><a href="{{$website_social_link['linkedin']}}"><i class="fab fa-linkedin-in"></i></a></li>
                                @endisset

                                @isset($website_social_link['youtube'])
                                    <li><a href="{{$website_social_link['youtube']}}"><i class="fab fa-youtube"></i></a></li>
                                @endisset
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
                <div class="col-md-12">
                    <div class="copy-right-text text-center">
                        <p>© 2020-2024 Richind. All Rights Reserved. Design & Developed By <a href="https://techuptechnologies.com/">Techup Technologies.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


@php
    if(!isset($plans)) {
        $plans = App\Models\Admin\Plan::where('delete_status', '0')->where('status', '1')->oldest('priority')->get();
    }

    if(!isset($website_data)) {
        $website_data = App\Models\Admin\WebsiteSetting::where(function($query){
            $query->where('type', 'trainers')
                ->orWhere('type', 'students')
                ->orWhere('type', 'live_training')
                ->orWhere('type', 'community_earning')
                ->orWhere('type', 'whatsapp')
                ->orWhere('type', 'address')
                ->orWhere('type', 'email');
        })->pluck('content','type');
    }

    if(!isset($website_social_link)) {
        $website_social_link = App\Models\Admin\WebsiteSetting::where('type','social')->where(function($query){
            $query->where('content', 'facebook')
                ->orWhere('content', 'youtube')
                ->orWhere('content', 'instagram')
                ->orWhere('content', 'linkedin');
        })->pluck('url','content');
    }
@endphp
<header>
    <div class="tg-header__top">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tg-header__top-info list-wrap">
                        @isset($website_data['address'])
                            <li>
                                <img src="{{ asset('frontend/assets/img/icons/map_marker.svg') }}" alt="Icon">
                                <span>{{$website_data['address']}}</span>
                            </li>
                        @endisset
                        @isset($website_data['email'])
                            <li>
                                <img src="{{ asset('frontend/assets/img/icons/envelope.svg') }}" alt="Icon">
                                <a href="mailto:{{$website_data['email']}}">{{$website_data['email']}}</a>
                            </li>
                        @endisset
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tg-header__top-right">
                        @isset($website_data['whatsapp'])
                            <div class="tg-header__phone">
                                <img src="{{ asset('frontend/assets/img/icons/phone.svg') }}" alt="Icon">Call us:
                                <a href="tel:{{$website_data['whatsapp']}}">{{$website_data['whatsapp']}}</a>
                            </div>
                        @endisset
                        <ul class="tg-header__top-social list-wrap">
                            <li>Follow Us On :</li>
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
    <div id="header-fixed-height"></div>
    <div id="sticky-header" class="tg-header__area">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo">
                                <a href="{{ route('index') }}">
                                    <img src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt="Logo">
                                </a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="active"><a href="{{ route('index') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li class="menu-item-has-children"><a href="{{ route('plan') }}">Plan</a>
                                        <ul class="sub-menu">
                                            @foreach ($plans as $plan)
                                                <li>
                                                    <a href="{{ route('plan.detail', $plan->slug) }}">{{ $plan->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('course') }}">Course</a></li>
                                    <li><a href="{{ route('blog') }}">Blog</a></li>
                                    <li><a href="{{ route('contact') }}">contact</a></li>
                                </ul>
                            </div>
                            <div class="tgmenu__action">
                                <ul class="list-wrap">
                                    <li class="header-btn login-btn">
                                        @auth('web')
                                            <a href="{{ route('user.dashboard') }}"><i class="far fa-user"></i> {{Auth::guard('web')->user()->name}}</a>
                                        @else
                                            <a href="{{ route('signin') }}"><i class="far fa-user"></i> Log in</a>
                                        @endauth
                                    </li>
                                </ul>
                            </div>
                            <div class="mobile-login-btn">
                                <a href="{{ route('signin') }}">
                                    <img src="{{ asset('frontend/assets/img/icons/user.svg') }}" alt="" class="injectable">
                                </a>
                            </div>
                            <div class="mobile-nav-toggler"><i class="tg-flaticon-menu-1"></i></div>
                        </nav>
                    </div>

                    <div class="tgmobile__menu">
                        <nav class="tgmobile__menu-box">
                            <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
                            <div class="nav-logo">
                                <a href="{{ route('index') }}">
                                    <img src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt="Logo">
                                </a>
                            </div>
                            <div class="tgmobile__menu-outer"></div>
                            <div class="social-links">
                                <ul class="list-wrap">
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
                        </nav>
                    </div>
                    <div class="tgmobile__menu-backdrop"></div>
                </div>
            </div>
        </div>
    </div>
</header>

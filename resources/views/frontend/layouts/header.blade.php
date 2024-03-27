@php
    $plans = App\Models\Admin\Plan::where('delete_status','0')->where('status','1')->oldest('priority')->get();
@endphp
<header class="main-header-two">
    <nav class="main-menu">
        <div class="container">
            <div class="main-menu__logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('frontend/assets/images/logo-light.png') }}" width="183" height="48" alt="richind">
                </a>
            </div>
            <div class="main-menu__nav">
                <ul class="main-menu__list">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('course') }}">Course</a></li>
                    <li class="dropdown">
                        <a href="{{ route('plan') }}">Plans</a>
                        <ul>
                            @foreach ($plans as $plan)
                                <li>
                                    <a href="{{route('plan.detail',$plan->slug)}}" title="{{ env('APP_NAME') }}-{{ $plan->title }}">{{ $plan->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="main-menu__right">
                <a href="#" class="main-menu__toggler mobile-nav__toggler">
                    <i class="fa fa-bars"></i>
                </a>
                @auth('web')
                    <a href="{{ route('user.dashboard') }}" class="main-menu__login">
                        <i class="icon-account-1"></i>
                    </a>
                @else
                    <a href="{{ route('signin') }}" class="main-menu__login">
                        <i class="icon-account-1"></i>
                    </a>
                @endauth
                <a data-bs-toggle="modal" data-bs-target="#loginModal" class="main-menu__login">
                    <i class="icon-account-1"></i>
                </a>
                <a href="{{ route('contact') }}" class="richind-btn"><span class="richind-btn__curve"></span>Get In Touch</a>
            </div>
        </div>
    </nav>
</header>

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>

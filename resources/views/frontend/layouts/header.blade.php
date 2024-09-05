@php
    $plans = App\Models\Admin\Plan::where('delete_status', '0')->where('status', '1')->oldest('priority')->get();
@endphp
<header>
    <div class="tg-header__top">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tg-header__top-info list-wrap">
                        <li><img src="{{ asset('frontend/assets/img/icons/map_marker.svg')}}" alt="Icon"> <span>Mata wali gali himayunpur ,
                                Firozabad, Uttar Pradesh</span></li>
                        <li><img src="{{ asset('frontend/assets/img/icons/envelope.svg')}}" alt="Icon"> <a
                                href="mailto:richindcare@gmail.com">richindcare@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tg-header__top-right">
                        <div class="tg-header__phone">
                            <img src="{{ asset('frontend/assets/img/icons/phone.svg')}}" alt="Icon">Call us: <a href="tel:0123456789">+123
                                599 8989</a>
                        </div>
                        <ul class="tg-header__top-social list-wrap">
                            <li>Follow Us On :</li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
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
                                <a href="{{ route('index') }}"><img src="{{ asset('frontend/assets/img/logo/logo.png')}}" alt="Logo"></a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="active"><a href="{{ route('index') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li class="menu-item-has-children"><a href="{{ route('plan') }}">Plan</a>
                                        <ul class="sub-menu">
                                            @foreach ($plans as $plan)
                                            <li><a href="{{ route('plan.detail', $plan->slug) }}">{{ $plan->title }}</a></li>
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
                                        <a href="{{ route('user.dashboard') }}"><i class="far fa-user"></i> Log in</a>
                                        @else
                                        <a href="{{ route('signin') }}"><i class="far fa-user"></i> Log in</a>
                                        @endauth
                                    </li>
                                </ul>
                            </div>
                            <div class="mobile-login-btn">
                                <a href="#"><img src="assets/img/icons/user.svg" alt=""
                                        class="injectable"></a>
                            </div>
                            <div class="mobile-nav-toggler"><i class="tg-flaticon-menu-1"></i></div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="tgmobile__menu">
                        <nav class="tgmobile__menu-box">
                            <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
                            <div class="nav-logo">
                                <a href="#"><img src="{{ asset('frontend/assets/images/logo-light.png') }}" alt="Logo"></a>
                            </div>
                            <div class="tgmobile__menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="list-wrap">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="tgmobile__menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>

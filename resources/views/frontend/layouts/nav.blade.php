@php
    $plans = \App\CPU\PlanManager::withoutTrash()->select('id', 'course_ids', 'slug', 'title', 'amount', 'points', 'image')->where('status', 1)->orderBy('priority', 'desc')->get();
@endphp

<header class="header header-page">
    <div class="header-fixed">
        <nav class="navbar navbar-expand-lg header-nav scroll-sticky">
            <div class="container">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="{{ route('index') }}" title="{{env('APP_NAME')}}-logo" class="navbar-brand logo">
                        <img src="{{ asset('frontend/images/logo-2.png') }}" alt="{{env('APP_NAME')}}-logo" class="img-fluid w__200 w__70-xs-en pad-t-b-5-xs">
                    </a>
                    @if (Auth::guard('web')->user())
                        <a title="{{env('APP_NAME')}}-{{Auth::guard('web')->user()->name}}" href="{{ route('user.dashboard') }}" class="account-icon-fix d-block d-sm-none">
                            <img src="{{ asset('frontend/images/avatar/' . Auth::guard('web')->user()->avatar) }}" alt="{{env('APP_NAME')}}-<{{Auth::guard('web')->user()->name}}" style="width:30px;border-radius:50%" class="custom-account-icon">
                        </a>
                    @else
                        <a title="{{env('APP_NAME')}}-Login" href="{{ route('index') }}" class="account-icon-fix d-block d-sm-none">
                            <i class="fa-regular fa-user fs-25 custom-account-icon"></i>
                        </a>
                    @endif
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="{{ route('index') }}" title="{{env('APP_NAME')}}-Logo " class="menu-logo">
                            <img src="{{ asset('frontend/images/logo-2.png') }}" alt="{{env('APP_NAME')}}-logo" class="img-fluid w__70-xs-en pad-t-b-5-xs">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0)">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="main-nav">
                        <li>
                            <a title="{{env('APP_NAME')}}-Home" href="{{ route('index') }}">Home</a>
                        </li>
                        <li>
                            {{-- <a href="{{route('about')}}" title="{{env('APP_NAME')}}-About-Us"> --}}
                            <a href="{{route('about')}}" title="{{env('APP_NAME')}}-About-Us">
                                About Us
                            </a>
                        </li>
                        <li class="has-submenu">
                            <a href="{{route('plan')}}" title="{{env('APP_NAME')}}-All-Courses">Courses Package <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                @foreach ($plans as $plan)
                                <li>
                                    <a href="{{route('plan.detail',$plan->slug)}}" title="{{env('APP_NAME')}}-{{$plan->title}}">{{$plan->title}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('blog')}}" >Blog</a>
                        </li>
                        <li>
                            <a href="{{route('contact')}}" title="{{env('APP_NAME')}}-Contact-Us">Contact Us</a>
                        </li>
                    </ul>
                    <div id="divSideMenuLogin" class="all-btn all-category d-flex align-items-center justify-content-center d-block d-sm-none mar-top-20">
                        @if (Auth::guard('web')->user())
                            <a class="btn btn-primary w__90-p" title="{{env('APP_NAME')}}-Dashboard" href="{{ route('user.dashboard') }}">Dashboard</a>
                            <a class="btn btn-primary w__90-p" title="{{env('APP_NAME')}}-Logout" style="margin-left:15px" onclick="$('#logout-form').submit()">Logout</a>
                            <form id="logout-form" action="{{route('user.logout')}}" method="POST">
                                @csrf
                            </form>
                        @else
                            <a title="{{env('APP_NAME')}}-Login" href="{{ route('index') }}" class="btn btn-primary w__90-p">Login / Signup</a>
                        @endif
                    </div>
                </div>
                <ul id="divLogin" class="nav header-navbar-rht">
                    <li class="nav-item">
                        @if (Auth::guard('web')->user())
                            <a class="nav-link header-login" title="{{env('APP_NAME')}}-Dashboard" href="{{ route('user.dashboard') }}">Dashboard</a>
                            <a class="nav-link header-login" title="{{env('APP_NAME')}}-Logout" style="margin-left:15px" onclick="$('#logout-forms').submit()">Logout</a>
                            <form id="logout-forms" action="{{route('user.logout')}}" method="POST">
                                @csrf
                            </form>
                        @else
                            <a class="nav-link header-login" title="{{env('APP_NAME')}}-Login" href="{{ route('index') }}" style="margin-left:15px">Login / Signup</a>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

{{-- <div class="navbar-area fixed-top">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('frontend/images/logo-2.png') }}" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('index')}}">
                    <img src="{{ asset('frontend/images/logo-2.png') }}" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="{{route('index')}}" class="nav-link active"> Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('plan') }}" class="nav-link">Plan</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Courses
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($plans as $plan)
                                    <li class="nav-item">
                                        <a href="{{ route('plan') }}" class="nav-link">
                                            {{ $plan->title }}
                                            <i class="ri-arrow-right-s-line"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach ($plan->course_ids as $course_id)
                                                @php
                                                    $course = App\Models\Admin\Course::where('id', $course_id)->first();
                                                @endphp
                                                <li class="nav-item">
                                                    <a href="{{ route('course.detail', $course->slug) }}" class="nav-link">{{ $course->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @if (Auth::guard('web')->user())
                            <li class="nav-item">
                                <a href="{{ route('user.dashboard') }}" class="nav-link">My Account</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('signin') }}" class="nav-link">My Account</a>
                            </li>
                        @endif
                        @if (Auth::guard('web')->user())
                            <li class="nav-item">
                                <a href="{{ route('user.dashboard') }}" target="_blank">
                                    <i class="ri-user-3-line"></i> {{ Auth::guard('web')->user()->name }}
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('signin') }}" class="nav-link">Login</a>
                            </li>
                        @endif
                    </ul>
                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            @if (Auth::guard('web')->user())
                                <a href="{{ route('user.dashboard') }}" class="default-btn4">
                                    <i class="ri-user-3-line"></i>
                                </a>
                            @else
                                <a href="{{ route('signin') }}" class="default-btn4"><i class="ri-user-3-line"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="option-item">
                        @if (Auth::guard('web')->user())
                            <a href="{{ route('user.dashboard') }}" class="default-btn42">
                                <i class="ri-user-3-line"></i>
                            </a>
                        @else
                            <a href="{{ route('signin') }}" class="default-btn4"><i class="ri-user-3-line"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

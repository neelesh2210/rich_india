@extends('frontend.layouts.app')
@section('content')
    <style>
        body {
            background-color: #f7f7f7;
        }

        .footer,
        .header {
            display: none;
        }

        .mob {
            display: none;
        }

        .header-fixed {
            display: none;
        }

        .card-success.card-outline {
            border-top: 3px solid #28a745;
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, .125);
            padding: 0.75rem 1.25rem;
            position: relative;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }

        .badge {
            color: #000;
        }

        @media only screen and (min-width: 320px) and (max-width: 767px) {

            .container-fluid {
                padding-left: 0px;
                padding-right: 0px;
            }

            .navbar-brand.logo .pad-t-b-5-xs {
                padding: 12px 0px 12px 0;
                margin-left: 33px;
            }

            .logo img {
                width: 150px;
            }

            .navbar-brand {
                background: white;
            }

            .mob {
                display: block;
            }

            .header-fixed {
                display: none;
            }
        }
    </style>
    <div>
        <div id="dashboard-wrapper" class="bg-light-gray-3">
            <div id="sidebar-wrapper">
                <div class="sidebar-nav">
                    <div class="profile-sec">
                        <div class="pimgsec">
                            <img src="{{ asset('frontend/images/avatar/' . Auth::guard('web')->user()->avatar) }}">
                        </div>
                        <div class="ptext">
                            <h3>{{ Auth::guard('web')->user()->name }}</h3>
                            <h4>Affiliate Link</h4>
                        </div>
                    </div>
                    <a href="{{ route('user.dashboard') }}" class="sidebar-nav-active-en mar-top-60">
                        <i class="fa-solid fa-house icon-active fs-20 me-1 align-middle txt-gray-2"></i>
                        DashBoard
                    </a>
                    <a href="{{ route('user.user.profile') }}">
                        <i class="fa-solid fa-id-card fs-20 me-1 align-middle txt-gray-2"></i>
                        My Profile
                    </a>
                    <a href="{{ route('user.bank.detail') }}">
                        <i class="fa-regular fa-credit-card fs-20 me-1 align-middle txt-gray-2"></i>
                        KYC
                    </a>
                    <a href="{{ route('user.traffic') }}">
                        <i class="fa-sharp fa-solid fa-people-group fs-20 me-1 align-middle txt-gray-2"></i>
                        My Team
                    </a>
                    <a href="{{ route('user.leaderboard') }}">
                        <i class="fa-solid fa-users fs-20 me-1 align-middle txt-gray-2"></i>
                        Leaderboard
                    </a>
                    <a href="#">
                        <i class="fa-solid fa-graduation-cap fs-20 me-1 align-middle txt-gray-2"></i>
                        My Course
                    </a>
                    <a href="{{ route('user.affiliate.links') }}">
                        <i class="fa-solid fa-graduation-cap fs-20 me-1 align-middle txt-gray-2"></i>
                        Affilliate Link
                    </a>
                    {{-- <a href="{{ route('user.payouts') }}"> --}}
                    <a href="#">
                        <i class="fa-solid fa-money-bill-transfer fs-20 me-1 align-middle txt-gray-2"></i>
                        Request Withdrawal
                    </a>
                    <a href="#">
                        <i class="fa-sharp fa-solid fa-lock fs-20 me-1 align-middle txt-gray-2"></i>
                        Security
                    </a>
                    <a onclick="$('#logout-forms').submit()">
                        <i class="fa-solid fa-arrow-right-from-bracket fs-20 me-1 align-middle txt-gray-2"></i>
                        Sign Out
                    </a>
                    <form id="logout-forms" action="{{ route('user.logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
            <div id="page-content-wrapper" class="pt-0 ps-0 pe-0">
                <span href="#dashboard-menu-toggle" id="dashboard-menu-toggle" class="d-block d-sm-none">&#9776;</span>
                <a href="{{ route('index') }}" title="{{ env('APP_NAME') }}-logo "
                    class="navbar-brand logo header-fixed d-none">
                    <img src="{{ asset('frontend/images/avatar/' . Auth::guard('web')->user()->avatar) }}"
                        alt="{{ env('APP_NAME') }}-logo" class="img-fluid pad-t-b-5-xs mob" style="">
                </a>
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="settings-widget profile-details box-shadow-1 my-profile">
                                    <div class="settings-menu p-0">
                                        <div class="profile-heading">
                                            <h3 style="color:#FF00A8;text-align:center;font-size:30px">Leaderboard</h3>
                                        </div>
                                        <div class="checkout-form personal-address add-course-info">
                                            <div action="#">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-6">
                                                        <div class="card card-outline card-success">
                                                            <div
                                                                class="card-header d-flex justify-content-between align-items-center">
                                                                <h4 class="header-title">Last 7 Days</h4>
                                                            </div>
                                                            @foreach ($last_week_leaderboards as $week_key => $last_week_leaderboard)
                                                                <div class="card-body pt-2">
                                                                    <div class="d-flex align-items-start br-btm  ">
                                                                        <img src="{{ asset('frontend/images/avatar/' . $last_week_leaderboard->user->avatar) }}"
                                                                            class="me-3 img-crcl"
                                                                            onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'"
                                                                            alt="Generic placeholder image" width="40px">
                                                                        <div class="w-75 overflow-hidden my-auto">
                                                                            <span
                                                                                class="badge badge-primary-lighten float-end">₹
                                                                                {{ $last_week_leaderboard->total_commission }}</span>
                                                                            <h5 class="mt-0 mb-1">
                                                                                {{ $last_week_leaderboard->user->name }}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6">
                                                        <div class="card card-outline card-success">
                                                            <div
                                                                class="card-header d-flex justify-content-between align-items-center">
                                                                <h4 class="header-title"> Last 30 Days</h4>
                                                            </div>
                                                            @foreach ($last_month_leaderboards as $month_key => $last_month_leaderboard)
                                                                <div class="card-body pt-2">
                                                                    <div class="d-flex align-items-start br-btm  ">
                                                                        <img src="{{ asset('frontend/images/avatar/' . $last_month_leaderboard->user->avatar) }}"
                                                                            class="me-3 img-crcl"
                                                                            onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'"
                                                                            alt="Generic placeholder image" width="40px">
                                                                        <div class="w-75 overflow-hidden my-auto">
                                                                            <span
                                                                                class="badge badge-primary-lighten float-end">₹
                                                                                {{ $last_month_leaderboard->total_commission }}</span>
                                                                            <h5 class="mt-0 mb-1">
                                                                                {{ $last_month_leaderboard->user->name }}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6">
                                                        <div class="card card-outline card-success">
                                                            <div
                                                                class="card-header d-flex justify-content-between align-items-center">
                                                                <h4 class="header-title"> All Time</h4>
                                                            </div>
                                                            @foreach ($all_time_leaderboards as $all_key => $all_time_leaderboard)
                                                                <div class="card-body pt-2">
                                                                    <div class="d-flex align-items-start br-btm  ">
                                                                        <img src="{{ asset('frontend/images/avatar/' . $all_time_leaderboard['user']['avatar']) }}"
                                                                            class="me-3 img-crcl"
                                                                            onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'"
                                                                            alt="Generic placeholder image" width="40px">
                                                                        <div class="w-75 overflow-hidden my-auto">
                                                                            <span
                                                                                class="badge badge-primary-lighten float-end">₹
                                                                                {{ $all_time_leaderboard['total_commission'] }}</span>
                                                                            <h5 class="mt-0 mb-1">
                                                                                {{ $all_time_leaderboard['user']['name'] }}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

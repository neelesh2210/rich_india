@extends('frontend.layouts.app')
@section('content')
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
                    <a href="{{ route('user.course') }}">
                        <i class="fa-solid fa-graduation-cap fs-20 me-1 align-middle txt-gray-2"></i>
                        My Course
                    </a>
                    <a href="{{ route('user.payouts') }}">
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
                <a href="{{ route('index') }}" title="{{ env('APP_NAME') }}-logo " class="navbar-brand logo header-fixed">
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
                                            <h3 style="color:#FF00A8;text-align:center;font-size:50px">My Profile</h3>
                                        </div>
                                        <div class="checkout-form personal-address add-course-info">
                                            <div action="#">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Name : <span class="fw-normal">{{Auth::guard('web')->user()->name}}</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Phone : <span class="fw-normal">{{Auth::guard('web')->user()->phone}}</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Email : <span class="fw-normal">{{Auth::guard('web')->user()->email}}</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">City : <span class="fw-normal">{{Auth::guard('web')->user()->state}}</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="update-profile">
                                                        <a href="#" class="btn btn-primary">Edit Profile</a>
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
    <style>
        .footer,
        .header {
            display: none;
        }

        .mob {
            display: none;
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
        }
    </style>
    <script>
        $.fn.jQuerySimpleCounter = function(options) {
            var settings = $.extend({
                start: 0,
                end: 100,
                easing: 'swing',
                duration: 500,
                complete: ''
            }, options);

            var thisElement = $(this);

            $({
                count: settings.start
            }).animate({
                count: settings.end
            }, {
                duration: settings.duration,
                easing: settings.easing,
                step: function() {
                    var mathCount = Math.ceil(this.count);
                    thisElement.text(mathCount);
                },
                complete: settings.complete
            });
        };
        var demo1 = '{{ $today_earning }}';
        var demo2 = '{{ $last_week_earning }}';
        var demo3 = '{{ $last_month_earning }}';
        var demo4 = '{{ $all_time_earning + $old_payout->old_paid_payout + $old_payout->old_not_paid_payout }}';

        $('#number1').jQuerySimpleCounter({
            end: demo1,
            duration: 3000
        });
        $('#number2').jQuerySimpleCounter({
            end: demo2,
            duration: 4000
        });
        $('#number3').jQuerySimpleCounter({
            end: demo3,
            duration: 4000
        });
        $('#number4').jQuerySimpleCounter({
            end: demo4,
            duration: 4000
        });
    </script>
@endsection

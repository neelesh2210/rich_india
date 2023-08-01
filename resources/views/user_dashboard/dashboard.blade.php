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
                            <h3>{{Auth::guard('web')->user()->name}}</h3>
                            <h4>Affiliate Link</h4>
                        </div>
                    </div>
                <a href="{{route('user.dashboard')}}" class="sidebar-nav-active-en mar-top-60">
                    <i class="fa-solid fa-house icon-active fs-20 me-1 align-middle txt-gray-2"></i>
                    DashBoard
                </a>
                <a href="{{route('user.user.profile')}}">
                    <i class="fa-solid fa-id-card fs-20 me-1 align-middle txt-gray-2"></i>
                    My Profile
                </a>
                {{-- <a href="{{route('user.bank.detail')}}"> --}}
                <a href="#">
                    <i class="fa-regular fa-credit-card fs-20 me-1 align-middle txt-gray-2"></i>
                    KYC
                </a>
                {{-- <a href="{{route('user.traffic')}}"> --}}
                <a href="#">
                    <i class="fa-sharp fa-solid fa-people-group fs-20 me-1 align-middle txt-gray-2"></i>
                    My Team
                </a>
                {{-- <a href="{{route('user.leaderboard')}}"> --}}
                <a href="#">
                    <i class="fa-solid fa-users fs-20 me-1 align-middle txt-gray-2"></i>
                    Leaderboard
                </a>
                {{-- <a href="{{route('user.course')}}"> --}}
                <a href="#">
                    <i class="fa-solid fa-graduation-cap fs-20 me-1 align-middle txt-gray-2"></i>
                    My Course
                </a>
                {{-- <a href="{{route('user.payouts')}}"> --}}
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
                <form id="logout-forms" action="{{route('user.logout')}}" method="POST">
                    @csrf
                </form>
            </div>
        </div>
        <div id="page-content-wrapper" class="pt-0 ps-0 pe-0">
            <span href="#dashboard-menu-toggle" id="dashboard-menu-toggle" class="d-block d-sm-none">&#9776;</span>
            <a href="{{ route('index') }}" title="{{env('APP_NAME')}}-logo " class="navbar-brand logo header-fixed">
                <img src="{{ asset('frontend/images/avatar/' . Auth::guard('web')->user()->avatar) }}" alt="{{env('APP_NAME')}}-logo" class="img-fluid pad-t-b-5-xs mob" style="">
            </a>
            <div class="page-content">
                <div class="container-fluid" >
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="settings-widget profile-details box-shadow-1 my-profile">
                                <div class="settings-menu p-0">
                                    <div class="profile-sec">
                                        <div class="pimgsec">
                                            <img src="{{ asset('frontend/images/avatar/' . Auth::guard('web')->user()->avatar) }}" style="margin:25px;">
                                        </div>
                                        <div class="ptext">
                                            <h3>{{ Auth::guard('web')->user()->name }}</h3>
                                            <h4>({{ Auth::guard('web')->user()->userDetail->plan->title }})</h4>
                                        </div>
                                    </div>
                                    <div class="box-container">
                                        <div class="box box1">
                                            <div class="text">
                                                <h2 class="topic">Today Income</h2>
                                                <h2 id="number1" class="topic-heading">₹ {{ $today_earning }}</h2>
                                            </div>
                                        </div>
                                        <div class="box box2">
                                            <div class="text">
                                                <h2 class="topic">Last 7 Days Income</h2>
                                                <h2 id="number2" class="topic-heading">₹ {{ $last_week_earning }}</h2>
                                            </div>
                                        </div>
                                        <div class="box box3">
                                            <div class="text">
                                                <h2 class="topic">Last 30 Days Income</h2>
                                                <h2 id="number3" class="topic-heading">₹ {{ $last_month_earning }}</h2>
                                            </div>
                                        </div>
                                        <div class="box box4">
                                            <div class="text">
                                                <h2 class="topic">Total Income</h2>
                                                <h2 id="number4" class="topic-heading">₹ {{ $all_time_earning + $old_payout->old_paid_payout + $old_payout->old_not_paid_payout }}</h2>
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
<script>

	$.fn.jQuerySimpleCounter = function( options ) {
	    var settings = $.extend({
	        start:  0,
	        end:    100,
	        easing: 'swing',
	        duration: 500,
	        complete: ''
	    }, options );

	    var thisElement = $(this);

	    $({count: settings.start}).animate({count: settings.end}, {
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

$('#number1').jQuerySimpleCounter({end: demo1,duration: 3000});
$('#number2').jQuerySimpleCounter({end: demo2,duration: 4000});
$('#number3').jQuerySimpleCounter({end: demo3,duration: 4000});
$('#number4').jQuerySimpleCounter({end: demo4,duration: 4000});

        </script>










@endsection

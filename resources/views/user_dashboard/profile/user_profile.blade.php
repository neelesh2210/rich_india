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
                    <a href="{{route('user.bank.detail')}}">
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
                    {{-- <a href="{{ route('user.course') }}"> --}}
                    <a href="#">
                        <i class="fa-solid fa-graduation-cap fs-20 me-1 align-middle txt-gray-2"></i>
                        My Course
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
                <a href="{{ route('index') }}" title="{{ env('APP_NAME') }}-logo " class="navbar-brand logo header-fixed d-none">
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
                                            <h3 style="color:#FF00A8;text-align:center;font-size:30px">My Profile</h3>
                                        </div>
                                        <div class="checkout-form personal-address add-course-info">
                                            <div action="#">
                                                <div class="row">
                                                    <form action="{{route('user.save.user.profile')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                                                <input type="text" id="name" name="name" value="{{$user_details->name}}" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                                <input type="email" id="email" name="email" value="{{$user_details->email}}" class="form-control" placeholder="Email" readonly required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                                                <input type="number" id="phone" name="phone" value="{{$user_details->phone}}" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                                                                <select class="form-select" id="example-select" name="state" required>
                                                                    <option value="">Select State...</option>
                                                                    @foreach (states() as $state)
                                                                        <option value="{{$state}}" @if($user_details->state == $state) selected @endif>{{$state}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="images" class="form-label">Avatar</label>
                                                                <input type="file" name="avatar" id="img_input1" class="form-control" accept="image/*">
                                                                <div class="p-2">
                                                                    <img id="img1" src="{{asset('frontend/images/avatar/'.$user_details->avatar)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" height="100px" width="100px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </form>
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

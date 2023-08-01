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
                    <a href="#">
                        <i class="fa-solid fa-graduation-cap fs-20 me-1 align-middle txt-gray-2"></i>
                        My Course
                    </a>
                    <a href="{{route('user.affiliate.links')}}">
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
                                            <h3 style="color:#FF00A8;text-align:center;font-size:50px">My Team</h3>
                                        </div>
                                        <div class="checkout-form personal-address add-course-info">
                                            <div action="#">
                                                <div class="row">
                                                    <div class="leader-board">
                                                        <div class="col-xl-4 col-lg-6">
                                                            <div class="pt-0">
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table table-borderless table-hover table-centered m-0">

                                                                        <thead class="table-light">
                                                                            <h4>
                                                                                Last 7 Days
                                                                                {{-- (17 - 23 Apr) --}}
                                                                            </h4>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($last_week_leaderboards as $week_key => $last_week_leaderboard)
                                                                                <tr>
                                                                                    <td>
                                                                                        <div>
                                                                                            <img src="{{ asset('frontend/images/avatar/' . $last_week_leaderboard->user->avatar) }}"
                                                                                                class="avatar-sm img-thumbnail rounded-circle"
                                                                                                onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'"
                                                                                                alt="Generic placeholder image">
                                                                                        </div>
                                                                                    </td>

                                                                                    <td>
                                                                                        {{ $last_week_leaderboard->user->name }}
                                                                                    </td>

                                                                                    <td style="color:#00b620;">
                                                                                        ₹{{ $last_week_leaderboard->total_commission }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div> <!-- end .table-responsive-->
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-6">
                                                            <div class="pt-0">
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table table-borderless table-hover table-centered m-0">

                                                                        <thead class="table-light">
                                                                            <h4>
                                                                                Last 30 Days
                                                                                {{-- (17 - 23 Apr) --}}
                                                                            </h4>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($last_month_leaderboards as $month_key => $last_month_leaderboard)
                                                                                <tr>
                                                                                    <td>
                                                                                        <div>
                                                                                            <img src="{{ asset('frontend/images/avatar/' . $last_month_leaderboard->user->avatar) }}"
                                                                                                class="avatar-sm img-thumbnail rounded-circle"
                                                                                                onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'"
                                                                                                alt="Generic placeholder image">
                                                                                        </div>
                                                                                    </td>

                                                                                    <td>
                                                                                        {{ $last_month_leaderboard->user->name }}
                                                                                    </td>

                                                                                    <td style="color:#00b620;">
                                                                                        ₹{{ $last_month_leaderboard->total_commission }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div> <!-- end .table-responsive-->
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-6">
                                                            <div class="pt-0">
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table table-borderless table-hover table-centered m-0">

                                                                        <thead class="table-light">
                                                                            <h4>
                                                                                ALL TIME
                                                                            </h4>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($all_time_leaderboards as $all_key => $all_time_leaderboard)
                                                                                <tr>
                                                                                    <td>
                                                                                        <div>
                                                                                            <img src="{{ asset('frontend/images/avatar/' . $all_time_leaderboard['user']['avatar']) }}"
                                                                                                class="avatar-sm img-thumbnail rounded-circle"
                                                                                                onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'"
                                                                                                alt="Generic placeholder image">
                                                                                        </div>
                                                                                    </td>

                                                                                    <td>
                                                                                        {{ $all_time_leaderboard['user']['name'] }}
                                                                                    </td>

                                                                                    <td style="color:#00b620;">
                                                                                        ₹{{ $all_time_leaderboard['total_commission'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div> <!-- end .table-responsive-->
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
    </div>
@endsection

@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">User Leaderboard</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h5 class="mb-3 text-uppercase bg-light p-2">Leaderboard</h5>
                            <hr> --}}
                            <div class="row leader-board">
                                <div class="col-lg-6 res-p-0">
                                    <div class="card m-b-30 mybox-shadow">
                                        <div class="card-header leader-heading">
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h5 class="card-title mb-0">Top Earners</h5>
                                                    <small>Today</small>
                                                    <br>
                                                    <span style="font-size: 16px; color: #fff;">17-Oct-2024</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3 position-relative justify-content-center gap-90 mt-4">
                                                <div class="box-left">
                                                    <a href="javascript:;" class="viewProfile">
                                                        <div class="top-rank-image">
                                                            <img src="{{ asset('user_dashboard/images/users/avatar-1.jpg') }}"
                                                                width="80">
                                                            <span class="rank-circle">2</span>
                                                        </div>
                                                        <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                            style="font-size: 14px;">Atul</h6>
                                                        <p class="text-center earning-color">₹ 58,590</p>
                                                    </a>
                                                </div>
                                                <div class="box-center">
                                                    <a href="javascript:;" class="viewProfile">
                                                        <div class="top-rank-image">
                                                            <img src="{{ asset('user_dashboard/images/users/avatar-1.jpg') }}"
                                                                width="80">
                                                            <span class="rank-circle">1</span>
                                                        </div>
                                                        <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                            style="font-size: 14px;">Shailesh</h6>
                                                        <p class="text-center earning-color">₹ 61,670</p>
                                                    </a>
                                                </div>
                                                <div class="box-right">
                                                    <a href="javascript:;" class="viewProfile">
                                                        <div class="top-rank-image">
                                                            <img src="{{ asset('user_dashboard/images/users/avatar-1.jpg') }}"
                                                                width="80">
                                                            <span class="rank-circle">3</span>
                                                        </div>
                                                        <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                            style="font-size: 14px;">Vikas</h6>
                                                        <p class="text-center earning-color">₹ 48,300</p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <div class="d-flex align-items-center leader-board-box">
                                                    <a href="javascript:;" class="viewProfile">
                                                        <div class="d-flex align-items-center gap-10">
                                                            <div class="rank-num">
                                                                4 </div>
                                                            <div class="leader-img">
                                                                <img src="{{ asset('user_dashboard/images/users/avatar-1.jpg') }}"
                                                                    width="60">
                                                            </div>
                                                            <div class="leader-details">
                                                                <h5> Vishal yadav</h5>
                                                            </div>
                                                            <div class="leader-details">
                                                                <p>₹ 32230</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center leader-board-box">
                                                    <a href="javascript:;" class="viewProfile">
                                                        <div class="d-flex align-items-center gap-10">
                                                            <div class="rank-num">
                                                                5 </div>
                                                            <div class="leader-img">
                                                                <img src="{{ asset('user_dashboard/images/users/avatar-1.jpg') }}"
                                                                    width="60">
                                                            </div>
                                                            <div class="leader-details">
                                                                <h5> Ashutosh</h5>
                                                            </div>
                                                            <div class="leader-details">
                                                                <p>₹ 30310</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center leader-board-box">
                                                    <a href="javascript:;" class="viewProfile">
                                                        <div class="d-flex align-items-center gap-10">
                                                            <div class="rank-num">
                                                                6 </div>
                                                            <div class="leader-img">
                                                                <img src="{{ asset('user_dashboard/images/users/avatar-1.jpg') }}"
                                                                    width="60">
                                                            </div>
                                                            <div class="leader-details">
                                                                <h5> Kartik</h5>
                                                            </div>
                                                            <div class="leader-details">
                                                                <p>₹ 30170</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 res-p-0">
                                    <div class="card m-b-30 mybox-shadow">
                                        <div class="card-header leader-heading">
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h5 class="card-title mb-0">Top Earners</h5>
                                                    <small>Last 7 Days</small>
                                                    <br>
                                                    <span style="font-size: 16px; color: #fff;">(17-Oct-2024 -
                                                        11-Oct-2024)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3 position-relative justify-content-center gap-90 mt-4">
                                                <div class="box-left">
                                                    <a href="javascript:;" class="viewProfile">
                                                        <div class="top-rank-image">
                                                            <img src="{{ asset('user_dashboard/images/users/avatar-1.jpg') }}"
                                                                width="80">
                                                            <span class="rank-circle">2</span>
                                                        </div>
                                                        <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                            style="font-size: 14px;">Atul</h6>
                                                        <p class="text-center earning-color">₹ 58,590</p>
                                                    </a>
                                                </div>
                                                <div class="box-center">
                                                    <a href="javascript:;" class="viewProfile">
                                                        <div class="top-rank-image">
                                                            <img src="{{ asset('user_dashboard/images/users/avatar-1.jpg') }}"
                                                                width="80">
                                                            <span class="rank-circle">1</span>
                                                        </div>
                                                        <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                            style="font-size: 14px;">Shailesh</h6>
                                                        <p class="text-center earning-color">₹ 61,670</p>
                                                    </a>
                                                </div>
                                                <div class="box-right">
                                                    <a href="javascript:;" class="viewProfile">
                                                        <div class="top-rank-image">
                                                            <img src="{{ asset('user_dashboard/images/users/avatar-1.jpg') }}"
                                                                width="80">
                                                            <span class="rank-circle">3</span>
                                                        </div>
                                                        <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                            style="font-size: 14px;">Vikas</h6>
                                                        <p class="text-center earning-color">₹ 48,300</p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <div class="d-flex align-items-center leader-board-box">
                                                    <a href="javascript:;" class="viewProfile">
                                                        <div class="d-flex align-items-center gap-10">
                                                            <div class="rank-num">
                                                                4 </div>
                                                            <div class="leader-img">
                                                                <img src="{{ asset('user_dashboard/images/users/avatar-1.jpg') }}"
                                                                    width="60">
                                                            </div>
                                                            <div class="leader-details">
                                                                <h5> Vishal yadav</h5>
                                                            </div>
                                                            <div class="leader-details">
                                                                <p>₹ 32230</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center leader-board-box">
                                                    <a href="javascript:;" class="viewProfile">
                                                        <div class="d-flex align-items-center gap-10">
                                                            <div class="rank-num">
                                                                5 </div>
                                                            <div class="leader-img">
                                                                <img src="{{ asset('user_dashboard/images/users/avatar-1.jpg') }}"
                                                                    width="60">
                                                            </div>
                                                            <div class="leader-details">
                                                                <h5> Ashutosh</h5>
                                                            </div>
                                                            <div class="leader-details">
                                                                <p>₹ 30310</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center leader-board-box">
                                                    <a href="javascript:;" class="viewProfile">
                                                        <div class="d-flex align-items-center gap-10">
                                                            <div class="rank-num">
                                                                6 </div>
                                                            <div class="leader-img">
                                                                <img src="{{ asset('user_dashboard/images/users/avatar-1.jpg') }}"
                                                                    width="60">
                                                            </div>
                                                            <div class="leader-details">
                                                                <h5> Kartik</h5>
                                                            </div>
                                                            <div class="leader-details">
                                                                <p>₹ 30170</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="pt-0 card">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <h4> Today </h4>
                                                </thead>
                                                <tbody>
                                                    @foreach ($today_leaderboards as $today_key => $today_leaderboard)
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    <img src="{{ asset('frontend/images/avatar/' . $today_leaderboard->user->avatar) }}"
                                                                        class="avatar-sm img-thumbnail rounded-circle"
                                                                        onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'"
                                                                        alt="Generic placeholder image">
                                                                </div>
                                                            </td>

                                                            <td>
                                                                {{ $today_leaderboard->user->name }}
                                                            </td>

                                                            <td style="color:#00b620;">
                                                                ₹{{ $today_leaderboard->total_commission }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="pt-0 card">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-hover table-centered m-0">

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
                                <div class="col-xl-6 col-lg-6">
                                    <div class="pt-0 card">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-hover table-centered m-0">

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
                                <div class="col-xl-6 col-lg-6">
                                    <div class="pt-0 card">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-hover table-centered m-0">

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
@endsection

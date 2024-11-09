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
                                                    <span style="font-size: 16px; color: #fff;">{{Carbon\Carbon::today()->format('d-M-Y')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3 position-relative justify-content-center gap-90 mt-4">
                                                @isset($today_leaderboards[1])
                                                    <div class="box-left">
                                                        <a href="javascript:;" class="viewProfile">
                                                            <div class="top-rank-image">
                                                                <img src="{{ asset('frontend/images/avatar/' . $today_leaderboards[1]->user->avatar) }}"
                                                                    width="80" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                <span class="rank-circle">2</span>
                                                            </div>
                                                            <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                                style="font-size: 12px;">{{strstr($today_leaderboards[1]->user->name, " ", true)}}</h6>
                                                            <p class="text-center earning-color">₹ {{$today_leaderboards[1]->total_commission}}</p>
                                                        </a>
                                                    </div>
                                                @endisset
                                                @isset($today_leaderboards[0])
                                                    <div class="box-center">
                                                        <a href="javascript:;" class="viewProfile">
                                                            <div class="top-rank-image">
                                                                <img src="{{ asset('frontend/images/avatar/' . $today_leaderboards[0]->user->avatar) }}"
                                                                    width="80" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                <span class="rank-circle">1</span>
                                                            </div>
                                                            <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                                style="font-size: 12px;">{{strstr($today_leaderboards[0]->user->name, " ", true)}}</h6>
                                                            <p class="text-center earning-color">₹ {{$today_leaderboards[0]->total_commission}}</p>
                                                        </a>
                                                    </div>
                                                @endisset
                                                @isset($today_leaderboards[2])
                                                    <div class="box-right">
                                                        <a href="javascript:;" class="viewProfile">
                                                            <div class="top-rank-image">
                                                                <img src="{{ asset('frontend/images/avatar/' . $today_leaderboards[2]->user->avatar) }}"
                                                                    width="80" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                <span class="rank-circle">3</span>
                                                            </div>
                                                            <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                                style="font-size: 12px;">{{strstr($today_leaderboards[2]->user->name, " ", true)}}</h6>
                                                            <p class="text-center earning-color">₹ {{$today_leaderboards[2]->total_commission}}</p>
                                                        </a>
                                                    </div>
                                                @endisset
                                            </div>
                                            <div class="table-responsive">
                                                @foreach ($today_leaderboards as $today_key => $today_leaderboard)
                                                    @if($today_key > 2)
                                                        <div class="d-flex align-items-center leader-board-box">
                                                            <a href="javascript:;" class="viewProfile">
                                                                <div class="d-flex align-items-center gap-10">
                                                                    <div class="rank-num">
                                                                        {{$today_key+1}} </div>
                                                                    <div class="leader-img">
                                                                        <img src="{{ asset('frontend/images/avatar/' . $today_leaderboard->user->avatar) }}"
                                                                            width="60" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                    </div>
                                                                    <div class="leader-details">
                                                                        <h5> {{ $today_leaderboard->user->name }}</h5>
                                                                    </div>
                                                                    <div class="leader-details">
                                                                        <p>₹ {{ $today_leaderboard->total_commission }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
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
                                                    <small>Last 7 days</small>
                                                    <br>
                                                    <span style="font-size: 16px; color: #fff;">({{Carbon\Carbon::today()->format('d-M-Y')}} - {{Carbon\Carbon::now()->subDays(7)->format('d-M-Y')}})</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3 position-relative justify-content-center gap-90 mt-4">
                                                @isset($last_week_leaderboards[1])
                                                    <div class="box-left">
                                                        <a href="javascript:;" class="viewProfile">
                                                            <div class="top-rank-image">
                                                                <img src="{{ asset('frontend/images/avatar/' . $last_week_leaderboards[1]->user->avatar) }}"
                                                                    width="80" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                <span class="rank-circle">2</span>
                                                            </div>
                                                            <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                                style="font-size: 12px;">{{strstr($last_week_leaderboards[1]->user->name, " ", true)}}</h6>
                                                            <p class="text-center earning-color">₹ {{$last_week_leaderboards[1]->total_commission}}</p>
                                                        </a>
                                                    </div>
                                                @endisset
                                                @isset($last_week_leaderboards[0])
                                                    <div class="box-center">
                                                        <a href="javascript:;" class="viewProfile">
                                                            <div class="top-rank-image">
                                                                <img src="{{ asset('frontend/images/avatar/' . $last_week_leaderboards[0]->user->avatar) }}"
                                                                    width="80" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                <span class="rank-circle">1</span>
                                                            </div>
                                                            <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                                style="font-size: 12px;">{{strstr($last_week_leaderboards[0]->user->name, " ", true)}}</h6>
                                                            <p class="text-center earning-color">₹ {{$last_week_leaderboards[0]->total_commission}}</p>
                                                        </a>
                                                    </div>
                                                @endisset
                                                @isset($last_week_leaderboards[2])
                                                    <div class="box-right">
                                                        <a href="javascript:;" class="viewProfile">
                                                            <div class="top-rank-image">
                                                                <img src="{{ asset('frontend/images/avatar/' . $last_week_leaderboards[2]->user->avatar) }}"
                                                                    width="80" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                <span class="rank-circle">3</span>
                                                            </div>
                                                            <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                                style="font-size: 12px;">{{strstr($last_week_leaderboards[2]->user->name, " ", true)}}</h6>
                                                            <p class="text-center earning-color">₹ {{$last_week_leaderboards[2]->total_commission}}</p>
                                                        </a>
                                                    </div>
                                                @endisset
                                            </div>
                                            <div class="table-responsive">
                                                @foreach ($last_week_leaderboards as $week_key => $last_week_leaderboard)
                                                    @if($week_key > 2)
                                                        <div class="d-flex align-items-center leader-board-box">
                                                            <a href="javascript:;" class="viewProfile">
                                                                <div class="d-flex align-items-center gap-10">
                                                                    <div class="rank-num">
                                                                        {{$week_key+1}} </div>
                                                                    <div class="leader-img">
                                                                        <img src="{{ asset('frontend/images/avatar/' . $last_week_leaderboard->user->avatar) }}"
                                                                            width="60" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                    </div>
                                                                    <div class="leader-details">
                                                                        <h5> {{ $last_week_leaderboard->user->name }}</h5>
                                                                    </div>
                                                                    <div class="leader-details">
                                                                        <p>₹ {{ $last_week_leaderboard->total_commission }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
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
                                                    <small>Last Month</small>
                                                    <br>
                                                    <span style="font-size: 16px; color: #fff;">({{Carbon\Carbon::today()->format('d-M-Y')}} - {{Carbon\Carbon::now()->subDays(30)->format('d-M-Y')}})</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3 position-relative justify-content-center gap-90 mt-4">
                                                @isset($last_month_leaderboards[1])
                                                    <div class="box-left">
                                                        <a href="javascript:;" class="viewProfile">
                                                            <div class="top-rank-image">
                                                                <img src="{{ asset('frontend/images/avatar/' . $last_month_leaderboards[1]->user->avatar) }}"
                                                                    width="80" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                <span class="rank-circle">2</span>
                                                            </div>
                                                            <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                                style="font-size: 12px;">{{strstr($last_month_leaderboards[1]->user->name, " ", true)}}</h6>
                                                            <p class="text-center earning-color">₹ {{$last_month_leaderboards[1]->total_commission}}</p>
                                                        </a>
                                                    </div>
                                                @endisset
                                                @isset($last_month_leaderboards[0])
                                                    <div class="box-center">
                                                        <a href="javascript:;" class="viewProfile">
                                                            <div class="top-rank-image">
                                                                <img src="{{ asset('frontend/images/avatar/' . $last_month_leaderboards[0]->user->avatar) }}"
                                                                    width="80" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                <span class="rank-circle">1</span>
                                                            </div>
                                                            <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                                style="font-size: 12px;">{{strstr($last_month_leaderboards[0]->user->name, " ", true)}}</h6>
                                                            <p class="text-center earning-color">₹ {{$last_month_leaderboards[0]->total_commission}}</p>
                                                        </a>
                                                    </div>
                                                @endisset
                                                @isset($last_month_leaderboards[2])
                                                    <div class="box-right">
                                                        <a href="javascript:;" class="viewProfile">
                                                            <div class="top-rank-image">
                                                                <img src="{{ asset('frontend/images/avatar/' . $last_month_leaderboards[2]->user->avatar) }}"
                                                                    width="80" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                <span class="rank-circle">3</span>
                                                            </div>
                                                            <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                                style="font-size: 12px;">{{strstr($last_month_leaderboards[2]->user->name, " ", true)}}</h6>
                                                            <p class="text-center earning-color">₹ {{$last_month_leaderboards[2]->total_commission}}</p>
                                                        </a>
                                                    </div>
                                                @endisset
                                            </div>
                                            <div class="table-responsive">
                                                @foreach ($last_month_leaderboards as $month_key => $last_month_leaderboard)
                                                    @if($month_key > 2)
                                                        <div class="d-flex align-items-center leader-board-box">
                                                            <a href="javascript:;" class="viewProfile">
                                                                <div class="d-flex align-items-center gap-10">
                                                                    <div class="rank-num">
                                                                        {{$month_key+1}} </div>
                                                                    <div class="leader-img">
                                                                        <img src="{{ asset('frontend/images/avatar/' . $last_month_leaderboard->user->avatar) }}"
                                                                            width="60" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                    </div>
                                                                    <div class="leader-details">
                                                                        <h5> {{ $last_month_leaderboard->user->name }}</h5>
                                                                    </div>
                                                                    <div class="leader-details">
                                                                        <p>₹ {{ $last_month_leaderboard->total_commission }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
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
                                                    <small>All Time</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3 position-relative justify-content-center gap-90 mt-4">
                                                @isset($all_time_leaderboards[1])
                                                    <div class="box-left">
                                                        <a href="javascript:;" class="viewProfile">
                                                            <div class="top-rank-image">
                                                                <img src="{{ asset('frontend/images/avatar/' . $all_time_leaderboards[1]->user->avatar) }}"
                                                                    width="80" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                <span class="rank-circle">2</span>
                                                            </div>
                                                            <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                                style="font-size: 12px;">{{strstr($all_time_leaderboards[1]->user->name, " ", true)}}</h6>
                                                            <p class="text-center earning-color">₹ {{$all_time_leaderboards[1]->total_commission}}</p>
                                                        </a>
                                                    </div>
                                                @endisset
                                                @isset($all_time_leaderboards[0])
                                                    <div class="box-center">
                                                        <a href="javascript:;" class="viewProfile">
                                                            <div class="top-rank-image">
                                                                <img src="{{ asset('frontend/images/avatar/' . $all_time_leaderboards[0]->user->avatar) }}"
                                                                    width="80" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                <span class="rank-circle">1</span>
                                                            </div>
                                                            <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                                style="font-size: 12px;">{{strstr($all_time_leaderboards[0]->user->name, " ", true)}}</h6>
                                                            <p class="text-center earning-color">₹ {{$all_time_leaderboards[0]->total_commission}}</p>
                                                        </a>
                                                    </div>
                                                @endisset
                                                @isset($all_time_leaderboards[2])
                                                    <div class="box-right">
                                                        <a href="javascript:;" class="viewProfile">
                                                            <div class="top-rank-image">
                                                                <img src="{{ asset('frontend/images/avatar/' . $all_time_leaderboards[2]->user->avatar) }}"
                                                                    width="80" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                <span class="rank-circle">3</span>
                                                            </div>
                                                            <h6 class="text-black fw-600 text-center mt-3 top-header"
                                                                style="font-size: 12px;">{{strstr($all_time_leaderboards[2]->user->name, " ", true)}}</h6>
                                                            <p class="text-center earning-color">₹ {{$all_time_leaderboards[2]->total_commission}}</p>
                                                        </a>
                                                    </div>
                                                @endisset
                                            </div>
                                            <div class="table-responsive">
                                                @foreach ($all_time_leaderboards as $all_key => $all_time_leaderboard)
                                                    @if($all_key > 2)
                                                        <div class="d-flex align-items-center leader-board-box">
                                                            <a href="javascript:;" class="viewProfile">
                                                                <div class="d-flex align-items-center gap-10">
                                                                    <div class="rank-num">
                                                                        {{$all_key+1}} </div>
                                                                    <div class="leader-img">
                                                                        <img src="{{ asset('frontend/images/avatar/' . $all_time_leaderboard->user->avatar) }}"
                                                                            width="60" onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                                                    </div>
                                                                    <div class="leader-details">
                                                                        <h5> {{ $all_time_leaderboard->user->name }}</h5>
                                                                    </div>
                                                                    <div class="leader-details">
                                                                        <p>₹ {{ $all_time_leaderboard->total_commission }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endif
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
@endsection

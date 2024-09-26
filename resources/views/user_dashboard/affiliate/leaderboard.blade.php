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
                                <div class="col-xl-6 col-lg-6">
                                    <div class="pt-0 card">
                                        <h4 class="mb-0">Today</h4><hr>
                                        <div class="row gx-2">
                                            <div class="col-4 text-center">
                                                <img src="{{asset('user_dashboard/images/users/avatar-1.jpg')}}" alt="image" class="img-fluid rounded-circle" width="80">
                                                 <span class="badge bg-success rounded-pill rank_no_2">2</span>
                                                <p class="mb-0">
                                                    <span class="badge bg-warning fw-bold">Shailesh Gupta</span>
                                                    <p class="fw-bold">₹3000</p>
                                                </p>
                                            </div>
                                            <div class="col-4 text-center">
                                                <img src="{{asset('user_dashboard/images/users/avatar-1.jpg')}}" alt="image" class="img-fluid rounded-circle" width="120">
                                                <span class="badge bg-success rounded-pill rank_no_1">1</span>
                                                <p class="mb-0">
                                                    <span class="badge bg-warning fw-bold">Shailesh Gupta</span>
                                                    <p class="fw-bold">₹3000</p>
                                                </p>
                                            </div>
                                            <div class="col-4 text-center">
                                                <img src="{{asset('user_dashboard/images/users/avatar-1.jpg')}}" alt="image" class="img-fluid rounded-circle" width="80">
                                                <span class="badge bg-success rounded-pill rank_no_3">3</span>
                                                <p class="mb-0">
                                                    <span class="badge bg-warning fw-bold">Shailesh Gupta</span>
                                                    <p class="fw-bold">₹3000</p>
                                                </p>
                                            </div>

                                        </div>
                                        @foreach ($today_leaderboards as $today_key=>$today_leaderboard)
                                        <div class="erng-box">
                                            <div class="d-flex align-items-center px-2 py-1">
                                                <div class="first me-2">
                                                    <span class="badge bg-success sr_no rounded-pill float-end">1</span>
                                                </div>
                                                <div class="position-relative">
                                                    <span class="user-status online"></span>
                                                    <img src="{{ asset('frontend/images/avatar/'.$today_leaderboard->user->avatar) }}" class="avatar-sm rounded-circle" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" height="42" alt="user">
                                                </div>
                                                <div class="flex-5">
                                                    <h5 class="mt-0 mb-0 font-14 text-dark">
                                                        {{$today_leaderboard->user->name}}
                                                    </h5>
                                                    <div class="prc">
                                                       <h6> ₹{{$today_leaderboard->total_commission}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="pt-0 card">
                                        <h4 class="mb-0">Last 7 Days</h4><hr>
                                        @foreach ($last_week_leaderboards as $week_key=>$last_week_leaderboard)
                                        <div class="erng-box">
                                            <div class="d-flex align-items-center px-2 py-1">
                                                <div class="first me-2">
                                                    <span class="badge bg-success sr_no rounded-pill float-end">1</span>
                                                </div>
                                                <div class="position-relative">
                                                    <span class="user-status online"></span>
                                                    <img src="{{ asset('frontend/images/avatar/'.$last_week_leaderboard->user->avatar) }}" class="avatar-sm rounded-circle" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-5">
                                                    <h5 class="mt-0 mb-0 font-14 text-dark">
                                                        {{$last_week_leaderboard->user->name}}
                                                    </h5>
                                                    <div class="prc">
                                                       <h6> ₹{{$last_week_leaderboard->total_commission}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="pt-0 card">
                                        <h4 class="mb-0">Last 30 Days</h4><hr>
                                        @foreach ($last_month_leaderboards as $month_key=>$last_month_leaderboard)
                                        <div class="erng-box">
                                            <div class="d-flex align-items-center px-2 py-1">
                                                <div class="first me-2">
                                                    <span class="badge bg-success sr_no rounded-pill float-end">1</span>
                                                </div>
                                                <div class="position-relative">
                                                    <span class="user-status online"></span>
                                                    <img src="{{ asset('frontend/images/avatar/'.$last_month_leaderboard->user->avatar) }}" class="avatar-sm rounded-circle" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-5">
                                                    <h5 class="mt-0 mb-0 font-14 text-dark">
                                                        {{$last_week_leaderboard->user->name}}
                                                    </h5>
                                                    <div class="prc">
                                                       <h6> ₹{{$last_week_leaderboard->total_commission}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="pt-0 card">
                                        <h4 class="mb-0">ALL TIME</h4><hr>
                                        @foreach ($all_time_leaderboards as $all_key=>$all_time_leaderboard)
                                        <div class="erng-box">
                                            <div class="d-flex align-items-center px-2 py-1">
                                                <div class="first me-2">
                                                    <span class="badge bg-success sr_no rounded-pill float-end">1</span>
                                                </div>
                                                <div class="position-relative me-2">
                                                    <span class="user-status online"></span>
                                                    <img src="{{ asset('frontend/images/avatar/'.$all_time_leaderboard['user']['avatar']) }}" class="avatar-sm rounded-circle" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-5">
                                                    <h5 class="mt-0 mb-0 font-14 text-dark">
                                                        {{$all_time_leaderboard['user']['name']}}
                                                    </h5>
                                                    <div class="prc">
                                                       <h6> ₹{{$all_time_leaderboard['total_commission']}}</h6>
                                                    </div>
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
@endsection

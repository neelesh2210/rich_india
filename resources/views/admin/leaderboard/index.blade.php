@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@isset($page_title) {{$page_title}} @endisset</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="card card-outline card-success">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4 class="header-title">Last 7 Days</h4>
                                            </div>
                                            <div class="card-body pt-2">
                                                @foreach ($last_week_leaderboards as $week_key=>$last_week_leaderboard)
                                                    <div class="d-flex align-items-start br-btm  @if($week_key != 0) mt-3 @endif">
                                                        <img class="me-3 img-crcl" src="{{ asset('frontend/images/avatar/'.$last_week_leaderboard->user->avatar) }}" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" width="40" alt="Generic placeholder image">
                                                        <div class="w-75 overflow-hidden my-auto">
                                                            <span class="badge badge-primary-lighten float-end">₹ {{$last_week_leaderboard->total_commission}}</span>
                                                            <h5 class="mt-0 mb-1">{{$last_week_leaderboard->user->name}}</h5>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="card card-outline card-warning">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4 class="header-title">Last 30 Days</h4>
                                            </div>
                                            <div class="card-body pt-2">
                                                @foreach ($last_month_leaderboards as $month_key=>$last_month_leaderboard)
                                                    <div class="d-flex align-items-start br-btm  @if($month_key != 0) mt-3 @endif">
                                                        <img class="me-3 img-crcl" src="{{ asset('frontend/images/avatar/'.$last_month_leaderboard->user->avatar) }}" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" width="40" alt="Generic placeholder image">
                                                        <div class="w-75 overflow-hidden my-auto">
                                                            <span class="badge badge-primary-lighten float-end">₹ {{$last_month_leaderboard->total_commission}}</span>
                                                            <h5 class="mt-0 mb-1">{{$last_month_leaderboard->user->name}}</h5>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="card card-outline card-danger">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4 class="header-title">All Time</h4>
                                            </div>
                                            <div class="card-body pt-2">
                                                @foreach ($all_time_leaderboards as $all_key=>$all_time_leaderboard)
                                                    <div class="d-flex align-items-start br-btm  @if($all_key != 0) mt-3 @endif">
                                                        <img class="me-3 img-crcl" src="{{ asset('frontend/images/avatar/'.$all_time_leaderboard['user']['avatar']) }}" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" width="40" alt="Generic placeholder image">
                                                        <div class="w-75 overflow-hidden my-auto">
                                                            <span class="badge badge-primary-lighten float-end">₹ {{$all_time_leaderboard['total_commission']}}</span>
                                                            <h5 class="mt-0 mb-1">{{$all_time_leaderboard['user']['name']}}</h5>
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
        </section>
    </div>
@endsection

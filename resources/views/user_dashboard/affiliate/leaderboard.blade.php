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
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <h4> Today </h4>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th colspan="2">Member</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    @foreach ($today_leaderboards as $today_key=>$today_leaderboard)
                                                    <tr>

                                                        <td> <img src="{{ asset('frontend/images/avatar/' . $today_leaderboard->user->avatar) }}" class="avatar-sm img-thumbnail rounded-circle" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'"></td>
                                                        <th>{{ $today_leaderboard->user->name }} <br> <span class="badge bg-warning">Rank {{$today_key+1}}</span></th>
                                                        <td style="color:red" class="fw-bold">₹{{ $today_leaderboard->total_commission }}</td>
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
                                                    @foreach ($last_week_leaderboards as $week_key=>$last_week_leaderboard)
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    <img src="{{ asset('frontend/images/avatar/'.$last_week_leaderboard->user->avatar) }}" class="avatar-sm img-thumbnail rounded-circle" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" alt="Generic placeholder image">
                                                                </div>
                                                            </td>

                                                            <td>
                                                                {{$last_week_leaderboard->user->name}}
                                                            </td>

                                                            <td style="color:#00b620;">
                                                                ₹{{$last_week_leaderboard->total_commission}}
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
                                                    @foreach ($last_month_leaderboards as $month_key=>$last_month_leaderboard)
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    <img src="{{ asset('frontend/images/avatar/'.$last_month_leaderboard->user->avatar) }}" class="avatar-sm img-thumbnail rounded-circle" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" alt="Generic placeholder image">
                                                                </div>
                                                            </td>

                                                            <td>
                                                                {{$last_month_leaderboard->user->name}}
                                                            </td>

                                                            <td style="color:#00b620;">
                                                                ₹{{$last_month_leaderboard->total_commission}}
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
                                                    @foreach ($all_time_leaderboards as $all_key=>$all_time_leaderboard)
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    <img src="{{ asset('frontend/images/avatar/'.$all_time_leaderboard['user']['avatar']) }}" class="avatar-sm img-thumbnail rounded-circle" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" alt="Generic placeholder image">
                                                                </div>
                                                            </td>

                                                            <td>
                                                                {{$all_time_leaderboard['user']['name']}}
                                                            </td>

                                                            <td style="color:#00b620;">
                                                                ₹{{$all_time_leaderboard['total_commission']}}
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

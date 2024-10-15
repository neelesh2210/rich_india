@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row mt-2">
                    <div class="col-md-12">
                    <div class="form-check form-switch float-end mb-2">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onclick="changeDashboard()">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Switch Old Dashboard</label>
                    </div>
                    </div>
                    <div class="col-md-12">
                        @php
                            $dat = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
                            $date = $dat->format('H');
                            if ($date < 12) {
                                $greet_message = 'Good morning';
                            } elseif ($date < 17) {
                                $greet_message = 'Good afternoon';
                            } elseif ($date < 20) {
                                $greet_message = 'Good evening';
                            } else {
                                $greet_message = 'Good night';
                            }
                        @endphp
                        <h1 class="welcome__usre"><span>{{ $greet_message }}, </span>
                            {{ Auth::guard('web')->user()->name ? Auth::guard('web')->user()->name : 'User' }}</h1>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-3">
                        <div class="left-side-menu">
                            <div class="ribbon">
                                <span>{{Auth::guard('web')->user()->userDetail->plan->title}}</span>
                            </div>
                            <div class="user-box text-center mb-2">
                                <img src="{{asset('frontend/images/avatar/'.Auth::guard('web')->user()->avatar)}}" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" height="100" class="rounded-circle shadow-sm">
                            </div>
                            <p class="leftbar-user-name">
                                {{ Auth::guard('web')->user()->name ? Auth::guard('web')->user()->name : 'User' }}</p>
                            <div class="text-center">
                                <input type="hidden" value="{{env('APP_URL')}}?referrer_code={{ encrypt(Auth::guard('web')->user()->referrer_code) }}" id="referral_link">
                                <p class="text-center fw-bolder mr-2">ID: {{ Auth::guard('web')->user()->referrer_code }}
                                    <a class="btn btn-success pb" onclick="copyText()"><i class="uil-copy" style="font-size: 20px;"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card widget-flat gradient-45deg-light-blue-cyan" data-aos="fade-left" data-aos-duration="500" data-aos-once="true">
                                    <div class="card-body">
                                        <img src="{{asset('user_dashboard/images/circle.svg')}}" alt="circle-image">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{ $today_earning }}</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Customers">Today's Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card widget-flat gradient-45deg-red-pink">
                                    <div class="card-body">
                                        <img src="{{asset('user_dashboard/images/circle.svg')}}" alt="circle-image">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{ $last_week_earning }}</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Orders">Last 7 Days Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card widget-flat statistic-bg-purple">
                                    <div class="card-body">
                                        <img src="{{asset('user_dashboard/images/circle.svg')}}" alt="circle-image">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{ $last_month_earning }}</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Orders">Last 30 Days Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card widget-flat gradient-45deg-green-teal">
                                    <div class="card-body">
                                        <img src="{{asset('user_dashboard/images/circle.svg')}}" alt="circle-image">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{ $all_time_earning + $old_payout->old_paid_payout + $old_payout->old_not_paid_payout }}</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Orders">All Time Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card widget-flat bg-gradient-moonlit">
                                    <div class="card-body">
                                        <img src="{{asset('user_dashboard/images/circle.svg')}}" alt="circle-image">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{$passive_income}}</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Orders">Passive Income</h5>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-4">
                                <div class="card widget-flat bg-gradient-moonlit">
                                    <div class="card-body">
                                        <img src="{{asset('user_dashboard/images/circle.svg')}}" alt="circle-image">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">6548</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Customers">Pending Amount</h5>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.counter-value').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });

        function copyText() {
            navigator.clipboard.writeText($('#referral_link').val());
        }
        function changeDashboard(){
            window.location.replace("{{route('user.dashboard')}}?type=old");
        }
    </script>
@endsection

@extends('user_dashboard.layouts.app')
@section('content')
    <link href="{{ asset('frontend/flip/flip.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .user-earnings span {
            font-size: 22px;
        }
    </style>

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Qualification Details</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card-list-2 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="#">
                                            <img src="{{ asset('user_dashboard/images/trophy.png') }}" alt="Card image"
                                                style="width:75px">
                                        </a>
                                    </div>
                                    <div class="card-body px-1 py-0">
                                        <p>{{ $target->description_one }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-list-2 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="#">
                                            <img src="{{ asset('user_dashboard/images/target.png') }}" alt="Card image"
                                                style="width:75px">
                                        </a>
                                    </div>
                                    <div class="card-body px-1 py-0">
                                        <p>{{ $target->description_two }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-list-2 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="#">
                                            <img src="{{ asset('user_dashboard/images/schedule.png') }}" alt="Card image"
                                                style="width:75px">
                                        </a>
                                    </div>
                                    <div class="card-body px-1 py-0">
                                        <p>{{ $target->description_three }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="row">
                            <div class="col-md-8 m-auto">
                                <div class="tick" data-did-init="handle_tickInit">
                                    <div data-repeat="true" data-layout="horizontal center fit"
                                        data-transform="preset(d, h, m, s) -> delay">
                                        <div class="tick-group">
                                            <div data-key="value" data-repeat="true"
                                                data-transform="pad(00) -> split -> delay">
                                                <span data-view="flip"></span>
                                            </div>
                                            <span data-key="label" data-view="text" class="tick-label"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 offset-lg-2">
                                <div class="single-progress">
                                    <h5 style="color: #051c43;">Achieve <span
                                            class="progress-number">{{ $avg_percent }}%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar wow fadeInLeft" role="progressbar"
                                            style="width: {{ $avg_percent }}%" aria-valuenow="65" aria-valuemin="0"
                                            aria-valuemax="100"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            @if ($target->no_of_referral != 0)
                                <div class="col-sm-4">
                                    <div class="card widget-flat gradient-45deg-thirty-earning bg-img1-opacity">
                                        <div class="card-body user-earnings">
                                            <h3> <span>{{ $total_affiliate_user }}</span>
                                            </h3>
                                            <h5 title="Referrals">Referrals</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card widget-flat gradient-45deg-thirty-earning bg-img1-opacity">
                                        <div class="card-body user-earnings">
                                            <h3> <span>{{ $target->no_of_referral }}</span>
                                            </h3>
                                            <h5 title="Referrals">Target Referrals
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($target->amount != 0)
                                <div class="col-sm-4">
                                    <div class="card widget-flat gradient-45deg-thirty-earning bg-img1-opacity">
                                        <div class="card-body user-earnings">
                                            <h3><small><i class="fas fa-rupee-sign"></i></small> <span
                                                    class="counter-value text-white">{{ $target->amount }}</span>
                                            </h3>
                                            <h5 title="Number of Orders">Target Amount</h5>
                                            {{-- <div class="progress progress-sm m-0">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="90"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                    <span class="visually-hidden">90% Complete</span>
                                                </div>
                                            </div>
                                            <h5 title="Number of Customers" style="margin-bottom: 0;">View details <span
                                                    class="r8-arw"><i class="fas fa-chevron-right text-white"></i></span></h5> --}}
                                        </div>
                                    </div>
                                </div>
                                @if ($remaining_commission <= 0)
                                    <div class="col-sm-4">
                                        <div class="card widget-flat gradient-45deg-red-pink bg-img1-opacity">
                                            <div class="card-body user-earnings">
                                                <h3>
                                                    <small><i class="fas fa-rupee-sign"></i></small>
                                                    @if ($remaining_commission <= 0)
                                                        <span class="counter-value text-white">0</span>
                                                    @else
                                                        <span
                                                            class="counter-value text-white">{{ $remaining_commission }}</span>
                                                    @endif
                                                </h3>
                                                <h5 title="Number of Orders">Remaining Amount</h5>
                                                {{-- <div class="progress progress-sm m-0">
                                                    <div class="progress-bar bg-purple" role="progressbar"
                                                        aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 90%">
                                                        <span class="visually-hidden">90% Complete</span>
                                                    </div>
                                                </div>
                                                <h5 title="Number of Customers" style="margin-bottom: 0;">View details <span
                                                        class="r8-arw"><i
                                                            class="fas fa-chevron-right text-white"></i></span></h5> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-sm-4">
                                    <div class="card widget-flat gradient-45deg-thirty-earning bg-img1-opacity">
                                        <div class="card-body user-earnings">
                                            <h3><small><i class="fas fa-rupee-sign"></i></small>
                                                @if ($commission <= 0)
                                                    <span class="counter-value text-white">0</span>
                                                @else
                                                    <span class="counter-value text-white">{{ $commission }}</span>
                                                @endif
                                            </h3>
                                            <h5 title="Number of Orders">Achieved Amount</h5>
                                            {{-- <div class="progress progress-sm m-0">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="90"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                    <span class="visually-hidden">90% Complete</span>
                                                </div>
                                            </div>
                                            <h5 title="Number of Customers" style="margin-bottom: 0;">View details <span
                                                    class="r8-arw"><i class="fas fa-chevron-right text-white"></i></span>
                                            </h5> --}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('frontend/flip/flip.min.js') }}"></script>
    <script>
        function handle_tickInit(tick) {
            // Define the target date in ISO 8601 format
            var targetDate = "2025-02-20T00:00:00";

            // Initialize the countdown using Tick library
            Tick.count.down(targetDate).onupdate = function(value) {
                tick.value = value;
            };
        }
    </script>
@endsection

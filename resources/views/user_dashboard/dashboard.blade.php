@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right float-start">
                                <div class="text-center mb-2">
                                    <img src="{{ 'user_dashboard/images/users/avatar-1.jpg' }}" alt="user-image" height="80" class="rounded-circle shadow-sm">
                                </div>
                                <p class="leftbar-user-name">{{Auth::guard('web')->user()->name ? Auth::guard('web')->user()->name : 'User'}}</p>
                                <p class="text-center">{{Auth::guard('web')->user()->referrer_code}}</p>
                            </div>
                            <h4 class="page-title float-end">Dashboard</h4>
                        </div>
                    </div>
                </div> --}}
                <div class="row mt-3 mb-3">
                    <div class="col-lg-3">
                        <div class="left-side-menu">
                            <div class="ribbon">
                                <span>{{Auth::guard('web')->user()->userDetail->plan->title}}</span>
                            </div>
                            <div class="user-box text-center mb-2">
                                <img src="{{asset('frontend/images/avatar/'.Auth::guard('web')->user()->avatar)}}" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" class="rounded-circle shadow-sm">
                            </div>
                            <p class="leftbar-user-name">
                                {{ Auth::guard('web')->user()->name ? Auth::guard('web')->user()->name : 'User' }}</p>
                            <div class="text-center">
                                <input type="hidden" value="{{env('APP_URL')}}?referrer_code={{Auth::guard('web')->user()->referrer_code}}" id="referral_link">
                                <p class="text-center fw-bolder mr-2">ID: {{ Auth::guard('web')->user()->referrer_code }}
                                    <a class="btn btn-success pb" onclick="copyText()"><i class="uil-copy" style="font-size: 20px;"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat gradient-45deg-light-blue-cyan" data-aos="fade-left" data-aos-duration="500" data-aos-once="true">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{$today_earning}}</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Customers">Today's Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat gradient-45deg-red-pink">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{$last_week_earning}}</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Orders">Last 7 Days Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat statistic-bg-purple">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{$last_month_earning}}</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Orders">Last 30 Days Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat gradient-45deg-green-teal">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{$all_time_earning + $old_payout->old_paid_payout + $old_payout->old_not_paid_payout}}</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Orders">All Time Earning</h5>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-3 mb-2">
                                <div class="card widget-flat gradient-45deg-amber-amber">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{$withdrawal_amount}}</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Orders">Withdrawal Bonus</h5>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-sm-3 mb-2">
                                <div class="card widget-flat gradient-45deg-amber-amber">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{$active_income}}</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Orders">Active Income</h5>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat gradient-45deg-amber-amber">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{$passive_income}}</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Orders">Passive Income</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat bg-gradient-moonlit">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{$remaining_amount}}</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Customers">Pending Amount</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat bg-gradient-moonlit">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">{{Auth::guard('web')->user()->userDetail->total_wallet_balance}}</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Customers">Total Wallet Amount</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-info">
                                    <div class="card-header text-center">
                                        <h3 class="card-title">Total Transaction</h3>
                                        <p> Last 30 Days</p>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/js/Chart.min.js')}}"></script>
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
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: "success",
                title: 'Referral Code Copied SuccessfullY!',
            });
        }
    </script>
    <script>
        $(function () {
          var areaChartData = {
            labels  : [
                @foreach ($dates as $date)
                    '{{ $date }}',
                @endforeach
            ],
            datasets: [
              {
                label               : 'Transaction',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [
                    @foreach ($values as $value)
                        {{ $value }},
                    @endforeach
                ]
              },
            ]
          }

          var areaChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
              display: false
            },
            scales: {
              xAxes: [{
                gridLines : {
                  display : false,
                }
              }],
              yAxes: [{
                gridLines : {
                  display : false,
                }
              }]
            }
          }

          //-------------
          //- LINE CHART -
          //--------------
          var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
          var lineChartOptions = $.extend(true, {}, areaChartOptions)
          var lineChartData = $.extend(true, {}, areaChartData)
          lineChartData.datasets[0].fill = false;
          lineChartOptions.datasetFill = false

          var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
          })
        })
      </script>
@endsection

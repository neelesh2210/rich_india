@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page" style="background: radial-gradient(circle at 10% 20%, rgb(0, 102, 161) 0%, rgb(0, 68, 108) 90.1%);">
        <div class="content">
            <div class="container-fluid">
                <div class="row mt-2">
                    <div class="col-md-12">
                    <div class="form-check form-switch float-end mb-2">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onclick="changeDashboard()">
                        <label class="form-check-label" for="flexSwitchCheckDefault" style="color: #fff;">Switch Old Dashboard</label>
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
                        <h1 class="welcome__usre" style="background: radial-gradient(#d6d7d74f, #00000000);color: #fff;"><span>{{ $greet_message }}, </span>
                            {{ Auth::guard('web')->user()->name ? Auth::guard('web')->user()->name : 'User' }}</h1>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-4 mb-3">
                        <div class="left-side-menu-new">
                            <div class="user-box text-center mb-2">
                                <img src="{{asset('frontend/images/avatar/'.Auth::guard('web')->user()->avatar)}}" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" height="100" class="rounded-circle shadow-sm">
                            </div>
                            <p class="leftbar-user-name-new">
                                {{ Auth::guard('web')->user()->name ? Auth::guard('web')->user()->name : 'User' }}</p>
                            <h5 class="pckg_name">{{Auth::guard('web')->user()->userDetail->plan->title}}</h5>
                                <div class="text-center">
                                <input type="hidden" value="{{env('APP_URL')}}?referrer_code={{ encrypt(Auth::guard('web')->user()->referrer_code) }}" id="referral_link">
                                <p class="text-center fw-bolder mr-2 text-white mt-2 pkge-id">ID: {{ Auth::guard('web')->user()->referrer_code }}
                                    <a class="btn btn-success pb" onclick="copyText()"><i class="uil-copy" style="font-size: 20px;"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card widget-flat gradient-45deg-light-blue-cyan" data-aos="fade-left" data-aos-duration="500" data-aos-once="true">
                                    <div class="card-body rupee row">
                                        <div class="col-3">
                                            <small><i class="fas fa-rupee-sign"></i></small>
                                        </div>
                                        <div class="col-9">
                                        <h3 class="text-white"><span class="counter-value">{{ $today_earning }}</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:1px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mb-0" title="Number of Customers">Today's Earning</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card widget-flat gradient-45deg-red-pink">
                                    <div class="card-body rupee row">
                                        <div class="col-3">
                                            <small><i class="fas fa-rupee-sign"></i></small>
                                        </div>
                                        <div class="col-9">
                                        <h3 class="text-white"><span class="counter-value">{{ $last_week_earning }}</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:1px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mb-0" title="Number of Orders">Last 7 Days Earning</h5>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card widget-flat statistic-bg-purple">
                                     <div class="card-body rupee row">
                                        <div class="col-3">
                                            <small><i class="fas fa-rupee-sign"></i></small>
                                        </div>
                                        <div class="col-9">
                                        <h3 class="text-white"><span class="counter-value">{{ $last_month_earning }}</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:1px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mb-0" title="Number of Orders">Last 30 Days Earning</h5>
                                    </div>
                                     </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card widget-flat gradient-45deg-green-teal">
                                     <div class="card-body rupee row">
                                        <div class="col-3">
                                            <small><i class="fas fa-rupee-sign"></i></small>
                                        </div>
                                        <div class="col-9">
                                        <h3 class="text-white"><span class="counter-value">{{ $all_time_earning + $old_payout->old_paid_payout + $old_payout->old_not_paid_payout }}</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:1px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mb-0" title="Number of Orders">All Time Earning</h5>
                                    </div>
                                     </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card widget-flat bg-gradient-moonlit">
                                     <div class="card-body rupee row">
                                        <div class="col-3">
                                            <small><i class="fas fa-rupee-sign"></i></small>
                                        </div>
                                        <div class="col-9">
                                        <h3 class="text-white"><span class="counter-value">{{$passive_income}}</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:1px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mb-0" title="Number of Orders">Passive Income</h5>
                                    </div>
                                     </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-4">
                                <div class="card widget-flat bg-gradient-moonlit">
                                     <div class="card-body rupee row">
                                        <div class="col-3">
                                            <small><i class="fas fa-rupee-sign"></i></small>
                                        </div>
                                        <div class="col-9">
                                        <h3 class="text-white"><span class="counter-value">6548</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:1px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mb-0" title="Number of Customers">Pending Amount</h5>
                                    </div>
                                     </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Sales Last 30 Days </h3>
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
                    <div class="col-lg-4">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Pending Amount</h3>
                            </div>
                            <div class="card-body">
                                    <div class="pending text-center">
                                        <div class="content">
                                            <i class="fas fa-lock"></i>
                                            <h2 class="text-dark" title="Pending Amount">Pending Amount</h2>
                                            <h6 class="text-dark counter"><small>Rs.</small>
                                                <span style="font-size:15px;">{{ Auth::guard('web')->user()->userDetail->total_wallet_balance }}</span>
                                            </h6>
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
                    duration: 5000,
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

        function changeDashboard(){
            window.location.replace("{{route('user.dashboard')}}?type=old");
        }
      </script>
@endsection

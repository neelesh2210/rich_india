@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page" style="padding: 0;">
        <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3 new-ht">
            {{-- <div class="breadcrumb-inner">
                <img src="{{ asset('user_dashboard/images/bg-image-10.jpg') }}">
            </div> --}}
        </div>
        <div class="rbt-dashboard-area rbt-section-overlayping-top mb--50">
            <div class="container">
                <div class="row welcome__usrs" style="position: relative">
                    <div class="col-12">
                        @php
                            $dat = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
                            $date = $dat->format('H');
                            if ($date < 12) {
                                $greet_message = 'Good Morning';
                            } elseif ($date < 17) {
                                $greet_message = 'Good Afternoon';
                            } elseif ($date < 20) {
                                $greet_message = 'Good Evening';
                            } else {
                                $greet_message = 'Good Night';
                            }
                        @endphp
                        <h4 class="text-dark fn-11"><span>{{ $greet_message }}, </span>
                            {{ Auth::guard('web')->user()->name ? Auth::guard('web')->user()->name : 'User' }}</h4>
                    </div>
                    {{-- <div class="col-7">
                        <div class="form-check form-switch float-end mb-1">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                onclick="changeDashboard()">
                            <label class="form-check-label text-dark" for="flexSwitchCheckDefault">Switch Old
                                Dashboard</label>
                        </div>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="rbt-dashboard-content-wrapper">
                            <div class="rbt-tutor-information">
                                <div class="rbt-tutor-information-left">
                                    <div class="thumbnail rbt-avatars size-lg">
                                        <img src="{{ asset('frontend/images/avatar/' . Auth::guard('web')->user()->avatar) }}"
                                            onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'">
                                    </div>
                                    <div class="tutor-content">
                                        <h5 class="title">
                                            {{ Auth::guard('web')->user()->name ? Auth::guard('web')->user()->name : 'User' }}
                                        </h5>
                                        <span>{{ Auth::guard('web')->user()->userDetail->plan->title }}</span>
                                        <input type="hidden"
                                        value="{{ env('APP_URL') }}?referrer_code={{ Auth::guard('web')->user()->referrer_code }}"
                                        id="referral_link">
                                        {{-- <div class="rbt-review" style="font-weight:500">
                                            {{ Auth::guard('web')->user()->referrer_code }}
                                            <a class="btn btn-success pb" onclick="copyText()"><i class="uil-copy"
                                                    style="font-size: 13px;"></i></a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    <div class="col-sm-3 col-12">
                            <div class="card widget-flat gradient-today">
                                <div class="card-body user-earnings">
                                    <h3><small ><i class="fas fa-rupee-sign"></i></small> <span class="counter-value">{{ $today_earning }}</span>
                                    </h3>
                                    <h5 title="Number of Orders">Today's Earning</h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                            <span class="visually-hidden">90% Complete</span>
                                        </div>
                                    </div>
                                    <h5 class="text-white" title="Number of Customers" style="margin-bottom: 0;">View details <span
                                            class="r8-arw"><i class="fas fa-chevron-right text-white"></i></span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-12">
                            <div class="card widget-flat gradient-45deg-red-pink">
                                <div class="card-body user-earnings">
                                    <h3><small ><i class="fas fa-rupee-sign"></i></small> <span class="counter-value">{{ $last_week_earning }}</span>
                                    </h3>
                                    <h5  title="Number of Orders">7 Days Earning</h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                            <span class="visually-hidden">90% Complete</span>
                                        </div>
                                    </div>
                                    <h5  title="Number of Customers" style="margin-bottom: 0;">View details <span
                                            class="r8-arw"><i class="fas fa-chevron-right"></i></span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-12">
                            <div class="card widget-flat statistic-bg-purple">
                                <div class="card-body user-earnings">
                                    <h3><small ><i class="fas fa-rupee-sign"></i></small> <span class="counter-value">{{ $last_month_earning }}</span>
                                    </h3>
                                    <h5  title="Number of Orders">30 Days Earning</h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                            <span class="visually-hidden">90% Complete</span>
                                        </div>
                                    </div>
                                    <h5  title="Number of Customers" style="margin-bottom: 0;">View details <span
                                            class="r8-arw"><i class="fas fa-chevron-right"></i></span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-12">
                            <div class="card widget-flat gradient-45deg-green-teal">
                                <div class="card-body user-earnings">
                                    <h3><small ><i class="fas fa-rupee-sign"></i></small> <span
                                            class="counter-value">{{ $all_time_earning + $old_payout->old_paid_payout + $old_payout->old_not_paid_payout }}</span>
                                    </h3>
                                    <h5  title="Number of Orders">All Time Earning</h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                            <span class="visually-hidden">90% Complete</span>
                                        </div>
                                    </div>
                                    <h5  title="Number of Customers" style="margin-bottom: 0;">View details <span
                                            class="r8-arw"><i class="fas fa-chevron-right"></i></span></h5>
                                </div>
                            </div>
                        </div>
                       <div class="col-sm-3">
                            <div class="card widget-flat bg-gradient-moonlit">
                                <div class="card-body user-earnings">
                                    <h3><small ><i class="fas fa-rupee-sign"></i></small> <span
                                            class="counter-value">{{$passive_income}}</span>
                                    </h3>
                                    <h5  title="Number of Orders">Passive Income</h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                            <span class="visually-hidden">90% Complete</span>
                                        </div>
                                    </div>
                                    <h5  title="Number of Customers" style="margin-bottom: 0;">View details <span
                                            class="r8-arw"><i class="fas fa-chevron-right"></i></span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-sm-3">
                    <div class="card widget-flat gradient-45deg-light-blue-cyan" data-aos="fade-left"
                        data-aos-duration="500" data-aos-once="true">
                        <div class="card-body rupee row">
                            <div class="col-3">
                                <small><i class="fas fa-rupee-sign"></i></small>
                            </div>
                            <div class="col-9 px-1">
                                <h3 class="text-white"><span class="counter-value text-white">{{ $today_earning }}</span></h3>
                                <h5 class="fw-normal mb-0 text-white" title="Number of Customers">Today's Earning</h5>
                            </div>
                            <div class="progress mb-1" style="height:1px;">
                                <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h5 class="mb-0 text-white" style="font-weight: 500;">View details <span
                                class="r8-arw"><i class="fas fa-chevron-right"></i></span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card widget-flat gradient-45deg-red-pink">
                        <div class="card-body rupee row">
                            <div class="col-3">
                                <small><i class="fas fa-rupee-sign"></i></small>
                            </div>
                            <div class="col-9 px-1">
                                <h3 class="text-white"><span class="counter-value">{{ $last_week_earning }}</span></h3>
                                <h5 class="fw-normal mb-0 text-dark" title="Number of Orders">Last 7 Days Earning</h5>
                            </div>
                            <div class="progress mb-1" style="height:1px;">
                                <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h5 class="mb-0 text-dark" style="font-weight: 500;">View details <span
                                class="r8-arw"><i class="fas fa-chevron-right"></i></span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card widget-flat statistic-bg-purple">
                        <div class="card-body rupee row">
                            <div class="col-3">
                                <small><i class="fas fa-rupee-sign"></i></small>
                            </div>
                            <div class="col-9 px-1">
                                <h3 class="text-white"><span class="counter-value">{{ $last_month_earning }}</span></h3>
                                <h5 class="fw-normal mb-0 text-dark" title="Number of Orders">Last 30 Days Earning</h5>
                            </div>
                            <div class="progress mb-1" style="height:1px;">
                                <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h5 class="mb-0 text-dark" style="font-weight: 500;">View details <span
                                class="r8-arw"><i class="fas fa-chevron-right"></i></span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card widget-flat gradient-45deg-green-teal">
                        <div class="card-body rupee row">
                            <div class="col-3">
                                <small><i class="fas fa-rupee-sign"></i></small>
                            </div>
                            <div class="col-9 px-1">
                                <h3 class="text-white"><span
                                        class="counter-value">{{ $all_time_earning + $old_payout->old_paid_payout + $old_payout->old_not_paid_payout }}</span>
                                </h3>
                                <h5 class="fw-normal mb-0 text-dark" title="Number of Orders">All Time Earning</h5>
                            </div>
                            <div class="progress mb-1" style="height:1px;">
                                <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h5 class="mb-0 text-dark" style="font-weight: 500;">View details <span
                                class="r8-arw"><i class="fas fa-chevron-right"></i></span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card widget-flat bg-gradient-moonlit">
                        <div class="card-body rupee row">
                            <div class="col-3">
                                <small><i class="fas fa-rupee-sign"></i></small>
                            </div>
                            <div class="col-9 px-1">
                                <h3 class="text-white"><span class="counter-value">{{ $passive_income }}</span></h3>
                                <h5 class="fw-normal mb-0 text-dark" title="Number of Orders">Passive Income</h5>
                            </div>
                            <div class="progress mb-1" style="height:1px;">
                                <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h5 class="mb-0 text-dark" style="font-weight: 500;">View details <span
                                class="r8-arw"><i class="fas fa-chevron-right"></i></span></h5>
                        </div>
                    </div>
                </div>
            </div> --}}
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
                                        <canvas id="lineChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
                                    <h2  title="Pending Amount">Pending Amount</h2>
                                    <h6 class="text-dark counter"><small>Rs.</small>
                                        <span
                                            style="font-size:15px;">{{ Auth::guard('web')->user()->userDetail->total_wallet_balance }}</span>
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
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/Chart.min.js') }}"></script>
    <script>
               // Function to add commas in the Indian numbering system
               function convert(value) {
            let x = value.toString().split(".");
            let lastThree = x[0].slice(-3);
            let otherNumbers = x[0].slice(0, -3);
            if (otherNumbers !== '') {
                lastThree = ',' + lastThree;
            }
            let output = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
            if (x.length > 1) {
                output += "." + x[1];
            }
            return output;
        }

        $('.counter-value').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(convert(Math.ceil(now))); // Applying Indian currency formatting
                }
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
        $(function() {
            var areaChartData = {
                labels: [
                    @foreach ($dates as $date)
                        '{{ $date }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Transaction',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [
                        @foreach ($values as $value)
                            {{ $value }},
                        @endforeach
                    ]
                }, ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
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

        function changeDashboard() {
            window.location.replace("{{ route('user.dashboard') }}?type=old");
        }
    </script>
@endsection

@extends('admin.layouts.app')
@section('content')
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('backend/img/logo.png') }}" alt="The Success Preneur Logo">
    </div>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">
                                @isset($page_title)
                                    {{ $page_title }}
                                @endisset
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ App\CPU\CourseManager::withoutTrash()->get()->count() }}</h3>
                                <p>Courses</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-book"></i>
                            </div>
                            <a href="{{ route('admin.course.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ App\CPU\TopicManager::withoutTrash()->get()->count() }}</h3>
                                <p>Topics</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <a href="{{ route('admin.topic.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ App\CPU\UserManager::withoutTrash()->get()->count() }}</h3>
                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="{{ route('admin.user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>₹ {{ App\Models\PlanPurchase::where('delete_status','0')->whereDate('created_at', \Carbon\Carbon::today())->sum('total_amount') }}</h3>
                                <p>Today Transaction</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill-alt"></i>
                            </div>
                            <a href="{{ route('admin.payment.transaction.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>₹ {{ App\Models\PlanPurchase::where('delete_status','0')->whereDate('created_at', '>=', \Carbon\Carbon::now()->subDays(7))->sum('total_amount') }}</h3>
                                <p>Last 7 Days Transaction</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill-alt"></i>
                            </div>
                            <a href="{{ route('admin.payment.transaction.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>₹ {{ App\Models\PlanPurchase::where('delete_status','0')->whereDate('created_at', '>=', \Carbon\Carbon::now()->subDays(30))->sum('total_amount') }}</h3>
                                <p>Last 30 Days Transaction</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill-alt"></i>
                            </div>
                            <a href="{{ route('admin.payment.transaction.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>₹ {{ App\Models\PlanPurchase::where('delete_status','0')->sum('total_amount') }}</h3>
                                <p>All Transaction</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill-alt"></i>
                            </div>
                            <a href="{{ route('admin.payment.transaction.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            @php
                                $plan_purchase_id = App\Models\PlanPurchase::where('delete_status','0')->pluck('id');
                                $total_sell = App\Models\PlanPurchase::where('delete_status','0')->get()->sum('total_amount');
                                $total_commission =  App\Models\Commission::where('user_id','!=',1)->where('delete_status','0')->get()->sum('commission');
                            @endphp
                            <div class="inner">
                                <h3>₹ {{$total_sell - $total_commission}}</h3>
                                <p>Profit</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill-alt"></i>
                            </div>
                            <a href="{{ route('admin.payment.transaction.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-header" style="background-color: #28353e;">
                                <h3 class="card-title">Last 7 Days Registration</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-header" style="background-color: #28353e;">
                                <h3 class="card-title">Last 7 Days Payment</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(function () {
          var areaChartData = {
            labels  : [
                @foreach ($dates as $date)
                    '{{$date}}',
                @endforeach
            ],
            datasets: [
              {
                label               : 'Users',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [
                    @foreach ($week_users as $week_user)
                        '{{$week_user}}',
                    @endforeach
                ]
              },
            ]
          }

          //-------------
          //- BAR CHART -
          //-------------
          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = $.extend(true, {}, areaChartData)
          var temp0 = areaChartData.datasets[0]
          barChartData.datasets[0] = temp0

          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false,
            scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
          }

          new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
          })



var areaChartData1 = {
        labels  : [
                @foreach ($dates as $date)
                    '{{$date}}',
                @endforeach
        ],
        datasets: [
            {
                label                :  'Payments',
                backgroundColor      :  '#28a745',
                borderColor          :  'rgba(60,141,188,0.8)',
                pointRadius          :  false,
                pointColor           :  '#28a745',
                pointStrokeColor     :  'rgba(60,141,188,1)',
                pointHighlightFill   :  '#fff',
                pointHighlightStroke :  '#28a745',
                data                 :  [
                    @foreach ($week_payments as $week_payment)
                        '{{$week_payment}}',
                    @endforeach
                ]
            },
        ]
    }

    var barChartCanvas1 = $('#barChart1').get(0).getContext('2d')
    var barChartData1 = $.extend(true, {}, areaChartData1)
    var temp0 = areaChartData1.datasets[0]
    barChartData1.datasets[0] = temp0

    var barChartOptions1 = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }

    new Chart(barChartCanvas1, {
        type: 'bar',
        data: barChartData1,
        options: barChartOptions1
    })
        })



      </script>
@endsection

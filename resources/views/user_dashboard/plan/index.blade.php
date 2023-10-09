@extends('user_dashboard.layouts.app')
@section('content')
    <style>
        .loader {
            position: absolute;
            z-index: 1;
            top: 40%;
            left: 46%;
            z-index: 9999;
            display: none;
        }

        .loader {
            background-color: #33333359;
            position: absolute;
            z-index: +100 !important;
            width: 100%;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        .loader img {
            width: 50px;
            top: 25%;
            transform: translateY(-50%);
            position: absolute;
            left: 48%;
        }

        .loader-hi8 {
            height: 1100px;
        }
    </style>
    <div class="content-page">
        <div class="content">
            <div class="loader loader-hi8" id="loading_div">
                <img src="{{ asset('loading.gif') }}" alt="" class="img-responsive">
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xxl-10">
                        <div class="card gradient-45deg-purple-deep-orange mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="text-white"><b> Upgrade Package ! </b></h5>
                                        <span class="text-white">Click on link to upgrade your package and explore more
                                            courses.</span>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-danger mt-2 mb-2 rounded-pill float-end">Upgrade Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12">
                        <div class="row mt-sm-2 mt-3 mb-3">
                            @foreach ($plans as $key => $plan)
                               {{-- <div class="col-md-4">
                                    <div class="card card-pricing card-pricing-recommended">
                                        <div class="card-body text-center">
                                            @if ($key == 1)
                                                <div class="ribbon">
                                                    <span>Recommended</span>
                                                </div>
                                            @endif
                                            <div class="cspir-icon">
                                                <i class="card-pricing-icon uil-check text-primary"></i>
                                            </div>
                                            <div class="pricing-header">
                                                <h3>{{ $plan->title }}</h3>
                                            </div>
                                            {{-- <div class="price">Rs. {{$plan->amount}} </div> --}}
                                             {{-- @if ($current_plan->plan->priority >= $plan->priority)
                                            @else
                                                @php
                                                    $amount = $current_plan->plan->upgrade_amount[$plan->priority - $current_plan->plan->priority - 1];
                                                @endphp
                                                <div class="price">Rs. {{ $amount }} </div>
                                            @endif --}}

                                            {{-- <ul class="card-pricing-features">
                                                @foreach ($plan->points as $point)
                                                    <li>{{ $point }}</li>
                                                @endforeach
                                            </ul> --}}
                                            {{-- @if ($current_plan->plan->priority >= $plan->priority)
                                                <a class="btn btn-primary mt-4 mb-2 rounded-pill">Active Plan</a>
                                            @else
                                                <a class="btn btn-primary mt-4 mb-2 rounded-pill" onclick="couponModel({{ $plan->id }},{{ $amount }})">Upgrade to {{ $plan->title }} in ₹{{ $amount }}</a>
                                            @endif --}}
                                            {{-- <a class="btn btn-primary mt-4 mb-2 rounded-pill" onclick="couponModel()">Open Model</a> --}}
                                        {{-- </div>
                                    </div>
                                </div> --}}
                               <div class="col-md-4 mb-3">
                                    <div class="single-pricing-table with-hover-color">
                                        {{-- <a href="{{route('checkout')}}?slug={{$plan->slug}}" class="w-100"> --}}
                                        <a href="#" class="w-100">

                                            @if ($key==0)
                                            <div class="sub-head"></div>
                                            @endif

                                            @if ($key==1)
                                            <div class="sub-head-2"></div>
                                            @endif

                                            @if ($key==2)
                                            <div class="sub-head-3"></div>
                                            @endif

                                            @if ($key==3)
                                            <div class="sub-head-4"></div>
                                            @endif

                                            @if ($key==4)
                                            <div class="sub-head-5"></div>
                                            @endif

                                            <img src="{{asset('user_dashboard/images/favicon.png')}}">

                                            <div class="pricing-header">
                                                <h3>{{$plan->title}}</h3>
                                            </div>

                                            @if ($current_plan->plan->priority >= $plan->priority)
                                            @else
                                                @php
                                                    if(isset($current_plan->plan->upgrade_amount[$plan->priority - $current_plan->plan->priority - 1])){
                                                        $amount = $current_plan->plan->upgrade_amount[$plan->priority - $current_plan->plan->priority - 1];
                                                    }else{
                                                        $amount =  0;
                                                    }
                                                @endphp
                                                {{-- <div class="price">Rs. {{ $amount }} </div> --}}
                                            @endif

                                            <ul class="features-list">
                                                @foreach ($plan->points as $plan_point)
                                                    <li>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            {{$plan_point}} <i class="uil-check"></i>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <center style="border-top: 1px solid #ddd;">
                                                @if ($current_plan->plan->priority >= $plan->priority)
                                                <a class="btn btn-primary mt-2 mb-2 radius-10">Active Plan</a>
                                                @else
                                                    <a class="btn btn-primary mt-2 mb-2 radius-10" onclick="couponModel({{ $plan->id }},{{ $amount }})">Upgrade to {{ $plan->title }} in ₹{{ $amount }}</a>
                                                @endif
                                            </center>
                                        </a>
                                    </div>
                               </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="coupon-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirm Upgradation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="">
                    <div class="modal-body p-3">
                        <div class="input-group">
                            {{-- <input type="text" class="form-control" id="modal_coupon" placeholder="Enter Coupon Code...">
                            <button class="btn btn-dark waves-effect waves-light" type="button" id="model_apply_button">Apply</button> --}}
                            <span>Upgrade Now</span>
                        </div>
                    </div>
                </form>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info waves-effect waves-light" id="model_pay_button">Pay</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        // function pay(upgrade_plan_id,amount)
        // {
        //     $('#loading_div').show()
        //     $(window).scrollTop(0);
        //     var coupon = $('#modal_coupon').val();
        //     $('#loading_div').show()
        //     var options =
        //     {
        //         "key": "{{ env('RAZORPAY_KEY') }}",
        //         "amount": amount * 100,
        //         "currency": "INR",
        //         "name": "RichIND",
        //         "description": "Upgrade Plan",
        //         "image": "{{ asset('backend/img/logo.png') }}",
        //         "order_id": "",
        //         "handler": function(response)
        //         {
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //                 }
        //             });
        //             $.ajax({
        //                 type: 'POST',
        //                 url: "{{ route('user.upgrade.plan.payment') }}?upgrade_plan_id="+upgrade_plan_id+"&razorpay_payment_id="+response.razorpay_payment_id+"&coupon="+coupon,
        //                 success: function(data) {
        //                     window.location.replace(data);
        //                     $('#loading_div').hide()
        //                     $('#coupon-modal').modal('hide')
        //                     location.reload();
        //                 },
        //                 error: function(request, status, error) {
        //                     const Toast = Swal.mixin({
        //                         toast: true,
        //                         position: 'top-end',
        //                         showConfirmButton: false,
        //                         timer: 3000,
        //                         timerProgressBar: true,
        //                     });
        //                     Toast.fire({
        //                         icon: "error",
        //                         title: request.responseJSON.msg,
        //                     });
        //                 }
        //             });
        //         },
        //         "prefill": {
        //             "email": "{{ Auth::guard('web')->user()->email }}",
        //             "contact":"{{ Auth::guard('web')->user()->phone }}"
        //         },
        //         "theme":
        //         {
        //             "color": "#4553c8db"
        //         }
        //     };
        //     var rzp1 = new Razorpay(options);
        //     rzp1.open();
        // }

        // function pay(upgrade_plan_id,amount) {
        //     var coupon = $('#modal_coupon').val();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //         }
        //     });
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('user.upgrade.plan.payment') }}?upgrade_plan_id=" + upgrade_plan_id + "&amount=" +amount+"&coupon="+coupon,
        //         success: function(data) {
        //             window.location.replace(data);
        //         },
        //         error: function(request, status, error) {
        //             const Toast = Swal.mixin({
        //                 toast: true,
        //                 position: 'top-end',
        //                 showConfirmButton: false,
        //                 timer: 3000,
        //                 timerProgressBar: true,
        //             });
        //             Toast.fire({
        //                 icon: "error",
        //                 title: request.responseJSON.msg,
        //             });
        //         }
        //     });
        // }

        function pay(upgrade_plan_id,amount) {
            var coupon = $('#modal_coupon').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('user.upgrade.plan.payment') }}?upgrade_plan_id=" + upgrade_plan_id + "&amount=" +amount+"&coupon="+coupon,
                success: function(data) {
                    window.location.replace(data);
                },
                error: function(request, status, error) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    Toast.fire({
                        icon: "error",
                        title: request.responseJSON.msg,
                    });
                }
            });
        }
    </script>

    <script>

        function couponModel(plan_id,amount) {
            $('#model_pay_button').attr("onclick","pay("+plan_id+","+amount+")")
            $('#model_apply_button').attr("onclick","checkUpgradeCoupon("+plan_id+","+amount+")")
            $('#model_pay_button').text("Pay ₹"+amount)
            $('#coupon-modal').modal('show')
        }

        function checkUpgradeCoupon(plan_id,amount){
            var coupon = $('#modal_coupon').val();
            if(coupon != ''){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{route('check.upgrade.coupon')}}?coupon="+coupon+"&plan_id="+plan_id,
                    success: function(data) {
                        var final_amount  = parseFloat(amount) - data.amount;
                        $('#model_pay_button').attr("onclick","pay("+plan_id+","+final_amount+")")
                        $('#model_pay_button').text("Pay ₹"+final_amount)
                    },
                    error: function (request, status, error) {
                        alert(request.responseJSON.msg);
                        $('#model_pay_button').attr("onclick","pay("+plan_id+","+amount+")")
                        $('#model_pay_button').text("Pay ₹"+amount)
                    }
                });
            }else{
                alert('Please Enter Coupon Code!')
            }
        }

    </script>
@endsection

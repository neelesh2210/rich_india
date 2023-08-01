@extends('frontend.layouts.app')
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

        .single-process-card:hover {
            background-color: #e6ba601f;
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

    <div class="main-wrapper log-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 login-bg">
                </div>
                <div class="col-md-12 col-12">
                    <div class="login-wrap-bg">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-12 m-lg-auto">
                                <div class="login-wrapper">
                                    <div class="loginbox">
                                        <h1 class="gordita-bold">Enroll to Richind</h1>
                                        <form role="form" id="registerForm">
                                            @csrf
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>First Name <span>*</span></label>
                                                            <input type="text" name="first_name" id="first_name"
                                                                value="{{ old('first_name') }}" class="form-control"
                                                                placeholder="Enter Your First Name..." required />
                                                            <div class="lbl_msg" id="error_first_name"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Last Name <span>*</span></label>
                                                            <input type="text" name="last_name" id="last_name"
                                                                value="{{ old('last_name') }}" class="form-control"
                                                                placeholder="Enter Your Last Name..." required />
                                                            <div class="lbl_msg" id="error_last_name"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Enter State <span>*</span></label>
                                                            <select name="state" class="form-control" required>
                                                                <option value="">Select State</option>
                                                                @foreach (states() as $state)
                                                                    <option value="{{ $state }}"
                                                                        @if (old('state') == $state) selected @endif>
                                                                        {{ $state }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="lbl_msg" id="error_state"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Enter Mobile Number <span>*</span></label>
                                                            <input type="number" name="phone" id="phone"
                                                                value="{{ old('phone') }}" class="form-control"
                                                                placeholder="+91 |" required />
                                                            <div class="lbl_msg" id="error_phone"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email Id <span>*</span></label>
                                                            <input type="email" name="email" id="email"
                                                                value="{{ old('email') }}" class="form-control"
                                                                placeholder="xyz@gmail.com" required />
                                                            <div class="lbl_msg" id="error_email"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <div class="input-group" id="show_hide_password">
                                                                <input type="password" name="password" id="password"
                                                                    value="{{ old('password') }}" class="form-control"
                                                                    placeholder="Password" required />
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text">
                                                                        <a href=""><i class="fa fa-eye-slash"
                                                                                aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="lbl_msg" id="error_password"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Enter Referral Code</label>
                                                            <div class="aff-div">
                                                                <input class="form-control" name="referral_code"
                                                                    id="referral_code"
                                                                    value="{{ old('referral_code', $referral_code) }}"
                                                                    placeholder="Referral Code" />
                                                                @if ($errors->has('referral_code'))
                                                                    <div class="text-danger">
                                                                        {{ $errors->first('referral_code') }}</div>
                                                                @endif
                                                                <div class="lbl_msg" id="error_refferal"></div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mt-10">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-control-label text-center fs-22 fw-bold">Choose
                                                                Package</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-12 col-sm-1"></div>
                                                            @foreach ($plans as $key => $plan)
                                                                <div class="col-lg-2 col-12 col-sm-2">
                                                                    <ul class="img-ul flex-center-xs">
                                                                        <li class="img-li">
                                                                            <label
                                                                                for="ContentPlaceHolder1_img_checkbox_{{ $plan->title }}"
                                                                                class="custom-label">
                                                                                <img id="ContentPlaceHolder1_img{{ $plan->title }}"
                                                                                    src="{{ asset('backend/img/plan/' . $plan->image) }}" />
                                                                                <p class="text-center">{{ $plan->title }}
                                                                                    (₹ @if (!$referral_code)
                                                                                        {{ $plan->amount }}
                                                                                    @else
                                                                                        {{ $plan->discounted_price }}
                                                                                    @endif)</p>
                                                                            </label>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="form-check-label mb-0">
                                                            <input type="checkbox" required />
                                                            I agree to the <a
                                                                href="{{ route('term_and_condition') }}">Terms of
                                                                Service</a> and <a
                                                                href="{{ route('privacy_policy') }}">Privacy Policy.</a>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="d-grid">
                                                    <button type="button" class="btn btn-primary btn-start"
                                                        id="submitButton" onclick="submitForm()">Place Order &nbsp; &nbsp;
                                                        <span
                                                            class="@if (!$referral_code) d-none @endif final_price"
                                                            id="discounted_price_span">₹
                                                            {{ $plan_detail->discounted_price }}</span>
                                                        <span
                                                            class="@if ($referral_code) d-none @endif final_price"
                                                            id="price_span">₹ {{ $plan_detail->amount }}</span>
                                                        <span> (Inc GST+18%)</span>
                                                    </button>
                                                </div>
                                                <div class="google-bg text-center mt-4">
                                                    <p class="mb-0">Already have an account?
                                                        <a title="{{ env('APP_NAME') }}-Login"
                                                            href="{{ route('login') }}">Sign in</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });
    </script>
    <script>
        function submitForm() {
            var coupon = $('#coupon').val();
            $.ajax({
                type: 'POST',
                url: "{{ route('vaildate.user.registeration') }}",
                data: $('#registerForm').serialize() + "&plan_id={{ $plan_detail->id }}&coupon=" + coupon,
                success: function(data) {
                    var referral_code = $('#referral_code').val();
                    if (referral_code == '') {
                        $('#discount_div').addClass('d-none')
                        $('#price_span').removeClass('d-none')
                        $('#discounted_price_span').addClass('d-none')
                        alert('You are submiting form without Referral Code!');
                    }
                    // $('#submitButton').attr('disabled',true);
                    $('#discount_div').removeClass('d-none')
                    $('#discounted_price_span').removeClass('d-none')
                    $('#price_span').addClass('d-none')
                    pay(data)
                },
                error: function(request, status, error) {
                    $(window).scrollTop(0);
                    if (request.responseJSON.errors.first_name) {
                        $('#error_first_name').show();
                        $('#error_first_name').addClass('text-danger');
                        $('#error_first_name').removeClass('text-success');
                        $('#error_first_name').text('✖ ' + request.responseJSON.errors.first_name);
                    } else {
                        $('#error_first_name').show();
                        $('#error_first_name').addClass('text-success');
                        $('#error_first_name').removeClass('text-danger');
                        $('#error_first_name').text('✔ Correct');
                    }
                    if (request.responseJSON.errors.last_name) {
                        $('#error_last_name').show();
                        $('#error_last_name').addClass('text-danger');
                        $('#error_last_name').removeClass('text-success');
                        $('#error_last_name').text('✖ ' + request.responseJSON.errors.last_name);
                    } else {
                        $('#error_last_name').show();
                        $('#error_last_name').addClass('text-success');
                        $('#error_last_name').removeClass('text-danger');
                        $('#error_last_name').text('✔ Correct');
                    }
                    if (request.responseJSON.errors.email) {
                        $('#error_email').show();
                        $('#error_email').addClass('text-danger');
                        $('#error_email').removeClass('text-success');
                        $('#error_email').text('✖ ' + request.responseJSON.errors.email);
                    } else {
                        $('#error_email').show();
                        $('#error_email').addClass('text-success');
                        $('#error_email').removeClass('text-danger');
                        $('#error_email').text('✔ Email Available');
                    }
                    if (request.responseJSON.errors.phone) {
                        $('#error_phone').show();
                        $('#error_phone').addClass('text-danger');
                        $('#error_phone').removeClass('text-success');
                        $('#error_phone').text('✖ ' + request.responseJSON.errors.phone);
                    } else {
                        $('#error_phone').show();
                        $('#error_phone').addClass('text-success');
                        $('#error_phone').removeClass('text-danger');
                        $('#error_phone').text('✔ Phone Available');
                    }
                    if (request.responseJSON.errors.password) {
                        $('#error_password').show();
                        $('#error_password').addClass('text-danger');
                        $('#error_password').removeClass('text-success');
                        $('#error_password').text('✖ ' + request.responseJSON.errors.password);
                    } else {
                        $('#error_password').show();
                        $('#error_password').addClass('text-success');
                        $('#error_password').removeClass('text-danger');
                        $('#error_password').text('✔ Correct');
                    }
                    if (request.responseJSON.errors.state) {
                        $('#error_state').show();
                        $('#error_state').addClass('text-danger')
                        $('#error_state').removeClass('text-success');
                        $('#error_state').text('✖ ' + request.responseJSON.errors.state);
                    } else {
                        $('#error_state').show();
                        $('#error_state').addClass('text-success');
                        $('#error_state').removeClass('text-danger');
                        $('#error_state').text('✔ Correct');
                    }
                    if (request.responseJSON.errors.referral_code) {
                        $('#error_refferal').show();
                        $('#error_refferal').addClass('text-danger');
                        $('#error_refferal').removeClass('text-success');
                        $('#error_refferal').text('✖ ' + request.responseJSON.errors.referral_code);
                        $('#discount_div').addClass('d-none')
                        $('#price_span').removeClass('d-none')
                        $('#discounted_price_span').addClass('d-none')
                    } else {
                        if ($('#referral_code').val() != '') {
                            $('#discount_div').removeClass('d-none')
                            $('#discounted_price_span').removeClass('d-none')
                            $('#price_span').addClass('d-none')
                            $('#error_refferal').show();
                            $('#error_refferal').addClass('text-success');
                            $('#error_refferal').removeClass('text-danger');
                            $('#error_refferal').text('✔ Correct');
                        }
                    }
                }
            });
        }

        // function pay(amount)
        // {
        //     $(window).scrollTop(0);
        //     var coupon = $('#coupon').val();
        //     $('#loading_div').show()
        //     var options =
        //     {
        //         "key": "{{ env('RAZORPAY_KEY') }}",
        //         "amount": amount * 100,
        //         "currency": "INR",
        //         "name": "The Success Preneur",
        //         "description": "Purchase Plan",
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
        //                 url: "{{ route('payment') }}",
        //                 data:$('#registerForm').serialize()+ "&plan_id={{ $plan_detail->id }}&razorpay_payment_id="+response.razorpay_payment_id+"&coupon="+coupon,
        //                 success: function(data) {
        //                     window.location.replace("{{ route('user.dashboard') }}");
        //                     $('#loading_div').hide()
        //                 },error: function (request, status, error) {
        //                     window.location.replace("{{ route('data.modification.error') }}");
        //                 }
        //             });
        //         },
        //         "prefill": {
        //             "email": $('#email').val(),
        //             "contact":$('#phone').val()
        //         },
        //         "theme":
        //         {
        //             "color": "#4553c8db"
        //         }
        //     };
        //     var rzp1 = new Razorpay(options);
        //     rzp1.open();
        // }

        // function pay(amount)
        // {
        //     var coupon = $('#coupon').val();
        //     $(window).scrollTop(0);
        //     $('#loading_div').show()
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //         }
        //     });
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('payment') }}",
        //         data:$('#registerForm').serialize()+ "&plan_id={{ $plan_detail->id }}&amount="+amount+"&coupon="+coupon,
        //         success: function(data) {
        //             window.location.replace(data);
        //         }
        //     });
        // }

        function pay(amount) {
            var coupon = $('#coupon').val();
            $(window).scrollTop(0);
            $('#loading_div').show()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('payment') }}",
                data: $('#registerForm').serialize() + "&plan_id={{ $plan_detail->id }}&amount=" + amount +
                    "&coupon=" + coupon,
                success: function(data) {
                    window.location.replace(data);
                }
            });
        }
    </script>

    <script>
        function checkCoupon() {
            var coupon = $('#coupon').val()
            @if (!$referral_code)
                var final_amount = '{{ $plan_detail->amount }}'
            @else
                var final_amount = '{{ $plan_detail->discounted_price }}'
            @endif
            if (coupon != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('check.coupon') }}?coupon=" + coupon + "&plan_id={{ $plan_detail->id }}",
                    success: function(data) {
                        var final = parseFloat(final_amount) - data.amount;
                        $('.coupon_discount').removeClass('d-none')
                        $('.coupon_discount_amount').text('₹ ' + data.amount)
                        $('.final_price').text('₹ ' + final)
                    },
                    error: function(request, status, error) {
                        alert(request.responseJSON.msg);
                        $('.coupon_discount').addClass('d-none')
                        $('.final_price').text('₹ ' + final_amount)
                    }
                });
            } else {
                alert('Please Enter Coupon Code!')
            }
        }
    </script>
@endsection

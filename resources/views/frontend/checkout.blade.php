@extends('frontend.layouts.app')
@section('content')
    @push('css')
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

            .aiz-megabox input {
                position: absolute;
                z-index: -1;
                opacity: 0;
            }

            .aiz-megabox>input:checked~.aiz-megabox-elem,
            .aiz-megabox>input:checked~.aiz-megabox-elem {
                border: 1px solid #392c7d;
                background: #392c7d;
                color: #fff;
            }

            .aiz-megabox .aiz-megabox-elem {
                background: #fffefe;

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

            .accordion-button {
                font-weight: 600;
            }

            .form-group span {
                color: red;
            }

            .accordion-item:first-of-type {
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                margin-bottom: 15px;
            }

            .accordion-item {
                margin-bottom: 15px;
            }

            .accordion-item:not(:first-of-type) {
                border-top: 1px solid rgba(0, 0, 0, 0.125);
            }

            .login-wrapper .loginbox label {
                cursor: pointer;
                display: block;
                font-size: 14px;
                margin-bottom: 5px;
                font-weight: 600;
                text-transform: capitalize;
                color: #333;
            }

            .btn-disabled,
            .btn-disabled[disabled] {
                opacity: .4;
                cursor: default !important;
                pointer-events: none;
            }

            .rbt-cat-box-1.variation-2 .inner {
                background-color: #001430;
            }

            .rbt-cat-box-1 .inner .content h5 a {
                color: #fff;
            }
        </style>
    @endpush

    <section class="breadcrumb__area breadcrumb__bg"
        data-background="{{ asset('frontend/assets/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Checkout</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{route('index')}}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape-wrap">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape01.svg') }}" alt="img"
                class="alltuchtopdown">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape02.svg') }}" alt="img" data-aos="fade-right"
                data-aos-delay="300">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape03.svg') }}" alt="img" data-aos="fade-up"
                data-aos-delay="400">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape04.svg') }}" alt="img"
                data-aos="fade-down-left" data-aos-delay="400">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape05.svg') }}" alt="img" data-aos="fade-left"
                data-aos-delay="400">
        </div>
    </section>

    <div class="checkout__area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div id="details_div">
                        <form role="form" id="registerForm" class="customer__form-wrap">
                            @csrf
                            <span class="title">Billing Details</span>
                            <div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-grp">
                                            <label>Your Affiliate Code</label>
                                            <div class="aff-div">
                                                <input name="referral_code" id="referral_code"
                                                    value="{{ old('referral_code', $referral_code) }}"
                                                    placeholder="Referral Code" />
                                                <div class="lbl_msg" id="error_refferal"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-grp">
                                            <label>Name <span>*</span></label>
                                            <input type="text" name="name" id="name"
                                                placeholder="Enter Your Name..." required />
                                            <div class="lbl_msg" id="error_name"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-grp">
                                            <label>Enter State <span>*</span></label>
                                            <select name="state" id="state" class="form-control select2" required>
                                                <option value="">Select State</option>
                                                @foreach (states() as $state)
                                                    <option value="{{ $state }}">{{ $state }}</option>
                                                @endforeach
                                            </select>
                                            <div class="lbl_msg" id="error_state"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-grp">
                                            <label>Enter Mobile Number</label>
                                            <input type="number" name="phone" id="phone" placeholder="+91 |">
                                            <div class="lbl_msg" id="error_phone"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-grp">
                                            <label>Email Id <span>*</span></label>
                                            <input type="email" name="email" id="email" placeholder="xyz@gmail.com"
                                                required />
                                            <div class="lbl_msg" id="error_email"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-grp">
                                            <label for="password">Password <span>*</span></label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" name="password" id="password" placeholder="Password"
                                                    required />
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <a href=""><i class="fa fa-eye-slash"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="lbl_msg " id="error_password"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-grp">
                                            <label for="confirm_password">Confirm Password
                                                <span>*</span></label>
                                            <div class="input-group" id="confirm_show_hide_password">
                                                <input type="password" name="confirm_password" id="confirm_password"
                                                    placeholder="Password" required />
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <a href=""><i class="fa fa-eye-slash"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="lbl_msg"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-10">
                                        <div class="form-grp">
                                            <label class="form-control-label text-center fs-22 fw-bold mb-2">Choose
                                                Package</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            @foreach ($plans as $key => $plan)
                                                @if ($plan->slug == request('slug'))
                                                    <div class="col-lg-4 col-4 col-sm-4">
                                                        <label class="aiz-megabox d-block mb-3">
                                                            <input value="{{ $plan->id }}" class="online_payment"
                                                                type="radio" name="plan_id"
                                                                @if ($plan->slug == request('slug')) checked @endif
                                                                onchange="getPlanDetail({{ $plan->id }})">
                                                            <span class="d-block p-2 aiz-megabox-elem">
                                                                <img id="ContentPlaceHolder1_img{{ $plan->title }}"
                                                                    src="{{ asset('backend/img/plan/' . $plan->image) }}"
                                                                    class="img-fluid mb-3" />
                                                                <span class="d-block text-center">
                                                                    <h5 class="text-white">{{ $plan->title }}
                                                                </span></h5>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-4 wow fadeInRight" id="payment_detail" data-wow-delay="300ms">
                    <div class="order__info-wrap">
                        <h2 class="title">YOUR ORDER</h2>
                        <ul class="list-wrap">
                            <li class="title">Product:<span>Total</span></li>
                            <li>Basic:<span id="basic_amount">₹{{ $plan_detail->amount }}</span></li>
                            <li @if (!$referral_code) class="d-none" @endif>Discount Amount:<span
                                    id="discount_amount">₹{{ $plan_detail->amount - $plan_detail->discounted_price }}</span>
                            </li>
                            <li>Grand Total<span id="grand_total_amount">₹ @if ($referral_code)
                                        {{ $plan_detail->discounted_price }}
                                    @else
                                        {{ $plan_detail->amount }}
                                    @endif
                                </span></li>
                        </ul>
                        <label class="form-check-label mt-2">
                            <input type="checkbox" required />
                            I agree to the <a href="{{ route('term_and_condition') }}">Terms of Service</a> and <a
                                href="{{ route('privacy_policy') }}">Privacy Policy.</a>
                        </label>
                        <button type="button" class="btn w-100" id="submitButton" onclick="submitForm()"><span
                                class="richind-btn__curve"></span>Next<i class="icon-arrow"></i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-12 m-lg-auto" style="display:none" id="payment_div">
                    <div class="customer__form-wrap">
                        <div class="loginbox">
                            <div class="section-title mb-4">
                                <span class="title">Payment Modes</span>
                            </div>
                            <div class="faq-accordion">
                                <div class="accordion" id="FaqAccordion">
                                    {{-- <div class="accordion-item">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" id="phonepay">
                                            PhonePe
                                        </button>
                                        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                            <form action="{{route('phonepe.payment')}}" method="POST">
                                                @csrf
                                                <div class="accordion-body">
                                                    <p>
                                                        Pay Using Paytm Gateway <br>
                                                        You can pay directly through Paytm payment gateway using
                                                        UPI/Debit
                                                        Card/Net Banking
                                                    </p>
                                                    <div class="about-btn mt-3 mb-3">
                                                        <button class="btn btn-primary w-100">Place Order <i class="ri-arrow-right-line"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="accordion-item">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="instamojo">
                                            Instamojo
                                        </button>
                                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                            <form action="{{route('payment')}}" method="POST">
                                                @csrf
                                                <div class="accordion-body">
                                                    <p>
                                                        Pay Using Paytm Gateway <br>
                                                        You can pay directly through Paytm payment gateway using
                                                        UPI/Debit
                                                        Card/Net Banking
                                                    </p>
                                                    <div class="about-btn mt-3 mb-3">
                                                        <button class="btn btn-primary w-100">Place Order <i class="ri-arrow-right-line"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div> --}}
                                    <div class="accordion-item">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true"
                                            aria-controls="collapseFour" id="cosmofeed">
                                            Cosmofeed
                                        </button>
                                        <div id="collapseFour" class="accordion-collapse collapse show"
                                            data-bs-parent="#FaqAccordion">
                                            <div class="accordion-body">
                                                <p> Pay Using Cosmofeed <br></p>
                                                <div class="about-btn mt-3 mb-3">
                                                    <div class="text-center">
                                                        <a href="#" id="place_order"
                                                            class="btn arrow-btn"><span
                                                                class="text-center" id="price"></span>Place
                                                            Order<i class="icon-arrow"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="accordion-item">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Pay with QR
                                        </button>
                                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion" style="">
                                            <div class="accordion-body">
                                                <p>
                                                    Pay Using QR <br>
                                                    You can pay directly through QR
                                                </p>
                                                <div class="about-btn mt-3 mb-3">
                                                    <div class="text-center">
                                                        <a href="{{ route('cash.payment') }}" class="richind-btn richind-btn-second w-100"><span class="richind-btn__curve"></span>Place Order<i class="icon-arrow"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="accordion-item">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Pay with Referrel Wallet
                                        </button>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            data-bs-parent="#FaqAccordion" style="">
                                            <div class="accordion-body">
                                                <p> Pay Using {{ env('APP_ENV') }} Referrel Wallet </p>
                                                <div class="payment-page mt-3 mb-3">
                                                    <div class="form-grp">
                                                        <input type="text" id="wallet_referrel_code" readonly placeholder="Referrel Wallet">
                                                        <form action="{{ route('wallet.referrel.request') }}" method="POST"
                                                            id="wallet_referrel_code_form">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <a id="wallet_referrel_code_button"
                                                        class="btn arrow-btn"
                                                        onclick="$('#wallet_referrel_code_form').submit()"><span
                                                            class="text-center"></span>Place Order<i
                                                            class="icon-arrow"></i></a>
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
        </div>
    </div>


        @push('js')
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

                    $("#confirm_show_hide_password a").on('click', function(event) {
                        event.preventDefault();
                        if ($('#confirm_show_hide_password input').attr("type") == "text") {
                            $('#confirm_show_hide_password input').attr('type', 'password');
                            $('#confirm_show_hide_password i').addClass("fa-eye-slash");
                            $('#confirm_show_hide_password i').removeClass("fa-eye");
                        } else if ($('#confirm_show_hide_password input').attr("type") == "password") {
                            $('#confirm_show_hide_password input').attr('type', 'text');
                            $('#confirm_show_hide_password i').removeClass("fa-eye-slash");
                            $('#confirm_show_hide_password i').addClass("fa-eye");
                        }
                    });
                });

                function submitForm() {
                    $('#submitButton').attr('disabled', true)
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('vaildate.user.registeration') }}",
                        data: $('#registerForm').serialize(),
                        success: function(data) {
                            $('#phonepay').prop('disabled', false);
                            $('#phonepay').removeClass('collapsed');
                            //$('#collapseFive').addClass('show');
                            $('#payment_div').show();
                            $('#details_div').hide();
                            $('#payment_detail').hide();
                            var referral_code = $('#referral_code').val();
                            if (referral_code == '') {
                                alert('You are submiting form without Referral Code!');
                                $('#wallet_referrel_code').val('');
                                $('#wallet_referrel_code_button').addClass('btn-disabled');
                            } else {
                                $('#wallet_referrel_code').val(referral_code);
                                $('#wallet_referrel_code_button').removeClass('btn-disabled');
                            }
                            $('#price').text('₹' + data.amount);
                            $('#place_order').attr('href', data.url);

                            $('.form-control').prop('readonly', true);
                            $('.online_payment').prop('disabled', true);
                            $('#error_name').show();
                            $('#error_name').addClass('text-success');
                            $('#error_name').removeClass('text-danger');
                            $('#error_name').text('✔ Correct');
                            $('#name').prop('readonly', true);

                            $('#error_email').show();
                            $('#error_email').addClass('text-success');
                            $('#error_email').removeClass('text-danger');
                            $('#error_email').text('✔ Email Available');
                            $('#email').prop('readonly', true);

                            $('#error_phone').show();
                            $('#error_phone').addClass('text-success');
                            $('#error_phone').removeClass('text-danger');
                            $('#error_phone').text('✔ Phone Available');
                            $('#phone').prop('readonly', true);

                            $('#error_password').show();
                            $('#error_password').addClass('text-success');
                            $('#error_password').removeClass('text-danger');
                            $('#error_password').text('✔ Correct');
                            $('#password').prop('readonly', true);

                            $('#error_state').show();
                            $('#error_state').addClass('text-success');
                            $('#error_state').removeClass('text-danger');
                            $('#error_state').text('✔ Correct');
                            $('#state').prop('disabled', true);

                            $('#error_refferal').show();
                            $('#error_refferal').addClass('text-success');
                            $('#error_refferal').removeClass('text-danger');
                            $('#error_refferal').text('✔ Correct');
                            $('#referral_code').prop('readonly', true);

                            $('#submitButton').prop('disabled', true);
                        },
                        error: function(request, status, error) {
                            $('#submitButton').attr('disabled', false)
                            $('#cosmofeed').prop('disabled', true);
                            $('#payment_div').hide();
                            $('#details_div').show();
                            $(window).scrollTop(0);
                            if (request.responseJSON.errors.name) {
                                $('#error_name').show();
                                $('#error_name').addClass('text-danger');
                                $('#error_name').removeClass('text-success');
                                $('#error_name').text('✖ ' + request.responseJSON.errors.name);
                            } else {
                                $('#error_name').show();
                                $('#error_name').addClass('text-success');
                                $('#error_name').removeClass('text-danger');
                                $('#error_name').text('✔ Correct');
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

                function getPlanDetail(plan_id) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('get.plan.detail') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            plan_id: plan_id
                        },
                        success: function(data) {
                            $('#basic_amount').text('₹ ' + data.plan.amount);
                            $('#discount_amount').text('₹ ' + data.plan.discount);
                            @if ($referral_code)
                                $('#grand_total_amount').text('₹ ' + data.plan.discounted_price);
                            @else
                                $('#grand_total_amount').text('₹ ' + data.plan.amount);
                            @endif
                            submitForm();
                        },
                        error: function(request, status, error) {
                            location.reload();
                        }
                    });
                }
            </script>
        @endpush
    @endsection

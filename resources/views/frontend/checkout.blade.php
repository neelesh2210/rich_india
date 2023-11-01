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

        .aiz-megabox input {
            position: absolute;
            z-index: -1;
            opacity: 0;
        }

        .aiz-megabox > input:checked ~ .aiz-megabox-elem, .aiz-megabox > input:checked ~ .aiz-megabox-elem {
            border: 1px solid #392c7d
            ;
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
        }
    </style>

    <div class="main-wrapper log-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="login-wrap-bg">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-12 m-lg-auto" id="details_div">
                                <div class="login-wrapper">
                                    <div class="loginbox">
                                        <h5 class="gordita-bold">Billing Details </h5>
                                        <hr>
                                        <form role="form" id="registerForm">
                                            @csrf
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Your Affiliate Code</label>
                                                            <div class="aff-div">
                                                                <input class="form-control" name="referral_code" id="referral_code" value="{{ old('referral_code', $referral_code) }}" placeholder="Referral Code"/>
                                                                <div class="lbl_msg" id="error_refferal"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name <span>*</span></label>
                                                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name..." required/>
                                                            <div class="lbl_msg" id="error_name"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Enter State <span>*</span></label>
                                                            <select name="state" id="state" class="form-control" required>
                                                                <option value="">Select State</option>
                                                                @foreach (states() as $state)
                                                                    <option value="{{ $state }}">{{ $state }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="lbl_msg" id="error_state"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Enter Mobile Number</label>
                                                            <input type="number" name="phone" id="phone" class="form-control" placeholder="+91 |">
                                                            <div class="lbl_msg" id="error_phone"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email Id <span>*</span></label>
                                                            <input type="email" name="email" id="email" class="form-control" placeholder="xyz@gmail.com" required />
                                                            <div class="lbl_msg" id="error_email"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">Password <span>*</span></label>
                                                            <div class="input-group" id="show_hide_password">
                                                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text">
                                                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="lbl_msg " id="error_password"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="confirm_password">Confirm Password <span>*</span></label>
                                                            <div class="input-group" id="confirm_show_hide_password">
                                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Password" required/>
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text">
                                                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="lbl_msg"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mt-10">
                                                        <div class="form-group">
                                                            <label class="form-control-label text-center fs-22 fw-bold">Choose Package</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            @foreach ($plans as $key => $plan)
                                                                <div class="col-lg-3 col-12 col-sm-3">
                                                                    <label class="aiz-megabox d-block mb-3">
                                                                        <input value="{{$plan->id}}" class="online_payment" type="radio" name="plan_id" @if($plan->slug==request('slug')) checked @endif onchange="submitForm()">
                                                                        <span class="d-block p-2 aiz-megabox-elem">
                                                                            <img id="ContentPlaceHolder1_img{{ $plan->title }}" src="{{ asset('backend/img/plan/' . $plan->image) }}" class="img-fluid mb-3" />
                                                                            <span class="d-block text-center">
                                                                                <span class="d-block fw-600 fs-15">{{ $plan->title }}</span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="form-check-label mb-3 mt-2">
                                                            <input type="checkbox" required/>
                                                            I agree to the <a href="{{ route('term_and_condition') }}">Terms of Service</a> and <a href="{{ route('privacy_policy') }}">Privacy Policy.</a>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="d-grid">
                                                    <button type="button" class="btn btn-primary btn-start" id="submitButton" onclick="submitForm()">Next</button>
                                                </div>
                                                <div class="google-bg text-center mt-4">
                                                    <p class="mb-0">Already have an account?
                                                        <a title="{{ env('APP_NAME') }}-Login" href="{{ route('login') }}">Sign in</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-8 col-12 m-lg-auto" style="margin-top: 25px !important; display:none" id="payment_div">
                                <div class="login-wrapper">
                                    <div class="loginbox">
                                        <div class="section-title mb-4 mt-2">
                                            <h5 class="gordita-bold">Payment Modes</h5>
                                            <hr>
                                        </div>
                                        <div class="faq-accordion">
                                            <div class="accordion" id="FaqAccordion">
                                                <div class="accordion-item">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" id="phonepay">
                                                        PhonePe
                                                    </button>
                                                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                                        <form action="{{route('phonepe.payment')}}" method="POST">
                                                            @csrf
                                                            <div class="accordion-body">
                                                                <p> Pay Using Paytm Gateway <br>
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
                                                </div>
                                                {{-- <div class="accordion-item">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" id="cosmofeed">
                                                        Cosmofeed
                                                    </button>
                                                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                                        <div class="accordion-body">
                                                            <p> Pay Using Paytm Gateway <br>
                                                                You can pay directly through Paytm payment gateway using
                                                                UPI/Debit
                                                                Card/Net Banking
                                                            </p>
                                                            <div class="about-btn mt-3 mb-3">
                                                                <a href="#" id="place_order" class="btn btn-primary w-100">Place Order  <span class="final_price"  id="price"></span> <i class="ri-arrow-right-line"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
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

    <script>
        $(document).ready(function(){
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });

            $("#confirm_show_hide_password a").on('click', function(event){
                event.preventDefault();
                if($('#confirm_show_hide_password input').attr("type") == "text"){
                    $('#confirm_show_hide_password input').attr('type', 'password');
                    $('#confirm_show_hide_password i').addClass("fa-eye-slash");
                    $('#confirm_show_hide_password i').removeClass("fa-eye");
                }else if($('#confirm_show_hide_password input').attr("type") == "password"){
                    $('#confirm_show_hide_password input').attr('type', 'text');
                    $('#confirm_show_hide_password i').removeClass("fa-eye-slash");
                    $('#confirm_show_hide_password i').addClass("fa-eye");
                }
            });
        });

        function submitForm(){
            $.ajax({
                type: 'POST',
                url: "{{ route('vaildate.user.registeration') }}",
                data: $('#registerForm').serialize(),
                success: function(data){
                    $('#phonepay').prop('disabled',false);
                    $('#phonepay').removeClass('collapsed');
                    $('#collapseFive').addClass('show');
                    $('#payment_div').show();
                    $('#details_div').hide();
                    var referral_code = $('#referral_code').val();
                    if (referral_code == ''){
                        alert('You are submiting form without Referral Code!');
                    }
                    $('#price').text('₹'+data.amount);
                    $('#place_order').attr('href',data.url);

                    $('.form-control').prop('readonly',true);
                    $('.online_payment').prop('disabled',true);
                    $('#error_name').show();
                    $('#error_name').addClass('text-success');
                    $('#error_name').removeClass('text-danger');
                    $('#error_name').text('✔ Correct');
                    $('#name').prop('readonly',true);

                    $('#error_email').show();
                    $('#error_email').addClass('text-success');
                    $('#error_email').removeClass('text-danger');
                    $('#error_email').text('✔ Email Available');
                    $('#email').prop('readonly',true);

                    $('#error_phone').show();
                    $('#error_phone').addClass('text-success');
                    $('#error_phone').removeClass('text-danger');
                    $('#error_phone').text('✔ Phone Available');
                    $('#phone').prop('readonly',true);

                    $('#error_password').show();
                    $('#error_password').addClass('text-success');
                    $('#error_password').removeClass('text-danger');
                    $('#error_password').text('✔ Correct');
                    $('#password').prop('readonly',true);

                    $('#error_state').show();
                    $('#error_state').addClass('text-success');
                    $('#error_state').removeClass('text-danger');
                    $('#error_state').text('✔ Correct');
                    $('#state').prop('disabled',true);

                    $('#error_refferal').show();
                    $('#error_refferal').addClass('text-success');
                    $('#error_refferal').removeClass('text-danger');
                    $('#error_refferal').text('✔ Correct');
                    $('#referral_code').prop('readonly',true);

                    $('#submitButton').prop('disabled',true);
                },error: function(request, status, error){
                    $('#cosmofeed').prop('disabled',true);
                    $('#payment_div').hide();
                    $('#details_div').show();
                    $(window).scrollTop(0);
                    if (request.responseJSON.errors.name){
                        $('#error_name').show();
                        $('#error_name').addClass('text-danger');
                        $('#error_name').removeClass('text-success');
                        $('#error_name').text('✖ ' + request.responseJSON.errors.name);
                    }else{
                        $('#error_name').show();
                        $('#error_name').addClass('text-success');
                        $('#error_name').removeClass('text-danger');
                        $('#error_name').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.email){
                        $('#error_email').show();
                        $('#error_email').addClass('text-danger');
                        $('#error_email').removeClass('text-success');
                        $('#error_email').text('✖ ' + request.responseJSON.errors.email);
                    }else{
                        $('#error_email').show();
                        $('#error_email').addClass('text-success');
                        $('#error_email').removeClass('text-danger');
                        $('#error_email').text('✔ Email Available');
                    }
                    if(request.responseJSON.errors.phone){
                        $('#error_phone').show();
                        $('#error_phone').addClass('text-danger');
                        $('#error_phone').removeClass('text-success');
                        $('#error_phone').text('✖ ' + request.responseJSON.errors.phone);
                    }else{
                        $('#error_phone').show();
                        $('#error_phone').addClass('text-success');
                        $('#error_phone').removeClass('text-danger');
                        $('#error_phone').text('✔ Phone Available');
                    }
                    if(request.responseJSON.errors.password){
                        $('#error_password').show();
                        $('#error_password').addClass('text-danger');
                        $('#error_password').removeClass('text-success');
                        $('#error_password').text('✖ ' + request.responseJSON.errors.password);
                    }else{
                        $('#error_password').show();
                        $('#error_password').addClass('text-success');
                        $('#error_password').removeClass('text-danger');
                        $('#error_password').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.state){
                        $('#error_state').show();
                        $('#error_state').addClass('text-danger')
                        $('#error_state').removeClass('text-success');
                        $('#error_state').text('✖ ' + request.responseJSON.errors.state);
                    }else{
                        $('#error_state').show();
                        $('#error_state').addClass('text-success');
                        $('#error_state').removeClass('text-danger');
                        $('#error_state').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.referral_code){
                        $('#error_refferal').show();
                        $('#error_refferal').addClass('text-danger');
                        $('#error_refferal').removeClass('text-success');
                        $('#error_refferal').text('✖ ' + request.responseJSON.errors.referral_code);
                        $('#discount_div').addClass('d-none')
                        $('#price_span').removeClass('d-none')
                        $('#discounted_price_span').addClass('d-none')
                    }else{
                        if($('#referral_code').val() != ''){
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

    </script>
@endsection

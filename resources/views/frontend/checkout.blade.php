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
    </style>

    <div class="main-wrapper log-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="login-wrap-bg">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-12 m-lg-auto">
                                <div class="login-wrapper">
                                    <div class="loginbox">
                                        <h5 class="gordita-bold">Billing Details </h5>
                                        <hr />
                                        <form role="form" id="registerForm">
                                            @csrf
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Your Affiliate Code</label>
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
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                            <label for="password">Password <span>*</span></label>
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
                                                    <div>
                                                        <label class="form-check-label mb-3 mt-2">
                                                            <input type="checkbox" required />
                                                            I agree to the <a href="{{ route('term_and_condition') }}">Terms
                                                                of
                                                                Service</a> and <a
                                                                href="{{ route('privacy_policy') }}">Privacy Policy.</a>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="d-grid">
                                                    <button type="button" class="btn btn-primary btn-start"
                                                        id="submitButton" onclick="submitForm()">Place Order &nbsp; &nbsp;
                                                        <span class="final_price" id="discounted_price_span">₹
                                                            {{ $plan_detail->discounted_price }}</span>
                                                        <span class="d-none final_price" id="price_span">₹
                                                            {{ $plan_detail->amount }}</span>
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
                            <br>
                            <div class="col-lg-8 col-12 m-lg-auto" style="margin-top: 25px !important;">
                                <div class="login-wrapper">
                                    <div class="loginbox">
                                        <div class="section-title mb-4 mt-2">
                                            <h5 class="gordita-bold">Payment Modes</h5>
                                            <hr />
                                        </div>
                                        <div class="faq-accordion">
                                            <div class="accordion" id="FaqAccordion">
                                                <div class="accordion-item">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                        Paytm Payment Links
                                                    </button>
                                                    <div id="collapseFour" class="accordion-collapse collapse"
                                                        data-bs-parent="#FaqAccordion">
                                                        <form action="#" method="POST">
                                                            @csrf
                                                            <div class="accordion-body">
                                                                <p> Pay Using Paytm Gateway <br>
                                                                    You can pay directly through Paytm payment gateway using
                                                                    UPI/Debit
                                                                    Card/Net Banking
                                                                </p>
                                                                <div class="about-btn mt-3 mb-3">
                                                                    <button class="btn btn-primary w-100">Place Order <i
                                                                            class="ri-arrow-right-line"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                        aria-expanded="false" aria-controls="collapseFive">
                                                        Pay Using RichInd Refer Wallet
                                                    </button>
                                                    <div id="collapseFive" class="accordion-collapse collapse"
                                                        data-bs-parent="#FaqAccordion">
                                                        <form action="#" method="POST">
                                                            @csrf
                                                            <div class="accordion-body">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="referral_code"
                                                                            value="" placeholder="Referral Code"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="about-btn mt-3 mb-3">
                                                                    <button class="btn btn-primary w-100">Place Order <i
                                                                            class="ri-arrow-right-line"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="false" aria-controls="collapseOne">
                                                        Pay with QR
                                                    </button>
                                                    <div id="collapseOne" class="accordion-collapse collapse"
                                                        data-bs-parent="#FaqAccordion" style="">
                                                        <div class="accordion-body">
                                                            <p> Pay Using Cash <br>
                                                                You can pay directly through QR
                                                            </p>
                                                            <div class="about-btn mt-3 mb-3">
                                                                <a href="#" class="btn btn-primary w-100">Place
                                                                    Order <i class="ri-arrow-right-line"></i></a>
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
            </div>
        </div>
    </div>

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
@endsection

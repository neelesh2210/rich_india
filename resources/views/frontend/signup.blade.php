@extends('frontend.layouts.app')
@section('content')
<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <h2>Enroll to The Success Preneur </h2>
                </div>
                <div class="col-lg-5 col-md-6">
                    <ul>
                        <li> <a href="/">Home</a></li>
                        <li>Enroll to The Success Preneur </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    <section class="login-area ptb-100">
        <div class="container">

                <div class="row">
                    <div class="col-md-5 signUp__images">
                        <img class="signIn__desktop" src="{{ asset('frontend/images/signin-form-banner.png') }}">
                    </div>
                    <div class="col-md-7 col-xs-12 m-auto">
                        <div class="login-form">
                            <form id="registerForm" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" onpaste="return false" placeholder="Enter Your Name..." required/>
                                            @if($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                            <div class="lbl_msg" id="error_name"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Id</label>
                                            <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" onpaste="return false" placeholder="xyz@gmail.com" required/>
                                            @if($errors->has('email'))
                                                <div class="text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                            <div class="lbl_msg" id="error_email"></div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Confirm Email</label>
                                                </div>
                                                <div class="col-md-6 text-end">
                                                    @if($errors->has('email'))
                                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                                    @endif
                                                    <div class="lbl_msg" id="error_confirm_email"></div>
                                                </div>
                                            </div>
                                            <input type="text" name="confirm_email" id="confirm_email" value="{{old('confirm_email')}}" class="form-control" onpaste="return false" placeholder="Confirm Email" required/>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Enter Mobile Number</label>
                                            <input type="number" name="phone" id="phone" value="{{old('phone')}}" class="form-control" placeholder="+91 |" required/>
                                        @if($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                        <div class="lbl_msg" id="error_phone"></div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control" placeholder="Password" required/>
                                            @if($errors->has('password'))
                                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                            @endif
                                            <div class="lbl_msg" id="error_password"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Enter State</label>
                                            <select name="state" class="form-control" required>
                                                <option value="">Select State</option>
                                                @foreach (states() as $state)
                                                <option value="{{$state}}" @if(old('state') == $state) selected @endif>{{$state}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('state'))
                                                <div class="text-danger">{{ $errors->first('state') }}</div>
                                            @endif
                                            <div class="lbl_msg" id="error_state"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Enter Referral Code</label>
                                            <span style="float: right; color: blue; display: none">Code Applied Successfully!!</span>
                                            <div class="aff-div">
                                                <input class="form-control" name="referral_code" id="referral_code" value="{{old('referral_code')}}" placeholder="Referral Code" />
                                                <button type="button" id="apply_code">Apply Code</button>
                                                @if($errors->has('referral_code'))
                                                    <div class="text-danger">{{ $errors->first('referral_code') }}</div>
                                                @endif
                                                <div class="lbl_msg" id="error_refferal"></div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="section_doc">
                                        <input type="checkbox" required>&nbsp;I Agree with Terms & Conditions
                                        <span>
                                            <a href="#" target="_blank">Terms</a>
                                        </span>and
                                        <span>
                                            <a href="#" target="_blank">Polices</a>
                                        </span>
                                        <br />
                                        <input type="checkbox" required/>&nbsp;I have Read The Refund Policy <a href="#">Read More</a>
                                    </div>
                                    <div class="send-btn text-center">
                                        <button type="button" class="default-btn disabled" style="pointer-events: all; cursor: pointer;" id="submitButton" onclick="submitForm()">Submit <i class="ri-arrow-right-line"></i></button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    {{-- <div class="col-md-10 m-auto">
                        <div class="bundle-section">
                            <h3 id="choosebundel">Choose Your Bundle</h3>
                            <div class="bundle-img-div row">
                                <div class="col-md-4 step1">
                                    <div class="bundle-img course_img" style="cursor: pointer;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <img src="{{ asset('frontend/images/marketing-mastery.png') }}">
                                        <h4>Marketing Mastery</h4>
                                        <span class="orgprice"><span>₹</span>2143</span><span class="splprice"
                                            style="display: none; margin-left: 10px;"><span>₹</span>1499</span><span
                                            class="disprice" style="display: none"><span>₹</span>1499</span>
                                    </div>
                                </div>
                                <div class="col-md-4 step1">
                                    <div class="bundle-img course_img" style="cursor: pointer;">
                                        <img src="{{ asset('frontend/images/gold-bundle.png') }}">
                                        <h4>Branding Mastery</h4>
                                        <span class="orgprice"><span>₹</span>4999</span><span class="splprice"
                                            style="display: none; margin-left: 10px;"><span>₹</span>3499</span><span
                                            class="disprice" style="display: none"><span>₹</span>3499</span>
                                    </div>
                                </div>
                                <div class="col-md-4 step1">
                                    <div class="bundle-img course_img" style="cursor: pointer;">
                                        <img src="{{ asset('frontend/images/sapphire.png') }}">
                                        <h4>Traffic Mastery</h4>
                                        <span class="orgprice"><span>₹</span>8999</span><span class="splprice"
                                            style="display: none; margin-left: 10px;"><span>₹</span>5999</span><span
                                            class="disprice" style="display: none"><span>₹</span>5999</span>
                                    </div>
                                </div>
                                <div class="col-md-4 step1">
                                    <div class="bundle-img course_img" style="cursor: pointer;">
                                        <img src="{{ asset('frontend/images/platinum-bundle.png') }}">
                                        <h4>Influence Mastery</h4>
                                        <span class="orgprice"><span>₹</span>15999</span><span class="splprice"
                                            style="display: none; margin-left: 10px;"><span>₹</span>10999</span><span
                                            class="disprice" style="display: none"><span>₹</span>10999</span>
                                    </div>
                                </div>
                                <div class="col-md-4 step1">
                                    <div class="bundle-img course_img" style="cursor: pointer;">
                                        <img src="{{ asset('frontend/images/stock-banner.jpg') }}">
                                        <h4>Finance Mastery</h4>
                                        <span class="orgprice"><span>₹</span>19999</span><span class="splprice"
                                            style="display: none; margin-left: 10px;"><span>₹</span>14999</span><span
                                            class="disprice" style="display: none"><span>₹</span>14999</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="modal fade" id="exampleModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="coupn_code_box" style="display:none">
                                        <p>Coupon Code:</p>
                                        <div class="coupn_code_form">
                                            <input name="ctl00$ContentPlaceHolder1$txtcoupon" type="text" id="txtcoupon"
                                                class="form-control" placeholder="have any promo code?" />
                                            <button type="button" id="btn_applycoupon">Apply</button>
                                        </div>
                                        <label id="lbl_msg" style="padding-top: 10px;color:red"></label>
                                    </div>
                                    <div class="amt_card_box">
                                        <div class="amount_table_box">
                                            <h4>Marketing Mastery+Add on</h4>
                                            <table id="rdo_addon" class="addon_rdo">
                                                <tr>
                                                    <td><input id="rdo_addon_0" type="radio" name="course" value="1" />
                                                        <label for="rdo_addon_0">
                                                            <img src={{ asset('frontend/images/primesubscription.jpg') }} class="addon_img" />
                                                            <span class="addon_title">Prime Subscription</span>
                                                            <span class="addon_amount">₹199</span>
                                                            <span class="addon_description">
                                                                <span class="cls_view_info">View info.</span>
                                                                <samp class="tooltiptext2">
                                                                    <b>28 Days Dizigyaan Prime Subscription</b>
                                                                    <ul style="padding-left: 18px;">
                                                                        <li>Weekly exciting offers to boost your affiliate business</li>
                                                                        <li>Get early access to all the offers</li>
                                                                        <li>Exclusive Discount coupons on packages</li>
                                                                        <li>Lucky draw offers</li>
                                                                        <li>Free courses</li>
                                                                    </ul>
                                                                </samp>
                                                            </span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input id="rdo_addon_1" type="radio" name="course" value="2" />
                                                        <label for="rdo_addon_1"><img src={{ asset('frontend/images/primesubscription.jpg') }}  class="addon_img" />
                                                            <span class="addon_title">3 Coupons</span>
                                                            <span class="addon_amount">₹199</span>
                                                            <span class="addon_description">
                                                                <span class="cls_view_info">View info.</span>
                                                                <samp class="tooltiptext2"><b>Discount Coupon Codes</b>
                                                                    <ul style="padding-left: 18px;">
                                                                        <li> Coupon Code Worth Rs 500/- each</li>
                                                                        <li>Coupon discount available on brading and above
                                                                            packages</li>
                                                                        <li>Also can be used to upgrade your package</li>
                                                                    </ul>
                                                                </samp>
                                                            </span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input id="rdo_addon_2" type="radio" name="course" value="3" />
                                                        <label for="rdo_addon_2">
                                                            <img src={{ asset('frontend/images/primesubscription.jpg') }} class="addon_img" />
                                                            <span class="addon_title">UpSkilling</span>
                                                            <span class="addon_amount">₹199</span>
                                                            <span class="addon_description">
                                                                <span class="cls_view_info">View info.</span>
                                                                <samp class="tooltiptext2">
                                                                    <b>Heading-Dizigyaan Treasure Courses</b>
                                                                    <ul style="padding-left: 18px;">
                                                                        <li>Extra courses to help you grow more</li>
                                                                        <li>Capsule skill courses</li>
                                                                        <li>Designed by professionals</li>
                                                                        <li>Get certification</li>
                                                                        <li>Enhance your career</li>
                                                                    </ul>
                                                                </samp>
                                                            </span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input id="rdo_addon_3" type="radio" name="course" value="4" />
                                                        <label for="rdo_addon_3">
                                                            <img src={{ asset('frontend/images/primesubscription.jpg') }} class="addon_img" />
                                                            <span class="addon_title">Add all benefits!</span>
                                                            <span class="addon_amount">₹299</span>
                                                            <span class="addon_description">
                                                                <span class="cls_view_info">View info.</span>
                                                                <samp class="tooltiptext2">Kindly select this option to get all the benefits of the add-ons</samp>
                                                            </span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer about-btn">
                                    <a class="btn btn-default cls_class" data-dismiss="modal">Skip</a>
                                    <a class="theme-btn btn-style-one" data-dismiss="modal"><span class="txt">OK</span></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-md-3 col-sm-3 col-xs-12"></div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="payment__methods">
                            <h2>Payment Methods</h2>
                            <table id="ContentPlaceHolder1_rdo_payment_gateway">
                                <tr>
                                    <td>
                                        <input type="radio" value="1" checked="checked" />
                                        <label for="ContentPlaceHolder1_rdo_payment_gateway_0">
                                            <img src='{{ asset('frontend/images/instamojo.jpg') }}' />
                                        </label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-3 col-sm-3 col-xs-12"></div> --}}

                </div>
            {{-- <div class="col-md-10 m-auto">
                <div class="disclaimerWrap__content">
                    <p>
                        <b>Note : </b>
                        <br>
                        If you are facing any issue while making a payment, Kindly contact us at 8567856753. (Timing: Monday
                        to
                        Saturday 9:30 am to 6:00 pm)
                    </p>
                </div>
            </div> --}}
        </div>
    </section>

    <script>
        function submitForm(){
            $.ajax({
                type: 'POST',
                url: "{{route('register')}}",
                data:$('#registerForm').serialize(),
                success: function(data) {
                    var referral_code = $('#referral_code').val();
                    if(referral_code == '')
                    {
                        alert('You are submiting form without Referral Code!');
                    }
                    $('#submitButton').attr('disabled',true);
                    window.location.replace("{{route('user.dashboard')}}");
                },
                error: function (request, status, error) {
                    $(window).scrollTop(0);
                    if(request.responseJSON.errors.name){
                        $('#error_name').show();
                        $('#error_name').addClass('text-danger');
                        $('#error_name').removeClass('text-success');
                        $('#error_name').text('✖ '+request.responseJSON.errors.name);
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
                        $('#error_email').text('✖ '+request.responseJSON.errors.email);
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
                        $('#error_phone').text('✖ '+request.responseJSON.errors.phone);
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
                        $('#error_password').text('✖ '+request.responseJSON.errors.password);
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
                        $('#error_state').text('✖ '+request.responseJSON.errors.state);
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
                        $('#error_refferal').text('✖ '+request.responseJSON.errors.referral_code);
                    }
                }
            });

        }
    </script>

@endsection

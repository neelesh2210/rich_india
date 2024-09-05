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

    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('frontend/assets/img/bg/breadcrumb_bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Checkout</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="index.html">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape-wrap">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape01.svg')}}" alt="img" class="alltuchtopdown">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape02.svg')}}" alt="img" data-aos="fade-right" data-aos-delay="300">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape03.svg')}}" alt="img" data-aos="fade-up" data-aos-delay="400">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape04.svg')}}" alt="img" data-aos="fade-down-left" data-aos-delay="400">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape05.svg')}}" alt="img" data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- checkout-area -->
    <div class="checkout__area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="coupon__code-wrap">
                        <div class="coupon__code-info">
                            <span><i class="far fa-bookmark"></i> Have a coupon?</span>
                            <a href="#" id="coupon-element">Click here to enter your code</a>
                        </div>
                        <form action="#" class="coupon__code-form">
                            <p>If you have a coupon code, please apply it below.</p>
                            <input type="text" placeholder="Coupon code">
                            <button type="submit" class="btn">Apply coupon</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form action="#" class="customer__form-wrap">
                        <span class="title">Billing Details</span>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-grp">
                                    <label for="first-name">Your Affiliate Code</label>
                                    <input type="text" id="first-name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="first-name">Name *</label>
                                    <input type="text" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp select-grp">
                                    <label for="country-name">State *</label>
                                    <select id="country-name" name="state-name" class="country-name">
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="phone">Phone *</label>
                                    <input type="number" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="email">Email address *</label>
                                    <input type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="phone">Password *</label>
                                    <input type="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="email">Confirm Password *</label>
                                    <input type="confirm_password" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <span class="title mt-3">Choose Package</span>
                        <div class="row">
                            <div class="col-lg-4 col-4 col-sm-4">
                                <label class="aiz-megabox d-block mb-3">
                                    <input class="online_payment" type="radio" name="plan_id"  checked>
                                    <span class="d-block p-2 aiz-megabox-elem">
                                        <img id="ContentPlaceHolder1_img" src="{{ asset('frontend/assets/img/courses/course_thumb01.jpg')}}" class="img-fluid mb-3" />
                                        <span class="d-block text-center">
                                            <h5 class="text-white">Digital Marketing
                                        </span></h5>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order__info-wrap">
                        <h2 class="title">Plan Details</h2>
                        <ul class="list-wrap">
                            <li class="title">Product <span>Total</span></li>
                            <li>Basic <span>₹999</span></li>
                            <li>Grand Total <span>₹999</span></li>
                        </ul>
                        <p> I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</p>
                        <button class="btn">Place order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area-end -->
@endsection

@extends('frontend.layouts.app')
@section('content')
    <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div>
        <div class="page-header__overlay"></div>
        <div class="container text-center">
            <h2 class="page-header__title">Plan</h2>
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="#">Home</a></li>
                <li><span>Plan</span></li>
            </ul>
        </div>
    </section>
    <section class="pricing-one" style="background-image: url(assets/images/shapes/pricing-bg.jpg);">
        <div class="container">
            <div class="section-title  text-center">
                <h5 class="section-title__tagline">
                    Our Pricing Plan
                    <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 13">
                        <g clip-path="url(#clip0_324_36194)">
                            <path d="M10.5406 6.49995L0.700562 12.1799V8.56995L4.29056 6.49995L0.700562 4.42995V0.819946L10.5406 6.49995Z" />
                            <path d="M25.1706 6.49995L15.3306 12.1799V8.56995L18.9206 6.49995L15.3306 4.42995V0.819946L25.1706 6.49995Z" />
                            <path d="M39.7906 6.49995L29.9506 12.1799V8.56995L33.5406 6.49995L29.9506 4.42995V0.819946L39.7906 6.49995Z" />
                            <path d="M54.4206 6.49995L44.5806 12.1799V8.56995L48.1706 6.49995L44.5806 4.42995V0.819946L54.4206 6.49995Z" />
                        </g>
                    </svg>
                </h5>
                <h2 class="section-title__title">Select a Plan According to Your Requirements</h2>
            </div>
            <div class="pricing-one__main-tab-box tabs-box">
                <div class="row">
                    @foreach ($plans as $plan)
                        <div class="col-lg-4 col-md-6 fadeInUp animated" data-wow-delay="200ms">
                            <div class="pricing-one__item">
                                <svg viewBox="0 0 416 173" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="207.5" cy="-81.5" r="254.5" />
                                </svg>
                                <div class="pricing-one__item__name">{{$plan->title}}</div>
                                <h3 class="pricing-one__item__price">₹{{$plan->amount}}</h3>
                                <h5 class="pricing-one__item__list-title">Plan Details</h5>
                                <ul class="pricing-one__item__list">
                                    @foreach ($plan->points as $point)
                                        <li><span class="fa fa-check-circle"></span>{{$point}}</li>
                                    @endforeach
                                </ul>
                                <div class="pricing-one__item__border"></div>
                                <a href="{{route('checkout')}}?slug={{$plan->slug}}" class="richind-btn"><span class="richind-btn__curve"></span>Buy Now</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

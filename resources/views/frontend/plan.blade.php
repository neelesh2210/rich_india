@extends('frontend.layouts.app')
@section('content')
    <section class="course-content blogs-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        @foreach($plans as $plan)
                            <div class='col-12 col-lg-6 col-xl-4 col-sm-6 mb-3'>
                                <div class='blog grid-blog'>
                                    <div class='blog-image'>
                                        <a href="{{route('plan.detail',$plan->slug)}}" title="{{env('APP_NAME')}}-{{$plan->title}}">
                                            <img src="{{asset('backend/img/plan/'.$plan->image)}}" alt="{{env('APP_NAME')}}-{{$plan->title}}" title="{{env('APP_NAME')}}-{{$plan->title}}" class='img-fluid'>
                                        </a>
                                    </div>
                                    <div class='blog-grid-box'>
                                        <h3 class='blog-title'>
                                            <a href="{{route('plan.detail',$plan->slug)}}" title="{{env('APP_NAME')}}-{{$plan->title}}">
                                                {{$plan->title}}
                                            </a>
                                        </h3>
                                        <div class='blog-content blog-read'>
                                            <div style="height:160px;">
                                                <ul style="">
                                                    @foreach($plan->points as $point)
                                                        <li style="">{{$point}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <a href="{{route('checkout')}}?slug={{$plan->slug}}" title="{{env('APP_NAME')}}-{{$plan->title}}" class='read-more btn btn-primary' style="font-size:20px;margin-left:60px">
                                                Buy Now <i class='fas fa-arrow-right'></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>













    <!-- Start Page Banner Area -->
    {{-- <div class="page-banner-area">
            <div class="container">
                <div class="page-banner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-6">
                            <h2>Plan</h2>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <ul>
                                <li> <a href="/">Home</a></li>
                                <li>Plan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- End Page Banner Area -->

    <!-- Start Process Area -->
    {{-- <div class="process-area pt-100 pb-75">
            <div class="container">
                    <div class="container">
                        <div class="row">
                            @foreach ($plans as $key => $plan)
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="single-pricing-table tsp-plan with-hover-color" data-aos="fade-right" data-aos-duration="500" data-aos-duration="500" data-aos-once="true">
                                        <a href="{{route('checkout')}}?slug={{$plan->slug}}" class="w-100">
                                        @if ($key == 1)
                                                <div class="ribbon">
                                                <span>Recommended</span>
                                            </div>
                                        @endif

                                        @if ($key == 0)
                                        <div class="sub-head"></div>
                                            <img src="{{asset('frontend/images/plan-1.png')}}">
                                        @endif

                                        @if ($key == 1)
                                            <div class="sub-head-2"></div>
                                            <img src="{{asset('frontend/images/plan-2.png')}}">
                                        @endif

                                        @if ($key == 2)
                                            <div class="sub-head-3"></div>
                                            <img src="{{asset('frontend/images/plan-3.png')}}">
                                        @endif

                                        @if ($key == 3)
                                            <div class="sub-head-4"></div>
                                            <img src="{{asset('frontend/images/plan-4.png')}}">
                                        @endif

                                        <img src="{{asset('backend/img/plan/'.$plan->image)}}">

                                        <div class="pricing-header">
                                            <h3>{{$plan->title}}</h3>
                                        </div>
                                        <div class="price">Rs. {{$plan->amount}}</div>
                                        <ul class="features-list">
                                            @foreach ($plan->points as $plan_point)
                                                <li>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        {{$plan_point}} <i class="ri-check-line"></i>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </a>
                                        <div class="pricing-btn">
                                            <a href="{{route('checkout')}}?slug={{$plan->slug}}" class="buy-now">Buy Now <i class="ri-arrow-right-line"></i></a>
                                        </div>

                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
            </div>
        </div> --}}
@endsection

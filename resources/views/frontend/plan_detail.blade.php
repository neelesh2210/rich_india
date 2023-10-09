@extends('frontend.layouts.app')
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area">
        <div class="container">
            <div class="page-banner-content">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <h2>Course</h2>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <ul>
                            <li> <a href="{{route('index')}}">Home</a></li>
                            <li>{{$plan_detail->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <div class="pt-100 pb-75">
        <div class="container">
            <div class="about-area-inner">
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <div class="about-thumb-wrap after-shape">
                            <img src="{{ asset('backend/img/plan/'.$plan_detail->image) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-inner-wraps">
                            <div class="section-title mb-0">
                                <h2>{{$plan_detail->title}}</h2>
                            </div>
                            <div class="price">
                                <span class="price-amount">₹{{$plan_detail->amount}}</span>
                                <small>Inc. GST</small>
                            </div>
                            <div class="mt-3 mb-30">
                                <a href="{{route('checkout')}}?slug={{$plan_detail->slug}}" class="default-btn">Buy Now</a>
                            </div>
                            <div class="mb-30">
                                @foreach ($plan_detail->course_ids as $course_id)
                                    @php
                                        $course = App\Models\Admin\Course::where('id',$course_id)->first();
                                    @endphp
                                    <div class="latest-course-item">
                                        <div class="latest-course-img">
                                            <img src="{{ asset('backend/img/course/'.$course->image) }}">
                                        </div>
                                        <div class="latest-course-content">
                                            <h5><a href="#">{{$course->name}}</a></h5>
                                            {{-- <a class="latest-course-author" href="#">by <span>AK Singh</span></a> --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

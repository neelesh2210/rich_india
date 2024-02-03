@extends('frontend.layouts.app')
@section('content')
    <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3 rbt-banner-1">
        <div class="breadcrumb-inner">
            <img src="{{ asset('frontend/assets/images/banner-01.png') }}">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <div class="inner">
                            <div class="rbt-new-badge rbt-new-badge-one">
                                <span class="rbt-new-badge-icon">🏆</span> {{$plan_detail->title}}
                            </div>
                            <h2> MRP - ₹{{$plan_detail->amount}} </h2>
                            <h1 class="title"> With Promocode - ₹{{$plan_detail->discounted_price}}</h1>
                            @if (!Auth::guard('web')->user())
                                <div class="slider-btn">
                                    <a href="{{route('checkout')}}?slug={{$plan_detail->slug}}" class="richind-btn richind-btn-second">
                                        <span class="richind-btn__curve"></span>Buy Now <i class="icon-arrow"></i>
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div class="shape-wrapper" id="scene">
                            <img src="{{ asset('backend/img/plan/'.$plan_detail->image) }}" onerror="this.onerror=null;this.src='{{ asset('frontend/assets/images/no-courses-2.jpg') }}';">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="course-three" style="background-image: url({{ asset('frontend/assets/images/shapes/course-bg-3.png') }});">
        <div class="container">
            <div class="row">
                @foreach ($plan_detail->course_ids as $course_id)
                    @php
                        $course = App\Models\Admin\Course::where('delete_status','0')->where('status','1')->where('id',$course_id)->first();
                    @endphp
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="rbt-cat-box rbt-cat-box-1 variation-2 text-center">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="{{route('course.detail',$course->slug)}}">
                                        <img src="{{asset('backend/img/course/'.$course->image)}}" alt="Category Images" onerror="this.onerror=null;this.src='https://careerfixx.com/frontend/images/category/image/web-design.jpg';">
                                    </a>
                                </div>
                                <div class="icons">
                                    <a class="rbt-btn rounded-player-2 sm-size popup-video position-to-top" href="#">
                                        <span class="icon-play"></span>
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="title">
                                        <a href="{{route('course.detail',$course->slug)}}">{{$course->name}}</a>
                                    </h5>
                                    {{-- <div class="rbt-author-meta mt--10">
                                        <div class="rbt-avater-1">
                                            <a href="#">
                                                <img src="{{ asset('/frontend/assets/images/resources/banner-author.png') }}" onerror="this.onerror=null;this.src='{{ asset('/frontend/assets/images/resources/banner-author.png') }}';">
                                            </a>
                                        </div>
                                        <div class="rbt-author-info">
                                            By <a href="#">Yash Kulshrestha</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

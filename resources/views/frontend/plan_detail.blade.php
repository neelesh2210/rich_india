@extends('frontend.layouts.app')
@section('content')
<div class="breadcrumb__area breadcrumb__bg breadcrumb__bg-two" data-background="{{ asset('frontend/assets/img/bg/breadcrumb_bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <div class="inner">
                        <div class="rbt-new-badge rbt-new-badge-one mb-3">
                            <span class="rbt-new-badge-icon">🏆</span> {{$plan_detail->title}}
                        </div>
                        <h2> MRP - ₹{{$plan_detail->amount}} </h2>
                        <h1 class="title"> With Promocode - ₹{{$plan_detail->discounted_price}}</h1>
                        @if (!Auth::guard('web')->user())
                        <div class="tg-button-wrap">
                            <a href="{{route('checkout')}}?slug={{$plan_detail->slug}}" class="btn arrow-btn">Buy Now <i class="fas fa-arrow-right"></i></a>
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
    <div class="breadcrumb__shape-wrap">
        <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape01.svg') }}" alt="img" class="alltuchtopdown">
        <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape02.svg') }}" alt="img" data-aos="fade-right" data-aos-delay="300">
        <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape03.svg') }}" alt="img" data-aos="fade-up" data-aos-delay="400">
        <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape04.svg') }}" alt="img" data-aos="fade-down-left" data-aos-delay="400">
        <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape05.svg') }}" alt="img" data-aos="fade-left" data-aos-delay="400">
    </div>
</div>

<section class="all-courses-area section-py-120">
    <div class="container">
        <div class="row">
                @foreach ($plan_detail->course_ids as $course_id)
                    @php
                        $course = App\Models\Admin\Course::where('delete_status','0')->where('status','1')->where('id',$course_id)->first();
                    @endphp
                    <div class="col-md-3">
                        <div class="courses__item shine__animate-item">
                            <div class="courses__item-thumb">
                                <a href="{{route('course.detail',$course->slug)}}" class="shine__animate-link">
                                    <img src="{{asset('backend/img/course/'.$course->image)}}" alt="img">
                                </a>
                            </div>
                            <div class="courses__item-content">
                                <ul class="courses__item-meta list-wrap">
                                    <li class="courses__item-tag">
                                        <a href="{{route('course.detail',$course->slug)}}">{{$course->tag}}</a>
                                    </li>
                                    <li class="avg-rating"><i class="fas fa-star"></i> ({{$course->review}} Reviews)</li>
                                </ul>
                                <h5 class="title"><a href="{{route('course.detail',$course->slug)}}">{{$course->name}}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

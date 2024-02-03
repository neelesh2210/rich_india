@extends('frontend.layouts.app')
@section('content')
@php
    $courses = App\Models\Admin\Course::where('delete_status','0')->where('status','1')->withCount('topic')->get();
@endphp
    <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div>
        <div class="page-header__overlay"></div>
        <div class="container text-center">
            <h2 class="page-header__title">Course</h2>
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="#">Home</a></li>
                <li><span>Course</span></li>
            </ul>
        </div>
    </section>

    <section class="course-three" style="background-image: url({{ asset('frontend/assets/images/shapes/course-bg-3.png') }});">
        <div class="container">
            <div class="section-title wow fadeInUp text-center" data-wow-delay="100ms">
                <h5 class="section-title__tagline">
                    Course
                    <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 13">
                        <g clip-path="url(#clip0_324_36194)">
                            <path d="M10.5406 6.49995L0.700562 12.1799V8.56995L4.29056 6.49995L0.700562 4.42995V0.819946L10.5406 6.49995Z" />
                            <path d="M25.1706 6.49995L15.3306 12.1799V8.56995L18.9206 6.49995L15.3306 4.42995V0.819946L25.1706 6.49995Z" />
                            <path d="M39.7906 6.49995L29.9506 12.1799V8.56995L33.5406 6.49995L29.9506 4.42995V0.819946L39.7906 6.49995Z" />
                            <path d="M54.4206 6.49995L44.5806 12.1799V8.56995L48.1706 6.49995L44.5806 4.42995V0.819946L54.4206 6.49995Z" />
                        </g>
                    </svg>
                </h5>
                <h2 class="section-title__title">Featured Course On This Month</h2>
            </div>
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="course-three__item">
                            <div class="course-three__thumb">
                                <img src="{{ asset('backend/img/course/'.$course->image) }}"  onerror="this.onerror=null;this.src='{{ asset('frontend/assets/images/no-courses-2.jpg') }}'" alt="richind">
                            </div>
                            <div class="course-three__content">
                                <div class="course-three__time">20 Hours</div>
                                <div class="course-three__ratings">
                                    <span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span>
                                    <div class="course-three__ratings__reviews">(30 Reviews)</div>
                                </div>
                                <h3 class="course-three__title">
                                    <a href="{{route('course.detail',$course->slug)}}">{{$course->name}}</a>
                                </h3>
                                <div class="course-three__bottom">
                                    <div class="course-three__meta">
                                        <p class="course-three__meta__class"><i class="fas fa-image"></i> {{$course->topic_count}} Topics</p>
                                    </div>
                                    <div class="course-three__author">
                                        <a href="{{route('course.detail',$course->slug)}}" class="richind-btn py-2 px-3"><span class="richind-btn__curve"></span>More <i class="icon-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

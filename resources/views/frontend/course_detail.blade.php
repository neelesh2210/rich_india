@extends('frontend.layouts.app')
@section('content')
    <div class="page-banner-area">
        <div class="container">
            <div class="page-banner-content">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <h2>{{$course->name}}</h2>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <ul>
                            <li> <a href="/">Home</a></li>
                            <li>{{$course->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="course-details pt-100 pb-75">
        <div class="container">
            <div class="row flex-xl-row-reverse">
                <div class="col-xl-8 col-lg-8">
                    <div class="courses-details__content">
                            <img src="{{ asset('backend/img/course/' . $course->image) }}" alt="{{$course->name}}">
                            <div class="course-seats">
                                <a href="#">Buy <span>Now</span></a>
                            </div>

                        <h2 class="mt-4">{{$course->name}}</h2>

                        {!!$course->description!!}

                        {{--<div class="content mt-40">
                            <div class="row mt-30">
                                <div class="category-block-current-two col-lg-4 col-md-6 col-sm-6">
                                    <div class="inner-box">
                                        <div class="icon-box">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <h4 class="title">Online degree programs</h4>
                                        <span class="sub-title">26 Courses</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="course-sidebar">
                        {{-- <ul class="course-details-info">
                            <li class="course-details-info-link">
                                <span class="course-details-info-icon"><i class="far fa-bell"></i></span>
                                Language: <span>English</span>
                            </li>
                        </ul>
                        <div class="course-details-price">
                            <p class="course-details-price-text">{{$course->name}}</p>
                            <p class="course-details-price-amount">₹ 18.00</p>
                            <a href="#" class="default-btn disabled mt-3">Buy This Course</a>
                        </div> --}}
                        <div class="latest-course mb-30">
                            <h4 class="latest-course-title mb-30">Related Courses</h4>

                            @php
                              $related_courses =App\Models\Admin\Course::where('status',1)->get();
                            @endphp

                            @foreach ($related_courses as $related_course)
                                <div class="latest-course-item">
                                    <div class="latest-course-img">
                                        <img src="{{ asset('backend/img/course/' . $related_course->image) }}" alt="">
                                    </div>
                                    <div class="latest-course-content">
                                        <h5><a href="{{route('course.detail',$related_course->slug)}}">{{$related_course->name}}</a></h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

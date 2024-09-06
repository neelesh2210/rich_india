@extends('frontend.layouts.app')
@section('content')
    <div class="breadcrumb__area breadcrumb__bg breadcrumb__bg-two" data-background="{{ asset('frontend/assets/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="index.php">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">
                                <a href="index.php">Courses</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">{{$course->name}}</span>
                        </nav>
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

    <section class="courses__details-area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="courses__details-thumb">
                        <img src="{{ asset('backend/img/course/'.$course->image) }}" alt="img">
                    </div>
                    <div class="courses__details-content">
                        <ul class="courses__item-meta list-wrap">
                            <li class="courses__item-tag">
                                <a href="course.php">{{$course->tag}}</a>
                            </li>
                            <li class="avg-rating"><i class="fas fa-star"></i> ({{$course->review}} Reviews)</li>
                        </ul>
                        <h2 class="title">{{$course->name}}</h2>
                        <div class="courses__details-meta">
                            <ul class="list-wrap">
                                <li class="author-two">
                                    <img src="{{ asset('frontend/assets/img/courses/course_author001.png') }}" alt="img">
                                    By
                                    <a href="#">Richind</a>
                                </li>
                                <li class="date"><i class="flaticon-calendar"></i>{{$course->created_at->format('d/m/Y')}}</li>
                                <li><i class="flaticon-mortarboard"></i>{{$course->student}} Students</li>
                            </ul>
                        </div>
                        <div class="courses__curriculum-wrap">
                            <h3 class="title">Course Content</h3>
                            <p>{!!$course->description!!}</p>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Topic
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="list-wrap">
                                                @foreach ($course->topic as $topic_key=>$topic)
                                                    <li class="course-item @if($topic_key == 0) open-item @endif">
                                                        <a @if($topic_key == 0) href="{{$topic->video_url}}" @else href="#" @endif class="course-item-link @if($topic_key == 0) popup-video @endif">
                                                            <span class="item-name">{{$topic->title}}</span>
                                                            <div class="course-item-meta">
                                                                @if($topic_key == 0)
                                                                    <span class="item-meta duration">03:03</span>
                                                                @else
                                                                    <span class="item-meta course-item-status">
                                                                        <img src="{{ asset('frontend/assets/img/icons/lock.svg') }}" alt="icon">
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="courses__details-sidebar">
                        <div class="courses__details-video">
                            <img src="{{ asset('frontend/assets/img/courses/course_thumb02.jpg') }}" alt="img">
                            <a href="https://www.youtube.com/watch?v=YwrHGratByU" class="popup-video"><i class="fas fa-play"></i></a>
                        </div>
                        {{-- <div class="courses__cost-wrap">
                            <span>This Course Fee:</span>
                            <h2 class="title">₹18.00 <del>₹32.00</del></h2>
                        </div> --}}
                        <div class="courses__information-wrap">
                            <h5 class="title">Course includes:</h5>
                            <ul class="list-wrap">
                                <li>
                                    <img src="{{ asset('frontend/assets/img/icons/course_icon01.svg') }}" alt="img" class="injectable">
                                    Tag
                                    <span>{{$course->tag}}</span>
                                </li>
                                <li>
                                    <img src="{{ asset('frontend/assets/img/icons/course_icon02.svg') }}" alt="img" class="injectable">
                                    Review
                                    <span>{{$course->review}}</span>
                                </li>
                                <li>
                                    <img src="{{ asset('frontend/assets/img/icons/course_icon03.svg') }}" alt="img" class="injectable">
                                    Students
                                    <span>{{$course->student}}</span>
                                </li>
                                <li>
                            </ul>
                        </div>
                        {{-- <div class="courses__payment">
                            <h5 class="title">Secure Payment:</h5>
                            <img src="{{ asset('frontend/assets/img/others/payment.png') }}" alt="img">
                        </div> --}}
                        <div class="courses__details-social">
                            <h5 class="title">Share this course:</h5>
                            <ul class="list-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        {{-- <div class="courses__details-enroll">
                            <div class="tg-button-wrap">
                                <a href="course.php" class="btn btn-two arrow-btn">
                                    Buy Now
                                    <img src="{{ asset('frontend/assets/img/icons/right_arrow.svg') }}" alt="img"  class="injectable">
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

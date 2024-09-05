@extends('frontend.layouts.app')
@section('content')
           <!-- breadcrumb-area -->
           <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('frontend/assets/img/bg/breadcrumb_bg.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title">All Plan</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.php">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Plan</span>
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

        <!-- all-courses -->
        <section class="all-courses-area section-py-120">
            <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="#" class="shine__animate-link">
                                        <img src="{{ asset('frontend/assets/img/courses/course_thumb02.jpg')}}" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <ul class="courses__item-meta list-wrap">
                                        <li class="courses__item-tag">
                                            <a href="#">Design</a>
                                        </li>
                                        <li class="avg-rating"><i class="fas fa-star"></i> (4.5 Reviews)</li>
                                    </ul>
                                    <h5 class="title"><a href="#">The Complete Graphic Design for Beginners</a></h5>
                                    <p class="author">By <a href="#">RichInd</a></p>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="#">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                        <h5 class="price">₹19.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="#" class="shine__animate-link">
                                        <img src="{{ asset('frontend/assets/img/courses/course_thumb03.jpg')}}" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <ul class="courses__item-meta list-wrap">
                                        <li class="courses__item-tag">
                                            <a href="#">Marketing</a>
                                        </li>
                                        <li class="avg-rating"><i class="fas fa-star"></i> (4.3 Reviews)</li>
                                    </ul>
                                    <h5 class="title"><a href="#">Learning Digital Marketing on Facebook</a></h5>
                                    <p class="author">By <a href="#">RichInd</a></p>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="#">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                        <h5 class="price">₹24.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="#" class="shine__animate-link">
                                        <img src="{{ asset('frontend/assets/img/courses/course_thumb04.jpg')}}" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <ul class="courses__item-meta list-wrap">
                                        <li class="courses__item-tag">
                                            <a href="#">Business</a>
                                        </li>
                                        <li class="avg-rating"><i class="fas fa-star"></i> (4.8 Reviews)</li>
                                    </ul>
                                    <h5 class="title"><a href="#">Financial Analyst Training & Investing Course</a></h5>
                                    <p class="author">By <a href="#">RichInd</a></p>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="#">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                        <h5 class="price">₹12.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- all-courses-end -->
@endsection

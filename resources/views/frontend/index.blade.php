@extends('frontend.layouts.app')
@section('content')
    <!-- slider-area -->
    <section class="slider__area">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide slider__single">
                    <div class="slider__bg" data-background="{{ asset('frontend/assets/img/slider/slider_bg02.webp')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-7">
                                    <div class="slider__content">
                                        <span class="sub-title">Professional Courses</span>
                                        <h2 class="title">Find Business
                                            <span>Courses</span> & Develop Your Skills
                                        </h2>
                                        <p>Free & Premium online courses from the world’s Join 17 million learners
                                            today.</p>
                                        <div class="banner__btn-wrap" data-aos="fade-right" data-aos-delay="800">
                                            <a href="#" class="btn arrow-btn">Start Free Trial <i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide slider__single">
                    <div class="slider__bg" data-background="{{ asset('frontend/assets/img/slider/slider_bg02.webp')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-7">
                                    <div class="slider__content">
                                        <span class="sub-title">Professional Courses</span>
                                        <h2 class="title">Find Business <span>Courses </span> & Develop Your Skills
                                        </h2>
                                        <p>Free & Premium online courses from the world’s Join 17 million learners
                                            today.</p>
                                        <div class="banner__btn-wrap" data-aos="fade-right" data-aos-delay="800">
                                            <a href="#" class="btn arrow-btn">Start Free Trial <i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider-area-end -->
    <!-- features-area -->
    <section class="features__area-eight">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item-six features__item-seven">
                        <div class="features__icon-six features__icon-seven">
                            <i class="skillgro-profit"></i>
                        </div>
                        <div class="features__content-six features__content-seven">
                            <h4 class="title">Learn skills with 120k+</h4>
                            <span>video courses.</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item-six features__item-seven">
                        <div class="features__icon-six features__icon-seven">
                            <i class="skillgro-instructor"></i>
                        </div>
                        <div class="features__content-six features__content-seven">
                            <h4 class="title">Choose courses</h4>
                            <span>real-world experts.</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item-six features__item-seven">
                        <div class="features__icon-six features__icon-seven">
                            <i class="skillgro-tutorial"></i>
                        </div>
                        <div class="features__content-six features__content-seven">
                            <h4 class="title">processional Tutors</h4>
                            <span>video courses.</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item-six features__item-seven">
                        <div class="features__icon-six features__icon-seven">
                            <i class="skillgro-graduated"></i>
                        </div>
                        <div class="features__content-six features__content-seven">
                            <h4 class="title">Online Degrees</h4>
                            <span>Study flexibly online</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features-area-end -->

    <!-- about-area -->
    <section class="about-area tg-motion-effects section-py-120">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-md-9">
                    <div class="about__images">
                        <img src="{{ asset('frontend/assets/img/others/about_img.png')}}" alt="img" class="main-img">
                        <img src="{{ asset('frontend/assets/img/others/about_shape.svg')}}" alt="img" class="shape alltuchtopdown">
                        <a href="https://www.youtube.com/watch?v=b2Az7_lLh3g" class="popup-video">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 28"
                                fill="none">
                                <path
                                    d="M0.19043 26.3132V1.69421C0.190288 1.40603 0.245303 1.12259 0.350273 0.870694C0.455242 0.6188 0.606687 0.406797 0.79027 0.254768C0.973854 0.10274 1.1835 0.0157243 1.39936 0.00193865C1.61521 -0.011847 1.83014 0.0480663 2.02378 0.176003L20.4856 12.3292C20.6973 12.4694 20.8754 12.6856 20.9999 12.9535C21.1245 13.2214 21.1904 13.5304 21.1904 13.8456C21.1904 14.1608 21.1245 14.4697 20.9999 14.7376C20.8754 15.0055 20.6973 15.2217 20.4856 15.3619L2.02378 27.824C1.83056 27.9517 1.61615 28.0116 1.40076 27.9981C1.18536 27.9847 0.97607 27.8983 0.792638 27.7472C0.609205 27.596 0.457661 27.385 0.352299 27.1342C0.246938 26.8833 0.191236 26.6008 0.19043 26.3132Z"
                                    fill="currentcolor" />
                            </svg>
                        </a>
                        <div class="about__enrolled" data-aos="fade-right" data-aos-delay="200">
                            <p class="title"><span>36K+</span> Enrolled Students</p>
                            <img src="{{ asset('frontend/assets/img/others/student_grp.png')}}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="about__content">
                        <div class="section__title">
                            <span class="sub-title">Get More About Us</span>
                            <h2 class="title">
                                About
                                <span class="position-relative">
                                    <svg x="0px" y="0px" preserveAspectRatio="none" viewBox="0 0 209 59" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.74438 7.70565C69.7006 -1.18799 136.097 -2.38304 203.934 4.1205C207.178 4.48495 209.422 7.14626 208.933 10.0534C206.793 23.6481 205.415 36.5704 204.801 48.8204C204.756 51.3291 202.246 53.5582 199.213 53.7955C136.093 59.7623 74.1922 60.5985 13.5091 56.3043C10.5653 56.0924 7.84371 53.7277 7.42158 51.0325C5.20725 38.2627 2.76333 25.6511 0.0898448 13.1978C-0.465589 10.5873 1.61173 8.1379 4.73327 7.70565"
                                            fill="currentcolor" />
                                    </svg>
                                    RichInd
                                </span>
                            </h2>
                        </div>
                        <p class="desc">At Richind, we believe that knowledge is the key to success in today's fast-paced, tech-driven world. Our platform is designed to empower individuals like you with the skills needed to thrive in the digital era.</p>
                        <ul class="about__info-list list-wrap">
                            <li class="about__info-list-item">
                                <i class="flaticon-angle-right"></i>
                                <p class="content">The Most World Class Instructors</p>
                            </li>
                            <li class="about__info-list-item">
                                <i class="flaticon-angle-right"></i>
                                <p class="content">Access Your Class anywhere</p>
                            </li>
                            <li class="about__info-list-item">
                                <i class="flaticon-angle-right"></i>
                                <p class="content">Flexible Course Plan</p>
                            </li>
                        </ul>
                        <div class="tg-button-wrap">
                            <a href="#" class="btn arrow-btn">Discover More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->

    <!-- course-area -->
    <section class="courses-area section-pt-120 section-pb-90" data-background="{{ asset('frontend/assets/img/bg/courses_bg.jpg')}}">
        <div class="container">
            <div class="section__title-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section__title text-center mb-40">
                            <span class="sub-title">Top Class Courses</span>
                            <h2 class="title">Explore Our World's Best Courses</h2>
                            <p class="desc">When known printer took a galley of type scrambl edmake</p>
                        </div>
                        <div class="courses__nav">
                            <ul class="nav nav-tabs" id="courseTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab"
                                        data-bs-target="#all-tab-pane" type="button" role="tab"
                                        aria-controls="all-tab-pane" aria-selected="true">
                                        All Courses
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="design-tab" data-bs-toggle="tab"
                                        data-bs-target="#design-tab-pane" type="button" role="tab"
                                        aria-controls="design-tab-pane" aria-selected="false">
                                        Design
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="business-tab" data-bs-toggle="tab"
                                        data-bs-target="#business-tab-pane" type="button" role="tab"
                                        aria-controls="business-tab-pane" aria-selected="false">
                                        Business
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="development-tab" data-bs-toggle="tab"
                                        data-bs-target="#development-tab-pane" type="button" role="tab"
                                        aria-controls="development-tab-pane" aria-selected="false">
                                        Development
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="courseTabContent">
                <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab"
                    tabindex="0">
                    <div class="swiper courses-swiper-active">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="courses__item shine__animate-item">
                                    <div class="courses__item-thumb">
                                        <a href="#" class="shine__animate-link">
                                            <img src="{{ asset('frontend/assets/img/courses/course_thumb01.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="courses__item-content">
                                        <ul class="courses__item-meta list-wrap">
                                            <li class="courses__item-tag">
                                                <a href="#">Development</a>
                                            </li>
                                            <li class="avg-rating"><i class="fas fa-star"></i> (4.8 Reviews)</li>
                                        </ul>
                                        <h5 class="title"><a href="#">Learning JavaScript With
                                                Imagination</a></h5>
                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
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
                                        <h5 class="title"><a href="#">The Complete Graphic Design
                                                for Beginners</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
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
                                        <h5 class="title"><a href="#">Learning Digital Marketing
                                                on Facebook</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
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
                                        <h5 class="title"><a href="#">Financial Analyst Training &
                                                Investing Course</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="courses__item shine__animate-item">
                                    <div class="courses__item-thumb">
                                        <a href="#" class="shine__animate-link">
                                            <img src="{{ asset('frontend/assets/img/courses/course_thumb05.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="courses__item-content">
                                        <ul class="courses__item-meta list-wrap">
                                            <li class="courses__item-tag">
                                                <a href="#">Data Science</a>
                                            </li>
                                            <li class="avg-rating"><i class="fas fa-star"></i> (4.5 Reviews)</li>
                                        </ul>
                                        <h5 class="title"><a href="#">Data Analysis &
                                                Visualization Masterclass</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="courses__item shine__animate-item">
                                    <div class="courses__item-thumb">
                                        <a href="#" class="shine__animate-link">
                                            <img src="{{ asset('frontend/assets/img/courses/course_thumb06.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="courses__item-content">
                                        <ul class="courses__item-meta list-wrap">
                                            <li class="courses__item-tag">
                                                <a href="#">Mathematic</a>
                                            </li>
                                            <li class="avg-rating"><i class="fas fa-star"></i> (4.7 Reviews)</li>
                                        </ul>
                                        <h5 class="title"><a href="#">Master the Fundamentals of
                                                Math</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses__nav">
                        <div class="courses-button-prev"><i class="flaticon-arrow-right"></i></div>
                        <div class="courses-button-next"><i class="flaticon-arrow-right"></i></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab"
                    tabindex="0">
                    <div class="swiper courses-swiper-active">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
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
                                        <h5 class="title"><a href="#">Learning Digital Marketing
                                                on Facebook</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
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
                                        <h5 class="title"><a href="#">Financial Analyst Training &
                                                Investing Course</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="courses__item shine__animate-item">
                                    <div class="courses__item-thumb">
                                        <a href="#" class="shine__animate-link">
                                            <img src="{{ asset('frontend/assets/img/courses/course_thumb01.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="courses__item-content">
                                        <ul class="courses__item-meta list-wrap">
                                            <li class="courses__item-tag">
                                                <a href="#">Development</a>
                                            </li>
                                            <li class="avg-rating"><i class="fas fa-star"></i> (4.8 Reviews)</li>
                                        </ul>
                                        <h5 class="title"><a href="#">Learning JavaScript With
                                                Imagination</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
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
                                        <h5 class="title"><a href="#">The Complete Graphic Design
                                                for Beginners</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="courses__item shine__animate-item">
                                    <div class="courses__item-thumb">
                                        <a href="#" class="shine__animate-link">
                                            <img src="{{ asset('frontend/assets/img/courses/course_thumb05.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="courses__item-content">
                                        <ul class="courses__item-meta list-wrap">
                                            <li class="courses__item-tag">
                                                <a href="#">Data Science</a>
                                            </li>
                                            <li class="avg-rating"><i class="fas fa-star"></i> (4.5 Reviews)</li>
                                        </ul>
                                        <h5 class="title"><a href="#">Data Analysis &
                                                Visualization Masterclass</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="courses__item shine__animate-item">
                                    <div class="courses__item-thumb">
                                        <a href="#" class="shine__animate-link">
                                            <img src="{{ asset('frontend/assets/img/courses/course_thumb06.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="courses__item-content">
                                        <ul class="courses__item-meta list-wrap">
                                            <li class="courses__item-tag">
                                                <a href="#">Mathematic</a>
                                            </li>
                                            <li class="avg-rating"><i class="fas fa-star"></i> (4.7 Reviews)</li>
                                        </ul>
                                        <h5 class="title"><a href="#">Master the Fundamentals of
                                                Math</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses__nav">
                        <div class="courses-button-prev"><i class="flaticon-arrow-right"></i></div>
                        <div class="courses-button-next"><i class="flaticon-arrow-right"></i></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="business-tab-pane" role="tabpanel" aria-labelledby="business-tab"
                    tabindex="0">
                    <div class="swiper courses-swiper-active">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
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
                                        <h5 class="title"><a href="#">The Complete Graphic Design
                                                for Beginners</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
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
                                        <h5 class="title"><a href="#">Learning Digital Marketing
                                                on Facebook</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
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
                                        <h5 class="title"><a href="#">Financial Analyst Training &
                                                Investing Course</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="courses__item shine__animate-item">
                                    <div class="courses__item-thumb">
                                        <a href="#" class="shine__animate-link">
                                            <img src="{{ asset('frontend/assets/img/courses/course_thumb05.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="courses__item-content">
                                        <ul class="courses__item-meta list-wrap">
                                            <li class="courses__item-tag">
                                                <a href="#">Data Science</a>
                                            </li>
                                            <li class="avg-rating"><i class="fas fa-star"></i> (4.5 Reviews)</li>
                                        </ul>
                                        <h5 class="title"><a href="#">Data Analysis &
                                                Visualization Masterclass</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="courses__item shine__animate-item">
                                    <div class="courses__item-thumb">
                                        <a href="#" class="shine__animate-link">
                                            <img src="{{ asset('frontend/assets/img/courses/course_thumb01.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="courses__item-content">
                                        <ul class="courses__item-meta list-wrap">
                                            <li class="courses__item-tag">
                                                <a href="#">Development</a>
                                            </li>
                                            <li class="avg-rating"><i class="fas fa-star"></i> (4.8 Reviews)</li>
                                        </ul>
                                        <h5 class="title"><a href="#">Learning JavaScript With
                                                Imagination</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="courses__item shine__animate-item">
                                    <div class="courses__item-thumb">
                                        <a href="#" class="shine__animate-link">
                                            <img src="{{ asset('frontend/assets/img/courses/course_thumb06.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="courses__item-content">
                                        <ul class="courses__item-meta list-wrap">
                                            <li class="courses__item-tag">
                                                <a href="#">Mathematic</a>
                                            </li>
                                            <li class="avg-rating"><i class="fas fa-star"></i> (4.7 Reviews)</li>
                                        </ul>
                                        <h5 class="title"><a href="#">Master the Fundamentals of
                                                Math</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses__nav">
                        <div class="courses-button-prev"><i class="flaticon-arrow-right"></i></div>
                        <div class="courses-button-next"><i class="flaticon-arrow-right"></i></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="development-tab-pane" role="tabpanel"
                    aria-labelledby="development-tab" tabindex="0">
                    <div class="swiper courses-swiper-active">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
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
                                        <h5 class="title"><a href="#">Financial Analyst Training &
                                                Investing Course</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="courses__item shine__animate-item">
                                    <div class="courses__item-thumb">
                                        <a href="#" class="shine__animate-link">
                                            <img src="{{ asset('frontend/assets/img/courses/course_thumb05.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="courses__item-content">
                                        <ul class="courses__item-meta list-wrap">
                                            <li class="courses__item-tag">
                                                <a href="#">Data Science</a>
                                            </li>
                                            <li class="avg-rating"><i class="fas fa-star"></i> (4.5 Reviews)</li>
                                        </ul>
                                        <h5 class="title"><a href="#">Data Analysis &
                                                Visualization Masterclass</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="courses__item shine__animate-item">
                                    <div class="courses__item-thumb">
                                        <a href="#" class="shine__animate-link">
                                            <img src="{{ asset('frontend/assets/img/courses/course_thumb06.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="courses__item-content">
                                        <ul class="courses__item-meta list-wrap">
                                            <li class="courses__item-tag">
                                                <a href="#">Mathematic</a>
                                            </li>
                                            <li class="avg-rating"><i class="fas fa-star"></i> (4.7 Reviews)</li>
                                        </ul>
                                        <h5 class="title"><a href="#">Master the Fundamentals of
                                                Math</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="courses__item shine__animate-item">
                                    <div class="courses__item-thumb">
                                        <a href="#" class="shine__animate-link">
                                            <img src="{{ asset('frontend/assets/img/courses/course_thumb01.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="courses__item-content">
                                        <ul class="courses__item-meta list-wrap">
                                            <li class="courses__item-tag">
                                                <a href="#">Development</a>
                                            </li>
                                            <li class="avg-rating"><i class="fas fa-star"></i> (4.8 Reviews)</li>
                                        </ul>
                                        <h5 class="title"><a href="#">Learning JavaScript With
                                                Imagination</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
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
                                        <h5 class="title"><a href="#">The Complete Graphic Design
                                                for Beginners</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
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
                                        <h5 class="title"><a href="#">Learning Digital Marketing
                                                on Facebook</a></h5>

                                        <div class="courses__item-bottom-three">
                                            <ul class="list-wrap">
                                                <li><i class="flaticon-book"></i>Lessons 05</li>
                                                <li><i class="flaticon-mortarboard"></i>Students 22</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses__nav">
                        <div class="courses-button-prev"><i class="flaticon-arrow-right"></i></div>
                        <div class="courses-button-next"><i class="flaticon-arrow-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- course-area-end -->

     <!-- plan-area -->
     <section class="features__area-two section-pt-120 section-pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section__title text-center mb-40">
                        <span class="sub-title">Our Plan</span>
                        <h2 class="title">RichInd Course Package</h2>
                        <p>when an unknown printer took a galley of type and scrambled make <br> specimen book has
                            survived not only five centuries</p>
                    </div>
                </div>
            </div>
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
                                <h5 class="price">₹19.00 <del>999</del></h5>
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
                                <h5 class="price">₹24.00 <del>999</del></h5>
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
                                <h5 class="price">₹12.00 <del>999</del></h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- plan-area-end -->

    <!-- features-area -->
    <section class="features__area-two section-pt-120 section-pb-90" data-background="{{ asset('frontend/assets/img/bg/courses_bg.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section__title text-center mb-40">
                        <span class="sub-title">Our Top Features</span>
                        <h2 class="title">Achieve Your Goal With RichInd</h2>
                        <p>when an unknown printer took a galley of type and scrambled make <br> specimen book has
                            survived not only five centuries</p>
                    </div>
                </div>
            </div>
            <div class="features__item-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="features__item-two">
                            <div class="features__content-two">
                                <div class="content-top">
                                    <div class="features__icon-two">
                                        <img src="{{ asset('frontend/assets/img/icons/h2_features_icon01.svg')}}" alt="img"
                                            class="injectable">
                                    </div>
                                    <h2 class="title">Expert Tutors</h2>
                                </div>
                                <p>when an unknown printer took a galley offe type and scrambled makes.</p>
                            </div>
                            <div class="features__item-shape">
                                <img src="{{ asset('frontend/assets/img/others/features_item_shape.svg')}}" alt="img" class="injectable">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="features__item-two">
                            <div class="features__content-two">
                                <div class="content-top">
                                    <div class="features__icon-two">
                                        <img src="{{ asset('frontend/assets/img/icons/h2_features_icon02.svg')}}" alt="img"
                                            class="injectable">
                                    </div>
                                    <h2 class="title">Effective Courses</h2>
                                </div>
                                <p>when an unknown printer took a galley offe type and scrambled makes.</p>
                            </div>
                            <div class="features__item-shape">
                                <img src="{{ asset('frontend/assets/img/others/features_item_shape.svg')}}" alt="img" class="injectable">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="features__item-two">
                            <div class="features__content-two">
                                <div class="content-top">
                                    <div class="features__icon-two">
                                        <img src="{{ asset('frontend/assets/img/icons/h2_features_icon03.svg')}}" alt="img"
                                            class="injectable">
                                    </div>
                                    <h2 class="title">Earn Certificate</h2>
                                </div>
                                <p>when an unknown printer took a galley offe type and scrambled makes.</p>
                            </div>
                            <div class="features__item-shape">
                                <img src="{{ asset('frontend/assets/img/others/features_item_shape.svg')}}" alt="img" class="injectable">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fact__inner-wrap">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="fact__item">
                            <h2 class="count"><span class="odometer" data-count="10"></span>+</h2>
                            <p>Trainers</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="fact__item">
                            <h2 class="count"><span class="odometer" data-count="150"></span>K+</h2>
                            <p>Students</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="fact__item">
                            <h2 class="count"><span class="odometer" data-count="500"></span>+</h2>
                            <p>Live Training</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="fact__item">
                            <h2 class="count"><span class="odometer" data-count="6"></span>Cr</h2>
                            <p>Community Earning</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features-area-end -->

    <!-- newsletter-area -->
    <section class="newsletter__area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="newsletter__img-wrap">
                        <img src="{{ asset('frontend/assets/img/others/newsletter_img.png')}}" alt="img">
                        <img src="{{ asset('frontend/assets/img/others/newsletter_shape01.png')}}" alt="img" data-aos="fade-up"
                            data-aos-delay="400">
                        <img src="{{ asset('frontend/assets/img/others/newsletter_shape02.png')}}" alt="img" class="alltuchtopdown">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="newsletter__content">
                        <h2 class="title">RichInd <span>Customer Support</span></h2>
                        <p style="color: #fff;">(We are available on Monday to Saturday 9:15am to 5pm)</p>
                        <div class="newsletter__form button">
                            <a href="tel:+911234567890" class="btn"><i class="fas fa-phone-volume"></i> +91-1234567890</a>
                            <a href="" class="btn"><i class="fab fa-whatsapp"></i> +91-1234567890</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="newsletter__shape">
            <img src="{{ asset('frontend/assets/img/others/newsletter_shape03.png')}}" alt="img" data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>
    <!-- newsletter-area-end -->

    <!-- instructor-area -->
    <section class="instructor__area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4">
                    <div class="instructor__content-wrap">
                        <div class="section__title mb-15">
                            <span class="sub-title">Skilled Introduce</span>
                            <h2 class="title">Our Top Class & Expert Instructors in One Place</h2>
                        </div>
                        <p>when an unknown printer took a galley of type and scrambled makespecimen book has
                            survived not only five centuries</p>
                        <div class="tg-button-wrap">
                            <a href="#" class="btn arrow-btn">See All Instructors <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="instructor__item-wrap">
                        <div class="row">
                            <div class="col-6">
                                <div class="instructor__item">
                                    <div class="instructor__thumb">
                                        <a href="#"><img
                                                src="{{ asset('frontend/assets/img/instructor/instructor04.png')}}" alt="img"></a>
                                    </div>
                                    <div class="instructor__content">
                                        <h2 class="title"><a href="#">Fouder Of RichInd</a></h2>
                                        <span class="designation">UX Design Lead</span>
                                        <p class="avg-rating">
                                            <i class="fas fa-star"></i>
                                            (4.8 Ratings)
                                        </p>
                                        <div class="instructor__social">
                                            <ul class="list-wrap">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="instructor__item">
                                    <div class="instructor__thumb">
                                        <a href="#"><img
                                                src="{{ asset('frontend/assets/img/instructor/instructor04.png')}}" alt="img"></a>
                                    </div>
                                    <div class="instructor__content">
                                        <h2 class="title"><a href="#">Fouder Of RichInd</a></h2>
                                        <span class="designation">Web Design</span>
                                        <p class="avg-rating">
                                            <i class="fas fa-star"></i>
                                            (4.8 Ratings)
                                        </p>
                                        <div class="instructor__social">
                                            <ul class="list-wrap">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="instructor__item">
                                    <div class="instructor__thumb">
                                        <a href="#"><img
                                                src="{{ asset('frontend/assets/img/instructor/instructor04.png')}}" alt="img"></a>
                                    </div>
                                    <div class="instructor__content">
                                        <h2 class="title"><a href="#">Fouder Of RichInd</a></h2>
                                        <span class="designation">Digital Marketing</span>
                                        <p class="avg-rating">
                                            <i class="fas fa-star"></i>
                                            (4.8 Ratings)
                                        </p>
                                        <div class="instructor__social">
                                            <ul class="list-wrap">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="instructor__item">
                                    <div class="instructor__thumb">
                                        <a href="#"><img
                                                src="{{ asset('frontend/assets/img/instructor/instructor04.png')}}" alt="img"></a>
                                    </div>
                                    <div class="instructor__content">
                                        <h2 class="title"><a href="#">Fouder Of RichInd</a></h2>
                                        <span class="designation">Web Development</span>
                                        <p class="avg-rating">
                                            <i class="fas fa-star"></i>
                                            (4.8 Ratings)
                                        </p>
                                        <div class="instructor__social">
                                            <ul class="list-wrap">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- instructor-area-end -->


    <!-- choose-area -->
    <section class="choose__area-four tg-motion-effects section-py-140"
        data-background="{{ asset('frontend/assets/img/bg/courses_bg.jpg')}}">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="choose__img-four">
                        <div class="left__side">
                            <img src="{{ asset('frontend/assets/img/others/h7_choose_img01.jpg')}}" alt="img" data-aos="fade-down"
                                data-aos-delay="200">
                            <img src="{{ asset('frontend/assets/img/others/h7_choose_img02.jpg')}}" alt="img" data-aos="fade-up"
                                data-aos-delay="200">
                        </div>
                        <div class="right__side" data-aos="fade-left" data-aos-delay="400">
                            <img src="{{ asset('frontend/assets/img/others/h7_choose_img03.jpg')}}" alt="img">
                            <a href="https://www.youtube.com/watch?v=b2Az7_lLh3g" class="popup-video"><i
                                    class="fas fa-play"></i></a>
                        </div>
                        <img src="{{ asset('frontend/assets/img/others/h7_choose_shape01.svg')}}" alt="shape"
                            class="shape shape-one tg-motion-effects4">
                        <img src="{{ asset('frontend/assets/img/others/h7_choose_shape02.svg')}}" alt="shape"
                            class="shape shape-two alltuchtopdown">
                        <img src="{{ asset('frontend/assets/img/others/h7_choose_shape03.svg')}}" alt="shape"
                            class="shape shape-three tg-motion-effects7">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose__content-four">
                        <div class="section__title mb-20">
                            <span class="sub-title">Why Choose Us</span>
                            <h2 class="title bold">Professional Courses taught by industry leaders</h2>
                        </div>
                        <p>Groove’s intuitive shared inbox makes it easy for team member anIn this episode.Groove’s
                            intuitive shared inboeasy for team organize, prioritize anIn this episode.</p>
                        <ul class="about__info-list list-wrap">
                            <li class="about__info-list-item">
                                <i class="flaticon-angle-right"></i>
                                <p class="content">Body & Mind Stress Relief</p>
                            </li>
                            <li class="about__info-list-item">
                                <i class="flaticon-angle-right"></i>
                                <p class="content">Enhance Strength Growing</p>
                            </li>
                            <li class="about__info-list-item">
                                <i class="flaticon-angle-right"></i>
                                <p class="content">Get Better Posture</p>
                            </li>
                        </ul>
                        <a href="#" class="btn arrow-btn btn-four">Start Free Trial <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- choose-area-end -->
    <!-- testimonial-area -->
    <section class="testimonial__area section-py-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section__title text-center mb-50">
                        <span class="sub-title">Our Testimonials</span>
                        <h2 class="title">What Students Think and Say About RichInd</h2>
                        <p>when known printer took a galley of type scrambl edmake</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial__item-wrap">
                        <div class="swiper-container testimonial-swiper-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial__item">
                                        <div class="testimonial__item-top">
                                            <div class="testimonial__author">
                                                <div class="testimonial__author-thumb">
                                                    <img src="{{ asset('frontend/assets/img/others/testi_author01.png')}}" alt="img">
                                                </div>
                                                <div class="testimonial__author-content">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <h2 class="title">Wade Warren</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial__content">
                                            <p>“ when an unknown printer took alley ffferer area typey and scrambled to make a type specimen book hass”</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial__item">
                                        <div class="testimonial__item-top">
                                            <div class="testimonial__author">
                                                <div class="testimonial__author-thumb">
                                                    <img src="{{ asset('frontend/assets/img/others/testi_author02.png')}}" alt="img">
                                                </div>
                                                <div class="testimonial__author-content">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <h2 class="title">Jenny Wilson</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial__content">
                                            <p>“ when an unknown printer took alley ffferer area typey and scrambled to make a type specimen book hass”</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial__item">
                                        <div class="testimonial__item-top">
                                            <div class="testimonial__author">
                                                <div class="testimonial__author-thumb">
                                                    <img src="{{ asset('frontend/assets/img/others/testi_author03.png')}}" alt="img">
                                                </div>
                                                <div class="testimonial__author-content">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <h2 class="title">Guy Hawkins</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial__content">
                                            <p>“ when an unknown printer took alley ffferer area typey and scrambled to make a type specimen book hass”</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial__item">
                                        <div class="testimonial__item-top">
                                            <div class="testimonial__author">
                                                <div class="testimonial__author-thumb">
                                                    <img src="{{ asset('frontend/assets/img/others/testi_author02.png')}}" alt="img">
                                                </div>
                                                <div class="testimonial__author-content">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <h2 class="title">Jenny Wilson</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial__content">
                                            <p>“ when an unknown printer took alley ffferer area typey and scrambled to make a type specimen book hass”</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial__nav">
                            <button class="testimonial-button-prev"><i class="flaticon-arrow-right"></i></button>
                            <button class="testimonial-button-next"><i class="flaticon-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->
    <!-- features-area -->
    <section class="features__area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section__title white-title text-center mb-50">
                        <span class="sub-title">How We Start Journey</span>
                        <h2 class="title">Start your Learning Journey Today!</h2>
                        <p>Groove’s intuitive shared inbox makesteam members together <br> organize, prioritize
                            and.In this episode.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item">
                        <div class="features__icon">
                            <img src="{{ asset('frontend/assets/img/icons/features_icon01.svg')}}" class="injectable" alt="img">
                        </div>
                        <div class="features__content">
                            <h4 class="title">Learn with Experts</h4>
                            <p>Curate anding area share Pluralsight content to reach your</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item">
                        <div class="features__icon">
                            <img src="{{ asset('frontend/assets/img/icons/features_icon02.svg')}}" class="injectable" alt="img">
                        </div>
                        <div class="features__content">
                            <h4 class="title">Learn Anything</h4>
                            <p>Curate anding area share Pluralsight content to reach your</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item">
                        <div class="features__icon">
                            <img src="{{ asset('frontend/assets/img/icons/features_icon03.svg')}}" class="injectable" alt="img">
                        </div>
                        <div class="features__content">
                            <h4 class="title">Get Online Certificate</h4>
                            <p>Curate anding area share Pluralsight content to reach your</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item">
                        <div class="features__icon">
                            <img src="{{ asset('frontend/assets/img/icons/features_icon04.svg')}}" class="injectable" alt="img">
                        </div>
                        <div class="features__content">
                            <h4 class="title">E-mail Marketing</h4>
                            <p>Curate anding area share Pluralsight content to reach your</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features-area-end -->

    <!-- instructor-area-two -->
    <section class="instructor__area-two">
        <div class="container">
            <div class="instructor__item-wrap-two">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="instructor__item-two tg-svg bg1">
                            <div class="instructor__thumb-two">
                                <img src="{{ asset('frontend/assets/img/instructor/instructor_two01.png')}}" alt="img">
                                <div class="shape-two">
                                    <span class="svg-icon" id="instructor-svg"
                                        data-svg-icon="{{ asset('frontend/assets/img/instructor/instructor_shape02.svg')}}"></span>
                                </div>
                            </div>
                            <div class="instructor__content-two">
                                <h3 class="title"><a href="#">Become a Instructor</a></h3>
                                <p>To take a trivial example, which of us undertakes physical exercise yes is this
                                    happen here.</p>
                                <div class="tg-button-wrap">
                                    <a href="#" class="btn arrow-btn">Apply Now <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="instructor__item-two tg-svg bg2">
                            <div class="instructor__thumb-two">
                                <img src="{{ asset('frontend/assets/img/instructor/instructor_two02.png')}}" alt="img">
                                <div class="shape-two">
                                    <span class="svg-icon" id="instructor-svg-two"
                                        data-svg-icon="{{ asset('frontend/assets/img/instructor/instructor_shape02.svg')}}"></span>
                                </div>
                            </div>
                            <div class="instructor__content-two">
                                <h3 class="title"><a href="#">Become a Student</a></h3>
                                <p>Join millions of people from around the world learning together. Online learning.
                                </p>
                                <div class="tg-button-wrap">
                                    <a href="#" class="btn arrow-btn">Apply Now <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- instructor-area-two-end -->

    <!-- faq-area -->
    <section class="faq__area" data-background="{{ asset('frontend/assets/img/bg/courses_bg.jpg')}}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="faq__img-wrap tg-svg">
                        <div class="faq__round-text">
                            <div class="curved-circle">
                                * Education * System * can * Make * Change *
                            </div>
                        </div>
                        <div class="faq__img">
                            <img src="{{ asset('frontend/assets/img/others/faq_img.png')}}" alt="img">
                            <div class="shape-one">
                                <img src="{{ asset('frontend/assets/img/others/faq_shape01.svg')}}" class="injectable tg-motion-effects4"
                                    alt="img">
                            </div>
                            <div class="shape-two">
                                <span class="svg-icon" id="faq-svg"
                                    data-svg-icon="{{ asset('frontend/assets/img/others/faq_shape02.svg')}}"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq__content">
                        <div class="section__title pb-10">
                            <span class="sub-title">Faq’s</span>
                            <h2 class="title">Start Learning From <br> World’s Pro Instructors</h2>
                        </div>
                        <p>Groove’s intuitive shared inbox makes it easy for team members to organize, prioritize
                            and.In this episode.</p>
                        <div class="faq__wrap">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            What’s RichInd Want to give you?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Groove’s intuitive shared inbox makes it easy for team members
                                                organize prioritize and.In this episode.urvived not only five
                                                centuries.Edhen an unknown printer took a galley of type and scrambl
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Why choose us for your education?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Groove’s intuitive shared inbox makes it easy for team members
                                                organize prioritize and.In this episode.urvived not only five
                                                centuries.Edhen an unknown printer took a galley of type and scrambl
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            How We Provide Service For you?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Groove’s intuitive shared inbox makes it easy for team members
                                                organize prioritize and.In this episode.urvived not only five
                                                centuries.Edhen an unknown printer took a galley of type and scrambl
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                            Are you Affordable For Your Course
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Groove’s intuitive shared inbox makes it easy for team members
                                                organize prioritize and.In this episode.urvived not only five
                                                centuries.Edhen an unknown printer took a galley of type and scrambl
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq-area-end -->


    <section class="blog__post-area-seven section-pt-140 section-pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section__title text-center mb-20">
                        <span class="sub-title">Instagram Show</span>
                        <h2 class="title bold">RichInd Show</h2>
                        <p>when known printer took a galley of type scrambl edmake</p>
                    </div>
                </div>
            </div>
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6" >
                    <blockquote class="instagram-media"
                        data-instgrm-permalink="https://www.instagram.com/reel/C9L_HeiSJii/?igsh=YTlob25iMWdkZG9p"
                        data-instgrm-version="14">
                    </blockquote>
                </div>
                <div class="col-lg-3 col-md-6">
                    <blockquote class="instagram-media"
                        data-instgrm-permalink="https://www.instagram.com/reel/C6YOhIDPqEr/?igsh=MTJldGt5bXhib2ZxMA=="
                        data-instgrm-version="14">
                    </blockquote>
                </div>
                <div class="col-lg-3 col-md-6">
                    <blockquote class="instagram-media"
                        data-instgrm-permalink="https://www.instagram.com/reel/C53YsoZNodf/?igsh=MXdxbTF4MGpiMzZtaA=="
                        data-instgrm-version="14">
                    </blockquote>
                </div>
                <div class="col-lg-3 col-md-6">
                    <blockquote class="instagram-media"
                        data-instgrm-permalink="https://www.instagram.com/reel/C-qWSplyQA0/?igsh=eXRnZzB4bnVmbGF0"
                        data-instgrm-version="14">
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
    <script async src="//www.instagram.com/embed.js"></script>
@endsection

@extends('frontend.layouts.app')
@section('content')
    <section class="slider__area">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($desktop_sliders as $key => $desktop_slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('backend/img/websitesetting/sliders/' . $desktop_slider->content) }}"
                            class="d-block w-100" alt="{{ env('APP_NAME') }}-Slider">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="features__area-eight">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item-six features__item-seven">
                        <div class="features__icon-six features__icon-seven">
                            <img src="{{ asset('frontend/assets/img/icons/q1.png') }}" alt="">
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
                            <img src="{{ asset('frontend/assets/img/icons/q2.png') }}" alt="">
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
                            <img src="{{ asset('frontend/assets/img/icons/q3.png') }}" alt="">
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
                            <img src="{{ asset('frontend/assets/img/icons/q4.png') }}" alt="">
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

    <section class="about-area tg-motion-effects section-py-120">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-md-9">
                    <div class="about__images">
                        <img src="{{ asset('frontend/assets/img/others/about_img.png') }}" alt="img" class="main-img">
                        <img src="{{ asset('frontend/assets/img/others/about_shape.svg') }}" alt="img"
                            class="shape alltuchtopdown">
                        <a href="#" class="popup-video">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 28"
                                fill="none">
                                <path
                                    d="M0.19043 26.3132V1.69421C0.190288 1.40603 0.245303 1.12259 0.350273 0.870694C0.455242 0.6188 0.606687 0.406797 0.79027 0.254768C0.973854 0.10274 1.1835 0.0157243 1.39936 0.00193865C1.61521 -0.011847 1.83014 0.0480663 2.02378 0.176003L20.4856 12.3292C20.6973 12.4694 20.8754 12.6856 20.9999 12.9535C21.1245 13.2214 21.1904 13.5304 21.1904 13.8456C21.1904 14.1608 21.1245 14.4697 20.9999 14.7376C20.8754 15.0055 20.6973 15.2217 20.4856 15.3619L2.02378 27.824C1.83056 27.9517 1.61615 28.0116 1.40076 27.9981C1.18536 27.9847 0.97607 27.8983 0.792638 27.7472C0.609205 27.596 0.457661 27.385 0.352299 27.1342C0.246938 26.8833 0.191236 26.6008 0.19043 26.3132Z"
                                    fill="currentcolor" />
                            </svg>
                        </a>
                        <div class="about__enrolled" data-aos="fade-right" data-aos-delay="200">
                            <p class="title"><span>36K+</span> Enrolled Students</p>
                            <img src="{{ asset('frontend/assets/img/others/student_grp.png') }}" alt="img">
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
                        <p class="desc">
                            At Richind, we believe that knowledge is the key to success in today's fast-paced,
                            tech-driven world. Our platform is designed to empower individuals like you with the skills
                            needed to thrive in the digital era.
                        </p>
                        <ul class="about__info-list list-wrap">
                            <li class="about__info-list-item">
                                <i class="fas fa-angle-right"></i>
                                <p class="content">The Most World Class Instructors</p>
                            </li>
                            <li class="about__info-list-item">
                                <i class="fas fa-angle-right"></i>
                                <p class="content">Access Your Class anywhere</p>
                            </li>
                            <li class="about__info-list-item">
                                <i class="fas fa-angle-right"></i>
                                <p class="content">Flexible Course Plan</p>
                            </li>
                        </ul>
                        <div class="tg-button-wrap">
                            <a href="#" class="btn arrow-btn">Discover More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="courses-area section-pt-120 section-pb-90"
        data-background="{{ asset('frontend/assets/img/bg/courses_bg.jpg') }}">
        <div class="container">
            <div class="section__title-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section__title text-center mb-40">
                            <span class="sub-title">Top Class Courses</span>
                            <h2 class="title">Explore Our World's Best Courses</h2>
                            <p class="desc">RichInd envisions providing you with the latest trending courses which make
                                you a proficient leader in your field of expertise.</p>
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
                                @foreach ($plans as $plan)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="{{ $plan->slug }}" data-bs-toggle="tab"
                                            data-bs-target="#{{ $plan->slug }}-pane" type="button" role="tab"
                                            aria-controls="{{ $plan->slug }}-pane" aria-selected="false">
                                            {{ $plan->title }}
                                        </button>
                                    </li>
                                @endforeach
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
                            @foreach ($courses as $course)
                                <div class="swiper-slide">
                                    <div class="courses__item shine__animate-item">
                                        <div class="courses__item-thumb">
                                            <a href="#" class="shine__animate-link">
                                                <img src="{{ asset('backend/img/course/' . $course->image) }}"
                                                    alt="img">
                                            </a>
                                        </div>
                                        <div class="courses__item-content">
                                            <ul class="courses__item-meta list-wrap">
                                                <li class="courses__item-tag">
                                                    <a href="#">{{ $course->tag }}</a>
                                                </li>
                                                <li class="avg-rating"><i class="fas fa-star"></i> ({{ $course->review }}
                                                    Reviews)</li>
                                            </ul>
                                            <h5 class="title"><a href="#">{{ $course->name }}</a></h5>
                                            <div class="courses__item-bottom-three">
                                                <ul class="list-wrap">
                                                    <li><i class="far fa-book"></i>Lessons {{ $course->topic_count }}</li>
                                                    <li><i class="far fa-graduation-cap"></i>Students
                                                        {{ $course->student }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="courses__nav">
                        <div class="courses-button-prev"><i class="far fa-arrow-right"></i></div>
                        <div class="courses-button-next"><i class="far fa-arrow-right"></i></div>
                    </div>
                </div>
                @foreach ($plans as $plan)
                    <div class="tab-pane fade" id="{{ $plan->slug }}-pane" role="tabpanel"
                        aria-labelledby="{{ $plan->slug }}" tabindex="0">
                        <div class="swiper courses-swiper-active">
                            <div class="swiper-wrapper">
                                @php
                                    $plan_courses = App\Models\Admin\Course::where('delete_status', '0')
                                        ->where('status', '1')
                                        ->whereIn('id', $plan->course_ids)
                                        ->withCount('topic')
                                        ->get();
                                @endphp
                                @foreach ($plan_courses as $plan_course)
                                    <div class="swiper-slide">
                                        <div class="courses__item shine__animate-item">
                                            <div class="courses__item-thumb">
                                                <a href="#" class="shine__animate-link">
                                                    <img src="{{ asset('backend/img/course/' . $plan_course->image) }}"
                                                        alt="img">
                                                </a>
                                            </div>
                                            <div class="courses__item-content">
                                                <ul class="courses__item-meta list-wrap">
                                                    <li class="courses__item-tag">
                                                        <a href="#">{{ $plan_course->tag }}</a>
                                                    </li>
                                                    <li class="avg-rating"><i class="fas fa-star"></i>
                                                        ({{ $plan_course->review }} Reviews)
                                                    </li>
                                                </ul>
                                                <h5 class="title"><a href="#">{{ $plan_course->name }}</a></h5>

                                                <div class="courses__item-bottom-three">
                                                    <ul class="list-wrap">
                                                        <li><i class="far fa-book"></i>Lessons
                                                            {{ $plan_course->topic_count }}</li>
                                                        <li><i class="fas fa-mortarboard"></i>Students
                                                            {{ $plan_course->student }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="courses__nav">
                            <div class="courses-button-prev"><i class="far fa-arrow-right"></i></div>
                            <div class="courses-button-next"><i class="far fa-arrow-right"></i></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="features__area-two section-pt-120 section-pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section__title text-center mb-40">
                        <span class="sub-title">Our Plan</span>
                        <h2 class="title">RichInd Course Package</h2>
                        <p>Enroll With RichInd</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($plans as $plan)
                    <div class="col-md-4">
                        <div class="courses__item shine__animate-item">
                            <div class="courses__item-thumb">
                                <a href="{{ route('checkout') }}?slug={{ $plan->slug }}" class="shine__animate-link">
                                    <img src="{{ asset('backend/img/plan/' . $plan->image) }}" alt="img">
                                </a>
                            </div>
                            <div class="courses__item-content">
                                <ul class="courses__item-meta list-wrap">
                                    <li class="courses__item-tag">
                                        <a
                                            href="{{ route('checkout') }}?slug={{ $plan->slug }}">{{ $plan->tag }}</a>
                                    </li>
                                    <li class="avg-rating"><i class="fas fa-star"></i> ({{ $plan->review }} Reviews)</li>
                                </ul>
                                <h5 class="title"><a
                                        href="{{ route('checkout') }}?slug={{ $plan->slug }}">{{ $plan->title }}</a>
                                </h5>
                                <p class="author">By <a
                                        href="{{ route('checkout') }}?slug={{ $plan->slug }}">RichInd</a></p>
                                <div class="courses__item-bottom">
                                    <div class="button">
                                        <a href="{{ route('checkout') }}?slug={{ $plan->slug }}">
                                            <span class="text">Buy Now</span>
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                    </div>
                                    <h5 class="price">₹{{ $plan->discounted_price }} <del>{{ $plan->amount }}</del></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="features__area-two section-pt-120 section-pb-90"
        data-background="{{ asset('frontend/assets/img/bg/courses_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section__title text-center mb-40">
                        <span class="sub-title">Our Top Features</span>
                        <h2 class="title">Achieve Your Goal With RichInd</h2>
                        <p>With RichInd, Begin your journey to success.</p>
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
                                        <img src="{{ asset('frontend/assets/img/icons/h2_features_icon01.svg') }}"
                                            alt="img" class="injectable">
                                    </div>
                                    <h2 class="title">Expert Tutors</h2>
                                </div>
                                <p>Professional educational service provider specializing in personalized tutoring across
                                    various subjects and educational levels.</p>
                            </div>
                            <div class="features__item-shape">
                                <img src="{{ asset('frontend/assets/img/others/features_item_shape.svg') }}"
                                    alt="img" class="injectable">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="features__item-two">
                            <div class="features__content-two">
                                <div class="content-top">
                                    <div class="features__icon-two">
                                        <img src="{{ asset('frontend/assets/img/icons/h2_features_icon02.svg') }}"
                                            alt="img" class="injectable">
                                    </div>
                                    <h2 class="title">Effective Courses</h2>
                                </div>
                                <p>Effective Courses is an educational platform designed to deliver impactful, high-quality
                                    learning experiences tailored to diverse needs.</p>
                            </div>
                            <div class="features__item-shape">
                                <img src="{{ asset('frontend/assets/img/others/features_item_shape.svg') }}"
                                    alt="img" class="injectable">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="features__item-two">
                            <div class="features__content-two">
                                <div class="content-top">
                                    <div class="features__icon-two">
                                        <img src="{{ asset('frontend/assets/img/icons/h2_features_icon03.svg') }}"
                                            alt="img" class="injectable">
                                    </div>
                                    <h2 class="title">Earn Certificate</h2>
                                </div>
                                <p>Earn Certificate is a program that provides learners with the opportunity to gain
                                    recognized certifications upon completing specific courses or training modules.</p>
                            </div>
                            <div class="features__item-shape">
                                <img src="{{ asset('frontend/assets/img/others/features_item_shape.svg') }}"
                                    alt="img" class="injectable">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fact__inner-wrap">
                <div class="row">
                    @isset($website_data['trainers'])
                        <div class="col-lg-3 col-6">
                            <div class="fact__item">
                                <h2 class="count"><span class="counter-value">{{ $website_data['trainers'] }}</span>+</h2>
                                <p>Trainers</p>
                            </div>
                        </div>
                    @endisset

                    @isset($website_data['students'])
                        <div class="col-lg-3 col-6">
                            <div class="fact__item">
                                <h2 class="count"><span class="counter-value">{{ $website_data['students'] }}</span>K+</h2>
                                <p>Students</p>
                            </div>
                        </div>
                    @endisset

                    @isset($website_data['live_training'])
                        <div class="col-lg-3 col-6">
                            <div class="fact__item">
                                <h2 class="count"><span class="counter-value">{{ $website_data['live_training'] }}</span>+
                                </h2>
                                <p>Live Training</p>
                            </div>
                        </div>
                    @endisset

                    @isset($website_data['community_earning'])
                        <div class="col-lg-3 col-6">
                            <div class="fact__item">
                                <h2 class="count"><span
                                        class="counter-value">{{ $website_data['community_earning'] }}</span>Cr</h2>
                                <p>Community Earning</p>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter__area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="newsletter__img-wrap">
                        <img src="{{ asset('frontend/assets/img/others/newsletter_img.png') }}" alt="img">
                        <img src="{{ asset('frontend/assets/img/others/newsletter_shape01.png') }}" alt="img"
                            data-aos="fade-up" data-aos-delay="400">
                        <img src="{{ asset('frontend/assets/img/others/newsletter_shape02.png') }}" alt="img"
                            class="alltuchtopdown">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="newsletter__content">
                        <h2 class="title">RichInd <span>Customer Support</span></h2>
                        <p style="color: #fff;">(We are available on Monday to Saturday 9:15am to 5pm)</p>
                        <div class="newsletter__form button">
                            @isset($website_data['email'])
                                <a href="mailto:{{ $website_data['email'] }}" class="btn"><i
                                        class="fas fa-envelope-open-text"></i>
                                    {{ $website_data['email'] }}
                                </a>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="newsletter__shape">
            <img src="{{ asset('frontend/assets/img/others/newsletter_shape03.png') }}" alt="img"
                data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>

    <section class="instructor__area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="instructor__content-wrap">
                        <div class="section__title mb-15">
                            <span class="sub-title">Mr. Yash kulshrestha</span>
                            <h3>CEO & Founder of RichInd</h3>
                        </div>
                        <p>Yash kulshrestha is one of the Youngest Entrepreneur and YouTuber from India. He started his
                            journey since 2018. He has 5 years Experience about Sales And Law of attraction. He love to
                            share his knowledge with youth.</p>
                        <p>He has helped more than 20K+ students in learning new skill. He is guiding now 10k people about
                            social media marketing in this company.</p>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="instructor__item-wrap">
                        <div class="row">
                            <div class="col-12">
                                <div class="instructor__item">
                                    <div class="instructor__thumb">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/founder.jpg') }}"
                                                alt="img"></a>
                                    </div>
                                    <div class="instructor__content">
                                        <h2 class="title"><a href="#">Yash kulshrestha</a></h2>
                                        <span class="designation">Founder & CEO</span>
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

    <!-- instructor-area -->
    <section class="instructor__area-six section-pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section__title text-center mb-20">
                        <span class="sub-title">Meet Our Team</span>
                        <h2 class="title">Introducing Our Skilled Professionals</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-6">
                    <div class="instructor__item-five">
                        <div class="instructor__thumb-five">
                            <img src="{{ asset('frontend/assets/img/founder.jpg') }}" alt="img">
                        </div>
                        <div class="instructor__content-five">
                            <h2 class="title">Yash kulshrestha</h2>
                            <span>Founder & CEO</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- instructor-area-end -->

    <section class="choose__area-four tg-motion-effects section-py-140"
        data-background="{{ asset('frontend/assets/img/bg/courses_bg.jpg') }}">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="choose__img-four">
                        <div class="left__side">
                            <img src="{{ asset('frontend/assets/img/others/h7_choose_img01.jpg') }}" alt="img"
                                data-aos="fade-down" data-aos-delay="200">
                            <img src="{{ asset('frontend/assets/img/others/h7_choose_img02.jpg') }}" alt="img"
                                data-aos="fade-up" data-aos-delay="200">
                        </div>
                        <div class="right__side" data-aos="fade-left" data-aos-delay="400">
                            <img src="{{ asset('frontend/assets/img/others/h7_choose_img03.jpg') }}" alt="img">
                            <a href="https://www.youtube.com/watch?v=b2Az7_lLh3g" class="popup-video"><i
                                    class="fas fa-play"></i></a>
                        </div>
                        <img src="{{ asset('frontend/assets/img/others/h7_choose_shape01.svg') }}" alt="shape"
                            class="shape shape-one tg-motion-effects4">
                        <img src="{{ asset('frontend/assets/img/others/h7_choose_shape02.svg') }}" alt="shape"
                            class="shape shape-two alltuchtopdown">
                        <img src="{{ asset('frontend/assets/img/others/h7_choose_shape03.svg') }}" alt="shape"
                            class="shape shape-three tg-motion-effects7">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose__content-four">
                        <div class="section__title mb-20">
                            <span class="sub-title">Why RichInd</span>
                            <h2 class="title bold">Why Choose Us</h2>
                        </div>
                        <p>When it comes to the best in Quality, Management, Knowledge, Nourishment, Leadership, Skill
                            Development and Earning – Here we are!</p>
                        <ul class="about__info-list list-wrap">
                            <li class="about__info-list-item">
                                <i class="fas fa-angle-right"></i>
                                <p class="content">E-learning Courses Of High Quality</p>
                            </li>
                            <li class="about__info-list-item">
                                <i class="fas fa-angle-right"></i>
                                <p class="content">Possibility Of Skill Development</p>
                            </li>
                            <li class="about__info-list-item">
                                <i class="fas fa-angle-right"></i>
                                <p class="content">Opportunity To Begin Your Entrepreneurial Journey</p>
                            </li>
                            <li class="about__info-list-item">
                                <i class="fas fa-angle-right"></i>
                                <p class="content">Dedicated Support System</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial__area section-py-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section__title text-center mb-50">
                        <span class="sub-title">Review</span>
                        <h2 class="title">Words From Our Students</h2>
                        <p>What Our Students Say About Skill Achiever</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial__item-wrap">
                        <div class="swiper-container testimonial-swiper-active">
                            <div class="swiper-wrapper">
                                @foreach ($reviews as $review)
                                    <div class="swiper-slide">
                                        <div class="testimonial__item">
                                            <div class="testimonial__item-top">
                                                <div class="testimonial__author">
                                                    <div class="testimonial__author-thumb">
                                                        <img src="{{ asset('backend/img/reviews/' . $review->image) }}"
                                                            alt="img">
                                                    </div>
                                                    <div class="testimonial__author-content">
                                                        <div class="rating">
                                                            @for ($i = 1; $i <= $review->rating; $i++)
                                                                <i class="fas fa-star"></i>
                                                            @endfor
                                                        </div>
                                                        <h2 class="title">{{ $review->name }}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="testimonial__content">
                                                <p>“{{ $review->message }}”</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="testimonial__nav">
                            <button class="testimonial-button-prev"><i class="far fa-arrow-right"></i></button>
                            <button class="testimonial-button-next"><i class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features__area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="section__title white-title text-center mb-50">
                        <span class="sub-title">How We Start Journey</span>
                        <h2 class="title">Start your Learning Journey Today!</h2>
                        <p>Unlock your potential with expert-led courses and certifications designed to help you succeed.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item">
                        <div class="features__icon">
                            <img src="{{ asset('frontend/assets/img/icons/features_icon01.svg') }}" class="injectable"
                                alt="img">
                        </div>
                        <div class="features__content">
                            <h4 class="title">Learn with Experts</h4>
                            <p>Learn with Experts connects learners with industry professionals for hands-on, expert-led
                                training across various subjects.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item">
                        <div class="features__icon">
                            <img src="{{ asset('frontend/assets/img/icons/features_icon02.svg') }}" class="injectable"
                                alt="img">
                        </div>
                        <div class="features__content">
                            <h4 class="title">Learn Anything</h4>
                            <p>Learn Anything is a versatile learning platform designed to empower individuals to acquire
                                knowledge and skills in virtually any subject.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item">
                        <div class="features__icon">
                            <img src="{{ asset('frontend/assets/img/icons/features_icon03.svg') }}" class="injectable"
                                alt="img">
                        </div>
                        <div class="features__content">
                            <h4 class="title">Get Online Certificate</h4>
                            <p>Get Online Certificate offers a convenient way to earn recognized certifications from the
                                comfort of your home.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item">
                        <div class="features__icon">
                            <img src="{{ asset('frontend/assets/img/icons/features_icon04.svg') }}" class="injectable"
                                alt="img">
                        </div>
                        <div class="features__content">
                            <h4 class="title">E-mail Marketing</h4>
                            <p>E-mail Marketing is a powerful digital marketing strategy that involves sending targeted
                                emails to engage customers, promote products or services.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="instructor__area-two">
        <div class="container">
            <div class="instructor__item-wrap-two">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="instructor__item-two tg-svg bg1">
                            <div class="instructor__thumb-two">
                                <img src="{{ asset('frontend/assets/img/instructor/instructor_two01.png') }}"
                                    alt="img">
                                <div class="shape-two">
                                    <span class="svg-icon" id="instructor-svg"
                                        data-svg-icon="{{ asset('frontend/assets/img/instructor/instructor_shape02.svg') }}"></span>
                                </div>
                            </div>
                            <div class="instructor__content-two">
                                <h3 class="title"><a href="#">Become a Instructor</a></h3>
                                <p>Become an Instructor empowers knowledgeable individuals to share their expertise and make
                                    a meaningful impact by teaching others.</p>
                                <div class="tg-button-wrap">
                                    <a href="#" class="btn arrow-btn">Apply Now <i
                                            class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="instructor__item-two tg-svg bg2">
                            <div class="instructor__thumb-two">
                                <img src="{{ asset('frontend/assets/img/instructor/instructor_two02.png') }}"
                                    alt="img">
                                <div class="shape-two">
                                    <span class="svg-icon" id="instructor-svg-two"
                                        data-svg-icon="{{ asset('frontend/assets/img/instructor/instructor_shape02.svg') }}"></span>
                                </div>
                            </div>
                            <div class="instructor__content-two">
                                <h3 class="title"><a href="#">Become a Student</a></h3>
                                <p>Become a Student offers you the chance to embark on a personalized learning journey with
                                    access to a diverse range of courses and expert instructors.
                                </p>
                                <div class="tg-button-wrap">
                                    <a href="#" class="btn arrow-btn">Apply Now <i
                                            class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq__area" data-background="{{ asset('frontend/assets/img/bg/courses_bg.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner__images">
                        <img src="{{ asset('frontend/assets/img/banner/banner_img.png') }}" alt="img"
                            class="main-img">
                        <div class="shape big-shape aos-init aos-animate" data-aos="fade-up-right" data-aos-delay="600">
                            <img src="{{ asset('frontend/assets/img/banner/banner_shape01.png') }}" alt="shape"
                                class="tg-motion-effects1">
                        </div>
                        <img src="{{ asset('frontend/assets/img/banner/bg_dots.svg') }}" alt="shape"
                            class="shape bg-dots rotateme">
                        <img src="{{ asset('frontend/assets/img/banner/banner_shape02.png') }}" alt="shape"
                            class="shape small-shape tg-motion-effects3">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq__content">
                        <div class="section__title pb-10">
                            <span class="sub-title">Faq’s</span>
                            <h2 class="title">Frequently Asked Question & Answers Here</h2>
                        </div>
                        <p>Feel free to adjust or expand on these based on your specific needs.</p>
                        <div class="faq__wrap">
                            <div class="accordion" id="accordionExample">
                                @foreach ($faqs as $faq_key => $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $faq_key }}" aria-expanded="true"
                                                aria-controls="collapse{{ $faq_key }}">
                                                {{ $faq->title }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $faq_key }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    {!! $faq->content !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog__post-area-seven section-pt-140 section-pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section__title text-center mb-20">
                        <span class="sub-title">Instagram</span>
                        <h2 class="title bold">Instagram Show</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-3">
                @foreach ($instagram_links as $instagram_link)
                    <div class="col-lg-3 col-md-6 p-2">
                        <blockquote class="instagram-media" data-instgrm-permalink="{{ $instagram_link->link }}"
                            data-instgrm-version="14"></blockquote>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script async src="//www.instagram.com/embed.js"></script>
@endsection

@extends('frontend.layouts.app')
@section('content')
    <!-- Start DeskTop Slider Area -->
    <section>
                <div class="owl-carousel owl-theme">
                    @foreach ($desktop_sliders as $desktop_slider)
                        <div class="item">
                            <img src="{{ asset('backend/img/websitesetting/sliders/' . $desktop_slider->content) }}"
                                alt="{{ env('APP_NAME') }}-Slider">
                        </div>
                    @endforeach
                </div>
    </section>
    <!-- End DeskTop Slider Area -->

    <section class="section student-course top-strip">
        <div class="container">
            <div class="course-widget">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                        <div class="course-full-width">
                            <div class="blur-border course-radius align-items-center aos">
                                <div class="online-course d-flex align-items-center">
                                    <div class="course-img icon-circle">
                                        <i class="fa-solid fa-wallet fa-2x"></i>
                                    </div>
                                    <div class="course-inner-content">
                                        <h4><span>{{ websiteData('community_earning') }}</span>+</h4>
                                        <p>Worth Courses Sold</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                        <div class="course-full-width">
                            <div class="blur-border course-radius align-items-center aos">
                                <div class="online-course d-flex align-items-center">
                                    <div class="course-img icon-circle">
                                        <i class="fa-solid fa-chalkboard-user fa-2x"></i>
                                    </div>
                                    <div class="course-inner-content">
                                        <h4><span>{{ websiteData('trainers') }}</span>+</h4>
                                        <p>Trainer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                        <div class="course-full-width">
                            <div class="blur-border course-radius align-items-center aos">
                                <div class="online-course d-flex align-items-center">
                                    <div class="course-img icon-circle">
                                        <i class="fa-sharp fa-solid fa-graduation-cap fa-2x"></i>
                                    </div>
                                    <div class="course-inner-content">
                                        <h4><span>{{ websiteData('students') }}</span>+</h4>
                                        <p>Students</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                        <div class="course-full-width">
                            <div class="blur-border course-radius align-items-center aos">
                                <div class="online-course d-flex align-items-center">
                                    <div class="course-img icon-circle">
                                        <i class="fab fa-slideshare fa-2x"></i>
                                    </div>
                                    <div class="course-inner-content">
                                        <h4><span>{{ websiteData('live_training') }}</span>+</h4>
                                        <p>Live Training</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End MobileView Slider Area -->


    <section class="section new-course">
        <div class="container">
            <div class="section-header aos">
                <div class="section-sub-head">
                    <h2>Our Exclusive Packages</h2>
                    <span class="animate-border"></span>
                </div>
            </div>
            <div class="section-text aos">
                <p class="mb-0">
                    With our exclusive packages, now you can be assured to acquire the best knowledge and expertise
                    from our team of experts. We believe you can empower the world with industry-leading courses.
                </p>
            </div>
            <div class="course-feature">
                <div class="row">
                    @foreach ($plans as $key => $plan)
                        <div class='col-lg-4 col-md-6 d-flex'>
                            <div class='course-box d-flex aos'>
                                <div class='product'>
                                    <div class='product-img'>
                                        <a href="{{ route('checkout') }}?slug={{ $plan->slug }}"
                                            title="{{ env('APP_NAME') }}-{{ $plan->title }}">
                                                <img src="{{ 'backend/img/plan/' . $plan->image }}"
                                                    alt="{{ env('APP_NAME') }}-{{ $plan->title }}" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class='product-content'>
                                        <div class='course-group d-flex'>
                                            <div class='course-group-img d-flex'>
                                                <div class='course-name'>
                                                    <h4>
                                                        <a href="{{ route('checkout') }}?slug={{ $plan->slug }}"
                                                            title="Richind-Starter-Package"> {{ $plan->title }} </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='course-info d-flex align-items-center'>
                                            <div class='rating-img d-flex align-items-center'>
                                                <i class="fa-solid fa-book-open"></i>

                                                <p>{{ count($plan->course_ids) }} Courses</p>

                                            </div>
                                            <div class="course-view d-flex align-items-center">
                                                <i class="fa-solid fa-tags"></i>
                                                <p> ₹ {{ $plan->discounted_price }} <span>₹ {{ $plan->amount }}</span></p>
                                            </div>
                                        </div>
                                        <div style="height:160px;">
                                            <ul style="">
                                                @foreach ($plan->points as $plan_point)
                                                    <li style="">{{ $plan_point }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        {{-- <div class='all-btn all-category d-flex align-items-center'>
                                            <a href="{{ route('checkout') }}?slug={{ $plan->slug }}"
                                                title="{{ env('APP_NAME') }}-{{ $plan->title }}" class='btn btn-primary'
                                                style="margin:0 auto;">
                                                Buy Now ₹ {{ $plan->discounted_price }}
                                            </a>
                                        </div> --}}
                                        <div class='all-btn all-category d-flex align-items-center'>
                                            @if($key == 0)
                                                <a href="https://cosmofeed.com/vp/649d9ac792e0dc002085b20e" class='btn btn-primary' style="margin:0 auto;">Buy Now ₹ {{ $plan->discounted_price }}</a>
                                            @elseif($key == 1)
                                                <a href="https://cosmofeed.com/vp/64f54ac19e9120001e12d6db" class='btn btn-primary' style="margin:0 auto;">Buy Now ₹ {{ $plan->discounted_price }}</a>
                                            @elseif($key == 2)
                                                <a href="https://cosmofeed.com/vp/64f54c0c451d40001e207c92" class='btn btn-primary' style="margin:0 auto;">Buy Now ₹ {{ $plan->discounted_price }}</a>
                                            @elseif($key == 3)
                                                <a href="https://cosmofeed.com/vp/64f54cab84fcaf001ef11aa6" class='btn btn-primary' style="margin:0 auto;">Buy Now ₹ {{ $plan->discounted_price }}</a>
                                            @elseif($key == 4)
                                                <a href="https://cosmofeed.com/vp/64f54d30095729001f5950b8" class='btn btn-primary' style="margin:0 auto;">Buy Now ₹ {{ $plan->discounted_price }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="feature-instructors trend-course instructorhome-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="aos-init aos-animate" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <img src="{{ asset('frontend/images/Mr-Yash-kulshrestha.jpg') }}" alt="image" class="img-fluid">

                </div>
            </div>
            <div class="col-md-8">
                <div class="about-content-wrap with-white-text aos-init" data-aos="fade-left" data-aos-duration="500">
                    <div class="section-header aos">
                        <div class="section-sub-head">
                            <h2>CEO & Founder of RichInd - <br> Mr. Yash kulshrestha</h2>
                        </div>
                    </div>
                    <p>Yash kulshrestha is one of the Youngest Entrepreneur and YouTuber from India. He started his journey
                        since 2018. He has 5 years Experience about Sales And Law of attraction. He love to share his
                        knowledge with youth. He has helped more than 20K+ students in learning new skill. He is guiding now 10k people about
                        social media marketing in this company.</p>

                </div>
            </div>

        </div>
    </div>
    </div>



    <section class="insta-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-sm-5">
                    <img src="{{ asset('frontend/assets/images/Why1.png') }}" alt="Richind" class="img-fluid" />
                </div>
                <div class="col-lg-7 col-sm-7">
                    <div class="intsa-subsec">
                        <h4>Ready To Get Our <span>Professional Course ?</span> We are offering High Quality Courses
                            and Live Training.”
                        </h4>
                        <a href="https://api.whatsapp.com/send?phone={{websiteData('whatsapp')}}" title="Richind-Whatsapp-Us" target="_blank"
                            class="btn btn-primary btn-new">Let’s Talk Our Expert</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <section class="section master-skill why-ushome">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-12 col-md-12">
                    <div class="section-header aos">
                        <div class="section-sub-head">
                            <span>Why Choose Us?</span>
                            <h2>Why Choose RICHIND For Remote Learning ?</h2>
                            <span class="animate-border"></span>
                        </div>
                    </div>
                    <div class="section-text aos">
                        <p>
                            Change is a must when you wish to step ahead in your career. Richind, an ed-tech
                            platform, never lets you down. With its first-of-its-kind training programs and industry
                            leaders, Richind ensures to make your professional journey a leading narrative.
                        </p>
                    </div>
                    <div class="career-group aos">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 d-flex">
                                <div class="certified-group blur-border d-flex">
                                    <div class="get-certified d-flex align-items-center">
                                        <div class="blur-box">
                                            <div class="certified-img ">
                                                <i class="fa-solid fa-money-bill-1-wave fs-60"></i>
                                            </div>
                                        </div>
                                        <p class="txt-dark-1">
                                            <strong class="fs-15 gordita-bold">High Paying Skills:</strong>
                                            We are provide high paying skills Courses
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 d-flex">
                                <div class="certified-group blur-border d-flex">
                                    <div class="get-certified d-flex align-items-center">
                                        <div class="blur-box">
                                            <div class="certified-img ">
                                                <i class="fa-solid fa-bullseye fs-60"></i>
                                            </div>
                                        </div>
                                        <p class="txt-dark-1">
                                            <strong class="fs-15 gordita-bold">Valuable Courses:</strong>
                                            We believe to provide value to our RICHIND family. And our courses are designed on this principle. We have the most valuable courses.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 d-flex">
                                <div class="certified-group blur-border d-flex">
                                    <div class="get-certified d-flex align-items-center">
                                        <div class="blur-box">
                                            <div class="certified-img ">
                                                <i class="fas fa-book-open fs-60"></i>
                                            </div>
                                        </div>
                                        <p class="txt-dark-1">
                                            <strong class="fs-15 gordita-bold">Affordable Pricing:</strong>
                                            We provide valuable courses at the most affordable price. Because we think everyone deserves to be educated and for education, you don't need to spend high.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 d-flex">
                                <div class="certified-group blur-border d-flex">
                                    <div class="get-certified d-flex align-items-center">
                                        <div class="blur-box">
                                            <div class="certified-img ">
                                                <i class="fas fa-graduation-cap fs-60"></i>
                                            </div>
                                        </div>
                                        <p class="txt-dark-1">
                                            <strong class="fs-15 gordita-bold">24/7 Online Support:</strong>
                                            We have the best support system for RICHIND family. It's 24×7 open for everyone - any time.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-12 col-md-12 d-flex">
                    <div class="career-img aos">
                        <img src="{{ asset('frontend/assets/images/Why-Us.png') }}" alt="Richind-Why-Choose-Us"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section share-knowledge founder-sec">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-12 col-sm-5">
                    <div class="knowledge-img aos">
                        <iframe width="450" height="450" src="https://www.youtube.com/embed/NuqDs-_QAv0"
                            title="Richind Presentation Video | Official | richind se paise kaise kamaye 👈 #richind #entrepreneur"
                            class="img-fluid bdr-20" style="height:254px"></iframe>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12 col-sm-7 d-flex align-items-center mt-xl-30">
                    <div class="join-mentor aos mar-top-20-xs pl-50">
                        <h2>What Is Richind ?</h2>
                        <span class="animate-border" style="margin-bottom: 12px;"></span>
                        The Richind is a digitally organized E-learning platform that focuses on the SKILL DEVELOPMENT of it's students by giving courses in a variety of disciplines that may assist anyone solidify their talents.
                        {{-- <h2>Meet Our Founder</h2>
                        Demonstrate your idea before making an investment in technical resources. --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section how-it-works ptb-60 our-alumni-sec">
        <div class="container">
            <div class="section-header aos">
                <div class="section-sub-head">
                    <span>Testimonial</span>
                    <h2>Hear from Our Alumni</h2>
                    <span class="animate-border"></span>
                </div>
            </div>
            <div class="owl-carousel mentoring-course owl-theme aos">
                <div class='item'>
                    <p style="text-align: justify;">I have been working with RICHIND for over a year now, and I am extremely satisfied with the experience. This company has exceeded my expectations in terms of professionalism, support, and education.</p>
                    <p><strong>Sandeep Singh</strong></p>
                </div>
                <div class='item'>
                    <p style="text-align: justify;">I Am A Student & I Am So Happy To Become A Part Of This Beautiful Platform RICHIND Because I have learned so much from this platform. Best for learning new skill.</p>
                    <p><strong>Parminder Singh</strong></p>
                </div>
                <div class='item'>
                    <p style="text-align: justify;"> I Am A Collage Student. I want to learn new digital skill with my ongoing studies. When I Started RICHIND Searching On YouTube & Google,I found that its So Amazing E-learning Platform</p>
                    <p><strong>Kinshu Gupta</strong></p>
                </div>
                <div class='item'>
                    <p style="text-align: justify;">  Loved to Join RICHIND Here’s Trainings are so powerful i have learn so many things. Best thing on this platform is support from your mentors.</p>
                    <p><strong>Chhavi Tyagi</strong></p>
                </div>
            </div>
        </div>
    </section>
    <div class="feature-instructors trend-course instructorhome-sec subscribe-newsec">
        <div class="section-header aos">
            <div class="section-sub-head feature-head text-center">
                <h2>Instructor At Richind</h2>
                <span class="animate-border-center"></span>
                <div class="section-text aos">
                    <p class="mb-0">
                        At RichInd, you can now be assured to get the top-most training from the leading educators of
                        their respective fields. Turn your dreams into reality with RichInd proficient instructors.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="owl-carousel instructors-course owl-theme aos">
                @foreach ($instructors as $instructor)
                    <div class='instructors-widget'>
                        <div class='instructors-img '>
                            <img class='img-fluid' alt='Richind-AMan-Jain'
                                src="{{ asset('backend/img/instructors/' . $instructor->image) }}">
                        </div>
                        <div class='instructors-content text-center'>
                            <h5 class='gordita-bold'>{{ $instructor->name }}</h5>
                            <p>{{ $instructor->designation }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <section class="ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter-sub">
                        <div class="row d-flex align-items-center row-cols-1 row-cols-lg-2">
                            <div class="col-lg-8 m-lg-auto">
                                <div class="newsletter-txt text-center pr-20">
                                    <h4 class="h4-sm">Frequently Asked Questions</h4>
                                    <span class="animate-border-center"></span>
                                </div>
                            </div>
                            <div class="col-lg-10 m-lg-auto">
                                <div class="newsletter-txt">
                                    @foreach ($faqs as $faq_key => $faq)
                                        <div class="accordion-item">
                                            <button
                                                class="accordion-button @if ($faq_key != 0) collapsed @endif"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $faq_key }}"
                                                aria-expanded="@if ($faq_key == 0) true @else false @endif"
                                                aria-controls="collapse{{ $faq_key }}">
                                                {{ $faq_key + 1 }}. {{ $faq->title }}
                                            </button>
                                            <div id="collapse{{ $faq_key }}"
                                                class="accordion-collapse collapse @if ($faq_key == 0) show @endif"
                                                data-bs-parent="#FaqAccordion">
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
        </div>
    </section>
@endsection

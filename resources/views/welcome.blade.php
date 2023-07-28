@extends('frontend.layouts.app')
@section('content')
    <!-- Start Main Banner Area -->
    <div class="main-banner-area-wrap">
        <div class="main-banner-wrap-image">
            <div class="main-banner-wrap-image-slides owl-carousel owl-theme">
                <div class="image">
                    <img src="{{ asset('frontend/images/main-banner/banner-1.png') }}" alt="image">
                </div>
                <div class="image">
                    <img src="{{ asset('frontend/images/main-banner/banner-1.png') }}" alt="image">
                </div>
                <div class="image">
                    <img src="{{ asset('frontend/images/main-banner/banner-1.png') }}" alt="image">
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Banner Area -->

    <!-- Start Main Banner Area -->
    <div class="main-banner-area-with-shape">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12">
                    <div class="main-banner-video-content" data-aos="fade-right" data-aos-duration="500"
                        data-aos-duration="500" data-aos-once="true">
                        <h1>Welcome To <span>The Success Preneur</span></h1>
                        <span class="animate-border"></span>

                        <p class="text">Fill The Gap Between You & Your Success <i class="ri-bear-smile-line "></i> ...
                        </p>
                        <p>What You Think You Can Achieve It . We Are Providing Best Skills Courses. We Want To Educate
                            Youth And Transform Youth Life Of India. We Believe You Can Achieve Anything If You Have
                            Skills.</p>
                        <div class="banner-btn">
                            <a href="#" class="default-btn">Know More <i class="ri-arrow-right-line"></i></a>
                            <a href="https://www.youtube.com/watch?v=80SjOKO-swQ" class="video-btn popup-youtube"><i
                                    class="ri-play-fill"></i> Play video</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12">
                    <div class="main-banner-video-image" data-aos="fade-left" data-aos-duration="500"
                        data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/images/welcome-to-digiigyan.png') }}" alt="image">

                        <div class="image-shape-1">
                            <img src="{{ asset('frontend/images/main-banner/circle-shape.png') }}" alt="image">
                        </div>
                        <div class="image-shape-2">
                            <img src="{{ asset('frontend/images/main-banner/circle-shape.png') }}" alt="image">
                        </div>
                        {{-- <div class="image-shape-3">
                            <img src="{{ asset('frontend/images/main-banner/shape-5.png') }}" alt="image">
                        </div> --}}
                        {{-- <div class="image-shape-4">
                            <img src="{{ asset('frontend/images/main-banner/shape-6.png') }}" alt="image">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Banner Area -->

    <!-- Start Why Choose Us -->
    <div class="fun-fact-area">
        <div class="container">
            <div class="section-title text-center">
                <h2>Why Choose Us</h2>
                <span class="animate-border"></span>
            </div>
            <div class="fun-fact-inner-box">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-6">
                        <div class="single-funfact-card with-right-border">
                            <h3>
                                <span class="odometer odometer-auto-theme" data-count="10000">
                                    <div class="odometer-inside"><span class="odometer-digit"><span
                                                class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">1</span></span></span></span></span><span
                                            class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">0</span></span></span></span></span><span
                                            class="odometer-formatting-mark">,</span><span class="odometer-digit"><span
                                                class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">0</span></span></span></span></span><span
                                            class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">0</span></span></span></span></span><span
                                            class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">0</span></span></span></span></span>
                                    </div>
                                </span>
                                <span class="small-text">+</span>
                            </h3>
                            <p>Global customers</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-6">
                        <div class="single-funfact-card with-right-border">
                            <h3>
                                <span class="odometer odometer-auto-theme" data-count="5300">
                                    <div class="odometer-inside"><span class="odometer-digit"><span
                                                class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">5</span></span></span></span></span><span
                                            class="odometer-formatting-mark">,</span><span class="odometer-digit"><span
                                                class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">3</span></span></span></span></span><span
                                            class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">0</span></span></span></span></span><span
                                            class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">0</span></span></span></span></span>
                                    </div>
                                </span>
                                <span class="small-text">+</span>
                            </h3>
                            <p>Running projects</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-6">
                        <div class="single-funfact-card with-right-border">
                            <h3>
                                <span class="odometer odometer-auto-theme" data-count="2600">
                                    <div class="odometer-inside"><span class="odometer-digit"><span
                                                class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">2</span></span></span></span></span><span
                                            class="odometer-formatting-mark">,</span><span class="odometer-digit"><span
                                                class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">6</span></span></span></span></span><span
                                            class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">0</span></span></span></span></span><span
                                            class="odometer-digit"><span class="odometer-digit-spacer">8</span><span
                                                class="odometer-digit-inner"><span class="odometer-ribbon"><span
                                                        class="odometer-ribbon-inner"><span
                                                            class="odometer-value">0</span></span></span></span></span>
                                    </div>
                                </span>
                                <span class="small-text">+</span>
                            </h3>
                            <p>Completed projects</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose Us -->

    <!-- Start Work Process Area -->
    <div class="process-area pb-60">
        <div class="container">
            <div class="section-title text-center">
                <h2>How The Success Preneur Work </h2>
                <span class="animate-border"></span>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="single-process-card with-box-shadow" data-aos="fade-right" data-aos-duration="500"
                        data-aos-duration="500" data-aos-once="true">
                        <div class="icon">
                            <i class="flaticon-content"></i>
                        </div>
                        <h3>
                            <a href="#">Learn</a>
                        </h3>
                        <p>Curabitur aliquet quam id dui posue blandit. Nulla quis lorem ut libero malesuada feugiat.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single-process-card with-box-shadow" data-aos="fade-up" data-aos-duration="500"
                        data-aos-duration="500" data-aos-once="true">
                        <div class="icon">
                            <i class="flaticon-user-experience-1"></i>
                        </div>
                        <h3>
                            <a href="#">Apply</a>
                        </h3>
                        <p>Curabitur aliquet quam id dui posue blandit. Nulla quis lorem ut libero malesuada feugiat.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single-process-card with-box-shadow" data-aos="fade-left" data-aos-duration="500"
                        data-aos-duration="500" data-aos-once="true">
                        <div class="icon">
                            <i class="flaticon-team-1"></i>
                        </div>
                        <h3>
                            <a href="#">Share</a>
                        </h3>
                        <p>Curabitur aliquet quam id dui posue blandit. Nulla quis lorem ut libero malesuada feugiat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="process-shape-2" data-speed="0.08" data-revert="true">
            <img src="{{ asset('frontend/images/process/shape-2.png') }}" alt="image">
        </div>
        <div class="process-shape-3" data-speed="0.08" data-revert="true">
            <img src="{{ asset('frontend/images/process/shape-3.png') }}" alt="image">
        </div>

    </div>
    <!-- End Work Process Area -->

    <!-- Start Video Area -->
    {{-- <div class="video-area-with-bg-image ptb-100 aos-init aos-animate" data-aos="fade-up" data-aos-duration="700">
        <div class="container">
            <div class="view-content-wrap" >
                <a href="https://www.youtube.com/watch?v=80SjOKO-swQ" class="video-btn popup-youtube">
                    <i class="ri-play-mini-fill"></i>
                </a>
                <h3>Fill The Gap Between You And Your  <b>Success</b>...</h3>
            </div>
        </div>
    </div> --}}
    <!-- End Video Area -->

    <!-- Why Area -->
    <div class="ptb-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-image-with-shape aos-init aos-animate" data-aos="fade-right"
                        data-aos-duration="500">
                        <img src="{{ asset('frontend/images/main-banner/banner-4.jpg') }}" alt="image">
                        {{-- <div class="since-text"><span>Since</span> 2018</div> --}}
                        <a href="https://www.youtube.com/watch?v=80SjOKO-swQ" class="video-btn popup-youtube"><i
                                class="ri-play-fill"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-content-wrap with-white-text aos-init aos-init aos-animate" data-aos="fade-left"
                        data-aos-duration="500">

                        <h3>Why The Success Preneur </h3>
                        <span class="animate-border"></span>
                        <p>Augu digital was founded in 2010 and we have achieved success as a digital agency in a very short
                            time. digital agencies evaluate your website traffic and determine the best product.</p>

                        <ul class="featreus-list wow fadeInUp" data-wow-delay="0.6s">
                            <li><i class="flaticon-check"></i> Avilabel price and billing plan</li>
                            <li><i class="flaticon-check"></i> Built with amizing features</li>
                            <li><i class="flaticon-check"></i> Easy to edit and user friendly design</li>
                            <li>
                            </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Area -->

    <!-- Start Pricing Area -->
    <div class="pricing-area pt-75">
        <div class="container">
            <div class="section-title text-center">
                <h2>Choose Your Plan </h2>
                <span class="animate-border"></span>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="prc1 single-pricing-table with-hover-color" data-aos="fade-right" data-aos-duration="500"
                        data-aos-duration="500" data-aos-once="true">
                        <div class="cspir-icon">
                            <i class="flaticon-check" aria-hidden="true"></i>
                        </div>
                        <div class="pricing-header">
                            <h3>ELITE PACKAGE</h3>
                        </div>
                        <div class="price">Rs. 1428/- <span>/ mth</span></div>

                        <ul class="features-list">
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    Affiliate Marketing Mastery <i class="ri-check-line"></i>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    Spoken English <i class="ri-check-line"></i>
                                </div>
                            </li>

                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    &nbsp;
                                </div>
                            </li>

                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    &nbsp;
                                </div>
                            </li>


                        </ul>
                        <div class="pricing-btn">
                            <a href="#" class="default-btn">Get started <i class="ri-arrow-right-line"></i></a>
                        </div>
                        <div class="hover-shape">
                            <img src="{{ asset('frontend/images/pricing-shape.png') }}" alt="image">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-pricing-table with-hover-color" data-aos="fade-down" data-aos-duration="500"
                        data-aos-duration="500" data-aos-once="true">
                        <div class="cspir-icon">
                            <i class="flaticon-check" aria-hidden="true"></i>
                        </div>
                        <div class="pricing-header">
                            <h3>GOLD PACKAGE</h3>
                        </div>
                        <div class="price">Rs. 8570/- <span>/ mth</span></div>

                        <ul class="features-list">
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    All Silver Courses <i class="ri-check-line"></i>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    Facebook Ads Mastery <i class="ri-check-line"></i>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    Website Development <i class="ri-check-line"></i>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    Sales Mastery <i class="ri-check-line"></i>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    YouTube Mastermind <i class="ri-check-line"></i>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    Video Marketing Mastery <i class="ri-check-line"></i>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    Google Ads <i class="ri-check-line"></i>
                                </div>
                            </li>


                        </ul>
                        <div class="pricing-btn">
                            <a href="#" class="default-btn">Get started <i class="ri-arrow-right-line"></i></a>
                        </div>
                        <div class="hover-shape">
                            <img src="{{ asset('frontend/images/pricing-shape.png') }}" alt="image">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="prc1 single-pricing-table with-hover-color" data-aos="fade-left" data-aos-duration="500"
                        data-aos-duration="500" data-aos-once="true">
                        <div class="cspir-icon">
                            <i class="flaticon-check" aria-hidden="true"></i>
                        </div>
                        <div class="pricing-header">
                            <h3>SILVER PACKAGE</h3>
                        </div>
                        <div class="price">Rs. 3285/- <span>/ mth</span></div>

                        <ul class="features-list">
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    All Elite Courses <i class="ri-check-line"></i>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    Instagram Marketing Mastery <i class="ri-check-line"></i>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    Video Editing Mastery <i class="ri-check-line"></i>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    Content Creation Mastery <i class="ri-check-line"></i>
                                </div>
                            </li>


                        </ul>

                        <div class="pricing-btn">
                            <a href="#" class="default-btn">Get started <i class="ri-arrow-right-line"></i></a>
                        </div>
                        <div class="hover-shape">
                            <img src="{{ asset('frontend/images/pricing-shape.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="pricing-shape-1">
            <img src="{{ asset('frontend/images/pricing-shape-2.png') }}" alt="image">
        </div> --}}
    </div>
    <!-- End Pricing Area -->

    <!-- Start Testimonials Area -->
    <div class="testimonials-area-bg-transparent ptb-50">
        <div class="container">
            <div class="section-title">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center">
                        <h2>What Others Have To Say About The Success Preneur </h2>
                        <span class="animate-border"></span>
                    </div>
                    <!-- <div class="col-lg-6 text-end">
                                    <a href="#" class="default-btn">View all <i class="ri-arrow-right-line"></i></a>
                                </div> -->
                </div>
            </div>
            <div class="testimonials-slides owl-carousel owl-theme">
                <div class="single-testimonials-card with-border">
                    <div class="video-area">
                        <div class="video-view">
                            <img src="{{ asset('frontend/images/video/video-1.jpg') }}" alt="image">
                            <div class="view-content">
                                <a href="https://www.youtube.com/watch?v=80SjOKO-swQ" class="video-btn popup-youtube">
                                    <i class="ri-play-mini-fill"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Testimonials Area -->

    <!-- Start FAQs Area -->
    <div class="faq-area ptb-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="faq-accordion aos-animate" data-aos="fade-right" data-aos-duration="500">
                        <div class="faq-content">
                            <h3>Frequently Asked Questions </h3>
                            <span class="animate-border"></span>
                        </div>
                        <div class="accordion" id="FaqAccordion">
                            <div class="accordion-item">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    01. What services does a digital agency provide?
                                </button>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <p>Donec rutrum congue leo eget malesuada vivamus magna justo lacinia eget
                                            consectetur sed convallis at tellus sed porttitor lectus nibh donec
                                            sollicitudin molestie malesuada cras ultricies ligula sed magna dictum porta
                                            curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    02. Why is digital agency important to any business?
                                </button>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <p>Donec rutrum congue leo eget malesuada vivamus magna justo lacinia eget
                                            consectetur sed convallis at tellus sed porttitor lectus nibh donec
                                            sollicitudin molestie malesuada cras ultricies ligula sed magna dictum porta
                                            curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                                    </div>
                                </div>

                            </div>

                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    03. Why is digital agency important to any business?
                                </button>
                                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <p>Donec rutrum congue leo eget malesuada vivamus magna justo lacinia eget
                                            consectetur sed convallis at tellus sed porttitor lectus nibh donec
                                            sollicitudin molestie malesuada cras ultricies ligula sed magna dictum porta
                                            curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="rotateing-layer">
                        <img src="{{ asset('frontend/images/faq-circle.png') }}" alt="">
                    </div>
                    <div class="faq-image aos-animate" data-aos="fade-left" data-aos-duration="500">
                        <img src="{{ asset('frontend/images/faq.png') }}" alt="image"
                            class="wow fadeInRight width100p" data-wow-delay="0.2s">
                    </div>
                </div>
            </div>
        </div>

        <div class="faq-shape-1">
            <img src="{{ asset('frontend/images/faq-shape.png') }}" alt="image">
        </div>
    </div>
    <!-- End FAQs Area -->
@endsection

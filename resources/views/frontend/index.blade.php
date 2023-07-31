@extends('frontend.layouts.app')
@section('content')

    <!-- Start DeskTop Slider Area -->
    {{-- <div class="main-banner-area-wrap d-none d-lg-block d-md-block">
        <div class="main-banner-wrap-image">
            <div class="main-banner-wrap-image-slides owl-carousel owl-theme">
                @foreach ($desktop_sliders as $desktop_slider)
                    <div class="image">
                        <img src="{{ asset('backend/img/websitesetting/sliders/'.$desktop_slider->content) }}" alt="image">
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <section>
        <div class="container-fluid">
            <div class="row ">
                <div class="owl-carousel owl-theme">
                    @foreach ($desktop_sliders as $desktop_slider)
                    <div class="item">
                        <img src="{{ asset('backend/img/websitesetting/sliders/'.$desktop_slider->content) }}" alt="{{env('APP_NAME')}}-Slider">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End DeskTop Slider Area -->

    <!-- Start MobileView Slider Area -->
    {{-- <div class="main-banner-area-wrap d-lg-none d-md-none d-block">
        <div class="main-banner-wrap-image">
            <div class="main-banner-wrap-image-slides owl-carousel owl-theme">
                @foreach ($mobile_sliders as $mobile_slider)
                    <div class="image">
                        <img src="{{ asset('backend/img/websitesetting/sliders/'.$mobile_slider->content) }}" alt="image">
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <section class="section student-course top-strip">
        <div class="container">
            <div class="course-widget">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="course-full-width">
                            <div class="blur-border course-radius align-items-center aos">
                                <div class="online-course d-flex align-items-center">
                                    <div class="course-img icon-circle">
                                        <i class="fa-solid fa-wallet fa-2x"></i>
                                    </div>
                                    <div class="course-inner-content">
                                        <h4><span>{{websiteData('community_earning')}}</span>+</h4>
                                        <p>Commission Distributed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="course-full-width">
                            <div class="blur-border course-radius align-items-center aos">
                                <div class="online-course d-flex align-items-center">
                                    <div class="course-img icon-circle">
                                        <i class="fa-solid fa-chalkboard-user fa-2x"></i>
                                    </div>
                                    <div class="course-inner-content">
                                        <h4><span>{{websiteData('trainers')}}</span>+</h4>
                                        <p>Trainer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="course-full-width">
                            <div class="blur-border course-radius align-items-center aos">
                                <div class="online-course d-flex align-items-center">
                                    <div class="course-img icon-circle">
                                        <i class="fa-sharp fa-solid fa-graduation-cap fa-2x"></i>
                                    </div>
                                    <div class="course-inner-content">
                                        <h4><span>{{websiteData('students')}}</span>+</h4>
                                        <p>Students</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="course-full-width">
                            <div class="blur-border course-radius align-items-center aos">
                                <div class="online-course d-flex align-items-center">
                                    <div class="course-img icon-circle">
                                        <i class="fab fa-slideshare fa-2x"></i>
                                    </div>
                                    <div class="course-inner-content">
                                        <h4><span>{{websiteData('live_training')}}</span>+</h4>
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
                    @foreach ($plans as $key=>$plan)
                        <div class='col-lg-4 col-md-6 d-flex'>
                            <div class='course-box d-flex aos'>
                                <div class='product'>
                                    <div class='product-img'>
                                        <a href="{{route('checkout')}}?slug={{$plan->slug}}" title="{{env('APP_NAME')}}-{{$plan->title}}">
                                            <center>
                                                <img src="{{'backend/img/plan/'.$plan->image}}" alt="{{env('APP_NAME')}}-{{$plan->title}}" class="img-fluid">
                                            </center>
                                        </a>
                                    </div>
                                    <div class='product-content'>
                                        <div class='course-group d-flex'>
                                            <div class='course-group-img d-flex'>
                                                <div class='course-name'>
                                                    <h4>
                                                        <a href="{{route('checkout')}}?slug={{$plan->slug}}" title="Richind-Starter-Package"> {{$plan->title}} </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='course-info d-flex align-items-center'>
                                            <div class='rating-img d-flex align-items-center'>
                                                <i class="fa-solid fa-book-open"></i>

                                                <p>{{count($plan->course_ids)}} Courses</p>

                                            </div>
                                            <div class="course-view d-flex align-items-center">
                                                <i class="fa-solid fa-tags"></i>
                                                <p> ₹ {{$plan->discounted_price}} <span>₹ {{$plan->amount}}</span></p>
                                            </div>
                                        </div>
                                        <div style="height:160px;">
                                            <ul style="">
                                                @foreach ($plan->points as $plan_point)
                                                    <li style="">{{$plan_point}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class='all-btn all-category d-flex align-items-center'>
                                            <a href="{{route('checkout')}}?slug={{$plan->slug}}" title="{{env('APP_NAME')}}-{{$plan->title}}" class='btn btn-primary' style="font-size:20px;margin-left:60px">
                                                Buy Now ₹ {{$plan->discounted_price}}
                                            </a>
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
        <div class="section-header aos">
            <div class="section-sub-head feature-head text-center">
                <h2>Instructor At Richind</h2>
                <div class="section-text aos">
                    <p class="mb-0">
                        At Richin, you can now be assured to get the top-most training from the leading educators of
                        their respective fields. Turn your dreams into reality with Richin proficient instructors.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="owl-carousel instructors-course owl-theme aos">
                @foreach ($instructors as $instructor)
                    <div class='instructors-widget'>
                        <div class='instructors-img '>
                            <img class='img-fluid' alt='Richind-AMan-Jain' src="{{asset('backend/img/instructors/'.$instructor->image)}}">
                        </div>
                        <div class='instructors-content text-center'>
                            <h5 class='gordita-bold'>{{$instructor->name}}</h5>
                            <p>{{$instructor->designation}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <section class="insta-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-sm-5">
                    <img src="{{ asset('frontend/assets/images/Why1.png')}}" alt="Richind" class="img-fluid" />
                </div>
                <div class="col-lg-7 col-sm-7">
                    <div class="intsa-subsec">
                        <h4>Ready To Get Our <span>Professional Course ?</span> We are offering High Quality Courses
                            and Live Training.”
                        </h4>
                        <a href="https://api.whatsapp.com/send?phone=1234567890" title="Richind-Whatsapp-Us"
                            target="_blank" class="btn btn-primary btn-new">Let’s Talk Our Expert</a>
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
                            <h2>Why Richind ?</h2>
                        </div>
                    </div>
                    <div class="section-text aos">
                        <p>
                            Change is a must when you wish to step ahead in your career. LeadsGuru, an ed-tech
                            platform, never lets you down. With its first-of-its-kind training programs and industry
                            leaders, LeadsGuru ensures to make your professional journey a leading narrative.
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
                                            <strong class="fs-15 gordita-bold">Same Day Payout:</strong> We Provide
                                            Valuable Courses At Most Affordable Price. Because We Think Everyone
                                            Deserves To Be Educate And For Education You Don't Need To Spend High
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 d-flex">
                                <div class="certified-group blur-border d-flex">
                                    <div class="get-certified d-flex align-items-center">
                                        <div class="blur-box">
                                            <div class="certified-img ">
                                                <i class="fa-solid fa-bullseye-arrow fs-60"></i>
                                            </div>
                                        </div>
                                        <p class="txt-dark-1">
                                            <strong class="fs-15 gordita-bold">Live Training:</strong> We Have A
                                            Premium Structure Of Daily Payout In GyanKamao. You Can Receive Your
                                            Payout Within 24 Hours
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
                                            <strong class="fs-15 gordita-bold">VALUABLE COURSES:</strong> We Believe
                                            To Provide Values To Our GyanKamao Family. And Our Courses Are Designed
                                            On This Principal. We Have The Most Valuable Courses.
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
                                            <strong class="fs-15 gordita-bold">150+ TRAINING SESSIONS:</strong> 150+
                                            Training Sessions: With Valueable Courses For Adding More Value. We
                                            Provide 150+ Training Sessions For Our GyanKamao Family.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-12 col-md-12 d-flex">
                    <div class="career-img aos">
                        <img src="{{ asset('frontend/assets/images/Why-Us.png')}}" alt="Richind-Why-Choose-Us"
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
                        <!--<img src="https://thegrowthindia.in/assets/Images/Team_Images/832175image.jpg" alt="Richind-Kartik-daiya" class="img-fluid bdr-20">-->
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12 col-sm-7 d-flex align-items-center mt-xl-30">
                    <div class="join-mentor aos mar-top-20-xs pl-50">
                        <h2>Meet Our Founder</h2>
                        Demonstrate your idea before making an investment in technical resources.
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
                </div>
            </div>
            <div class="owl-carousel mentoring-course owl-theme aos">
                <div class='item'>
                    <p>Richind is E-learning platform skill development, help to people earn money thought social
                        media ?</p>
                    <p><strong>SR EDITZ OFFICIAL</strong></p>
                </div>
                <div class='item'>
                    <p>Nothing but a method to promote affiliate marketing. One type of Pyramid scheme. It's not
                        private company. It's manged by proprieter , to gain your trust they have added all the
                        documents like gst, msme certificate on their website. Only naive and illiterate people will
                        join this platform.</p>
                    <p><strong>Nishikant Mane</strong></p>
                </div>
                <div class='item'>
                    <p>Affiliate marketing ke liye sabse behtarin website yah aapke karta hai ki aap kisi kar se
                        kaam kar raha hai hai agar aap ek din mein lakh rupees Kama kam sakte hain ek din mein 500
                        rupees upar defend tractor ki aap kis prakar customer ko handle kar rahe hain</p>
                    <p><strong>Sandeep Verma</strong></p>
                </div>
            </div>
        </div>
    </section>

    <section class="subscribe-newsec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter-sub">
                        <div class="row d-flex align-items-center row-cols-1 row-cols-lg-2">
                            <div class="col-lg-8 m-lg-auto">
                                <div class="newsletter-txt text-center pr-20">
                                    <h4 class="h4-sm">Freequently Asked Questions</h4>
                                </div>
                            </div>
                            <div class="col-lg-10 m-lg-auto">
                                <div class="newsletter-txt">
                                    @foreach ($faqs as $faq_key=>$faq)
                                        <div class="accordion-item">
                                            <button class="accordion-button @if($faq_key != 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq_key}}" aria-expanded="@if($faq_key == 0)true @else false @endif" aria-controls="collapse{{$faq_key}}">
                                                {{$faq_key+1}}. {{$faq->title}}
                                            </button>
                                            <div id="collapse{{$faq_key}}" class="accordion-collapse collapse @if($faq_key == 0) show @endif" data-bs-parent="#FaqAccordion">
                                                <div class="accordion-body">
                                                    <p>
                                                        {!!$faq->content!!}
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

    <!-- Start Pricing Area -->
    {{-- <div class="pricing-area">
        <div class="container">
            <div class="section-title text-center">
                <h2>Digital Entrepreneurship Bundles </h2>
                <p>Enroll With The Success Preneur </p>
                <span class="animate-border"></span>
            </div>

            <div class="services-slides owl-carousel owl-theme">
                @foreach ($plans as $key=>$plan)
                    <div class="single-pricing-table tsp-plan with-hover-color" data-aos="fade-right" data-aos-duration="500" data-aos-duration="500" data-aos-once="true">
                        <a href="{{route('checkout')}}?slug={{$plan->slug}}" class="w-100">
                        @if ($key==1)
                                <div class="ribbon">
                                <span>Recommended</span>
                            </div>
                        @endif

                            @if ($key==0)
                              <div class="sub-head"></div>
                              <img src="{{asset('frontend/images/plan-1.png')}}">
                            @endif

                            @if ($key==1)
                              <div class="sub-head-2"></div>
                              <img src="{{asset('frontend/images/plan-2.png')}}">
                            @endif

                            @if ($key==2)
                               <div class="sub-head-3"></div>
                               <img src="{{asset('frontend/images/plan-3.png')}}">
                            @endif

                            @if ($key==3)
                              <div class="sub-head-4"></div>
                              <img src="{{asset('frontend/images/plan-4.png')}}">
                            @endif

                        <img src="{{asset('backend/img/plan/'.$plan->image)}}">

                        <div class="pricing-header">
                            <h3>{{$plan->title}}</h3>
                        </div>
                        <div class="price">Rs. {{$plan->amount}}</div>
                        <ul class="features-list">
                            @foreach ($plan->points as $plan_point)
                                <li>
                                    <div class="d-flex justify-content-between align-items-center">
                                        {{$plan_point}} <i class="ri-check-line"></i>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </a>
                        <div class="pricing-btn">
                            <a href="{{route('checkout')}}?slug={{$plan->slug}}" class="buy-now">Buy Now <i class="ri-arrow-right-line"></i></a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- End Pricing Area -->

    <!-- Start Why TSP -->
     {{-- <div class="fun-fact-area">
        <div class="container">
            <div class="section-title text-center">
                <h2>Why The Success Preneur ?</h2>
                <span class="animate-border"></span>
            </div>
           <div class="fun-fact-inner-box">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="single-funfact-card with-right-border">
                            <h3>
                                <span class="odometer odometer-auto-theme" data-count="{{websiteData('trainers')}}"></span>
                                <span class="small-text">+</span>
                            </h3>
                            <p>Trainers</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="single-funfact-card with-right-border">
                            <h3>
                                <span class="odometer odometer-auto-theme" data-count="{{websiteData('students')}}"></span>
                                <span class="small-text">+</span>
                            </h3>
                            <p>Students</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="single-funfact-card with-right-border">
                            <h3>
                                <span class="odometer odometer-auto-theme" data-count="{{websiteData('live_training')}}"></span>
                                <span class="small-text">+</span>
                            </h3>
                            <p>Live Training</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="single-funfact-card">
                            <h3>
                                <span class="odometer odometer-auto-theme" data-count="{{websiteData('community_earning')}}"></span>
                                <span>Lc</span>&nbsp;
                                <span class="small-text">+</span>
                            </h3>
                            <p>Community Earning </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div> --}}
    <!-- End Why TSP -->

    <!-- Start Founder Area -->
    {{-- <div class="founder-tsp">
        <div class="container">
            <div class="section-title text-center">
                <h2>Founders At The Success Preneur </h2>
                <span class="animate-border"></span>
            </div>
            <div class="team-slides owl-carousel owl-theme">
                @foreach ($instructors as $instructor)
                    <div class="single-team-card">
                        <img src="{{ asset('backend/img/instructors/'.$instructor->image) }}" alt="image">
                        <div class="team-content">
                            <h3>{{$instructor->name}}</h3>
                            <span>{{$instructor->designation}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- End Founder Area -->

    <!-- Start Text Testimonials Area -->
    {{-- <div class="testimonials-area-bg-transparent ptb-50">
        <div class="container">
            <div class="section-title">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center">
                        <h2>Reviews From Our Students</h2>
                        <p>What Our Students Say About The Success Preneur </p>
                        <span class="animate-border"></span>
                    </div>
                </div>
            </div>
            <div class="testimonials-slides owl-carousel owl-theme">
                @foreach ($reviews as $review)
                    <div class="single-testimonials-card" data-aos="fade-up" data-aos-duration="500" data-aos-duration="500" data-aos-once="true">
                        <div class="info">
                            <div class="image">
                                <img src="{{asset('backend/img/reviews/'.$review->image)}}" alt="image" onerror="this.onerror=null;this.src='frontend/images/favicon.png';">
                            </div>
                            <h3>{{$review->name}}</h3>
                            <span>{{$review->designation}}</span>
                        </div>
                        <p>{{$review->message}}</p>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </div> --}}
    <!-- End Text Area -->

    <!--Start Trainings -->
     {{-- <div class="trainings ptb-20">
        <div class="container">
            <div class="section-title text-center">
                <h2>Trainings And Meetup</h2>
                <span class="animate-border"></span>
            </div>
             <div class="portfolio-slides owl-carousel owl-theme">
                @foreach ($meetups as $meetup)
                    <div class="portfolio-card">
                        <img src="{{asset('backend/img/websitesetting/meetup/'.$meetup->content)}}" alt="Trainings And Meetup" class="w-100">
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- End Trainings -->

    <!--Start Success Stories -->
    {{-- <div class="success-stories ptb-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-image-with-shape">
                        <img src="{{asset('frontend/images/main-banner/banner-4.jpg')}}" alt="image">
                        <a href="https://www.youtube.com/watch?v=-xYFKlnAT8Y" class="video-btn popup-youtube"><i class="ri-play-fill"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-content-wrap with-white-text">
                        <span>Success Stories</span>
                        <h3 class="mt-3">What Is The Succes <br>Preneur ?</h3>
                        <p class="text-white">The Success Preneur is a digitally organized E-learning platform that focuses on the SKILL DEVELOPMENT of it's students by giving courses in a variety of disciplines that may assist anyone solidify their talents.</p>
                        <div class="banner-btn mt-4">
                            <a href="#" class="default-btn">Enroll Today <i class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Success Stories -->

    <!-- Start Why Choose Us Area -->
    {{-- <div class="choose-us-area">
        <div class="container">
            <div class="section-title text-center">
                <h2>Why To Choose Us?  </h2>
                <p>Same Day Payout The Amount You Earn will transferred in same day by us.</p>
                <span class="animate-border"></span>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12">
                    <img src="{{asset('frontend/images/why-us.png')}}">
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="choose-us-box">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-6">
                                <div class="single-choose-us-card">
                                    <div class="icon">
                                        <i class="ri-wallet-3-line"></i>
                                    </div>
                                    <h3>Low Cost <br>Investment </h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-6">
                                <div class="single-choose-us-card">
                                    <div class="icon">
                                        <i class="flaticon-team"></i>
                                    </div>
                                    <h3>Create Your Entrepreneurial Journe</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-6">
                                <div class="single-choose-us-card">
                                    <div class="icon">
                                        <i class="flaticon-team-1"></i>
                                    </div>
                                    <h3>Discover More Opportunities In Different Fields</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-6">
                                <div class="single-choose-us-card">
                                    <div class="icon">
                                        <i class="flaticon-check"></i>
                                    </div>
                                    <h3>Opportunity To Be A Successful Entrepreneur One Platform To Grow Your Next 10 Years</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End  Why Choose Us Area-->

    <!-- Start How TSP Works Area -->
    {{-- <div class="choose-work ptb-50">
        <div class="container">
            <div class="section-title text-center">
                <h2>How TSP Works? </h2>
                <span class="animate-border"></span>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single-services-card with-hover-color text-center">
                        <div class="icon">
                            <img src="{{asset('frontend/images/explore-icon.png')}}">
                        </div>
                        <h3>Explore</h3>
                        <p><b>Different Bundles and Trending Skills</b></p>
                        <p>Explore the million possibilities of getting in touch with all the trending skills in the market.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-services-card with-hover-color text-center">
                        <div class="icon">
                            <img src="{{asset('frontend/images/learn-icon.png')}}">
                        </div>
                        <h3>Learn</h3>
                        <p><b>From the best of the best trainers</b></p>
                        <p>Learn from trainers who have real-time expertise in their respective fields.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-services-card with-hover-color text-center">
                        <div class="icon">
                            <img src="{{asset('frontend/images/inspire-icon.png')}}">
                        </div>
                        <h3>Inspire</h3>
                        <p><b>The world around you</b></p>
                        <p>Inspire people close to you and help make a tangible difference in society.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End  How TSP Works Area-->

    <!-- Start Platform Area -->
    {{-- <div class="process-area-work">
        <div class="container">
            <div class="section-title text-center">
                <h2>An Platform Which Not Only Provides You Learnings As Well Allows You To Earnings.</h2>
                <span class="animate-border"></span>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="single-process-card with-box-shadow" data-aos="fade-up" data-aos-duration="500" data-aos-duration="500" data-aos-once="true">
                        <div class="icon">
                           <img src="{{asset('frontend/images/learn-icon.png')}}">
                        </div>
                        <h3>
                            <a href="#">Learn </a>
                        </h3>
                        <p> Flexible Learnings At Your Comfort Zone From Different Niches. <br> &nbsp;</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single-process-card with-box-shadow aos-init aos-animate" data-aos="fade-up" data-aos-duration="500"
                        data-aos-duration="500" data-aos-once="true">
                        <div class="icon">
                            <img src="{{asset('frontend/images/apply-icon.png')}}">
                        </div>
                        <h3>
                            <a href="#">Implement </a>
                        </h3>
                        <p>Always Remember Applying Knowledge Will Leads You To Many Opportunities. <br> &nbsp</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single-process-card with-box-shadow" data-aos="fade-up" data-aos-duration="500" data-aos-duration="500" data-aos-once="true">
                        <div class="icon">
                            <img src="{{asset('frontend/images/share-icon.png')}}">
                        </div>
                        <h3>
                            <a href="#">Promote </a>
                        </h3>
                        <p>Always Knowledge Makes Money So Remember To Share This Opportunity.</p>
                    </div>
                </div>
            </div>

        </div>

    </div> --}}
    <!-- End Platform Area -->


    <!-- Start Video Testimonials Area -->
    {{-- <div class="testimonials-area-bg-transparent ptb-50">
        <div class="container">
            <div class="section-title">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center">
                        <h2>Video Reviews From Our Students</h2>
                        <span class="animate-border"></span>
                    </div>
                </div>
            </div>
            <div class="testimonials-slides owl-carousel owl-theme">
                @foreach ($testimonialvideos as $testimonialvideo)
                    <div class="with-border">
                        <div class="video-area">
                            <div class="video-view">
                                <img src="{{asset('backend/img/testimonial/'.$testimonialvideo->thumbnail_image)}}" onerror="this.onerror=null;this.src='{{ asset('frontend/images/video/video-1.jpg') }}'"  alt="image">
                                <div class="view-content">
                                    <a href="https://www.youtube.com/watch?v={{$testimonialvideo->video_url}}" class="video-btn popup-youtube">
                                        <i class="ri-play-mini-fill"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- End Video Testimonials Area -->

    <!-- Start Vision Area -->
    {{-- <div class="vision-area ptb-50">
        <div class="container">
            <div class="section-title text-center">
                <h2>What Is Vision Of Tsp?</h2>
                <span class="animate-border"></span>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    <p>The Sucess preneur is an e-learning platform that provides Skill Development Courses related to Entrepreneurship, Career &amp; Business Development and also provides training to earn with the help of social media.</p>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Vision Area -->

    <!-- Start Media Area -->
    {{-- <div class="our-media">
        <div class="container">
            <div class="section-title">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center">
                        <h2>Our Media</h2>
                        <span class="animate-border"></span>
                    </div>
                </div>
            </div>
            <div class="media-slides owl-carousel owl-theme">
                @foreach ($medias as $media)
                    <div class="single-team-card" data-aos="fade-up" data-aos-duration="500" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('backend/img/websitesetting/medias/'.$media->image) }}" alt="image">
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- End Media Area -->

    <!-- Start FAQs Area -->
    {{-- <div class="faq-area ptb-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="faq-accordion aos-animate" data-aos="fade-up" data-aos-duration="500">
                        <div class="faq-content">
                            <h3>Frequently Asked Questions </h3>
                            <span class="animate-border"></span>
                        </div>
                        <div class="accordion" id="FaqAccordion">
                            @foreach ($faqs as $faq_key=>$faq)
                                <div class="accordion-item">
                                    <button class="accordion-button @if($faq_key != 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq_key}}" aria-expanded="@if($faq_key == 0)true @else false @endif" aria-controls="collapse{{$faq_key}}">
                                        {{$faq_key+1}}. {{$faq->title}}
                                    </button>
                                    <div id="collapse{{$faq_key}}" class="accordion-collapse collapse @if($faq_key == 0) show @endif" data-bs-parent="#FaqAccordion">
                                        <div class="accordion-body">
                                            <p>
                                                {!!$faq->content!!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="rotateing-layer">
                        <img src="{{ asset('frontend/images/faq-circle.png') }}" alt="">
                    </div>
                    <div class="faq-image aos-animate" data-aos="fade-up" data-aos-duration="500">
                        <img src="{{ asset('frontend/images/faq.png') }}" alt="image" class="wow fadeInRight width100p" data-wow-delay="0.2s">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End FAQs Area -->
@endsection

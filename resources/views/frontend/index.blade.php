@extends('frontend.layouts.app')
@section('content')
    <!-- Start DeskTop Slider Area -->
    <section>
        <div class="container-fluid">
            <div class="row ">
                <div class="owl-carousel owl-theme">
                    @foreach ($desktop_sliders as $desktop_slider)
                        <div class="item">
                            <img src="{{ asset('backend/img/websitesetting/sliders/' . $desktop_slider->content) }}"
                                alt="{{ env('APP_NAME') }}-Slider">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End DeskTop Slider Area -->

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
                                        <h4><span>{{ websiteData('community_earning') }}</span>+</h4>
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
                                        <h4><span>{{ websiteData('trainers') }}</span>+</h4>
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
                                        <h4><span>{{ websiteData('students') }}</span>+</h4>
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
                                            <center>
                                                <img src="{{ 'backend/img/plan/' . $plan->image }}"
                                                    alt="{{ env('APP_NAME') }}-{{ $plan->title }}" class="img-fluid">
                                            </center>
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
                                        <div class='all-btn all-category d-flex align-items-center'>
                                            <a href="{{ route('checkout') }}?slug={{ $plan->slug }}"
                                                title="{{ env('APP_NAME') }}-{{ $plan->title }}" class='btn btn-primary'
                                                style="font-size:20px;margin-left:60px">
                                                Buy Now ₹ {{ $plan->discounted_price }}
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
                        <a href="https://api.whatsapp.com/send?phone=1234567890" title="Richind-Whatsapp-Us" target="_blank"
                            class="btn btn-primary btn-new">Let’s Talk Our Expert</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section master-skill why-ushome">
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
                        <img src="{{ asset('frontend/assets/images/Why-Us.png') }}" alt="Richind-Why-Choose-Us"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

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

@extends('frontend.layouts.app')
@section('content')
        <!--Main Slider Start-->
        <section class="main-slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            @foreach ($desktop_sliders as $key => $desktop_slider)
                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                <img src="{{ asset('backend/img/websitesetting/sliders/' . $desktop_slider->content) }}" class="d-block w-100" alt="{{ env('APP_NAME') }}-Slider">
                </div>
            @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </section>
        <!--Main Slider End-->

    {{-- Start Banner Area --}}
    <!-- <section class="hero-banner" style="background-image: url({{ asset('frontend/shapes/banner-bg-1.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-6">
                    <div class="hero-banner__content">
                        <div class="hero-banner__bg-shape1 wow zoomIn" data-wow-delay="300ms">
                            <div class="hero-banner__bg-round">
                                <div class="hero-banner__bg-round-border"></div>
                            </div>
                        </div>
                        <h2 class="hero-banner__title wow fadeInUp" data-wow-delay="400ms">Transform Your Passion into Profit </h2>
                        <p class="hero-banner__text wow fadeInUp" data-wow-delay="500ms">Learn, Grow, and Succeed with Richind.
                            <img src="{{ asset('frontend/assets/images/shapes/banner-1-shape-1.png') }}" alt="richind">
                        </p>
                        <div class="hero-banner__btn wow fadeInUp" data-wow-delay="600ms">
                            <a href="{{route('contact')}}" class="richind-btn richind-btn-second"><span class="richind-btn__curve"></span>Contact <i class="icon-arrow"></i></a>
                            <a href="{{route('course')}}" class="richind-btn"><span class="richind-btn__curve"></span>Find The Course<i class="icon-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <div class="hero-banner__thumb wow fadeInUp" data-wow-delay="700ms">
                        <img src="{{ asset('frontend/assets/images/resources/banner-1-1.png') }}" alt="richind">
                        <div class="hero-banner__cap wow slideInDown" data-wow-delay="800ms"><img src="{{ asset('frontend/assets/images/shapes/banner-cap.png') }}" alt="richind"></div>
                        <div class="hero-banner__star wow slideInDown" data-wow-delay="850ms"><img src="{{ asset('frontend/assets/images/shapes/banner-star.png') }}" alt="richind"></div>
                        <div class="hero-banner__map wow slideInDown" data-wow-delay="900ms"><img src="{{ asset('frontend/assets/images/shapes/banner-map.png') }}" alt="richind"></div>
                        <div class="hero-banner__video wow zoomIn" data-wow-delay="950ms" style="background-image: url({{ asset('frontend/assets/images/resources/banner-video.png') }});">
                            <a href="#" class="video-popup"><span class="icon-play"></span></a>
                        </div>
                        <div class="hero-banner__book wow slideInUp" data-wow-delay="1000ms"><img src="{{ asset('frontend/assets/images/shapes/banner-book.png') }}" alt="richind"></div>
                        <div class="hero-banner__star2 wow slideInUp" data-wow-delay="1050ms"><img src="{{ asset('frontend/assets/images/shapes/banner-star2.png') }}" alt="richind"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-banner__border wow fadeInUp" data-wow-delay="1100ms"></div>
    </section> -->
    {{-- End Banner Area --}}

    {{-- Start Why Richind --}}
    <section class="fact-one" style="background-image: url({{ asset('frontend/assets/images/shapes/fact-bg-1.png') }});">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title__title section-title__tagline">Why RichInd
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 133 13" fill="none">
                        <path d="M9.76794 0.395L0.391789 9.72833C-0.130596 10.2483 -0.130596 11.095 0.391789 11.615C0.914174 12.135 1.76472 12.135 2.28711 11.615L11.6633 2.28167C12.1856 1.76167 12.1856 0.915 11.6633 0.395C11.1342 -0.131667 10.2903 -0.131667 9.76794 0.395Z" fill="#F1F2FD" />
                        <path d="M23.1625 0.395L13.7863 9.72833C13.2639 10.2483 13.2639 11.095 13.7863 11.615C14.3087 12.135 15.1593 12.135 15.6816 11.615L25.0578 2.28167C25.5802 1.76167 25.5802 0.915 25.0578 0.395C24.5287 -0.131667 23.6849 -0.131667 23.1625 0.395Z" fill="#F1F2FD" />
                        <path d="M36.5569 0.395L27.1807 9.72833C26.6583 10.2483 26.6583 11.095 27.1807 11.615C27.7031 12.135 28.5537 12.135 29.076 11.615L38.4522 2.28167C38.9746 1.76167 38.9746 0.915 38.4522 0.395C37.9231 -0.131667 37.0793 -0.131667 36.5569 0.395Z" fill="#F1F2FD" />
                        <path d="M49.9514 0.395L40.5753 9.72833C40.0529 10.2483 40.0529 11.095 40.5753 11.615C41.0976 12.135 41.9482 12.135 42.4706 11.615L51.8467 2.28167C52.3691 1.76167 52.3691 0.915 51.8467 0.395C51.3176 -0.131667 50.4738 -0.131667 49.9514 0.395Z" fill="#F1F2FD" />
                        <path d="M63.3459 0.395L53.9698 9.72833C53.4474 10.2483 53.4474 11.095 53.9698 11.615C54.4922 12.135 55.3427 12.135 55.8651 11.615L65.2413 2.28167C65.7636 1.76167 65.7636 0.915 65.2413 0.395C64.7122 -0.131667 63.8683 -0.131667 63.3459 0.395Z" fill="#F1F2FD" />
                        <path d="M76.7405 0.395L67.3643 9.72833C66.8419 10.2483 66.8419 11.095 67.3643 11.615C67.8867 12.135 68.7373 12.135 69.2596 11.615L78.6358 2.28167C79.1582 1.76167 79.1582 0.915 78.6358 0.395C78.1067 -0.131667 77.2629 -0.131667 76.7405 0.395Z" fill="#F1F2FD" />
                        <path d="M90.1349 0.395L80.7587 9.72833C80.2363 10.2483 80.2363 11.095 80.7587 11.615C81.2811 12.135 82.1317 12.135 82.6541 11.615L92.0302 2.28167C92.5526 1.76167 92.5526 0.915 92.0302 0.395C91.5011 -0.131667 90.6573 -0.131667 90.1349 0.395Z" fill="#F1F2FD" />
                        <path d="M103.529 0.395L94.1533 9.72833C93.6309 10.2483 93.6309 11.095 94.1533 11.615C94.6756 12.135 95.5262 12.135 96.0486 11.615L105.425 2.28167C105.947 1.76167 105.947 0.915 105.425 0.395C104.896 -0.131667 104.052 -0.131667 103.529 0.395Z" fill="#F1F2FD" />
                        <path d="M116.924 0.395L107.548 9.72833C107.025 10.2483 107.025 11.095 107.548 11.615C108.07 12.135 108.921 12.135 109.443 11.615L118.819 2.28167C119.342 1.76167 119.342 0.915 118.819 0.395C118.29 -0.131667 117.446 -0.131667 116.924 0.395Z" fill="#F1F2FD" />
                        <path d="M130.318 0.395L120.942 9.72833C120.42 10.2483 120.42 11.095 120.942 11.615C121.465 12.135 122.315 12.135 122.838 11.615L132.214 2.28167C132.736 1.76167 132.736 0.915 132.214 0.395C131.685 -0.131667 130.841 -0.131667 130.318 0.395Z" fill="#F1F2FD" />
                    </svg>
                </h2>
            </div>
            <div class="row">
            <div class="col-lg-3 col-md-6 col-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="fact-one__item text-center">
                        <div class="fact-one__count">
                            <span class="count-box">
                                <span class="count-text" @isset($website_data[1]) data-stop="{{$website_data[1]->content}}" @else data-stop="0" @endif data-speed="1500"></span>
                            </span>+
                        </div>
                        <h3 class="fact-one__title">Trainer</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="fact-one__item text-center">
                        <div class="fact-one__count">
                            <span class="count-box">
                                <span class="count-text" @isset($website_data[2]) data-stop="{{$website_data[2]->content}}" @else data-stop="0" @endif data-speed="1500"></span>
                            </span>K
                        </div>
                        <h3 class="fact-one__title">Students</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="fact-one__item text-center">
                        <div class="fact-one__count">
                            <span class="count-box">
                                <span class="count-text" @isset($website_data[3]) data-stop="{{$website_data[3]->content}}" @else data-stop="0" @endif data-speed="1500"></span>
                            </span>+
                        </div>
                        <h3 class="fact-one__title">Live Training</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="fact-one__item text-center">
                        <div class="fact-one__count">
                            <span class="count-box">
                                <span class="count-text" @isset($website_data[4]) data-stop="{{$website_data[4]->content}}" @else data-stop="0" @endif data-speed="1500"></span>
                            </span>Cr
                        </div>
                        <h3 class="fact-one__title">Community Earning</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Why Richind --}}

    {{-- Start About Richind --}}
    <section class="about-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-one__thumb wow fadeInLeft" data-wow-delay="100ms">
                        <div class="about-one__thumb__one richind-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 2, "speed": 700, "scale": 1 }'>
                            <img src="{{ asset('frontend/assets/images/resources/about-1-1.png') }}" alt="richind">
                        </div>
                        <div class="about-one__thumb__shape1 wow zoomIn" data-wow-delay="300ms">
                            <img src="{{ asset('frontend/assets/images/shapes/about-shape-1-1.png') }}" alt="richind">
                        </div>
                        <div class="about-one__thumb__shape2 wow zoomIn" data-wow-delay="400ms">
                            <img src="{{ asset('frontend/assets/images/shapes/about-shape-1-2.png') }}" alt="richind">
                        </div>
                        <div class="about-one__thumb__box wow fadeInLeft" data-wow-delay="600ms">
                            <div class="about-one__thumb__box__icon"><span class="icon-Headphone-Women"></span></div>
                            <h4 class="about-one__thumb__box__title">Need to Know More Details?</h4>
                            <p class="about-one__thumb__box__text">@isset($website_data[0]) <a href="tel:{{$website_data[0]->content}}">+91-{{$website_data[0]->content}}</a> @endif</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-one__content">
                        <div class="section-title">
                            <h5 class="section-title__tagline">
                                We Are An Open Book
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 133 13" fill="none">
                                    <path d="M9.76794 0.395L0.391789 9.72833C-0.130596 10.2483 -0.130596 11.095 0.391789 11.615C0.914174 12.135 1.76472 12.135 2.28711 11.615L11.6633 2.28167C12.1856 1.76167 12.1856 0.915 11.6633 0.395C11.1342 -0.131667 10.2903 -0.131667 9.76794 0.395Z" fill="#F1F2FD" />
                                    <path d="M23.1625 0.395L13.7863 9.72833C13.2639 10.2483 13.2639 11.095 13.7863 11.615C14.3087 12.135 15.1593 12.135 15.6816 11.615L25.0578 2.28167C25.5802 1.76167 25.5802 0.915 25.0578 0.395C24.5287 -0.131667 23.6849 -0.131667 23.1625 0.395Z" fill="#F1F2FD" />
                                    <path d="M36.5569 0.395L27.1807 9.72833C26.6583 10.2483 26.6583 11.095 27.1807 11.615C27.7031 12.135 28.5537 12.135 29.076 11.615L38.4522 2.28167C38.9746 1.76167 38.9746 0.915 38.4522 0.395C37.9231 -0.131667 37.0793 -0.131667 36.5569 0.395Z" fill="#F1F2FD" />
                                    <path d="M49.9514 0.395L40.5753 9.72833C40.0529 10.2483 40.0529 11.095 40.5753 11.615C41.0976 12.135 41.9482 12.135 42.4706 11.615L51.8467 2.28167C52.3691 1.76167 52.3691 0.915 51.8467 0.395C51.3176 -0.131667 50.4738 -0.131667 49.9514 0.395Z" fill="#F1F2FD" />
                                    <path d="M63.3459 0.395L53.9698 9.72833C53.4474 10.2483 53.4474 11.095 53.9698 11.615C54.4922 12.135 55.3427 12.135 55.8651 11.615L65.2413 2.28167C65.7636 1.76167 65.7636 0.915 65.2413 0.395C64.7122 -0.131667 63.8683 -0.131667 63.3459 0.395Z" fill="#F1F2FD" />
                                    <path d="M76.7405 0.395L67.3643 9.72833C66.8419 10.2483 66.8419 11.095 67.3643 11.615C67.8867 12.135 68.7373 12.135 69.2596 11.615L78.6358 2.28167C79.1582 1.76167 79.1582 0.915 78.6358 0.395C78.1067 -0.131667 77.2629 -0.131667 76.7405 0.395Z" fill="#F1F2FD" />
                                    <path d="M90.1349 0.395L80.7587 9.72833C80.2363 10.2483 80.2363 11.095 80.7587 11.615C81.2811 12.135 82.1317 12.135 82.6541 11.615L92.0302 2.28167C92.5526 1.76167 92.5526 0.915 92.0302 0.395C91.5011 -0.131667 90.6573 -0.131667 90.1349 0.395Z" fill="#F1F2FD" />
                                    <path d="M103.529 0.395L94.1533 9.72833C93.6309 10.2483 93.6309 11.095 94.1533 11.615C94.6756 12.135 95.5262 12.135 96.0486 11.615L105.425 2.28167C105.947 1.76167 105.947 0.915 105.425 0.395C104.896 -0.131667 104.052 -0.131667 103.529 0.395Z" fill="#F1F2FD" />
                                    <path d="M116.924 0.395L107.548 9.72833C107.025 10.2483 107.025 11.095 107.548 11.615C108.07 12.135 108.921 12.135 109.443 11.615L118.819 2.28167C119.342 1.76167 119.342 0.915 118.819 0.395C118.29 -0.131667 117.446 -0.131667 116.924 0.395Z" fill="#F1F2FD" />
                                    <path d="M130.318 0.395L120.942 9.72833C120.42 10.2483 120.42 11.095 120.942 11.615C121.465 12.135 122.315 12.135 122.838 11.615L132.214 2.28167C132.736 1.76167 132.736 0.915 132.214 0.395C131.685 -0.131667 130.841 -0.131667 130.318 0.395Z" fill="#F1F2FD" />
                                </svg>
                            </h5>
                            <h2 class="section-title__title">About Richind</h2>
                        </div>
                        <p class="about-one__content__text">
                        At Richind, we believe that knowledge is the key to success in today's fast-paced, tech-driven world. Our platform is designed to empower individuals like you with the skills needed to thrive in the digital era.
                        </p>
                        <div class="about-one__box">
                            <div class="about-one__box__wrapper">
                                <div class="about-one__box__icon"><span class="icon-Presentation"></span></div>
                                <h4 class="about-one__box__title">Flexible Learning</h4>
                                <p class="about-one__box__text">Life is busy, and we understand that. That's why Richind offers flexible learning options. Study at your own pace, on your own schedule. Whether you're a night owl or an early bird, our platform is available 24/7 to fit your lifestyle.</p>
                            </div>
                        </div>
                        <div class="about-one__box">
                            <div class="about-one__box__wrapper">
                                <div class="about-one__box__icon"><span class="icon-Online-learning"></span></div>
                                <h4 class="about-one__box__title">Engaging Learning Experience</h4>
                                <p class="about-one__box__text">Learning should be exciting and enjoyable. Richind employs interactive and engaging methods, including video lectures, quizzes, and hands-on projects.</p>
                            </div>
                        </div>
                        <a href="{{route('about')}}" class="richind-btn"><span class="richind-btn__curve"></span>Discover More<i class="icon-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End About Richind --}}

    {{-- Start Course Richind --}}
    <section class="category-one" style="background-image: url({{ asset('frontend/assets/images/shapes/category-bg-1.jpg') }});">
        <div class="container">
            <div class="section-title text-center">
                <h5 class="section-title__tagline">
                    Courses
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 133 13" fill="none">
                        <path d="M9.76794 0.395L0.391789 9.72833C-0.130596 10.2483 -0.130596 11.095 0.391789 11.615C0.914174 12.135 1.76472 12.135 2.28711 11.615L11.6633 2.28167C12.1856 1.76167 12.1856 0.915 11.6633 0.395C11.1342 -0.131667 10.2903 -0.131667 9.76794 0.395Z" fill="#F1F2FD" />
                        <path d="M23.1625 0.395L13.7863 9.72833C13.2639 10.2483 13.2639 11.095 13.7863 11.615C14.3087 12.135 15.1593 12.135 15.6816 11.615L25.0578 2.28167C25.5802 1.76167 25.5802 0.915 25.0578 0.395C24.5287 -0.131667 23.6849 -0.131667 23.1625 0.395Z" fill="#F1F2FD" />
                        <path d="M36.5569 0.395L27.1807 9.72833C26.6583 10.2483 26.6583 11.095 27.1807 11.615C27.7031 12.135 28.5537 12.135 29.076 11.615L38.4522 2.28167C38.9746 1.76167 38.9746 0.915 38.4522 0.395C37.9231 -0.131667 37.0793 -0.131667 36.5569 0.395Z" fill="#F1F2FD" />
                        <path d="M49.9514 0.395L40.5753 9.72833C40.0529 10.2483 40.0529 11.095 40.5753 11.615C41.0976 12.135 41.9482 12.135 42.4706 11.615L51.8467 2.28167C52.3691 1.76167 52.3691 0.915 51.8467 0.395C51.3176 -0.131667 50.4738 -0.131667 49.9514 0.395Z" fill="#F1F2FD" />
                        <path d="M63.3459 0.395L53.9698 9.72833C53.4474 10.2483 53.4474 11.095 53.9698 11.615C54.4922 12.135 55.3427 12.135 55.8651 11.615L65.2413 2.28167C65.7636 1.76167 65.7636 0.915 65.2413 0.395C64.7122 -0.131667 63.8683 -0.131667 63.3459 0.395Z" fill="#F1F2FD" />
                        <path d="M76.7405 0.395L67.3643 9.72833C66.8419 10.2483 66.8419 11.095 67.3643 11.615C67.8867 12.135 68.7373 12.135 69.2596 11.615L78.6358 2.28167C79.1582 1.76167 79.1582 0.915 78.6358 0.395C78.1067 -0.131667 77.2629 -0.131667 76.7405 0.395Z" fill="#F1F2FD" />
                        <path d="M90.1349 0.395L80.7587 9.72833C80.2363 10.2483 80.2363 11.095 80.7587 11.615C81.2811 12.135 82.1317 12.135 82.6541 11.615L92.0302 2.28167C92.5526 1.76167 92.5526 0.915 92.0302 0.395C91.5011 -0.131667 90.6573 -0.131667 90.1349 0.395Z" fill="#F1F2FD" />
                        <path d="M103.529 0.395L94.1533 9.72833C93.6309 10.2483 93.6309 11.095 94.1533 11.615C94.6756 12.135 95.5262 12.135 96.0486 11.615L105.425 2.28167C105.947 1.76167 105.947 0.915 105.425 0.395C104.896 -0.131667 104.052 -0.131667 103.529 0.395Z" fill="#F1F2FD" />
                        <path d="M116.924 0.395L107.548 9.72833C107.025 10.2483 107.025 11.095 107.548 11.615C108.07 12.135 108.921 12.135 109.443 11.615L118.819 2.28167C119.342 1.76167 119.342 0.915 118.819 0.395C118.29 -0.131667 117.446 -0.131667 116.924 0.395Z" fill="#F1F2FD" />
                        <path d="M130.318 0.395L120.942 9.72833C120.42 10.2483 120.42 11.095 120.942 11.615C121.465 12.135 122.315 12.135 122.838 11.615L132.214 2.28167C132.736 1.76167 132.736 0.915 132.214 0.395C131.685 -0.131667 130.841 -0.131667 130.318 0.395Z" fill="#F1F2FD" />
                    </svg>
                </h5>
                <h2 class="section-title__title">Our Courses</h2>
            </div>
            <div class="category-one__slider richind-owl__carousel owl-with-shadow owl-theme owl-carousel" data-owl-options='{"items": 4,"margin": 30,"smartSpeed": 700,"loop":true,"autoplay": true,"nav":false,"dots":true,"navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow\"></span>"],"responsive":{"0":{"items":1,"nav":true,"dots":false,"margin": 0},"670":{"nav":true,"dots":false,"items": 2},"992":{"items": 3},"1200":{"items": 4},"1400":{"items": 5,"margin": 30}}}'>
                @foreach ($courses as $course)
                    <div class="item">
                        <div class="category-one__item">
                            <div class="category-one__wrapper" style="background-image: url({{ asset('frontend/assets/images/shapes/category-shape.png') }});">
                                <div class="category-one__thumb"><img src="{{ asset('backend/img/course/'.$course->image) }}" onerror="this.onerror=null;this.src='{{ asset('frontend/assets/images/no-courses-2.jpg') }}'" alt="richind" /></div>
                                <div class="category-one__content">
                                    <div class="category-one__icon">
                                        <span class="icon-education"></span>
                                    </div>
                                    <h3 class="category-one__title"><a href="{{route('course.detail',$course->slug)}}"> {{$course->name}}</a></h3>
                                    <p class="category-one__text">{{$course->topic_count}} Topic</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- End Course Richind --}}

    {{-- Start Plan Richind --}}
    <section class="course-one" style="background-image: url({{ asset('frontend/assets/images/shapes/course-bg-1.png') }});">
        <div class="container">
            <div class="section-title text-center">
                <h5 class="section-title__tagline">
                    Best Packages
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 133 13" fill="none">
                        <path d="M9.76794 0.395L0.391789 9.72833C-0.130596 10.2483 -0.130596 11.095 0.391789 11.615C0.914174 12.135 1.76472 12.135 2.28711 11.615L11.6633 2.28167C12.1856 1.76167 12.1856 0.915 11.6633 0.395C11.1342 -0.131667 10.2903 -0.131667 9.76794 0.395Z" fill="#F1F2FD" />
                        <path d="M23.1625 0.395L13.7863 9.72833C13.2639 10.2483 13.2639 11.095 13.7863 11.615C14.3087 12.135 15.1593 12.135 15.6816 11.615L25.0578 2.28167C25.5802 1.76167 25.5802 0.915 25.0578 0.395C24.5287 -0.131667 23.6849 -0.131667 23.1625 0.395Z" fill="#F1F2FD" />
                        <path d="M36.5569 0.395L27.1807 9.72833C26.6583 10.2483 26.6583 11.095 27.1807 11.615C27.7031 12.135 28.5537 12.135 29.076 11.615L38.4522 2.28167C38.9746 1.76167 38.9746 0.915 38.4522 0.395C37.9231 -0.131667 37.0793 -0.131667 36.5569 0.395Z" fill="#F1F2FD" />
                        <path d="M49.9514 0.395L40.5753 9.72833C40.0529 10.2483 40.0529 11.095 40.5753 11.615C41.0976 12.135 41.9482 12.135 42.4706 11.615L51.8467 2.28167C52.3691 1.76167 52.3691 0.915 51.8467 0.395C51.3176 -0.131667 50.4738 -0.131667 49.9514 0.395Z" fill="#F1F2FD" />
                        <path d="M63.3459 0.395L53.9698 9.72833C53.4474 10.2483 53.4474 11.095 53.9698 11.615C54.4922 12.135 55.3427 12.135 55.8651 11.615L65.2413 2.28167C65.7636 1.76167 65.7636 0.915 65.2413 0.395C64.7122 -0.131667 63.8683 -0.131667 63.3459 0.395Z" fill="#F1F2FD" />
                        <path d="M76.7405 0.395L67.3643 9.72833C66.8419 10.2483 66.8419 11.095 67.3643 11.615C67.8867 12.135 68.7373 12.135 69.2596 11.615L78.6358 2.28167C79.1582 1.76167 79.1582 0.915 78.6358 0.395C78.1067 -0.131667 77.2629 -0.131667 76.7405 0.395Z" fill="#F1F2FD" />
                        <path d="M90.1349 0.395L80.7587 9.72833C80.2363 10.2483 80.2363 11.095 80.7587 11.615C81.2811 12.135 82.1317 12.135 82.6541 11.615L92.0302 2.28167C92.5526 1.76167 92.5526 0.915 92.0302 0.395C91.5011 -0.131667 90.6573 -0.131667 90.1349 0.395Z" fill="#F1F2FD" />
                        <path d="M103.529 0.395L94.1533 9.72833C93.6309 10.2483 93.6309 11.095 94.1533 11.615C94.6756 12.135 95.5262 12.135 96.0486 11.615L105.425 2.28167C105.947 1.76167 105.947 0.915 105.425 0.395C104.896 -0.131667 104.052 -0.131667 103.529 0.395Z" fill="#F1F2FD" />
                        <path d="M116.924 0.395L107.548 9.72833C107.025 10.2483 107.025 11.095 107.548 11.615C108.07 12.135 108.921 12.135 109.443 11.615L118.819 2.28167C119.342 1.76167 119.342 0.915 118.819 0.395C118.29 -0.131667 117.446 -0.131667 116.924 0.395Z" fill="#F1F2FD" />
                        <path d="M130.318 0.395L120.942 9.72833C120.42 10.2483 120.42 11.095 120.942 11.615C121.465 12.135 122.315 12.135 122.838 11.615L132.214 2.28167C132.736 1.76167 132.736 0.915 132.214 0.395C131.685 -0.131667 130.841 -0.131667 130.318 0.395Z" fill="#F1F2FD" />
                    </svg>
                </h5>
                <h2 class="section-title__title">Our Exclusive Packages</h2>
            </div>
            <div class="row">
                @foreach ($plans as $plan)
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="course-two__item">
                            <div class="course-two__thumb">
                                <img src="{{ asset('backend/img/plan/'.$plan->image) }}" alt="richind">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 353 177">
                                    <path d="M37 0C16.5655 0 0 16.5655 0 37V93.4816C0 103.547 4.00259 113.295 11.7361 119.737C54.2735 155.171 112.403 177 176.496 177C240.589 177 298.718 155.171 341.261 119.737C348.996 113.295 353 103.546 353 93.4795V37C353 16.5655 336.435 0 316 0H37Z" />
                                </svg>
                            </div>
                            <div class="course-two__content">
                                <div class="course-two__time">20 Hours</div>
                                <div class="course-two__ratings">
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span>
                                    <div class="course-two__ratings__reviews">(25 Reviews)</div>
                                </div>
                                <h3 class="course-two__title">
                                    <a href="{{route('checkout')}}?slug={{$plan->slug}}">{{$plan->title}}</a>
                                </h3>
                                <div class="course-two__bottom">
                                    <div class="course-two__meta">
                                        <h4 class="course-two__meta__price">₹ {{$plan->discounted_price}} <del>{{$plan->amount}}</del> </h4>
                                        <p class="course-two__meta__class"><i class="fas fa-image"></i> {{count($plan->course_ids)}} Courses</p>
                                    </div>
                                    <div class="course-two__author">
                                        <a href="{{route('checkout')}}?slug={{$plan->slug}}" class="richind-btn py-2 px-3"><span class="richind-btn__curve"></span>Buy <i class="icon-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- End Plan Richind --}}

    {{-- About Start --}}
    <section class="about-three">
            <div class="container">
                <div class="row">
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="100ms">
                        <div class="about-three__thumb mb-3">
                            <div class="about-three__thumb__one eduact-tilt">
                                <img src="{{ asset('frontend/assets/images/resources/about-3-1.jpg')}}" alt="eduact">
                            </div>
                            <div class="about-three__thumb__shape-one"></div>
                            <div class="about-three__thumb__shape-three"><span></span><span></span><span></span><span></span><span></span></div><!-- /.about-shape-three -->
                            <div class="about-three__thumb__shape-four"><img src="{{ asset('frontend/assets/images/shapes/about-3-shape-1.png')}}" alt="eduact" /></div><!-- /.about-shape-four -->
                            <div class="about-three__thumb__shape-five"><span></span><span></span><span></span><span></span><span></span></div><!-- /.about-shape-five -->
                            <div class="about-three__thumb__shape-six"><span></span><span></span><span></span><span></span><span></span></div><!-- /.about-shape-six -->
                            <div class="about-three__thumb__shape-seven"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="100ms">
                        <div class="about-three__content">
                            <div class="section-title">
                                <h5 class="section-title__tagline">
                                    About
                                    <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 13">
                                        <g clip-path="url(#clip0_324_36194)">
                                            <path d="M10.5406 6.49995L0.700562 12.1799V8.56995L4.29056 6.49995L0.700562 4.42995V0.819946L10.5406 6.49995Z" />
                                            <path d="M25.1706 6.49995L15.3306 12.1799V8.56995L18.9206 6.49995L15.3306 4.42995V0.819946L25.1706 6.49995Z" />
                                            <path d="M39.7906 6.49995L29.9506 12.1799V8.56995L33.5406 6.49995L29.9506 4.42995V0.819946L39.7906 6.49995Z" />
                                            <path d="M54.4206 6.49995L44.5806 12.1799V8.56995L48.1706 6.49995L44.5806 4.42995V0.819946L54.4206 6.49995Z" />
                                        </g>
                                    </svg>
                                </h5>
                                <h2 class="section-title__title">CEO & Founder of RichInd <br> Mr. Yash kulshrestha</h2>
                            </div>
                            <p class="about-three__content__text">
                            Yash kulshrestha is one of the Youngest Entrepreneur and YouTuber from India. He started his journey since 2018. He has 5 years Experience about Sales And Law of attraction. He love to share his knowledge with youth. <br> He has helped more than 20K+ students in learning new skill. He is guiding now 10k people about social media marketing in this company.
                            </p>
                            <div class="about-three__box">
                                <div class="about-three__box__icon"><span class="icon-Presentation"></span></div>
                                <h4 class="about-three__box__title">Inspiring Leader</h4>
                                <p class="about-three__box__text">
                                With a wealth of experience and a passion for transformative education, Mr. Yash kulshrestha has been leading RichInd since its inception.
                                </p>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="about-three__info">
                                        <div class="about-three__info__icon"><span class="icon-Call"></span></div>
                                        <p class="about-three__info__text">Need to Know More Details?</p>
                                        <h4 class="about-three__info__title"><a href="tel:6395350946">+91-6395350946</a></h4>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- About End --}}

    {{-- Start Account Richind --}}
    <section class="counter-one" style="background-image: url({{ asset('frontend/assets/images/shapes/counter-bg-1..jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="200ms">
                    <div class="counter-one__left">
                        <h4 class="counter-one__left__title">Join the Richind Community</h4>
                        <div class="counter-one__left__content">
                        Learning is not just an individual journey; it's a community experience. Connect with fellow learners, share insights, and collaborate on projects within the vibrant Richind community. Together, we're building a network of digital pioneers.
                        </div>
                        <a href="{{route('index')}}" class="richind-btn richind-btn-second"><span class="richind-btn__curve"></span>Join Now<i class="icon-arrow"></i></a>
                        <img src="{{ asset('frontend/assets/images/shapes/counter-dot.png') }}" alt="richind">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="counter-one__shapes wow fadeInUp" data-wow-delay="200ms">
                        <svg viewBox="0 0 581 596" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M161.37 12.301C221.003 -53.0048 563.794 156.411 579.671 299.209C595.548 442.007 237.88 668.171 135.305 571.868C46.2938 488.252 -0.524429 189.658 161.37 12.301Z" fill="url(#paint0_linear_227_946)" />
                            <path d="M289.511 579.243C203.626 594.241 -34.778 302.771 4.28926 182.908C43.3565 63.0458 313.639 12.301 483.973 114.853C666.745 224.904 435.092 553.933 289.511 579.243Z" fill="url(#paint1_linear_227_946)" />
                            <defs>
                                <linearGradient id="paint0_linear_227_946" x1="172.303" y1="27.9012" x2="521.418" y2="508.929" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#4F5DE4" stop-opacity="0" />
                                    <stop offset="0.269374" stop-color="#9EA6F0" stop-opacity="0.550859" />
                                    <stop offset="1" stop-color="white" stop-opacity="0" />
                                </linearGradient>
                                <linearGradient id="paint1_linear_227_946" x1="123.876" y1="84.092" x2="408.261" y2="553.853" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#FF7200" />
                                    <stop offset="1" stop-color="white" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="counter-one__area wow zoomIn" data-wow-delay="400ms">
                        <h5 class="counter-one__title">Register Now and<br> Get a <span>50% Discount</span></h5>
                        <ul class="counter-one__list list-unstyled" data-leading-zeros="true" data-enable-days="true" data-deadline-date="dynamicDate"></ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Account Richind --}}

    {{-- Start Testimonial Richind --}}
    <section class="testimonial-one">
        <div class="container">
            <div class="section-title text-center">
                <h5 class="section-title__tagline">
                    Testimonial
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 133 13" fill="none">
                        <path d="M9.76794 0.395L0.391789 9.72833C-0.130596 10.2483 -0.130596 11.095 0.391789 11.615C0.914174 12.135 1.76472 12.135 2.28711 11.615L11.6633 2.28167C12.1856 1.76167 12.1856 0.915 11.6633 0.395C11.1342 -0.131667 10.2903 -0.131667 9.76794 0.395Z" fill="#F1F2FD" />
                        <path d="M23.1625 0.395L13.7863 9.72833C13.2639 10.2483 13.2639 11.095 13.7863 11.615C14.3087 12.135 15.1593 12.135 15.6816 11.615L25.0578 2.28167C25.5802 1.76167 25.5802 0.915 25.0578 0.395C24.5287 -0.131667 23.6849 -0.131667 23.1625 0.395Z"  fill="#F1F2FD" />
                        <path d="M36.5569 0.395L27.1807 9.72833C26.6583 10.2483 26.6583 11.095 27.1807 11.615C27.7031 12.135 28.5537 12.135 29.076 11.615L38.4522 2.28167C38.9746 1.76167 38.9746 0.915 38.4522 0.395C37.9231 -0.131667 37.0793 -0.131667 36.5569 0.395Z" fill="#F1F2FD" />
                        <path d="M49.9514 0.395L40.5753 9.72833C40.0529 10.2483 40.0529 11.095 40.5753 11.615C41.0976 12.135 41.9482 12.135 42.4706 11.615L51.8467 2.28167C52.3691 1.76167 52.3691 0.915 51.8467 0.395C51.3176 -0.131667 50.4738 -0.131667 49.9514 0.395Z" fill="#F1F2FD" />
                        <path d="M63.3459 0.395L53.9698 9.72833C53.4474 10.2483 53.4474 11.095 53.9698 11.615C54.4922 12.135 55.3427 12.135 55.8651 11.615L65.2413 2.28167C65.7636 1.76167 65.7636 0.915 65.2413 0.395C64.7122 -0.131667 63.8683 -0.131667 63.3459 0.395Z" fill="#F1F2FD" />
                        <path d="M76.7405 0.395L67.3643 9.72833C66.8419 10.2483 66.8419 11.095 67.3643 11.615C67.8867 12.135 68.7373 12.135 69.2596 11.615L78.6358 2.28167C79.1582 1.76167 79.1582 0.915 78.6358 0.395C78.1067 -0.131667 77.2629 -0.131667 76.7405 0.395Z" fill="#F1F2FD" />
                        <path d="M90.1349 0.395L80.7587 9.72833C80.2363 10.2483 80.2363 11.095 80.7587 11.615C81.2811 12.135 82.1317 12.135 82.6541 11.615L92.0302 2.28167C92.5526 1.76167 92.5526 0.915 92.0302 0.395C91.5011 -0.131667 90.6573 -0.131667 90.1349 0.395Z" fill="#F1F2FD" />
                        <path d="M103.529 0.395L94.1533 9.72833C93.6309 10.2483 93.6309 11.095 94.1533 11.615C94.6756 12.135 95.5262 12.135 96.0486 11.615L105.425 2.28167C105.947 1.76167 105.947 0.915 105.425 0.395C104.896 -0.131667 104.052 -0.131667 103.529 0.395Z" fill="#F1F2FD" />
                        <path d="M116.924 0.395L107.548 9.72833C107.025 10.2483 107.025 11.095 107.548 11.615C108.07 12.135 108.921 12.135 109.443 11.615L118.819 2.28167C119.342 1.76167 119.342 0.915 118.819 0.395C118.29 -0.131667 117.446 -0.131667 116.924 0.395Z" fill="#F1F2FD" />
                        <path d="M130.318 0.395L120.942 9.72833C120.42 10.2483 120.42 11.095 120.942 11.615C121.465 12.135 122.315 12.135 122.838 11.615L132.214 2.28167C132.736 1.76167 132.736 0.915 132.214 0.395C131.685 -0.131667 130.841 -0.131667 130.318 0.395Z" fill="#F1F2FD" />
                    </svg>
                </h5>
                <h2 class="section-title__title">What Our Student Feedback</h2>
            </div>
            <div class="testimonial-one__area">
                <div class="testimonial-one__carousel richind-owl__carousel owl-with-shadow owl-theme owl-carousel" data-owl-options='{"items": 1,"margin": 0,"smartSpeed": 700,"loop":true,"autoplay": true,"nav":true,"dots":false,"navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow\"></span>"]}'>
                    @foreach ($reviews as $review)
                        <div class="item">
                            <div class="testimonial-one__item">
                                <div class="testimonial-one__author">
                                    <img src="{{ asset('backend/img/reviews/'.$review->image) }}" onerror="this.onerror=null;this.src='{{ asset('frontend/assets/images/profile.png') }}'" alt="richind">
                                </div>
                                <div class="testimonial-one__content">
                                    <div class="testimonial-one__quote">
                                        {{$review->message}}
                                    </div>
                                    <div class="testimonial-one__meta">
                                        <h5 class="testimonial-one__title">{{$review->name}}</h5>
                                        <span class="testimonial-one__designation">{{$review->designation}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="testimonial-one__thumb wow fadeInUp" data-wow-delay="200ms">
                    <img src="{{ asset('frontend/assets/images/resources/testimonial-1.png') }}" alt="richind">
                    <svg viewBox="0 0 612 563" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M595.211 330.916C584.04 315.536 581.185 295.533 588.393 277.948C591.708 269.857 593.359 260.893 592.899 251.505C591.377 220.18 566.027 194.704 534.708 192.994C534.495 192.982 534.283 192.971 534.071 192.959C520.328 192.346 507.517 185.776 499.106 174.89C498.458 174.053 497.809 173.215 497.148 172.39C485.069 157.234 481.695 137.196 487.463 118.703C489.268 112.9 490.07 106.661 489.634 100.174C487.923 74.7337 467.02 54.3769 441.54 53.2801C426.665 52.6432 413.147 58.4459 403.521 68.129C386.44 85.3367 363.449 95.4207 339.207 95.1495C338.429 95.1377 337.638 95.1377 336.86 95.1377C332.79 95.1377 328.803 95.2674 321.631 94.4418C300.244 91.9768 280.473 82.2348 264.76 67.5039C244.483 48.4916 216.997 37.063 186.846 37.7471C129.15 39.0563 80.9264 88.6391 79.2159 146.325C77.9301 189.774 109.827 226.101 118.757 239.239C145.441 278.431 123.193 329.536 93.867 364.199C75.677 385.7 64.8598 413.652 65.3434 444.14C66.3697 509.161 119.548 562.153 184.581 562.99C207.784 563.285 229.501 557.046 248.021 545.995C285.428 523.668 327.033 509.161 370.031 502.167C393.635 498.323 415.883 490.456 436.043 479.275C458.739 466.69 485.128 461.914 510.702 466.337C516.117 467.268 521.708 467.705 527.429 467.575C573.659 466.537 611.16 428.513 611.584 382.279C611.773 363.067 605.663 345.316 595.211 330.916Z" fill="#4F5DE4" />
                        <path d="M103.524 314.265C122.402 295.39 122.402 264.788 103.524 245.913C84.6458 227.038 54.038 227.038 35.1597 245.913C16.2814 264.788 16.2814 295.39 35.1597 314.265C54.038 333.14 84.6458 333.14 103.524 314.265Z" fill="#4F5DE4" />
                        <path d="M519.408 173.899C529.715 173.899 538.07 165.546 538.07 155.241C538.07 144.936 529.715 136.582 519.408 136.582C509.101 136.582 500.746 144.936 500.746 155.241C500.746 165.546 509.101 173.899 519.408 173.899Z" fill="#4F5DE4" />
                        <path d="M404.941 42.6715C408.221 39.3921 408.221 34.0752 404.941 30.7958C401.661 27.5164 396.343 27.5164 393.063 30.7958C389.783 34.0752 389.783 39.3921 393.063 42.6715C396.343 45.9509 401.661 45.9509 404.941 42.6715Z" fill="#4F5DE4" />
                        <path d="M450.459 39.6567C457.747 32.3702 457.747 20.5565 450.459 13.27C443.171 5.98349 431.355 5.9835 424.067 13.27C416.78 20.5565 416.78 32.3703 424.067 39.6568C431.355 46.9433 443.171 46.9432 450.459 39.6567Z" fill="#4F5DE4" />
                        <path d="M469.475 508.914C476.947 508.914 483.005 502.857 483.005 495.386C483.005 487.914 476.947 481.858 469.475 481.858C462.002 481.858 455.944 487.914 455.944 495.386C455.944 502.857 462.002 508.914 469.475 508.914Z" fill="#4F5DE4" />
                        <path d="M341.696 525.638C343.481 525.638 344.929 524.191 344.929 522.406C344.929 520.621 343.481 519.175 341.696 519.175C339.911 519.175 338.464 520.621 338.464 522.406C338.464 524.191 339.911 525.638 341.696 525.638Z" fill="url(#paint0_linear_187_13357)" />
                    </svg>
                    <div class="testimonial-one__thumb-pen wow fadeInUp" data-wow-delay="400ms">
                        <img src="{{ asset('frontend/assets/images/shapes/testimonial-shape-1.png') }}" alt="richind">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Testimonial Richind --}}

    {{-- Start Team Member Richind --}}
    <section class="team-page">
            <div class="container">

            </div>
        </section>
    <section class="team-one" style="background-image: url({{ asset('frontend/assets/images/shapes/team-bg-1.png') }});">
        <div class="container">
            <div class="section-title text-center wow fadeInUp" data-wow-delay="100ms">
                <h5 class="section-title__tagline">
                    Team Member
                    <svg viewBox="0 0 170 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.4101 0.395L1.034 9.72833C0.511616 10.2483 0.511616 11.095 1.034 11.615C1.55639 12.135 2.40694 12.135 2.92932 11.615L12.3055 2.28167C12.8279 1.76167 12.8279 0.915 12.3055 0.395C11.7764 -0.131667 10.9325 -0.131667 10.4101 0.395Z" fill="white" />
                        <path d="M23.4652 0.395L14.0891 9.72833C13.5667 10.2483 13.5667 11.095 14.0891 11.615C14.6114 12.135 15.462 12.135 15.9844 11.615L25.3605 2.28167C25.8829 1.76167 25.8829 0.915 25.3605 0.395C24.8314 -0.131667 23.9876 -0.131667 23.4652 0.395Z" fill="white" />
                        <path d="M36.5203 0.395L27.1441 9.72833C26.6217 10.2483 26.6217 11.095 27.1441 11.615C27.6665 12.135 28.517 12.135 29.0394 11.615L38.4156 2.28167C38.938 1.76167 38.938 0.915 38.4156 0.395C37.8865 -0.131667 37.0426 -0.131667 36.5203 0.395Z" fill="white" />
                        <path d="M49.5753 0.395L40.1992 9.72833C39.6768 10.2483 39.6768 11.095 40.1992 11.615C40.7215 12.135 41.5721 12.135 42.0945 11.615L51.4706 2.28167C51.993 1.76167 51.993 0.915 51.4706 0.395C50.9415 -0.131667 50.0977 -0.131667 49.5753 0.395Z" fill="white" />
                        <path d="M62.6304 0.395L53.2542 9.72833C52.7318 10.2483 52.7318 11.095 53.2542 11.615C53.7766 12.135 54.6272 12.135 55.1495 11.615L64.5257 2.28167C65.0481 1.76167 65.0481 0.915 64.5257 0.395C63.9966 -0.131667 63.1527 -0.131667 62.6304 0.395Z" fill="white" />
                        <path d="M75.6854 0.395L66.3093 9.72833C65.7869 10.2483 65.7869 11.095 66.3093 11.615C66.8317 12.135 67.6822 12.135 68.2046 11.615L77.5807 2.28167C78.1031 1.76167 78.1031 0.915 77.5807 0.395C77.0517 -0.131667 76.2078 -0.131667 75.6854 0.395Z" fill="white" />
                        <path d="M88.7405 0.395L79.3643 9.72833C78.8419 10.2483 78.8419 11.095 79.3643 11.615C79.8867 12.135 80.7373 12.135 81.2596 11.615L90.6358 2.28167C91.1582 1.76167 91.1582 0.915 90.6358 0.395C90.1067 -0.131667 89.2629 -0.131667 88.7405 0.395Z" fill="white" />
                        <path d="M101.796 0.395L92.4194 9.72833C91.897 10.2483 91.897 11.095 92.4194 11.615C92.9418 12.135 93.7923 12.135 94.3147 11.615L103.691 2.28167C104.213 1.76167 104.213 0.915 103.691 0.395C103.162 -0.131667 102.318 -0.131667 101.796 0.395Z" fill="white" />
                        <path d="M114.85 0.395L105.474 9.72833C104.952 10.2483 104.952 11.095 105.474 11.615C105.997 12.135 106.847 12.135 107.37 11.615L116.746 2.28167C117.268 1.76167 117.268 0.915 116.746 0.395C116.217 -0.131667 115.373 -0.131667 114.85 0.395Z" fill="white" />
                        <path d="M127.906 0.395L118.529 9.72833C118.007 10.2483 118.007 11.095 118.529 11.615C119.052 12.135 119.902 12.135 120.425 11.615L129.801 2.28167C130.323 1.76167 130.323 0.915 129.801 0.395C129.272 -0.131667 128.428 -0.131667 127.906 0.395Z" fill="white" />
                        <path d="M140.961 0.395L131.584 9.72833C131.062 10.2483 131.062 11.095 131.584 11.615C132.107 12.135 132.957 12.135 133.48 11.615L142.856 2.28167C143.378 1.76167 143.378 0.915 142.856 0.395C142.327 -0.131667 141.483 -0.131667 140.961 0.395Z" fill="white" />
                        <path d="M154.016 0.395L144.639 9.72833C144.117 10.2483 144.117 11.095 144.639 11.615C145.162 12.135 146.012 12.135 146.535 11.615L155.911 2.28167C156.433 1.76167 156.433 0.915 155.911 0.395C155.382 -0.131667 154.538 -0.131667 154.016 0.395Z" fill="white" />
                        <path d="M167.071 0.395L157.695 9.72833C157.172 10.2483 157.172 11.095 157.695 11.615C158.217 12.135 159.067 12.135 159.59 11.615L168.966 2.28167C169.488 1.76167 169.488 0.915 168.966 0.395C168.437 -0.131667 167.593 -0.131667 167.071 0.395Z" fill="white" />
                    </svg>
                </h5>
                <h2 class="section-title__title">Meet Our Professional Team Members</h2>
            </div>
            <div class="team-page__carousel richind-owl__carousel richind-owl__dots owl-theme owl-carousel" data-owl-options='{
            "items": 3,
            "margin": 30,
            "smartSpeed": 700,
            "loop":true,
            "autoplay": true,
            "nav":false,
            "dots":true,
            "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow\"></span>"],
            "responsive":{
                "0":{
                    "items":1,
                    "margin": 0
                },
                "700":{
                    "items": 2
                },
                "992":{
                    "items": 4
                },
                "1400":{
                    "margin": 30
                }
            }
            }'>
                @foreach ($instructors as $instructor)
                    <div class="item">
                        <div class="team-two__item">
                            <div class="team-two__image">
                            <img src="{{ asset('backend/img/instructors/'.$instructor->image) }}" onerror="this.onerror=null;this.src='{{ asset('frontend/assets/images/profile.png') }}'" alt="richind">
                            </div><!-- /.team-image -->
                            <div class="team-two__content">
                                <h3 class="team-two__title">
                                    <a href="team-details.html">{{$instructor->name}}</a>
                                </h3><!-- /.team-name -->
                                <span class="team-two__designation">{{$instructor->designation}}</span><!-- /.team-designation -->
                                <div class="team-two__social">
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                </div><!-- /.team-social -->
                            </div><!-- /.team-content -->
                        </div><!-- /.team-two -->
                    </div>
                @endforeach
                </div>
        </div>
    </section>
    {{-- End Team Member Richind --}}

    {{-- Start Certificate Richind --}}
    <section class="cta-three" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="cta-three__bg jarallax-img" style="background-image: url({{ asset('frontend/assets/images/backgrounds/cta-bg-3.jpg') }});">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInLeft" data-wow-delay="200ms">
                    <div class="cta-three__thumb"><img src="{{ asset('frontend/assets/images/shapes/cta-3-1.png') }}" alt="richind" /></div>
                    <h3 class="cta-three__title"><span>Skills Certificate</span><br> From the <span>richind</span></h3>
                </div>
                <div class="col-md-6 wow fadeInRight" data-wow-delay="300ms">
                    <div class="cta-three__btn"><a href="#" class="richind-btn"><span class="richind-btn__curve"></span>Get In Touch</a></div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Certificate Richind --}}

    {{-- Start FAQ Richind --}}
    <section class="accrodion-one">
        <div class="container">
            <div class="section-title  text-center">
                <h5 class="section-title__tagline">
                    Our Recent FAQS
                    <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 13">
                        <g clip-path="url(#clip0_324_36194)">
                            <path d="M10.5406 6.49995L0.700562 12.1799V8.56995L4.29056 6.49995L0.700562 4.42995V0.819946L10.5406 6.49995Z" />
                            <path d="M25.1706 6.49995L15.3306 12.1799V8.56995L18.9206 6.49995L15.3306 4.42995V0.819946L25.1706 6.49995Z" />
                            <path d="M39.7906 6.49995L29.9506 12.1799V8.56995L33.5406 6.49995L29.9506 4.42995V0.819946L39.7906 6.49995Z" />
                            <path d="M54.4206 6.49995L44.5806 12.1799V8.56995L48.1706 6.49995L44.5806 4.42995V0.819946L54.4206 6.49995Z" />
                        </g>
                    </svg>
                </h5>
                <h2 class="section-title__title">Frequently Asked Question & <br>Answers Here</h2>
            </div>
            <div class="accrodion-one__wrapper richind-accrodion" data-grp-name="richind-accrodion">
                @foreach ($faqs as $faq_key=>$faq)
                    <div class="accrodion @if($faq_key == 0) active @endif">
                        <span class="accrodion__icon"></span>
                        <div class="accrodion-title">
                            <h4>{{$faq_key+1}}. {{$faq->title}}</h4>
                        </div>
                        <div class="accrodion-content">
                            <div class="inner">
                                {!!$faq->content!!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Start FAQ Richind --}}

    <div class="rbt-section-gap bg-white" style="background-image: url({{ asset('frontend/assets/images/shapes/course-bg-3.png')}});">
        <div class="wrapper">
            <div class="section-title text-center">
                <h2 class="section-title__title">Explore New Digital Skills</h2>
            </div>
            <div class="scroll-animation-all-wrapper">
                <div class="scroll-animation-wrapper">
                    <div class="scroll-animation scroll-right-left">
                        <div class="single-column-100">
                            <div class="rbt-categori-list">
                                <a href="#"><i class="ri-book-line"></i> mindset</a>
                                <a href="#"><i class="ri-book-line"></i> goal setting</a>
                                <a href="#"><i class="ri-book-line"></i> followup</a>
                                <a href="#"><i class="ri-book-line"></i> closing</a>
                                <a href="#"><i class="ri-book-line"></i> Build Design</a>
                                <a href="#"><i class="ri-book-line"></i> Interior Designing</a>
                                <a href="#"><i class="ri-book-line"></i> Design Drafting</a>
                                <a href="#"><i class="ri-book-line"></i> 2D Drawing</a>
                                <a href="#"><i class="ri-book-line"></i> Drafting Software</a>
                                <a href="#"><i class="ri-book-line"></i> Engineering Design</a>
                                <a href="#"><i class="ri-book-line"></i> Architectural Design</a>
                                <a href="#"><i class="ri-book-line"></i> Pre Design</a>
                                <a href="#"><i class="ri-book-line"></i> Graphic Designing</a>
                                <a href="#"><i class="ri-book-line"></i> Mobile Editing</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="scroll-animation-wrapper mt--30">
                    <div class="scroll-animation scroll-left-right">
                        <div class="single-column-100">
                            <div class="rbt-categori-list">
                                <a href="#"><i class="ri-book-line"></i> SEO</a>
                                <a href="#"><i class="ri-book-line"></i> Blogging</a>
                                <a href="#"><i class="ri-book-line"></i> Web Development</a>
                                <a href="#"><i class="ri-book-line"></i> Fb Ads</a>
                                <a href="#"><i class="ri-book-line"></i> Google Ads</a>
                                <a href="#"><i class="ri-book-line"></i> Online Marketing</a>
                                <a href="#"><i class="ri-book-line"></i> Influencer</a>
                                <a href="#"><i class="ri-book-line"></i> Followers</a>
                                <a href="#"><i class="ri-book-line"></i> Trend</a>
                                <a href="#"><i class="ri-book-line"></i> Massive leads</a>
                                <a href="#"><i class="ri-book-line"></i> Lead generation</a>
                                <a href="#"><i class="ri-book-line"></i> Qualified Leads</a>
                                <a href="#"><i class="ri-book-line"></i> Lead Magnet</a>
                                <a href="#"><i class="ri-book-line"></i> Lead Campaign</a>
                                <a href="#"><i class="ri-book-line"></i> Lead Acquisition</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="scroll-animation-wrapper mt--30">
                    <div class="scroll-animation scroll-right-left">
                        <div class="single-column-100">
                            <div class="rbt-categori-list">
                                <a href="#"><i class="ri-book-line"></i> Data Analysis</a>
                                <a href="#"><i class="ri-book-line"></i> Video editing</a>
                                <a href="#"><i class="ri-book-line"></i> Remove background</a>
                                <a href="#"><i class="ri-book-line"></i> English</a>
                                <a href="#"><i class="ri-book-line"></i> communication</a>
                                <a href="#"><i class="ri-book-line"></i> speaking</a>
                                <a href="#"><i class="ri-book-line"></i> WordPress Web Development</a>
                                <a href="#"><i class="ri-book-line"></i> Domain and hosting</a>
                                <a href="#"><i class="ri-book-line"></i> E-commerce sites</a>
                                <a href="#"><i class="ri-book-line"></i> Plugins</a>
                                <a href="#"><i class="ri-book-line"></i> Informative websites</a>
                                <a href="#"><i class="ri-book-line"></i> Proficient developer</a>
                                <a href="#"><i class="ri-book-line"></i> Youtube</a>
                                <a href="#"><i class="ri-book-line"></i> Content Creation</a>
                                <a href="#"><i class="ri-book-line"></i> Viral on Youtube</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

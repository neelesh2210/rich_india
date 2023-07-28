@extends('frontend.layouts.app')
@section('content')
<!-- Start Page Banner Area -->
        <div class="page-banner-area">
            <div class="container">
                <div class="page-banner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-6">
                            <h2>About us</h2>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <ul>
                                <li> <a href="/">Home</a></li>
                                <li>About</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Banner Area -->

        <!-- Start About Page Area -->
        <div class="ptb-50">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="main-banner-video-content" data-aos="fade-right" data-aos-duration="500" data-aos-duration="500" data-aos-once="true">
                            <h1 class="text-dark">About <span>The Success Preneur</span></h1>
                            <span class="animate-border"></span>
                            {{-- <p class="text">The Success Preneur: An E-learning Digital Skill Platform <i class="ri-bear-smile-line "></i> ...</p> --}}
                            <p>Welcome to The Success Preneur! We are a team of passionate professionals dedicated to providing high-quality Digital Courses and exceptional customer experiences. With years of experience in our industry, we strive to stay at the forefront of innovation and constantly improve our offerings.</p>
                                <p><b>Mission :</b>Our mission is to exceed your expectations and build lasting relationships with our valued customers.</p>
                                <p><b>Vision :</b>Our vision is create more educated entrepreneurs and to promote startup and culture in India.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="founder-tsp mt-4">
                <div class="container">
                    <div class="section-title text-center">
                        <h2 style="color:black">Founders At The Success Preneur </h2>
                        <span class="animate-border"></span>
                    </div>
                    <div class="team-slides owl-carousel owl-theme">
                        @foreach (App\Models\Admin\Instructor::orderBy('id','desc')->get() as $instructor)
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
            </div>
        </div>
        <!-- End About Page Area -->

        @endsection

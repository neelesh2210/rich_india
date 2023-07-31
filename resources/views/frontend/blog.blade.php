@extends('frontend.layouts.app')
@section('content')
<section class="course-content blogs-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                                        <div class='col-12 col-lg-6 col-xl-4 col-sm-6 mb-3'>
                        <div class='blog grid-blog'>
                            <div class='blog-image'>
                                <a href="{{route('blog_details')}}" title="Richind-Mastering-the-Digital-Media-Landscape-with-Richin">
                                    <img src="{{ asset('frontend/assets/images/course/Courses1.png')}}" title="Richind-Mastering-the-Digital-Media-Landscape-with-Richin" class='img-fluid'>
                                </a>
                            </div>
                            <div class='blog-grid-box'>
                                <div class='blog-info clearfix'>
                                    <div class='post-left'>
                                        <ul>
                                            <li>
                                                <img class='img-fluid w__20' src='{{ asset('frontend/assets/images/Calender.svg')}}' alt='Posted On'>Jan 24,2023                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h3 class='blog-title'>
                                    <a href="{{route('blog_details')}}" title="Richind-Mastering-the-Digital-Media-Landscape-with-Richin">
                                        Mastering the Digital Media Landscape with Richin                                    </a>
                                </h3>
                                <div class='blog-content blog-read'>
                                    <p class='txt-ellipsis-2'><p>I define the goals and objectives of the counseling sessions in a very transparent manner to help patients overcome their problems quickly and effe</p>
                                    <a href="{{route('blog_details')}}" title="Richind-Mastering-the-Digital-Media-Landscape-with-Richin" class='read-more btn btn-primary'>
                                        Read More <i class='fas fa-arrow-right'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class='col-12 col-lg-6 col-xl-4 col-sm-6 mb-3'>
                        <div class='blog grid-blog'>
                            <div class='blog-image'>
                                <a href="{{route('blog_details')}}" title="Richind-Demo2">
                                    <img src="{{ asset('frontend/assets/images/course/Courses2.png')}}" alt="Richind-Demo2" title="Richind-Demo2" class='img-fluid'>
                                </a>
                            </div>
                            <div class='blog-grid-box'>
                                <div class='blog-info clearfix'>
                                    <div class='post-left'>
                                        <ul>
                                            <li>
                                                <img class='img-fluid w__20' src='{{ asset('frontend/assets/images/Calender.svg')}}' alt='Posted On'>Jan 24,2023                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h3 class='blog-title'>
                                    <a href="{{route('blog_details')}}" title="Richind-Demo2">
                                        Demo2                                    </a>
                                </h3>
                                <div class='blog-content blog-read'>
                                    <p class='txt-ellipsis-2'><p>I define the goals and objectives of the counseling sessions in a very transparent manner to help patients overcome their problems quickly and effe</p>
                                    <a href="{{route('blog_details')}}" title="Richind-Demo2" class='read-more btn btn-primary'>
                                        Read More <i class='fas fa-arrow-right'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class='col-12 col-lg-6 col-xl-4 col-sm-6 mb-3'>
                        <div class='blog grid-blog'>
                            <div class='blog-image'>
                                <a href="{{route('blog_details')}}" title="Richind-Dewmo3">
                                    <img src="{{ asset('frontend/assets/images/course/Courses3.png')}}" alt="Richind-Dewmo3" title="Richind-Dewmo3" class='img-fluid'>
                                </a>
                            </div>
                            <div class='blog-grid-box'>
                                <div class='blog-info clearfix'>
                                    <div class='post-left'>
                                        <ul>
                                            <li>
                                                <img class='img-fluid w__20' src='{{ asset('frontend/assets/images/Calender.svg')}}' alt='Posted On'>Jan 24,2023                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h3 class='blog-title'>
                                    <a href="{{route('blog_details')}}" title="Richind-Dewmo3">
                                        Dewmo3                                    </a>
                                </h3>
                                <div class='blog-content blog-read'>
                                    <p class='txt-ellipsis-2'><p>I define the goals and objectives of the counseling sessions in a very transparent manner to help patients overcome their problems quickly and effe</p>
                                    <a href="{{route('blog_details')}}" title="Richind-Dewmo3" class='read-more btn btn-primary'>
                                        Read More <i class='fas fa-arrow-right'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    </div>
            </div>
        </div>
    </div>
</section>
@endsection

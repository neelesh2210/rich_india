@extends('frontend.layouts.app')
@section('content')
<section class="course-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-12">
                <div class="blog blog-detail">
                    <div class="blog-image">
                        <img src="{{ asset('frontend/assets/images/course/Courses2.png')}}" alt="Richind-Demo2" title="Richind-Demo2" class='img-fluid'>
                    </div>
                    <div class="blog-info clearfix">
                        <div class="post-left">
                            <ul>
                                <li class="d-sm-block">
                                    <img class='img-fluid w__20' src='{{ asset('frontend/assets/images/Calender.svg')}}' alt='Posted On'>Jan 24,2023                                </li>
                            </ul>
                        </div>
                    </div>
                    <h3 class="blog-title">
                        <a href="javascript:void(0)">Demo2</a>
                    </h3>
                    <div class="blog-content">
                        <p>I define the goals and objectives of the counseling sessions in a very transparent manner to help patients overcome their problems quickly and effectively, and get the new lease of life they came...</p>                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

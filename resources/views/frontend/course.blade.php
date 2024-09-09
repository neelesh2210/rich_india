@extends('frontend.layouts.app')
@section('content')
    <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('frontend/assets/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">All Courses</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{route('index')}}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Courses</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape-wrap">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape01.svg') }}" alt="img" class="alltuchtopdown">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape02.svg') }}" alt="img" data-aos="fade-right" data-aos-delay="300">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape03.svg') }}" alt="img" data-aos="fade-up" data-aos-delay="400">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape04.svg') }}" alt="img" data-aos="fade-down-left" data-aos-delay="400">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape05.svg') }}" alt="img" data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>

    <section class="all-courses-area section-py-120">
        <div class="container">
            <div class="row">
                @foreach (App\Models\Admin\Course::where('delete_status','0')->where('status','1')->withCount('topic')->get() as $course)
                    <div class="col-md-3">
                        <div class="courses__item shine__animate-item">
                            <div class="courses__item-thumb">
                                <a href="{{route('course.detail',$course->slug)}}" class="shine__animate-link">
                                    <img src="{{ asset('backend/img/course/'.$course->image) }}" alt="img">
                                </a>
                            </div>
                            <div class="courses__item-content">
                                <ul class="courses__item-meta list-wrap">
                                    <li class="courses__item-tag">
                                        <a href="{{route('course.detail',$course->slug)}}">{{$course->tag}}</a>
                                    </li>
                                    <li class="avg-rating"><i class="fas fa-star"></i> ({{$course->review}} Reviews)</li>
                                </ul>
                                <h5 class="title"><a href="{{route('course.detail',$course->slug)}}">{{$course->name}}</a></h5>
                                <div class="courses__item-bottom-three">
                                    <ul class="list-wrap">
                                        <li><i class="flaticon-book"></i>Lessons {{$course->topic_count}}</li>
                                        <li><i class="flaticon-mortarboard"></i>Students {{$course->student}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

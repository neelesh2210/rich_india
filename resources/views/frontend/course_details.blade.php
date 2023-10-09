@extends('frontend.layouts.app')
@section('content')

<section class="section new-course">
    <div class="container">
        <div class="section-header aos">
            <div class="section-sub-head">
                <h2>Our {{$plan_detail->title}}</h2>
            </div>
        </div>
        <div class="section-text aos">
            <p class="mb-0">
                With our {{$plan_detail->title}}, now you can be assured to acquire the best knowledge and expertise from our team of experts. We believe you can empower the world with industry-leading courses.
            </p>
        </div>
        <div class="course-feature">
            <div class="row">
                <div class='col-lg-4 col-md-6'>
                    <div class='course-box'>
                        <div class='product'>
                            <div class='product-img'>
                                <a href="#" title="{{env('APP_NAME')}}-{{$plan_detail->title}}">
                                    <center>
                                        <img src="{{asset('backend/img/plan/'.$plan_detail->image)}}" alt="{{env('APP_NAME')}}-{{$plan_detail->title}}" class="img-fluid">
                                    </center>
                                </a>
                            </div>
                            <div class='product-content'>
                                <div class='course-group d-flex'>
                                    <div class='course-group-img d-flex'>
                                        <div class='course-name'>
                                            <h4>
                                                <a href="#" title="{{env('APP_NAME')}}-{{$plan_detail->title}}">
                                                    {{$plan_detail->title}}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div style="height:160px;">
                                    <ul style="">
                                        @foreach ($plan_detail->points as $point)
                                            <li style="">{{$point}}</li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class='all-btn all-category d-flex align-items-center'>
                                    {{-- <a href="{{route('checkout')}}?slug={{$plan_detail->slug}}" title="{{env('APP_NAME')}}-{{$plan_detail->title}}" class='btn btn-primary' style="font-size:20px;margin-left:60px">
                                        Buy Now ₹ {{$plan_detail->discounted_price}}
                                    </a> --}}
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

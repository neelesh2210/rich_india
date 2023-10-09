@extends('frontend.layouts.app')
@section('content')
    <section class="course-content blogs-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        @foreach ($plans as $plan)
                            <div class='col-12 col-lg-6 col-xl-4 col-sm-6 mb-3'>
                                <div class='blog grid-blog'>
                                    <div class='blog-image'>
                                        <a href="{{ route('plan.detail', $plan->slug) }}"
                                            title="{{ env('APP_NAME') }}-{{ $plan->title }}">
                                            <img src="{{ asset('backend/img/plan/' . $plan->image) }}"
                                                alt="{{ env('APP_NAME') }}-{{ $plan->title }}"
                                                title="{{ env('APP_NAME') }}-{{ $plan->title }}" class='img-fluid'>
                                        </a>
                                    </div>
                                    <div class='blog-grid-box'>
                                        <h3 class='blog-title'>
                                            <a href="{{ route('plan.detail', $plan->slug) }}"
                                                title="{{ env('APP_NAME') }}-{{ $plan->title }}">
                                                {{ $plan->title }}
                                            </a>
                                        </h3>
                                        <div class='blog-content blog-read'>
                                            <div style="height:160px;">
                                                <ul style="">
                                                    @foreach ($plan->points as $point)
                                                        <li style="">{{ $point }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            {{-- <a href="{{ route('checkout') }}?slug={{ $plan->slug }}"
                                                title="{{ env('APP_NAME') }}-{{ $plan->title }}"
                                                class='read-more btn btn-primary' style="font-size:18px;margin-left:60px">
                                                Buy Now <i class='fas fa-arrow-right'></i>
                                            </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

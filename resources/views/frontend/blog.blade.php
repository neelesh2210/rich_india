@extends('frontend.layouts.app')
@section('content')
    <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div>
        <div class="page-header__overlay"></div>
        <div class="container text-center">
            <h2 class="page-header__title">Blog</h2>
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><span>Blog</span></li>
            </ul>
        </div>
    </section>
    <section class="blog-page">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="blog-three__item">
                            <div class="blog-three__image">
                                <img src="{{ asset('backend/img/blog/'.$blog->image) }}" alt="richind">
                            </div>
                            <div class="blog-three__content">
                                <div class="blog-three__top-meta">
                                    <div class="blog-three__cats"><a href="{{route('blog.detail',$blog->slug)}}">{{$blog->topic}}</a></div>
                                    <div class="blog-three__date">{{$blog->created_at->format('d M Y')}}</div>
                                </div>
                                <h3 class="blog-three__title">
                                    <a href="{{route('blog.detail',$blog->slug)}}">{{$blog->title}}</a>
                                </h3>
                                <div class="blog-three__meta">
                                    <div class="blog-three__meta__author">
                                        @if($blog->writter_image)
                                            <img src="{{ asset('backend/img/blog/'.$blog->writter_image) }}" alt="richind" />
                                        @endif
                                        @if($blog->writter_image)
                                            <a href="{{route('blog.detail',$blog->slug)}}">{{$blog->written_by}}</a>
                                        @endif
                                        {{$blog->writter_position}}
                                    </div>
                                    <a class="blog-three__rm" href="{{route('blog.detail',$blog->slug)}}"><span class="icon-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection

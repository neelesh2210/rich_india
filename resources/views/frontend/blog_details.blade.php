@extends('frontend.layouts.app')
@section('content')
    <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div>
        <div class="page-header__overlay"></div>
        <div class="container text-center">
            <h2 class="page-header__title">Blog</h2>
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><span>Blog Details</span></li>
            </ul>
        </div>
    </section>
    <section class="blog-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__content">
                        <div class="blog-details__img">
                            <img src="{{asset('backend/img/blog/'.$blog->image)}}" alt="eduact">
                        </div>
                        <div class="blog-details__meta">
                            <div class="blog-details__meta__cats">
                                {{$blog->topic}}
                            </div>
                            <div class="blog-details__meta__date"><i class="icon-clock"></i>{{$blog->created_at->format('d M Y')}}</div>
                        </div>
                        <h3 class="blog-details__title">{{$blog->title}}</h3>
                        <p class="blog-details__text">
                            {!!$blog->description!!}
                        </p>
                    </div>
                    <div class="blog-details__bottom">
                        <div class="blog-details__tags">
                            <h5 class="blog-details__tags__title">Tags</h5>
                            @foreach (explode(',',$blog->tags) as $tag)
                                <a href="#">{{$tag}}</a>
                            @endforeach
                        </div>
                        <div class="blog-details__social">
                            @if($blog->facebook_link)
                                <a href="{{$blog->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($blog->twitter_link)
                                <a href="{{$blog->twitter_link}}"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($blog->printrest_link)
                                <a href="{{$blog->printrest_link}}"><i class="fab fa-pinterest-p"></i></a>
                            @endif
                            @if($blog->instagram_link)
                                <a href="{{$blog->instagram_link}}"><i class="fab fa-instagram"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

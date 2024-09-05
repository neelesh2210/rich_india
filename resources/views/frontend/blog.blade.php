@extends('frontend.layouts.app')
@section('content')
     <!-- breadcrumb-area -->
     <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('frontend/assets/img/bg/breadcrumb_bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Blogs</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="index.php">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Blogs</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape-wrap">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape01.svg')}}" alt="img" class="alltuchtopdown">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape02.svg')}}" alt="img" data-aos="fade-right" data-aos-delay="300">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape03.svg')}}" alt="img" data-aos="fade-up" data-aos-delay="400">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape04.svg')}}" alt="img" data-aos="fade-down-left" data-aos-delay="400">
            <img src="{{ asset('frontend/assets/img/others/breadcrumb_shape05.svg')}}" alt="img" data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- blog-area -->
    <section class="blog-area section-py-120">
        <div class="container">
            <div class="row gutter-20">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="blog__post-item shine__animate-item">
                        <div class="blog__post-thumb">
                            <a href="{{route('blog_details')}}" class="shine__animate-link"><img src="{{ asset('frontend/assets/img/blog/blog_post01.jpg')}}" alt="img"></a>
                            <a href="blog.php" class="post-tag">Marketing</a>
                        </div>
                        <div class="blog__post-content">
                            <div class="blog__post-meta">
                                <ul class="list-wrap">
                                    <li><i class="flaticon-calendar"></i>20 July, 2024</li>
                                    <li><i class="flaticon-user-1"></i>by <a href="{{route('blog_details')}}">Admin</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="{{route('blog_details')}}">How To Become idiculously Self-Aware In 20 Minutes</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="blog__post-item shine__animate-item">
                        <div class="blog__post-thumb">
                            <a href="{{route('blog_details')}}" class="shine__animate-link"><img src="{{ asset('frontend/assets/img/blog/blog_post02.jpg')}}" alt="img"></a>
                            <a href="blog.php" class="post-tag">Students</a>
                        </div>
                        <div class="blog__post-content">
                            <div class="blog__post-meta">
                                <ul class="list-wrap">
                                    <li><i class="flaticon-calendar"></i>20 July, 2024</li>
                                    <li><i class="flaticon-user-1"></i>by <a href="{{route('blog_details')}}">Admin</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="{{route('blog_details')}}">Get Started With UI Design With Tips To Speed</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="blog__post-item shine__animate-item">
                        <div class="blog__post-thumb">
                            <a href="{{route('blog_details')}}" class="shine__animate-link"><img src="{{ asset('frontend/assets/img/blog/blog_post03.jpg')}}" alt="img"></a>
                            <a href="blog.php" class="post-tag">Science</a>
                        </div>
                        <div class="blog__post-content">
                            <div class="blog__post-meta">
                                <ul class="list-wrap">
                                    <li><i class="flaticon-calendar"></i>20 July, 2024</li>
                                    <li><i class="flaticon-user-1"></i>by <a href="{{route('blog_details')}}">Admin</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="{{route('blog_details')}}">Make Your Own Expanding Contracting Content</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="blog__post-item shine__animate-item">
                        <div class="blog__post-thumb">
                            <a href="{{route('blog_details')}}" class="shine__animate-link"><img src="{{ asset('frontend/assets/img/blog/blog_post04.jpg')}}" alt="img"></a>
                            <a href="blog.php" class="post-tag">Agency</a>
                        </div>
                        <div class="blog__post-content">
                            <div class="blog__post-meta">
                                <ul class="list-wrap">
                                    <li><i class="flaticon-calendar"></i>20 July, 2024</li>
                                    <li><i class="flaticon-user-1"></i>by <a href="{{route('blog_details')}}">Admin</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="{{route('blog_details')}}">What we are capable to usually discovered</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="blog__post-item shine__animate-item">
                        <div class="blog__post-thumb">
                            <a href="{{route('blog_details')}}" class="shine__animate-link"><img src="{{ asset('frontend/assets/img/blog/blog_post05.jpg')}}" alt="img"></a>
                            <a href="blog.php" class="post-tag">Agency</a>
                        </div>
                        <div class="blog__post-content">
                            <div class="blog__post-meta">
                                <ul class="list-wrap">
                                    <li><i class="flaticon-calendar"></i>20 July, 2024</li>
                                    <li><i class="flaticon-user-1"></i>by <a href="{{route('blog_details')}}">Admin</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="{{route('blog_details')}}">What we are capable to usually discovered</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="blog__post-item shine__animate-item">
                        <div class="blog__post-thumb">
                            <a href="{{route('blog_details')}}" class="shine__animate-link"><img src="{{ asset('frontend/assets/img/blog/blog_post06.jpg')}}" alt="img"></a>
                            <a href="blog.php" class="post-tag">Agency</a>
                        </div>
                        <div class="blog__post-content">
                            <div class="blog__post-meta">
                                <ul class="list-wrap">
                                    <li><i class="flaticon-calendar"></i>20 July, 2024</li>
                                    <li><i class="flaticon-user-1"></i>by <a href="{{route('blog_details')}}">Admin</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="{{route('blog_details')}}">What we are capable to usually discovered</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="blog__post-item shine__animate-item">
                        <div class="blog__post-thumb">
                            <a href="{{route('blog_details')}}" class="shine__animate-link"><img src="{{ asset('frontend/assets/img/blog/blog_post07.jpg')}}" alt="img"></a>
                            <a href="blog.php" class="post-tag">Agency</a>
                        </div>
                        <div class="blog__post-content">
                            <div class="blog__post-meta">
                                <ul class="list-wrap">
                                    <li><i class="flaticon-calendar"></i>20 July, 2024</li>
                                    <li><i class="flaticon-user-1"></i>by <a href="{{route('blog_details')}}">Admin</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="{{route('blog_details')}}">What we are capable to usually discovered</a></h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- blog-area-end -->
@endsection

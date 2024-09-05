@extends('frontend.layouts.app')
@section('content')
     <!-- breadcrumb-area -->
     <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('frontend/assets/img/bg/breadcrumb_bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Blog Details</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="index.html">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">
                                <a href="blog.html">Blogs</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">How To Become idiculously Self-Aware In 20 Minutes</span>
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

    <!-- blog-details-area -->
    <section class="blog-details-area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="blog__details-wrapper">
                        <div class="blog__details-thumb">
                            <img src="{{ asset('frontend/assets/img/blog/blog_details.jpg')}}" alt="img">
                        </div>
                        <div class="blog__details-content">
                            <h3 class="title">How To Become idiculously Self-Aware In 20 Minutes</h3>
                            <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis semper bibendum. Ut ac nisi porta, malesuada risus nonrra dolo areay Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae in tristique libero, quis ultrices diamraesent varius diam dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra.Maximus ligula eleifend.</p>
                            <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis semper bibendum. Ut ac nisi porta, malesuada risus nonrra dolo areay Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae in tristique libero, quis ultrices diamraesent varius diam dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra.Maximus ligula eleifend.</p>
                            <blockquote>
                                <p>“ urabitur varius eros rutrum consequat Mauris areathe sollicitudin enim condimentum luctus enim justo non molestie nisl ”</p>
                            </blockquote>
                            <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis semper bibendum. Ut ac nisi porta, malesuada risus nonrra dolo areay Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.</p>
                            <div class="blog__details-content-inner">
                                <h4 class="inner-title">What Will I Learn From This Course?</h4>
                                <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis semper bibendum. Ut ac nisi porta, malesuada risus non viverra dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere.</p>
                                <ul class="about__info-list list-wrap">
                                    <li class="about__info-list-item">
                                        <i class="flaticon-angle-right"></i>
                                        <p class="content">Work with color & Gradients & Grids</p>
                                    </li>
                                    <li class="about__info-list-item">
                                        <i class="flaticon-angle-right"></i>
                                        <p class="content">All the useful shortcuts</p>
                                    </li>
                                    <li class="about__info-list-item">
                                        <i class="flaticon-angle-right"></i>
                                        <p class="content">Be able to create Flyers, Brochures, Advertisements</p>
                                    </li>
                                    <li class="about__info-list-item">
                                        <i class="flaticon-angle-right"></i>
                                        <p class="content">How to work with Images & Text</p>
                                    </li>
                                </ul>
                            </div>
                            <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis semper bibendum. Ut ac nisi porta, malesuada risus nonrra dolo areay Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae in tristique libero, quis ultrices diamraesent varius diam dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra.Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis semper bibendum. Ut ac nisi porta, malesuada risus nonVestibulum ante ipsum primis</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <aside class="blog-sidebar">
                        <div class="blog-widget">
                            <h4 class="widget-title">Categories</h4>
                            <div class="shop-cat-list">
                                <ul class="list-wrap">
                                    <li>
                                        <a href="#"><i class="flaticon-angle-right"></i>Art & Design</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="flaticon-angle-right"></i>Business</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="flaticon-angle-right"></i>Data Science</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="flaticon-angle-right"></i>Development</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="flaticon-angle-right"></i>Finance</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="flaticon-angle-right"></i>Health & Fitness</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="flaticon-angle-right"></i>Lifestyle</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-widget">
                            <h4 class="widget-title">Latest Post</h4>
                            <div class="rc-post-item">
                                <div class="rc-post-thumb">
                                    <a href="blog-details.php">
                                        <img src="{{ asset('frontend/assets/img/blog/latest_post01.jpg')}}" alt="img">
                                    </a>
                                </div>
                                <div class="rc-post-content">
                                    <span class="date"><i class="flaticon-calendar"></i> April 13, 2024</span>
                                    <h4 class="title"><a href="blog-details.php">the Right Learning Path for your</a></h4>
                                </div>
                            </div>
                            <div class="rc-post-item">
                                <div class="rc-post-thumb">
                                    <a href="blog-details.php">
                                        <img src="{{ asset('frontend/assets/img/blog/latest_post02.jpg')}}" alt="img">
                                    </a>
                                </div>
                                <div class="rc-post-content">
                                    <span class="date"><i class="flaticon-calendar"></i> April 13, 2024</span>
                                    <h4 class="title"><a href="blog-details.php">The Growing Need Management</a></h4>
                                </div>
                            </div>
                            <div class="rc-post-item">
                                <div class="rc-post-thumb">
                                    <a href="blog-details.php">
                                        <img src="{{ asset('frontend/assets/img/blog/latest_post03.jpg')}}" alt="img">
                                    </a>
                                </div>
                                <div class="rc-post-content">
                                    <span class="date"><i class="flaticon-calendar"></i> April 13, 2024</span>
                                    <h4 class="title"><a href="blog-details.php">the Right Learning Path for your</a></h4>
                                </div>
                            </div>
                            <div class="rc-post-item">
                                <div class="rc-post-thumb">
                                    <a href="blog-details.php">
                                        <img src="{{ asset('frontend/assets/img/blog/latest_post04.jpg')}}" alt="img">
                                    </a>
                                </div>
                                <div class="rc-post-content">
                                    <span class="date"><i class="flaticon-calendar"></i> April 13, 2024</span>
                                    <h4 class="title"><a href="blog-details.php">The Growing Need Management</a></h4>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-details-area-end -->
@endsection

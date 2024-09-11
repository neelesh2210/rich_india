@php
    if (!isset($website_data)) {
        $website_data = App\Models\Admin\WebsiteSetting::where(function ($query) {
            $query
                ->where('type', 'trainers')
                ->orWhere('type', 'students')
                ->orWhere('type', 'live_training')
                ->orWhere('type', 'community_earning')
                ->orWhere('type', 'whatsapp')
                ->orWhere('type', 'address')
                ->orWhere('type', 'email');
        })->pluck('content', 'type');
    }
@endphp

@extends('frontend.layouts.app')
@section('content')
 <!-- breadcrumb-area -->
 <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('frontend/assets/img/bg/breadcrumb_bg.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb__content">
                    <h3 class="title">Contact Us</h3>
                    <nav class="breadcrumb">
                        <span property="itemListElement" typeof="ListItem">
                            <a href="{{route('index')}}">Home</a>
                        </span>
                        <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                        <span property="itemListElement" typeof="ListItem">Contact</span>
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

<!-- contact-area -->
<section class="contact-area section-py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-info-wrap">
                    <ul class="list-wrap">
                        <li>
                            <div class="icon">
                                <img src="{{ asset('frontend/assets/img/icons/map.svg')}}" alt="img" class="injectable">
                            </div>
                            <div class="contents">
                                <h4 class="title">Address</h4>
                                <p>{{$website_data['address']}}</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="{{ asset('frontend/assets/img/icons/contact_phone.svg')}}" alt="img" class="injectable">
                            </div>
                            <div class="contents">
                                <h4 class="title">Phone</h4>
                                <a href="tel:{{$website_data['whatsapp']}}">+91-{{$website_data['whatsapp']}}</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="{{ asset('frontend/assets/img/icons/emial.svg')}}" alt="img" class="injectable">
                            </div>
                            <div class="contents">
                                <h4 class="title">E-mail Address</h4>
                                <a href="mailto:{{$website_data['email']}}">{{$website_data['email']}}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact-form-wrap">
                    <h4 class="title">Send Us Message</h4>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <form id="contact-form" action="#" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-grp">
                                    <input name="name" type="text" placeholder="Enter Name *" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <input name="phone" type="number" placeholder="Enter Phone No. *" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <input name="email" type="email" placeholder="Enter E-mail *" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-grp">
                                    <textarea name="message" placeholder="Message" required></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-two arrow-btn">Submit Now <img src="{{ asset('frontend/assets/img/icons/right_arrow.svg')}}" alt="img" class="injectable"></button>
                    </form>
                    <p class="ajax-response mb-0"></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->

@endsection

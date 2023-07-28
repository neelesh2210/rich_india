@extends('frontend.layouts.app')
@section('content')
<!-- Start Page Banner Area -->
        <div class="page-banner-area">
            <div class="container">
                <div class="page-banner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-6">
                            <h2>Contact us</h2>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <ul>
                                <li> <a href="/">Home</a></li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Banner Area -->
        <!-- Start Talk Area -->
        <div class="talk-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                        <div class="talk-image">
                            <img src="{{ asset('frontend/images/talk/talk-1.jpg')}}" alt="image">
                            <div class="talk-information">
                                <div class="content">
                                    <h3>Get in touch</h3>
                                    <p>For any inquiries, please email us or contact us.</p>
                                </div>
                                <ul class="list">
                                    <li>
                                        <span>Address:</span>
                                        {{ websiteData('address') }}
                                    </li>
                                    <li>
                                        <span>Phone:</span>
                                        @if (websiteData('support_phone'))
                                            @foreach (json_decode(websiteData('support_phone')) as $support_phone)
                                                <a href="tel:(+91){{ $support_phone }}">(+91) {{ $support_phone }}</a>
                                                @unless ($loop->last)
                                                    ,
                                                @endunless
                                            @endforeach
                                        @endif
                                        {{-- <a href="tel:9876543210">+91-9876543210</a> --}}
                                    </li>
                                    <li>
                                        <span>Email:</span>
                                        <a href="mailto:{{ websiteData('email') }}">{{ websiteData('email') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="talk-form" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Write your message" placeholder="Your message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="send-btn">
                                            <a href="#" class="default-btn">Send message <i class="ri-arrow-right-line"></i></a>
                                        </div>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Talk Area -->

        <!-- Start Map -->
        {{-- <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13822.009735630678!2d77.03819262173836!3d29.993726394575972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390e5b6e3b2a6a5d%3A0xc893a794f2c40f98!2sLadwa%2C%20Haryana%20136132!5e0!3m2!1sen!2sin!4v1671513395824!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div> --}}
        <!-- End Map -->
        @endsection

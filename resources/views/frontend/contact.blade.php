@extends('frontend.layouts.app')
@section('content')
<div class="page-banner bg-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h1 class="mb-0">Contact Us</h1>
            </div>
        </div>
    </div>
</div>
<div class="page-content contact-ussec">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-5">
                <div class="support-wrap bg-brand-pink">
                    <p class="text-white mar-top-80 mar-btm-4">Let's Talk</p>
                    <h5 class="text-white fs-35">Keep Connected With Us</h5>
                    <div class="row">
                        <div class="col-lg-3 col-sm-4 col-3">
                            <i class="fa-solid fa-envelope fs-60 text-white"></i>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-9">
                            <p class="text-white mar-btm-4 mar-top-10">Email:</p>
                            <p class="text-white mar-btm-4">
                                <a href="mailto:info@richind.in" class="text-reset">
                                    info@richind.in                                </a>
                            </p>
                        </div>
                        <div class="col-lg-3 col-sm-4 col-3">
                            <i class="fa-solid fa-square-phone fs-60 text-white"></i>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-9">
                            <p class="text-white mar-btm-4 mar-top-10">Phone:</p>
                            <p class="text-white mar-btm-4">
                                <a href="tel:+916395350946" class="text-reset">
                                    +916395350946                                </a>
                            </p>
                        </div>
                        <div class="col-lg-3 col-sm-4 col-3">
                            <i class="fa-brands fa-square-whatsapp fs-60 text-white"></i>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-9">
                            <p class="text-white mar-btm-4 mar-top-10">WhatsApp:</p>
                            <p class="text-white mar-btm-4">
                                <a href="https://api.whatsapp.com/send?phone=916395350946" class="text-reset">
                                    +916395350946                                </a>
                            </p>
                        </div>
                        <div class="col-lg-3 col-sm-4 col-3">
                            <i class="fa-sharp fa-solid fa-location-dot fs-60 text-white"></i>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-9">
                            <p class="text-white mar-btm-4 mar-top-10">Address:</p>
                            <p class="text-white mar-btm-4">
                                <a href="" class="text-reset">
                                    23 , Firozabad, Uttar Pradesh                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-7">
                <div class="support-wrap">
                    <h5>Fill The Form Below</h5>
                    <p>If you have any questions, concerns, or complaints regarding this refund policy, we encourage you to contact us using the details below.</p>
                    <form action="https://thegrowthindia.in/Web/insert_contact" method="post">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter your Full Name" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Enter your Email Address" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Phone</label>
                                <input name="contact" type="text" class="form-control" placeholder="Enter your Contact Number" maxlength="10" />
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" rows="4" cols="20" class="form-control" placeholder="Write down here"></textarea>
                            </div>
                            <input type="submit" value="Submit" class="btn btn-submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<div class="xs-map-section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3549.872000328307!2d78.37911257446687!3d27.16031724940785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397443ffc93ba509%3A0x9c13238306dfc274!2sRICHIND!5e0!3m2!1sen!2sin!4v1689232776932!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
-->
@endsection

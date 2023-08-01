@extends('frontend.layouts.app')
@section('content')
<style>
    h3,h5{
        color:black
    }
</style>
<!-- Start Page Banner Area -->
        <div class="page-banner-area">
            <div class="container">
                <div class="page-banner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-6">
                            <h2>Cancel & Refund Policy</h2>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <ul>
                                <li> <a href="/">Home</a></li>
                                <li>Cancel & Refund Policy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Banner Area -->
        <div class="mt-24 ptb-50">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="with-white-text">
                            <h3>Overview </h3>
                            <p>Our refund and returns policy lasts 2 hours. If 2 hours have passed since your purchase, we can’t offer you a full refund or exchange.</p>
                            {{-- <p>A payment gateway fee @ 2% of the paid amount and processing fee @5% of the paid amount will be deducted from the amount to be refunded.</p> --}}
                            <p>No Refund will be given to the customer for the purchase of any package made by the customer directly from the RichIND website “{{env('APP_URL')}}” or through the affiliate link of the person who referred him to the The Success Preneur website after 2 hours of the purchase under any circumstances.</p>
                            <p>To complete your refund, we require a receipt or proof of purchase.</p>

                            <h3>Cancel & Refund Policy</h3>
                            <p>Our Cancel and refund policy lasts 2 hours if you have not viewed course. If 2 hours have passed since your purchase, we can’t offer you a full refund.</p>
                            <p>To be eligible for a refund your course must be unseen.</p>
                            <p>To complete your return, we require a receipt or proof of purchase.</p>

                            <h3>Refunds</h3>
                            <p>Once your refund request is received and inspected, we will send you an email to notify you that we have received your request. We will also notify you of the approval or rejection of your refund.</p>
                            <p>If you are approved, then your refund will be processed, and a credit will automatically be applied to your credit card or original method of payment, within a certain amount of days.</p>

                            <h5>Late or missing refunds</h5>
                            <p>If you haven’t received a refund yet, first check your bank account again.</p>
                            <p>Then contact your credit card company, it may take some time before your refund is officially posted.</p>
                            <p>Next contact your bank. There is often some processing time before a refund is posted.</p>
                            <p>If you’ve done all of this and you still have not received your refund yet, please contact us at info@thesuccesspreneur.com.</p>
                            <br><br>
                            <p>For the refund, you need to mail at info@thesuccesspreneur.com In the following format with registered e-mail ID only.</p>
                            <p>Full Name –</p>
                            <p>Registered e-mail ID –</p>
                            <p>Registration date –</p>
                            <h3>Need Help?</h3>
                            <p>Contact us at info@thesuccesspreneur.com for questions related to refunds.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

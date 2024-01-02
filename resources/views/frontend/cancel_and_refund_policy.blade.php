@extends('frontend.layouts.app')
@section('content')
    <div class="page-banner bg-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h1 class="mb-0">Cancel & Refund Policy</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="terms-content">
                        <div class="terms-text">
                            <div class="col-md-12">
                                <h3>Overview </h3>
                                <p>Our refund and returns policy lasts 24 hours. If 24 hours have passed since your purchase,
                                    we can’t offer you a full refund or exchange.</p>
                                <p>Amount will be refunded after deducting Payment Gateway charges.</p>
                                <p>No Refund will be given to the customer for the purchase of any package made by the
                                    customer directly from the RichIND website “{{ env('APP_URL') }}” or through the
                                    affiliate link of the person who referred him to the RichIND website after 24
                                    hours of the purchase under any circumstances.</p>
                                <p>To complete your refund, we require a receipt or proof of purchase.</p>

                                <h3>Cancel & Refund Policy</h3>
                                <p>Our Cancel and refund policy lasts 24 hours if you have not viewed course. If 24 hours have
                                    passed since your purchase, we can’t offer you a full refund.</p>
                                <p>To be eligible for a refund your course must be unseen.</p>
                                <p>To complete your return, we require a receipt or proof of purchase.</p>

                                <h3>Refunds</h3>
                                <p>Since the Website offers non-tangible, irrevocable goods we do not provide refunds after the product is purchased, which you acknowledge prior to purchasing any product on the Website.</p>
                                <p>We do have a fully functioning 365 day trial available which is identical to the product that you may download and try before making a purchase.</p>
                                <p>Once your refund request is received and inspected, we will send you an email to notify
                                    you that we have received your request. We will also notify you of the approval or
                                    rejection of your refund.</p>
                                <p>If you are approved, then your refund will be processed, and a credit will automatically
                                    be applied to your credit card or original method of payment, within a certain amount of
                                    days.</p>

                                <h5>Late or missing refunds</h5>
                                <p>If you haven’t received a refund yet, first check your bank account again.</p>
                                <p>Then contact your credit card company, it may take some time before your refund is
                                    officially posted.</p>
                                <p>Next contact your bank. There is often some processing time before a refund is posted.
                                </p>
                                <p>If you’ve done all of this and you still have not received your refund yet, please
                                    contact us at info@richind.in.</p>
                                <br><br>
                                <p>For the refund, you need to mail at info@richind.in In the following format
                                    with registered e-mail ID only.</p>
                                <p>Full Name –</p>
                                <p>Registered e-mail ID –</p>
                                <p>Registration date –</p>
                                <h3>Need Help?</h3>
                                <p>Contact us at info@richind.in for questions related to refunds.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('frontend.layouts.app')
@section('content')
    @push('css')
        <style>
            .login-box {
                margin: 0;
                box-shadow: 0 0 20px 7px #f6f5f5;
            }
        </style>
    @endpush
    <section class="contact-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-lg-auto">
                    <div class="login-box p-5">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h4 class="gordita-bold text-center">
                                    Please Pay Rs.
                                    @if ($registration_error_log->referral_code)
                                        {{ $plan->discounted_price }}
                                    @else
                                        {{ $plan->amount }}
                                    @endif/- On below given UPI
                                </h4>
                                <input type="hidden" value="richind0557@icici" id="upi_id">
                                <h1 class="gordita-bold text-center">
                                    richind0557@icici
                                    <a class="richind-btn p-2" onclick="copyText()">
                                        <span class="richind-btn__curve"></span>
                                        <i class="fa fa-copy" style="font-size: 20px;"></i> Copy UPI
                                    </a>
                                </h1>
                                <h5 class="text-center mb-2">
                                    After Payment share screenshot and registered email id on given number.
                                </h5>
                                <h5 class="text-center mb-2 pay">
                                    <a href="{{websiteData('telegram')}}" target="_blank">
                                        <img src="{{ asset('frontend/assets/images/telegram.png') }}">
                                        <p><span>Need Support!</span></p>
                                    </a>
                                </h5>
                                <div class="avatar-preview">
                                    <img src="{{ asset('frontend/assets/images/qr-code.jpg') }}" alt="" class="img-fluid">
                                    <p class="text-center" style="color: #372d7a;font-size:12px;font-weight:600;margin-top:5px;">Scan QR Code</p>
                                </div>
                                <h5 class="text-center mb-2">
                                    Payment Screenshot मैं सब Details Show होनी चाहिए। Like :- UTR / UPI Ref. Id ( 12 digital number )
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <script>
            function copyText() {
                navigator.clipboard.writeText($('#upi_id').val());
                alert('Referrel Code Copied Successfully!');
            }
        </script>
    @endpush
@endsection

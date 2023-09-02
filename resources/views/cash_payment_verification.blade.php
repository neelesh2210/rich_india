@extends('frontend.layouts.app')
@section('content')
    <style>
        .login-box {
            margin: 0;
            box-shadow: 0 0 20px 7px #f6f5f5;
        }
    </style>
    <div class="main-wrapper log-wrap login-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-lg-auto">
                    <div class="login-box">
                        <div class="row align-items-center">
                            <div class="col-md-9">
                                <h4 class="gordita-bold text-center">Please Pay Rs. @if($registration_error_log->referral_code) {{$plan->discounted_price}} @else {{$plan->amount}} @endif/- On below given UPI </h4>
                                <input type="hidden" value="richind0557@icici" id="upi_id">
                                <h1 class="gordita-bold text-center" style="color: #372d7a;">richind0557@icici <a class="btn btn-success pb" onclick="copyText()"><i class="fa fa-copy" style="font-size: 20px;"></i> Copy UPI</a></h1>
                                <h5 class="text-center mb-2">After Payment please upload payment screenshot.</h5>
                            </div>
                            <div class="col-md-3">
                                <div class="avatar-preview">
                                    <img src="{{ asset('frontend/images/qr-code.jpg') }}" alt="" class="img-fluid">
                                    <p class="text-center" style="color: #372d7a;font-size:12px;font-weight:600;margin-top:5px;">Scan QR Code
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="login-wrapper">
                                    <div class="w-100">
                                        <div class="support-wrap">
                                            <form action="{{ route('cash.payment.verify', $id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-9">
                                                        <label>Payment Screenshot</label>
                                                        <input type="file" name="payment_image" id="img_input1" class="form-control custom-file-input" accept="image/*">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="avatar-preview">
                                                            <img id="img1" src="{{asset('backend/img/no-image.png')}}" alt="" class="img-fluid" width="100px">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>UTR Number</label>
                                                        <input type="text" name="payment_id" class="form-control" placeholder="Enter UTR Number">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input type="submit" value="Send" class="btn btn-submit">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        img_input1.onchange = evt => {
            const [file] = img_input1.files
            if (file) {
                img1.src = URL.createObjectURL(file)
            }
        }

        function copyText() {
            navigator.clipboard.writeText($('#upi_id').val());
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: "success",
                title: 'Referral Code Copied SuccessfullY!',
            });
        }
    </script>

@endsection

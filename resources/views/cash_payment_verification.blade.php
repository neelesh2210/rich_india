@extends('frontend.layouts.app')
@section('content')
<style>
    .login-box{
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
                            <h4 class="gordita-bold text-center">Please Pay Rs. 100/- On below given UPI </h4>
                                        <h1 class="gordita-bold text-center" style="color: #372d7a;">richind0557@icici</h1>
                                        <h5 class="text-center mb-2">After Payment please upload payment screenshot.</h5>
                        </div>
                        <div class="col-md-3">
                            <div class="avatar-preview">
                                <img src="{{asset('frontend/images/qr-code.jpg')}}" alt="" class="img-fluid">
                                <p class="text-center" style="color: #372d7a;font-size:12px;font-weight:600;margin-top:5px;">Scan QR Code</p>
                             </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="login-wrapper">
                                    <div class="w-100">
                                        <div class="support-wrap">
                                        <form action="{{route('cash.payment.verify',$id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-9">
                                                    <label>Payment Screenshot</label>
                                                    <input type="file" name="payment_image" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="avatar-preview">
                                                       <img src="{{asset('frontend/images/profile.jpg')}}" alt="" class="img-fluid" width="100px">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Payment Id</label>
                                                    <input type="text" name="payment_id" class="form-control" placeholder="Enter Payment Id">
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
@endsection


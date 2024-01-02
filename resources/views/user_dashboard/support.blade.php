@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Contact Us</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                <h5 class="mb-3 text-uppercase bg-light p-2">Contact Us</h5>
                                <div class="mt-3">
                                    <p class="mt-4 mb-1"><strong><i class="uil uil-at"></i> Email:</strong></p>
                                    <p>info@richind.in</p>
                                    <p class="mt-3 mb-1"><strong><i class="uil uil-phone"></i> Phone Number:</strong></p>
                                    <p>+91-xxxxxxxxxx</p>
                                    <p class="mt-3 mb-1"><strong><i class="uil uil-location"></i> Location:</strong></p>
                                    <p>xxxxxxxxxxxxxxxxxxx</p>
                                </div>
                                <hr>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" id="name" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="number" id="subject" class="form-control" value="password">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="images" class="form-label">Message </label>
                                            <textarea class="form-control" name="message" id="" cols="10" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                        <button type="button" class="btn btn-primary">Send Query</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container -->
            </div>
            <!-- content -->
        </div>
    </div>
    <!-- END wrapper -->
@endsection

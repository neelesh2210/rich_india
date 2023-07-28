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
                            <h4 class="page-title">Payment Details</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3 text-uppercase bg-light p-2">Sponsor Information</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name <span>*</span></label>
                                    <input type="text" id="name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email <span>*</span></label>
                                    <input type="email" id="email" name="example-email" class="form-control"
                                        placeholder="Email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="whatsappno" class="form-label">WhatsApp No. <span>*</span></label>
                                    <input type="number" id="whatsappno" class="form-control" value="password">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state" class="form-label">Select Document Type </label>
                                    <select class="form-select" id="example-select">
                                        <option>Aadhar</option>
                                        <option>Pan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="images" class="form-label">Upload Front Side</label>
                                    <input type="file" id="images" class="form-control" placeholder="images">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="images" class="form-label">Upload Back Size </label>
                                    <input type="file" id="images" class="form-control" placeholder="images">
                                </div>
                            </div>

                            <h5 class="mb-3 text-uppercase bg-light p-2">Bank Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="bname" class="form-label">Bank Name <span>*</span></label>
                                    <input type="text" id="bname" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="account" class="form-label">Account No. <span>*</span></label>
                                    <input type="email" id="account" name="example-email" class="form-control"
                                        placeholder="Email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="ifsc" class="form-label">IFSC Code <span>*</span></label>
                                    <input type="number" id="ifsc" class="form-control" value="password">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary">Save Changes</button><br>
                            <button type="button" class="btn btn-primary mt-2">Send Request to change Bank</button>
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

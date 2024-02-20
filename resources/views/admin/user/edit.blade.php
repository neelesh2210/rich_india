@extends('admin.layouts.app')
@section('content')
<style>
    .lbl_msg {
        padding-top: 2px;
        font-size: 13px !important;
    }
</style>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title){{ $page_title }}@endisset
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <form class="form-example" id="form_id">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Enter Name..." required>
                                                </div>
                                                <span id="error_name" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="email">Email <span class="text-danger">*</span> </label>
                                                    <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Enter Email..." required>
                                                </div>
                                                <span id="error_email" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label>Enter State</label>
                                                    <select name="state" class="form-control select2" required>
                                                        <option value="">Select State</option>
                                                        @foreach (states() as $state)
                                                        <option value="{{$state}}" @if($user->state == $state) selected @endif>{{$state}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="error_state" class="lbl_msg"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="referrer_code">Referrer Code <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="referrer_code" value="{{$user->referrer_code}}" placeholder="Enter Referrer Code..." readonly required>
                                                </div>
                                                <span id="error_refferer" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="referral_code">Sponsor Code</label>
                                                    <input type="text" class="form-control" name="referral_code" value="{{$user->referral_code}}" placeholder="Enter Sponsor Code...">
                                                </div>
                                                <span id="error_refferal" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-3 form_div">
                                                <div class="form-group">
                                                    <label for="old_paid_payout">Old Paid Payout</label>
                                                    <input type="number" step="0.01" class="form-control" name="old_paid_payout" value="{{$user->userDetail->old_paid_payout}}" placeholder="Enter Old Paid Payout...">
                                                </div>
                                            </div>
                                            <div class="col-md-3 form_div">
                                                <div class="form-group">
                                                    <label for="old_not_paid_payout">Old Unpaid Payout</label>
                                                    <input type="number" step="0.01" class="form-control" name="old_not_paid_payout" value="{{$user->userDetail->old_not_paid_payout}}" placeholder="Enter Old Unpaid Payout...">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="aadhaar_name">Aadhar Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="aadhar_name" value="{{optional($user->bankDetail)->aadhar_name}}" placeholder="Enter Aadhar Name...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="aadhaar_number">Aadhaar Number <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="aadhar_number" value="{{optional($user->bankDetail)->aadhar_number}}" placeholder="Enter Aadhaar Number...">
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="pan_name">Pan Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="pan_name" value="{{optional($user->bankDetail)->pan_name}}" placeholder="Enter Pan Name...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="pan_number">Pan Number <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="pan_number" value="{{optional($user->bankDetail)->pan_number}}" placeholder="Enter Pan Number...">
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="dob">DOB <span class="text-danger">*</span> </label>
                                                    <input type="date" class="form-control" name="dob" value="{{$user->dob}}" placeholder="Enter DOB...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="gender">Gender <span class="text-danger">*</span> </label>
                                                    <select name="gender" class="form-control">
                                                        <option value="male" @if($user->gender == 'male') selected @endif>Male</option>
                                                        <option value="female" @if($user->gender == 'female') selected @endif>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="holder_name">Holder Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="holder_name" value="{{optional($user->bankDetail)->holder_name}}" placeholder="Enter Holder Name...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="ifsc_code">IFSC Code <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="ifsc_code" value="{{optional($user->bankDetail)->ifsc_code}}" placeholder="Enter IFSC Code...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="account_number">Account Number <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="account_number" value="{{optional($user->bankDetail)->account_number}}" placeholder="Enter Account Number...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="bank_name">Bank Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="bank_name" value="{{optional($user->bankDetail)->bank_name}}" placeholder="Enter Bank Name...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="upi_id">UPI Id <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="upi_id" value="{{optional($user->bankDetail)->upi_id}}" placeholder="Enter UPI Id...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="kyc_status">KYC Status <span class="text-danger">*</span> </label>
                                                    <select name="kyc_status" class="form-control">
                                                        <option value="not_verified" @if($user->kyc_status == 'not_verified') selected @endif>Pending</option>
                                                        <option value="verified" @if($user->kyc_status == 'verified') selected @endif>Verified</option>
                                                        <option value="rejected" @if($user->kyc_status == 'rejected') selected @endif>Rejected</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 form_div">
                                                <div class="form-group">
                                                    <label for="notes">Notes </label>
                                                    <textarea name="notes" class="form-control">{!!optional($user->bankDetail)->notes!!}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 form_div">
                                                <div class="form-group">
                                                    <label for="admin_message">Admin Message </label>
                                                    <textarea name="admin_message" class="form-control">{{optional($user->bankDetail)->admin_message}}</textarea>
                                                </div>
                                            </div>
                                            @if(optional($user->bankDetail)->aadhar_front_image)
                                                <div class="col-md-6 form_div">
                                                    <div class="form-group">
                                                        <label>Aadhaar Front Image</label> <br>
                                                        <a href="{{asset('frontend/images/documents/'.optional($user->bankDetail)->aadhar_front_image)}}" target="_blank">
                                                            <img src="{{asset('frontend/images/documents/'.optional($user->bankDetail)->aadhar_front_image)}}" height="100px" width="100px">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                            @if(optional($user->bankDetail)->aadhar_back_image)
                                                <div class="col-md-6 form_div">
                                                    <div class="form-group">
                                                        <label>Aadhaar Back Image</label> <br>
                                                        <a href="{{asset('frontend/images/documents/'.optional($user->bankDetail)->aadhar_back_image)}}" target="_blank">
                                                            <img src="{{asset('frontend/images/documents/'.optional($user->bankDetail)->aadhar_back_image)}}" height="100px" width="100px">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                            @if(optional($user->bankDetail)->pan_image)
                                                <div class="col-md-6 form_div">
                                                    <div class="form-group">
                                                        <label>Pan Image</label> <br>
                                                        <a href="{{asset('frontend/images/documents/'.optional($user->bankDetail)->pan_image)}}" target="_blank">
                                                            <img src="{{asset('frontend/images/documents/'.optional($user->bankDetail)->pan_image)}}" height="100px" width="100px">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-outline-success" onclick="submit_form()">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>

        function submit_form(){
            $.ajax({
                type: "POST",
                url: '{{route("admin.update.user","")}}/{{$user->id}}',
                data: $('#form_id').serialize(),
                success: function(data)
                {
                    window.location.replace("{{route('admin.user.index')}}");
                },
                error: function (request, status, error) {
                    $(window).scrollTop(0);
                    if(request.responseJSON.errors.name){
                        $('#error_name').show();
                        $('#error_name').addClass('text-danger');
                        $('#error_name').removeClass('text-success');
                        $('#error_name').text('✖ '+request.responseJSON.errors.name);
                    }else{
                        $('#error_name').show();
                        $('#error_name').addClass('text-success');
                        $('#error_name').removeClass('text-danger');
                        $('#error_name').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.email){
                        $('#error_email').show();
                        $('#error_email').addClass('text-danger');
                        $('#error_email').removeClass('text-success');
                        $('#error_email').text('✖ '+request.responseJSON.errors.email);
                    }else{
                        $('#error_email').show();
                        $('#error_email').addClass('text-success');
                        $('#error_email').removeClass('text-danger');
                        $('#error_email').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.state){
                        $('#error_state').show();
                        $('#error_state').addClass('text-danger')
                        $('#error_state').removeClass('text-success');
                        $('#error_state').text('✖ '+request.responseJSON.errors.state);
                    }else{
                        $('#error_state').show();
                        $('#error_state').addClass('text-success');
                        $('#error_state').removeClass('text-danger');
                        $('#error_state').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.referral_code){
                        $('#error_refferal').show();
                        $('#error_refferal').addClass('text-danger');
                        $('#error_refferal').removeClass('text-success');
                        $('#error_refferal').text('✖ '+request.responseJSON.errors.referral_code);
                    }
                }
            });
        }
    </script>

@endsection

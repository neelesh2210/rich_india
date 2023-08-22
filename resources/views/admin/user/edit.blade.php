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

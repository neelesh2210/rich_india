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
                                                    <input type="text" class="form-control" name="name" placeholder="Enter Name..." required>
                                                </div>
                                                <span id="error_name" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="email">Email <span class="text-danger">*</span> </label>
                                                    <input type="email" class="form-control" name="email" placeholder="Enter Email..." required>
                                                </div>
                                                <span id="error_email" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label>Enter State</label>
                                                    <select name="state" class="form-control" required>
                                                        <option value="">Select State</option>
                                                        @foreach (states() as $state)
                                                        <option value="{{$state}}">{{$state}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="error_state" class="lbl_msg"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="referrer_code">Referrer Code <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="referrer_code" placeholder="Enter Referrer Code..." required>
                                                </div>
                                                <span id="error_refferer" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="referral_code">Referral Code</label>
                                                    <input type="text" class="form-control" name="referral_code" placeholder="Enter Referral Code...">
                                                </div>
                                                <span id="error_refferal" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="current_plan_id">Current Plan <span class="text-danger">*</span></label>
                                                    <select name="current_plan_id" class="form-control" required>
                                                        <option value="">Select Plan</option>
                                                        @foreach (App\CPU\PlanManager::withoutTrash()->where('status',1)->get() as $plan)
                                                            <option value="{{$plan->id}}">{{$plan->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <span id="error_plan" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="old_paid_payout">Old Paid Payout</label>
                                                    <input type="number" step="0.01" class="form-control" name="old_paid_payout" value="0.00" placeholder="Enter Old Paid Payout...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="old_not_paid_payout">Old Unpaid Payout</label>
                                                    <input type="number" step="0.01" class="form-control" name="old_not_paid_payout" value="0.00" placeholder="Enter Old Unpaid Payout...">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-12">
                                                <form action="{{route('admin.get.old.users')}}">
                                                    <div class="card-header">
                                                        <div class="card-tools">
                                                            <div class="row">
                                                                <div class="input-group input-group-sm" style="width: 200px;">
                                                                    <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" id="search_key" placeholder="Search" onkeyup="fillter()">
                                                                    <div class="input-group-append">
                                                                        <button type="submit" class="btn btn-default">
                                                                            <i class="fas fa-search"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body table-responsive p-2" id="user_table">
                                                        @include('admin.old_user.table')
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="button" class="btn btn-outline-success" onclick="submit_form()">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function fillter(){
            var search_key = $('#search_key').val();
            $.ajax({
                type: 'GET',
                url: "{{route('admin.create.old.user')}}?search_key="+search_key,
                success: function(data) {
                    $('#user_table').html(data)
                }
            });
        }

        function submit_form(){
            $.ajax({
                type: "POST",
                url: '{{route("admin.store.old.user")}}',
                data: $('#form_id').serialize(),
                success: function(data)
                {
                    window.location.replace("{{route('admin.get.old.users')}}");
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
                        $('#error_email').text('✔ Email Available');
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
                    if(request.responseJSON.errors.referrer_code){
                        $('#error_refferer').show();
                        $('#error_refferer').addClass('text-danger');
                        $('#error_refferer').removeClass('text-success');
                        $('#error_refferer').text('✖ '+request.responseJSON.errors.referrer_code);
                    }
                    else{
                        $('#error_refferer').show();
                        $('#error_refferer').addClass('text-success');
                        $('#error_refferer').removeClass('text-danger');
                        $('#error_refferer').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.current_plan_id){
                        $('#error_plan').show();
                        $('#error_plan').addClass('text-danger');
                        $('#error_plan').removeClass('text-success');
                        $('#error_plan').text('✖ '+request.responseJSON.errors.current_plan_id);
                    }
                    else{
                        $('#error_plan').show();
                        $('#error_plan').addClass('text-success');
                        $('#error_plan').removeClass('text-danger');
                        $('#error_plan').text('✔ Correct');
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

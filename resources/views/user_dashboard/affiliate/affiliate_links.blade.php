@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Affiliate Links</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="referral" class="form-label">My Referral Link</label>
                                    <input type="text" id="referral_link" value="{{env('APP_URL')}}?referrer_code={{Auth::guard('web')->user()->referrer_code}}" class="form-control" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <a class="btn btn-primary mt-3_5" onclick="copyText()">Copy Referral Link</a>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="referral" class="form-label">My Referral Code</label>
                                    <input type="text" id="referral_code" value="{{Auth::guard('web')->user()->referrer_code}}" class="form-control" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <a class="btn btn-primary mt-3_5" onclick="copyTextCode()">Copy Referral Code</a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="links" class="form-label">Generate Link For</label>
                                    <select class="form-select" id="plan_id" onchange="get_plan_url()">
                                        <option>All Packages</option>
                                        @foreach (App\CPU\PlanManager::withoutTrash()->get() as $plan)
                                            <option value="{{$plan->slug}}">{{$plan->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input type="text" id="links" class="form-control  mt-3_5" readonly>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <a class="btn btn-primary mt-3_5" onclick="copyText1()">Copy Link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyText() {
            navigator.clipboard.writeText($('#referral_link').val());
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: "success",
                title: 'Referral Code Link SuccessfullY!',
            });
        }

        function copyTextCode() {
            navigator.clipboard.writeText($('#referral_code').val());
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

        function get_plan_url(){
            var plan_id = $('#plan_id').val();

            plan_id = "{{env('APP_URL')}}/checkout?slug="+plan_id+"&referrer_code={{Auth::guard('web')->user()->referrer_code}}"
            $('#links').val(plan_id)
        }

        function copyText1() {
            navigator.clipboard.writeText($('#links').val());
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

@extends('frontend.layouts.app')
@section('content')
<style>
    .mt-35{
    margin-top: 35px;
    }
    .mt-30{
    margin-top: 32px;
    }
    body {
background-color: #f7f7f7;
}
.footer,
.header {
    display: none;
}

.mob {
    display: none;
}

.header-fixed {
    display: none;
}

@media only screen and (min-width: 320px) and (max-width: 767px) {

    .container-fluid {
        padding-left: 0px;
        padding-right: 0px;
    }

    .navbar-brand.logo .pad-t-b-5-xs {
        padding: 12px 0px 12px 0;
        margin-left: 33px;
    }

    .logo img {
        width: 150px;
    }

    .navbar-brand {
        background: white;
    }

    .mob {
        display: block;
    }

    .header-fixed {
        display: none;
    }
}
</style>
    <div>
        <div id="dashboard-wrapper" class="bg-light-gray-3">
            <div id="sidebar-wrapper">
                <div class="sidebar-nav">
                    <div class="profile-sec">
                        <div class="pimgsec">
                            <img src="{{ asset('frontend/images/avatar/' . Auth::guard('web')->user()->avatar) }}">
                        </div>
                        <div class="ptext">
                            <h3>{{ Auth::guard('web')->user()->name }}</h3>
                            <h4>Affiliate Link</h4>
                        </div>
                    </div>
                    <a href="{{ route('user.dashboard') }}" class="sidebar-nav-active-en mar-top-60">
                        <i class="fa-solid fa-house icon-active fs-20 me-1 align-middle txt-gray-2"></i>
                        DashBoard
                    </a>
                    <a href="{{ route('user.user.profile') }}">
                        <i class="fa-solid fa-id-card fs-20 me-1 align-middle txt-gray-2"></i>
                        My Profile
                    </a>
                    <a href="{{ route('user.bank.detail') }}">
                        <i class="fa-regular fa-credit-card fs-20 me-1 align-middle txt-gray-2"></i>
                        KYC
                    </a>
                    <a href="{{ route('user.traffic') }}">
                        <i class="fa-sharp fa-solid fa-people-group fs-20 me-1 align-middle txt-gray-2"></i>
                        My Team
                    </a>
                    <a href="{{ route('user.leaderboard') }}">
                        <i class="fa-solid fa-users fs-20 me-1 align-middle txt-gray-2"></i>
                        Leaderboard
                    </a>
                    <a href="#">
                        <i class="fa-solid fa-graduation-cap fs-20 me-1 align-middle txt-gray-2"></i>
                        My Course
                    </a>
                    <a href="{{ route('user.affiliate.links') }}">
                        <i class="fa-solid fa-graduation-cap fs-20 me-1 align-middle txt-gray-2"></i>
                        Affilliate Link
                    </a>
                    {{-- <a href="{{ route('user.payouts') }}"> --}}
                    <a href="#">
                        <i class="fa-solid fa-money-bill-transfer fs-20 me-1 align-middle txt-gray-2"></i>
                        Request Withdrawal
                    </a>
                    <a href="#">
                        <i class="fa-sharp fa-solid fa-lock fs-20 me-1 align-middle txt-gray-2"></i>
                        Security
                    </a>
                    <a onclick="$('#logout-forms').submit()">
                        <i class="fa-solid fa-arrow-right-from-bracket fs-20 me-1 align-middle txt-gray-2"></i>
                        Sign Out
                    </a>
                    <form id="logout-forms" action="{{ route('user.logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
            <div id="page-content-wrapper" class="pt-0 ps-0 pe-0">
                <span href="#dashboard-menu-toggle" id="dashboard-menu-toggle" class="d-block d-sm-none">&#9776;</span>
                <a href="{{ route('index') }}" title="{{ env('APP_NAME') }}-logo "
                    class="navbar-brand logo header-fixed d-none">
                    <img src="{{ asset('frontend/images/avatar/' . Auth::guard('web')->user()->avatar) }}"
                        alt="{{ env('APP_NAME') }}-logo" class="img-fluid pad-t-b-5-xs mob" style="">
                </a>
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="settings-widget profile-details box-shadow-1 my-profile">
                                    <div class="settings-menu p-0">
                                        <div class="profile-heading">
                                            <h3 style="color:#FF00A8;text-align:center;font-size:30px">My Team</h3>
                                        </div>
                                        <div class="checkout-form personal-address add-course-info">
                                            <div action="#">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="referral" class="form-label">My Referral Link</label>
                                                        <input type="text" id="referral_link"
                                                            value="{{ env('APP_URL') }}?referrer_code={{ Auth::guard('web')->user()->referrer_code }}"
                                                            class="form-control" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <a class="btn btn-primary mt-35" onclick="copyText()">Copy Referral
                                                            Link</a>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="referral" class="form-label">My Referral Code</label>
                                                        <input type="text" id="referral_code"
                                                            value="{{ Auth::guard('web')->user()->referrer_code }}"
                                                            class="form-control" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <a class="btn btn-primary mt-35" onclick="copyTextCode()">Copy
                                                            Referral Code</a>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="links" class="form-label">Generate Link For</label>
                                                        <select class="form-select" id="plan_id"
                                                            onchange="get_plan_url()">
                                                            <option>All Packages</option>
                                                            @foreach (App\CPU\PlanManager::withoutTrash()->get() as $plan)
                                                                <option value="{{ $plan->slug }}">{{ $plan->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mt-30 mb-3">
                                                        <input type="text" id="links" class="form-control  mt-3_5"
                                                            readonly>
                                                    </div>
                                                    <div class="col-md-2 mt-30 mb-3">
                                                        <a class="btn btn-primary mt-3_5" onclick="copyText1()">Copy
                                                            Link</a>
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

        function get_plan_url() {
            var plan_id = $('#plan_id').val();

            plan_id = "{{ env('APP_URL') }}/checkout?slug=" + plan_id +
                "&referrer_code={{ Auth::guard('web')->user()->referrer_code }}"
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

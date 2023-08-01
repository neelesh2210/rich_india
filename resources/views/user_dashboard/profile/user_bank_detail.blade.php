@extends('frontend.layouts.app')
@section('content')
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
                    {{-- <a href="{{ route('user.leaderboard') }}"> --}}
                    <a href="#">
                        <i class="fa-solid fa-users fs-20 me-1 align-middle txt-gray-2"></i>
                        Leaderboard
                    </a>
                    {{-- <a href="{{ route('user.course') }}"> --}}
                    <a href="#">
                        <i class="fa-solid fa-graduation-cap fs-20 me-1 align-middle txt-gray-2"></i>
                        My Course
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
                                            <h3 style="color:#FF00A8;text-align:center;font-size:50px">KYC</h3>
                                        </div>
                                        <div class="checkout-form personal-address add-course-info">
                                            <div action="#">
                                                <div class="row">
                                                    <form action="{{ route('user.bank.detail.store') }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="holder_name" class="form-label">Holder
                                                                    Name</label>
                                                                <input type="text" id="holder_name" name="holder_name"
                                                                    value="{{ old('holder_name', optional($user_details->bankDetail)->holder_name) }}"
                                                                    class="form-control" placeholder="Holder Name...">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="ifsc_code" class="form-label">IFSC Code</label>
                                                                <input type="text" id="ifsc_code" name="ifsc_code"
                                                                    value="{{ old('ifsc_code', optional($user_details->bankDetail)->ifsc_code) }}"
                                                                    class="form-control" placeholder="IFSC Code...">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="account_number" class="form-label">Account
                                                                    Number</label>
                                                                <input type="text" id="account_number"
                                                                    name="account_number"
                                                                    value="{{ old('account_number', optional($user_details->bankDetail)->account_number) }}"
                                                                    class="form-control" placeholder="Account Number...">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="bank_name" class="form-label">Bank Name</label>
                                                                <input type="text" id="bank_name" name="bank_name"
                                                                    value="{{ old('bank_name', optional($user_details->bankDetail)->bank_name) }}"
                                                                    class="form-control" placeholder="Bank Name...">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="upi_id" class="form-label">UPI ID</label>
                                                                <input type="text" id="upi_id" name="upi_id"
                                                                    class="form-control"
                                                                    value="{{ old('upi_id', optional($user_details->bankDetail)->upi_id) }}"
                                                                    placeholder="UPI ID...">
                                                            </div>
                                                        </div>
                                                        {{-- <a class="btn btn-primary @if (count(old()) != 0) d-none @endif verify-button"
                                                            onclick="verifyEmailBankdetail()">Get OTP on email to make
                                                            changes</a> --}}
                                                        <button type="submit"
                                                            class="btn btn-primary save-button">Save
                                                            Changes</button>
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
        </div>
    </div>
@endsection

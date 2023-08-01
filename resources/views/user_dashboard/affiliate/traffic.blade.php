@extends('frontend.layouts.app')
@section('content')
<style>
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
                                            <h3 style="color:#FF00A8;text-align:center;font-size:30px">My Team</h3>
                                        </div>
                                        <div class="checkout-form personal-address add-course-info">
                                            <div action="#">
                                                <div class="row">
                                                    <form action="{{ route('user.traffic') }}">
                                                        <div class="row">
                                                            <div class="col-md-2 mb-3"></div>
                                                            <div class="col-md-3 mb-3">
                                                                {{-- <label class="form-label">Date Range Pick</label>
                                                                <input class="form-control input-daterange-datepicker"
                                                                    id="reservation" type="text" name="search_date"
                                                                    value="{{ $search_date }}"
                                                                    placeholder="Select Date Range..."> --}}
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label class="form-label">Packages Types</label>
                                                                <select class="form-select" id="example-select"
                                                                    name="search_plan_id">
                                                                    <option value="">Select Plan...</option>
                                                                    @foreach (App\Models\Admin\Plan::all() as $plan)
                                                                        <option value="{{ $plan->id }}"
                                                                            @if ($search_plan == $plan->id) selected @endif>
                                                                            {{ $plan->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label class="form-label">Search</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Name,Phone,Email..."
                                                                    name="search_key" value="{{ $search_key }}">
                                                            </div>
                                                            <div class="col-md-1 mb-3">
                                                                <label class="form-label mt-2"></label>
                                                                <button type="subit"
                                                                    class="btn btn-primary mt-2">Filter</button>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </form>
                                                    <table class="table table-striped table-centered mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Enrollment Date & Time</th>
                                                                <th>Contact No</th>
                                                                <th>PackageName</th>
                                                                <th>Sponsor</th>
                                                                <th>Level</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($commissions as $key=>$commission)
                                                                <tr>
                                                                    <td>{{ $key + 1 + ($commissions->currentPage() - 1) * $commissions->perPage() }}
                                                                    </td>
                                                                    <td>{{ $commission->purchasePlan->user->name }}</td>
                                                                    <td>{{ $commission->purchasePlan->user->email }}</td>
                                                                    <td>{{ $commission->purchasePlan->user->created_at->format('d-M-Y H:i') }}
                                                                    </td>
                                                                    <td>{{ $commission->purchasePlan->user->phone }}</td>
                                                                    <td>{{ $commission->purchasePlan->plan->title }}</td>
                                                                    <td>{{ optional($commission->purchasePlan->user->sponsorDetail)->name }}
                                                                    </td>
                                                                    <td>
                                                                        @if ($commission->level == '1')
                                                                            Active
                                                                        @else
                                                                            Passive
                                                                        @endif
                                                                        {{-- {{$commission->level}} --}}
                                                                    </td>
                                                                    <td>₹ {{ $commission->commission }}</td>
                                                                </tr>
                                                            @empty
                                                                <tr class="footable-empty">
                                                                    <td colspan="11">
                                                                        <center style="padding: 70px;"><i
                                                                                class="far fa-frown"
                                                                                style="font-size: 100px;"></i><br>
                                                                            <h2>Nothing Found</h2>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                    <div class="d-flex justify-content-center mt-3">
                                                        {!! $commissions->links() !!}
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
@endsection

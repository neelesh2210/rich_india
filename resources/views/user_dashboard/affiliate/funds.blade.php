@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Total Fund</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card widget-flat gradient-45deg-light-blue-cyan">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-account-multiple widget-icon"></i>
                                        </div>
                                        <h3 class="mt-3 mb-3 text-white"><span>₹</span>{{App\Models\Commission::where('user_id',Auth::guard('web')->user()->id)->sum('commission')}}</h3>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Customers">Total Fund</h5>
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

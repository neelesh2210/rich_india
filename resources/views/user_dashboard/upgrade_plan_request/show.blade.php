@extends('user_dashboard.layouts.app')
@section('content')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Upgrade Request</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.upgrade.plan.request.process',encrypt($data->id))}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name" value="{{old('name',$data->user->name)}}" class="form-control" placeholder="Name..." readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" value="{{old('email',$data->user->email)}}" class="form-control" placeholder="Email..." readonly>
                                        <span class="text-danger" id="error_email"></span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" id="phone" name="phone" value="{{old('phone',$data->user->phone)}}" class="form-control" placeholder="Phone..." readonly>
                                        <span class="text-danger" id="error_phone"></span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="plan" class="form-label">Plan</label>
                                        <input type="text" id="plan" name="plan" class="form-control" value="{{old('plan',$data->plan->title)}}" placeholder="Plan..." readonly>
                                    </div>
                                    @php
                                        $current_plan = App\Models\Admin\Plan::where('id',$data->user->userDetail->current_plan_id)->first();
                                        $upgrade_plan_detail = App\Models\Admin\Plan::where('id',$data->plan_id)->first();
                                    @endphp
                                    <div class="col-md-6 mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" id="amount" name="amount" class="form-control" value="{{old('plan',$current_plan->upgrade_amount[$upgrade_plan_detail->priority - $current_plan->priority - 1])}}" placeholder="Plan..." readonly>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Upgrade</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

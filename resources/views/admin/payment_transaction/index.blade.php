@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@isset($page_title) {{$page_title}} @endisset</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <form action="{{route('admin.payment.transaction.index')}}">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="input-group input-group-sm">
                                                <select name="search_have_sponser" class="form-control">
                                                    <option value="all" @if($search_have_sponser == 'all') selected @endif>All</option>
                                                    <option value="no_sponser" @if($search_have_sponser == 'no_sponser') selected @endif>No Sponser</option>
                                                    <option value="have_sponser" @if($search_have_sponser == 'have_sponser') selected @endif>Have Sponser</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group input-group-sm mr-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_date" value="{{$search_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group input-group-sm mr-2">
                                                <select class="form-control" id="example-select" name="search_plan">
                                                    <option value="">Select Plan...</option>
                                                    @foreach (App\Models\Admin\Plan::all() as $plan)
                                                        <option value="{{$plan->id}}" @if($search_plan == $plan->id) selected @endif>{{$plan->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit" name="export" value="export" class="btn btn-primary" style="height: 31px;padding-top: 2px;">Export</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body table-responsive p-2">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Details</th>
                                            <th>Plan Details</th>
                                            <th>Transaction Detils</th>
                                            <th>Other</th>
                                            <th>Sponsor Details</th>
                                            <th class="text-center">Referral Income</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($plan_purchases as $key=>$plan_purchase)
                                            <tr>
                                                <td>{{($key+1) + ($plan_purchases->currentPage() - 1)*$plan_purchases->perPage()}}</td>
                                                <td>
                                                    <b>Name: </b>{{$plan_purchase->user->name}} <br>
                                                    <b>Email: </b>{{$plan_purchase->user->email}} <br>
                                                    <b>phone: </b>{{$plan_purchase->user->phone}} <br>
                                                    <b>Referrer Code: </b>{{$plan_purchase->user->referrer_code}}
                                                </td>
                                                <td>
                                                    <b>Name: </b>{{$plan_purchase->plan->title}} <br>
                                                    @if ($plan_purchase->payment_detail != null && $plan_purchase->payment_detail != 'Updated by Admin')
                                                        <b>Plan Amount: </b>₹  {{$plan_purchase->amount}} <br>
                                                        <b>Paid Amount: </b>₹  {{$plan_purchase->total_amount}} <br>
                                                    @endif
                                                    @if($plan_purchase->coupon_detail)
                                                        <b>Coupon Name: </b> {{json_decode($plan_purchase->coupon_detail)->name}} <br>
                                                        <b>Coupon Amount: </b> {{$plan_purchase->coupon_discount_amount}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($plan_purchase->payment_detail != null && $plan_purchase->payment_detail != 'Updated by Admin')
                                                        <b>Payment Id: </b>{{json_decode($plan_purchase->payment_detail)->id}} <br>
                                                        <b>Amount Paid: </b>₹ {{json_decode($plan_purchase->payment_detail)->amount}} <br>
                                                        <b>Date: </b>{{$plan_purchase->created_at->format('d-M-Y h:i A')}} <br>
                                                        {{-- <b>Profit: </b>₹ {{$plan_purchase->total_amount - $plan_purchase->commission_sum_commission}} --}}
                                                    @endif
                                                </td>
                                                <td>

                                                    @if($plan_purchase->amount == 0)
                                                        <span class="badge bg-success">New Plan</span>
                                                    @else
                                                        @if($plan_purchase->amount == $plan_purchase->plan->amount)
                                                        <span class="badge bg-success">New Plan</span>
                                                        @else
                                                        <span class="badge bg-warning">Upgrade Plan</span>
                                                        @endif
                                                    @endif

                                                    <b>Payment Method:</b> @isset(json_decode($plan_purchase->payment_detail)->method)
                                                    {{json_decode($plan_purchase->payment_detail)->method}}
                                                    @endisset
                                                </td>
                                                <td>
                                                    <b>Name: </b>{{optional($plan_purchase->user->sponsorDetail)->name}} <br>
                                                    {{-- <b>Email: </b>{{optional($plan_purchase->user->sponsorDetail)->email}} <br>
                                                    <b>phone: </b>{{optional($plan_purchase->user->sponsorDetail)->phone}} <br> --}}
                                                    <b>Referrer Code: </b>{{optional($plan_purchase->user->sponsorDetail)->referrer_code}}
                                                </td>
                                                <td>
                                                    <table>
                                                        @foreach (App\Models\Commission::where('plan_purchase_id',$plan_purchase->id)->get() as $plan_key=>$commission_plan_purchase)
                                                            <tr>
                                                                <td>{{$commission_plan_purchase->user->name}}</td>
                                                                <td>
                                                                    @if($commission_plan_purchase->level == 1)
                                                                        Active
                                                                    @else
                                                                        Passive {{$plan_key}}
                                                                    @endif
                                                                </td>
                                                                <td>₹ {{$commission_plan_purchase->commission}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.payment.invoice',$plan_purchase->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1"><i class="fas fa-receipt"></i></a>
                                                    {{-- <a href="{{route('admin.payment.transaction.delete',$plan_purchase->id)}}" class="btn btn-outline-danger btn-sm mr-1 mb-1" onclick="return confirm('You Want to delete This Order?');"><i class="fa fa-trash"></i></a> --}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="footable-empty">
                                                <td colspan="11">
                                                    <center style="padding: 70px;"><i class="far fa-frown" style="font-size: 100px;"></i><br>
                                                        <h2>Nothing Found</h2>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                    {{-- <b>Total Sell:</b> ₹{{$total_sell}} <br>
                                    <b>Total Commision: </b> ₹{{$total_commission}} <br> --}}
                                    {{-- <b>Total Profit: </b> ₹{{$total_sell - $total_commission}} --}}
                                </table>
                                <hr>
                                <div class="row">

                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $plan_purchases->appends(['search_date'=>$search_date,'search_key'=>$search_key,'search_plan'=>$search_plan,'search_have_sponser'=>$search_have_sponser])->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

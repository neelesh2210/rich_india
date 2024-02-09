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
                                <div class="card-tools">
                                    <form action="{{route('admin.payout.transaction.index')}}">
                                        <div class="row">
                                            <div class="input-group input-group-sm" style="width: 200px;">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-calendar"></i>
                                                    </button>
                                                </div>
                                                <input class="form-control input-daterange-datepicker" id="reservation" type="text" name="search_date" value="{{$search_date}}" placeholder="Select Date Range...">
                                            </div>
                                            <div class="input-group input-group-sm" style="width: 200px;">
                                                <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-2">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">User Details</th>
                                            <th class="text-center">Payout Amount</th>
                                            <th class="text-center">Payment Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($payouts as $key=>$payout)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($payouts->currentPage() - 1)*$payouts->perPage()}}</td>
                                                <td>
                                                    <b>Name: </b>{{$payout->user->name}} <br>
                                                    <b>Email: </b>{{$payout->user->email}} <br>
                                                    <b>phone: </b>{{$payout->user->phone}} <br>
                                                    <b>Referrer Code: </b>{{$payout->user->referrer_code}}
                                                </td>
                                                <td class="text-center">
                                                    <b>Total Amount: </b> ₹ {{$payout->amount}} <br>
                                                    <b>Service Charge: </b> ₹ {{$payout->service_charge}} <br>
                                                    <b>TDS Charge: </b> ₹ {{$payout->tds_charge}} <br>
                                                    <b>Paid Amount: </b> ₹ {{$payout->amount - $payout->service_charge - $payout->tds_charge}} <br>
                                                </td>
                                                <td>
                                                    @if($payout->payment_detail)
                                                    <b>Payout Id: </b> {{json_decode($payout->payment_detail)->id}} <br>
                                                    @endif
                                                    <b>Payment Type: </b> {{$payout->payment_type}} <br>
                                                    <b>Date: </b>{{$payout->created_at->format('d-m-Y h:i A')}}

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
                                </table>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><b>Showing {{($payouts->currentpage()-1)*$payouts->perpage()+1}} to {{(($payouts->currentpage()-1)*$payouts->perpage())+$payouts->count()}} of {{$payouts->total()}} Payouts</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $payouts->appends(['search_key'=>$search_key,'search_date'=>$search_date])->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="payout-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pay Payout</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.pay.payout')}}" method="post" id="form_id">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="modal-body">
                        <label for="total_amount">Remaining Amount</label>
                        <input type="text" class="form-control" name="total_amount" id="total_amount" readonly>
                        <label for="payment_type">Payment Mode</label>
                        <select name="payment_type" id="payment_type" class="form-control" required>
                            <option value="">Select Payment Mode...</option>
                            <option value="online">Online</option>
                            <option value="cash">Cash</option>
                        </select>
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount..." required>
                        <span class="text-danger d-none">*You have ₹ 0 Payout</span><br>
                        <label for="remark">Remark</label>
                        <input type="text" class="form-control" name="remark" id="remark" placeholder="Enter Remark...">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="pay_button" onclick="submit_form()">Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

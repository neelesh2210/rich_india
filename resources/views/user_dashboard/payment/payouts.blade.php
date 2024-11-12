@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-left mt-1">
                                <ol class="breadcrumb m-0">
                                    <a href="#" class="btn btn-sm btn-dark waves-effect">
                                        Total Payout Amount : ₹ {{$payouts->sum('amount')}}
                                    </a>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('user.payouts')}}">
                    <div class="row">
                        <div class="col-md-7 mb-3"></div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">From</label>
                            <input class="form-control input-daterange-datepicker" id="reservation" type="text" name="search_date" value="{{$search_date}}" placeholder="Select Date Range...">
                        </div>
                        <div class="col-md-1 mb-3">
                            <button type="submit" class="btn btn-primary mt-3_5">Filter</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>TDS Charge</th>
                                        <th>Service Charge</th>
                                        <th>Final Amount</th>
                                        <th>Payment Mode</th>
                                        <th>Payment Detail</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payouts as $key=>$payout)
                                        <tr>
                                            <td>{{($key+1) + ($payouts->currentPage() - 1)*$payouts->perPage()}}</td>
                                            <td>{{$payout->created_at->format('d-M-Y h:i A')}}</td>
                                            <td>₹ {{$payout->amount}}</td>
                                            <td>₹ {{$payout->tds_charge}}</td>
                                            <td>₹ {{$payout->service_charge}}</td>
                                            <td>₹ {{$payout->amount - $payout->tds_charge - $payout->service_charge}}</td>
                                            <td>{{ucfirst($payout->payment_type)}}</td>
                                            <td>
                                                @if($payout->payment_detail)
                                                {{json_decode($payout->payment_detail)->id}}
                                                @endif
                                            </td>
                                            <td>{{$payout->remark}}</td>
                                        </tr>
                                    @empty
                                        <tr class="footable-empty">
                                            <td colspan="11">
                                                <center style="padding: 70px;"><i class="uil-frown" style="font-size: 100px;"></i><br>
                                                    <h2>Nothing Found</h2>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $payouts->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                                        Total Wallet Amount : ₹ {{Auth::guard('web')->user()->userDetail->total_wallet_balance}}
                                    </a>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <form action="{{route('user.payouts')}}">
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
                </form> --}}
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr. No</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">From</th>
                                        <th class="text-center">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $key=>$transaction)
                                        <tr>
                                            <td class="text-center">{{($key+1) + ($transactions->currentPage() - 1)*$transactions->perPage()}}</td>
                                            <td class="text-center">₹ {{$transaction->amount}}</td>
                                            <td class="text-center">{{ucfirst($transaction->type)}}</td>
                                            <td class="text-center">{{ucwords(str_replace('_',' ',$transaction->from))}}</td>
                                            <td class="text-center">{{$transaction->created_at->format('d-M-Y h:i A')}}</td>
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
                            <div class="d-flex justify-content-center mt-3">
                                {!! $transactions->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

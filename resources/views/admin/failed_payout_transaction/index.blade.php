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
                                    <form action="{{route('admin.failed.payout.transaction.index')}}">
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
                                                    ₹ {{$payout->amount}}
                                                </td>
                                                <td>
                                                    @if($payout->payment_detail && $payout->payment_detail != 'Use Have no Account Details')
                                                    <b>Reason: </b> {{json_decode($payout->payment_detail)->description}} <br>
                                                    @else
                                                    <b>Reason: </b> User Have no Account Details <br>
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

@endsection

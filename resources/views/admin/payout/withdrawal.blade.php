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
                    @if($search_key)
                    @php
                        $user = App\Models\User::where('phone',$search_key)->orWhere('email',$search_key)->first();
                    @endphp
                    <div class="col-sm-6">
                        <b>Name: </b>{{$user->name}} <br>
                        <b>Phone: </b>{{$user->phone}} <br>
                    </div>
                    @endif
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
                                    <form action="{{route('admin.withdrawal')}}">
                                        <div class="row">
                                            <div class="input-group input-group-sm mr-2" style="width: 200px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_date" value="{{$search_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                            </div>
                                            <div class="input-group input-group-sm " style="width: 200px;">
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
                                            <th>#</th>
                                            <th class="text-center">User Detail</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Payment Mode</th>
                                            <th class="text-center">Payment Detail</th>
                                            <th class="text-center">Remark</th>
                                            <th class="text-center">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($withdrawals as $key=>$withdrawal)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($withdrawals->currentPage() - 1)*$withdrawals->perPage()}}</td>
                                                <td>
                                                    <b>Name: </b>{{$withdrawal->user->name}} <br>
                                                    <b>Phone: </b>{{$withdrawal->user->phone}}
                                                </td>
                                                <td class="text-center">₹ {{$withdrawal->amount}} </td>
                                                <td class="text-center">{{ucfirst($withdrawal->payment_type)}} </td>
                                                <td class="text-center">
                                                    @if ($withdrawal->payment_detail)
                                                        {{json_decode($withdrawal->payment_detail)->id}}
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$withdrawal->remark}}</td>
                                                <td class="text-center">{{$withdrawal->created_at->format('d-M-Y h:i A')}}</td>
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
                                        <p><b>Showing {{($withdrawals->currentpage()-1)*$withdrawals->perpage()+1}} to {{(($withdrawals->currentpage()-1)*$withdrawals->perpage())+$withdrawals->count()}} of {{$withdrawals->total()}} Withdrawals</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $withdrawals->appends(['search_date'=>$search_date,'search_key'=>$search_key])->links() !!}
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

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
                                <form action="{{route('admin.withdrawal.request.index')}}">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-2">
                                            <div class="input-group input-group-sm">
                                                <select name="search_status" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="pending" @if($search_status == 'pending') selected @endif>Pending</option>
                                                    <option value="success" @if($search_status == 'success') selected @endif>Success</option>
                                                    <option value="cancel" @if($search_status == 'cancel') selected @endif>Cancel</option>
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
                                            <th class="text-center">#</th>
                                            <th class="text-center">User Details</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Service Charge</th>
                                            <th class="text-center">TDS Charge</th>
                                            <th class="text-center">Paid Amount</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($withdrawal_requests as $key=>$withdrawal_request)
                                            <tr>
                                                @php
                                                    $service_charge = App\Models\Admin\WebsiteSetting::where('type','service_charge')->first();
                                                    $tds_charge = App\Models\Admin\WebsiteSetting::where('type','tds_charge')->first();
                                                @endphp
                                                <td class="text-center">{{($key+1) + ($withdrawal_requests->currentPage() - 1)*$withdrawal_requests->perPage()}}</td>
                                                <td>
                                                    <b>Name: </b>{{$withdrawal_request->user->name}} <br>
                                                    <b>Email: </b>{{$withdrawal_request->user->email}} <br>
                                                    <b>phone: </b>{{$withdrawal_request->user->phone}} <br>
                                                    <b>Referrer Code: </b>{{$withdrawal_request->user->referrer_code}}
                                                </td>
                                                <td class="text-center">₹ {{$withdrawal_request->amount}}</td>
                                                <td class="text-center">₹ {{$service_charge?$service_charge->content:0}}</td>
                                                <td class="text-center">₹ {{$tds_charge?$tds_charge->content:0}}</td>
                                                <td class="text-center">₹ {{$withdrawal_request->amount - $service_charge->content - $tds_charge->content}}</td>
                                                <td class="text-center">{{$withdrawal_request->created_at}}</td>
                                                <td class="text-center">
                                                    @if($withdrawal_request->status == 'pending')
                                                        <select name="status_{{$withdrawal_request->id}}" id="status_{{$withdrawal_request->id}}" class="form-control" onchange="changeStatus({{$withdrawal_request->id}})">
                                                            <option value="pending" @if($withdrawal_request->status == 'pending') selected @endif>Pending</option>
                                                            <option value="success" @if($withdrawal_request->status == 'success') selected @endif>Success</option>
                                                            <option value="cancel" @if($withdrawal_request->status == 'cancel') selected @endif>Cancel</option>
                                                        </select>
                                                    @elseif($withdrawal_request->status == 'success')
                                                        <span class="badge bg-success">Success</span>
                                                    @elseif($withdrawal_request->status == 'cancel')
                                                        <span class="badge bg-danger">Cancel</span>
                                                    @endif
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
                                    <b>Total Remaining Payout : </b>₹ {{$total_withdrawal_request}}
                                </table>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><b>Showing {{($withdrawal_requests->currentpage()-1)*$withdrawal_requests->perpage()+1}} to {{(($withdrawal_requests->currentpage()-1)*$withdrawal_requests->perpage())+$withdrawal_requests->count()}} of {{$withdrawal_requests->total()}} Withdrawal Requests</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $withdrawal_requests->appends(['search_key'=>$search_key,'search_date'=>$search_date,'search_status'=>$search_status])->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>

        function changeStatus(id){
            Swal.fire({
                title: 'Ready to initiate the payout?',
                text: 'You will not be able to revert this',
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: 'Yes, Go Ahead!'
            }).then((result) => {
                if (result.value) {
                    var status = $('#status_'+id).val();
                    location.href = "{{route('admin.withdrawal.request.status')}}?id="+id+"&status="+status;
                }else{
                    $('#status_'+id).val('pending');
                }
            })
        }

    </script>

@endsection

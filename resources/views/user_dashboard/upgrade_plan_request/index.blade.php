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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <form action="{{route('user.registration.request')}}">
                                    <div class="row">
                                        <div class="col-md-2 mb-3"></div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Date Range Pick</label>
                                            <input class="form-control input-daterange-datepicker" id="reservation" type="text" name="search_date" value="{{$search_date}}" placeholder="Select Date Range...">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Packages Types</label>
                                            <select class="form-select" id="example-select" name="search_plan_id">
                                                <option value="">Select Plan...</option>
                                                @foreach (App\Models\Admin\Plan::all() as $plan)
                                                    <option value="{{$plan->id}}" @if($search_plan == $plan->id) selected @endif>{{$plan->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Search</label>
                                            <input type="text" class="form-control" placeholder="Enter Name,Phone,Email..." name="search_key" value="{{$search_key}}">
                                        </div>
                                        <div class="col-md-1 mb-3">
                                            <button type="subit" class="btn btn-primary mt-3_5">Filter</button>
                                        </div>
                                    </div>
                                    <hr>
                                </form> --}}
                                <table class="table table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Plan</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($list as $key=>$data)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($list->currentPage() - 1)*$list->perPage()}}</td>
                                                <td class="text-center">{{$data->user->name}}</td>
                                                <td class="text-center">{{$data->user->email}}</td>
                                                <td class="text-center">{{$data->user->phone}}</td>
                                                <td class="text-center">{{$data->plan->title}}</td>
                                                <td class="text-center">
                                                    @php
                                                        $current_plan = App\Models\Admin\Plan::where('id',$data->user->userDetail->current_plan_id)->first();
                                                        $upgrade_plan_detail = App\Models\Admin\Plan::where('id',$data->plan_id)->first();
                                                    @endphp
                                                    @isset($current_plan->upgrade_amount[$upgrade_plan_detail->priority - $current_plan->priority - 1])
                                                    ₹ {{$current_plan->upgrade_amount[$upgrade_plan_detail->priority - $current_plan->priority - 1]}}
                                                    @endisset
                                                </td>
                                                <td class="text-center">{{$data->created_at->format('d-M-Y H:i')}}</td>
                                                <td class="text-center">
                                                    @if($data->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                    @elseif($data->status == 'success')
                                                        <span class="badge bg-success">Approved</span>
                                                    @elseif($data->status == 'cancel')
                                                        <span class="badge bg-danger">Cancelled</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($data->status == 'pending')
                                                        <a class="btn btn-outline-primary btn-sm mr-1 mb-1" href="{{route('user.upgrade.plan.request.show',encrypt($data->id))}}"><i class="uil-edit" style="font-size: 20px;"></i></a>
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
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {!! $list->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

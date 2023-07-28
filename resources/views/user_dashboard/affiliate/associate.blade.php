@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Associates</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <form action="{{route('user.traffic')}}">
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
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Enrollment Date & Time</th>
                                            <th>Contact No</th>
                                            <th>PackageName</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($associates as $key=>$associate)
                                            <tr>
                                                <td>{{($key+1) + ($associates->currentPage() - 1)*$associates->perPage()}}</td>
                                                <td>{{$associate->name}}</td>
                                                <td>{{$associate->email}}</td>
                                                <td>{{$associate->created_at->format('d-M-Y H:i')}}</td>
                                                <td>{{$associate->phone}}</td>
                                                @php
                                                    $purchase_plan = App\Models\PlanPurchase::where('user_id',$associate->id)->with('plan')->first();
                                                @endphp
                                                <td>{{$purchase_plan->plan->title}}</td>
                                                <td>₹ {{$purchase_plan->amount}}</td>
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
                                    {!! $associates->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

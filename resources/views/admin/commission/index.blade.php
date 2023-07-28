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
                                    <form action="{{route('admin.commission.index')}}">
                                        <div class="row">
                                            <div class="input-group input-group-sm mr-2" style="width: 200px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_date" value="{{$search_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                            </div>
                                            <div class="input-group input-group-sm mr-2" style="width: 200px;">
                                                <select class="form-control" id="example-select" name="search_plan_id">
                                                    <option value="">Select Plan...</option>
                                                    @foreach (App\Models\Admin\Plan::all() as $plan)
                                                        <option value="{{$plan->id}}" @if($search_plan == $plan->id) selected @endif>{{$plan->title}}</option>
                                                    @endforeach
                                                </select>
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
                                            {{-- <th>Profitory Detail</th> --}}
                                            <th class="text-center">Joinee Detail</th>
                                            <th class="text-center">Sponsor Detail</th>
                                            <th class="text-center">Purchased Package</th>
                                            <th class="text-center">Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($commissions as $key=>$commission)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($commissions->currentPage() - 1)*$commissions->perPage()}}</td>
                                                {{-- <td>
                                                    <b>Name: </b>{{$commission->user->name}} <br>
                                                    <b>Email: </b>{{$commission->user->email}} <br>
                                                    <b>Phone: </b>{{$commission->user->phone}} <br>
                                                    <b>Referrer Code: </b>{{$commission->user->referrer_code}} <br>
                                                </td> --}}
                                                <td>
                                                    <b>Name: </b>{{$commission->purchasePlan->user->name}} <br>
                                                    {{-- <b>Email: </b>{{$commission->purchasePlan->user->email}} <br>
                                                    <b>Phone: </b>{{$commission->purchasePlan->user->phone}} <br> --}}
                                                    <b>Date: </b>{{$commission->purchasePlan->user->created_at->format('d-M-Y h:i A')}}
                                                </td>
                                                <td>
                                                    <b>Name: </b>{{optional($commission->purchasePlan->user->sponsorDetail)->name}} <br>
                                                    {{-- <b>Email: </b>{{optional($commission->purchasePlan->user->sponsorDetail)->email}} <br>
                                                    <b>Phone: </b>{{optional($commission->purchasePlan->user->sponsorDetail)->phone}} <br> --}}
                                                    <b>Referrer Code: </b>{{optional($commission->purchasePlan->user->sponsorDetail)->referrer_code}}
                                                </td>
                                                <td class="text-center">{{$commission->purchasePlan->plan->title}}</td>
                                                <td>
                                                    <table>
                                                        @foreach (App\Models\Commission::where('plan_purchase_id',$commission->plan_purchase_id)->get() as $plan_key=>$plan_purchase)
                                                            <tr>
                                                                <td>{{$plan_purchase->user->name}}</td>
                                                                <td>
                                                                    @if($plan_purchase->level == 1)
                                                                        Active
                                                                    @else
                                                                        Passive {{$plan_key}}
                                                                    @endif
                                                                </td>
                                                                <td>₹ {{$plan_purchase->commission}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
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
                                        <p><b>Showing {{($commissions->currentpage()-1)*$commissions->perpage()+1}} to {{(($commissions->currentpage()-1)*$commissions->perpage())+$commissions->count()}} of {{$commissions->total()}} Incomes</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $commissions->appends(['search_date'=>$search_date,'search_key'=>$search_key,'search_plan_id'=>$search_plan])->links() !!}
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

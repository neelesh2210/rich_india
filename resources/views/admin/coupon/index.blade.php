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
                    <div class="col-sm-6">
                        <a href="{{route('admin.coupons.create')}}" class="btn btn-primary float-right"> Add Coupon <i class="fas fa-plus"></i></a>
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
                                    <form action="{{route('admin.coupons.index')}}">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="search" name="search_key" value="" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Plan</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Start Date</th>
                                            <th class="text-center">End Date</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Is Active</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($coupons as $key=>$coupon)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($coupons->currentPage() - 1)*$coupons->perPage()}}</td>
                                                <td class="text-center">{{$coupon->name}}</td>
                                                <td class="text-center">
                                                    @foreach ($coupon->plan_ids as $plan_id)
                                                        @if($coupon->type == 'new')
                                                            {{App\Models\Admin\Plan::where('id',$plan_id)->first()->title}} <br>
                                                        @else
                                                            @php
                                                                $upgrade_to = explode('-',$plan_id);
                                                            @endphp
                                                            {{App\Models\Admin\Plan::where('id',$upgrade_to[0])->first()->title}} To {{App\Models\Admin\Plan::where('id',$upgrade_to[1])->first()->title}} <br>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="text-center">₹ {{$coupon->amount}}</td>
                                                <td class="text-center">{{date('d-m-Y',strtotime($coupon->start))}}</td>
                                                <td class="text-center">{{date('d-m-Y',strtotime($coupon->end))}}</td>
                                                <td class="text-center">{{ucwords($coupon->type)}}</td>
                                                <td class="text-center">
                                                    @if($coupon->is_active == '1')
                                                        <a href="{{route('admin.coupons.show',encrypt($coupon->id))}}?status=0" onclick="return confirm('Are you sure you want to not Feature this course?');"><span class="badge bg-success">Active</span></a>
                                                    @else
                                                        <a href="{{route('admin.coupons.show',encrypt($coupon->id))}}?status=1" onclick="return confirm('Are you sure you want to Feature this course?');"><span class="badge bg-danger">Not Active</span></a>
                                                    @endif
                                                </td>
                                                <td class="d-flex text-center">
                                                    <a href="{{route('admin.coupons.edit',encrypt($coupon->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form id="delete-form" action="{{route('admin.coupons.destroy',encrypt($coupon->id))}}" method="POST" onsubmit="return confirm('Are you want to delete this coupon!');">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-outline-danger btn-sm mb-1" style="width:32px;">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
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
                                        <p><b>Showing {{($coupons->currentpage()-1)*$coupons->perpage()+1}} to {{(($coupons->currentpage()-1)*$coupons->perpage())+$coupons->count()}} of {{$coupons->total()}} Coupons</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $coupons->links() !!}
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

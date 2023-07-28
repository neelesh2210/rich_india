@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        @can('plan-create')
                            <a href="{{route('admin.plan.create')}}" class="btn btn-primary float-right"> Add Plan <i class="fas fa-plus"></i></a>
                        @endcan
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
                            <h5 class="mb-0">@isset($page_title) {{$page_title}} @endisset</h5>
                        </div>
                            <div class="card-body table-responsive p-2">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Amount</th>
                                            <th>Points</th>
                                            <th>Is Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($plans as $key=>$plan)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    <img src="{{asset('backend/img/plan/'.$plan->image)}}" height="50px" width="50px">
                                                    {{$plan->title}}
                                                </td>
                                                <td>
                                                    <del>₹ {{$plan->amount}}</del> ₹ {{$plan->discounted_price}}
                                                </td>
                                                <td>
                                                    @foreach ($plan->points as $point)
                                                        {{$point}} <br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($plan->status)
                                                        <a href="{{route('admin.plan.status',[encrypt($plan->id),encrypt('0')])}}" onclick="return confirm('Are you sure you want to Deactivated this plan?');"><span class="badge bg-success">Active</span></a>
                                                    @else
                                                        <a href="{{route('admin.plan.status',[encrypt($plan->id),encrypt('1')])}}" onclick="return confirm('Are you sure you want to Active this plan?');"><span class="badge bg-danger">Not Active</span></a>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    @can('plan-edit')
                                                        <a href="{{route('admin.plan.edit',encrypt($plan->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan
                                                    {{-- <form id="delete-form" action="{{route('admin.plan.destroy',encrypt($plan->id))}}" method="POST" onsubmit="return confirm('Are you want delete this plan!');">
                                                        @method('DELETE')
                                                        @csrf
                                                        @can('plan-delete')
                                                            <button class="btn btn-outline-danger btn-sm mb-1" style="width:32px;">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        @endcan
                                                    </form> --}}
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

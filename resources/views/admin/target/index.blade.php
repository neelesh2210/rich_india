@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('admin.target.create')}}" class="btn btn-primary float-right"> Add Target <i class="fas fa-plus"></i></a>
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
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Start Date</th>
                                            <th class="text-center">End Date</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($targets as $key=>$target)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($targets->currentPage() - 1)*$targets->perPage()}}</td>
                                                <td>
                                                    <img src="{{asset('backend/img/target/'.$target->image)}}" height="50px" width="50px" onerror="this.onerror=null;this.src='{{ asset('backend/img/no-image.png') }}'">
                                                    {{$target->name}}
                                                </td>
                                                <td class="text-center">{{$target->start_date}}</td>
                                                <td class="text-center">{{$target->end_date}}</td>
                                                <td class="text-center">₹ {{$target->amount}}</td>
                                                <td class="text-center">
                                                    @if($target->is_active)
                                                        <a href="{{route('admin.target.show',encrypt($target->id))}}?status={{encrypt('0')}}" onclick="return confirm('Are you sure you want to Deactivated this target?');"><span class="badge bg-success">Active</span></a>
                                                    @else
                                                        <a href="{{route('admin.target.show',encrypt($target->id))}}?status={{encrypt('1')}}" onclick="return confirm('Are you sure you want to Active this target?');"><span class="badge bg-danger">Not Active</span></a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('admin.achieved.users',$target->id)}}" class="btn btn-outline-success btn-sm mr-1 mb-1" title="Achieved Users">
                                                        <i class="fas fa-users"></i>
                                                    </a>
                                                    <a href="{{route('admin.target.edit',encrypt($target->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1" title="Edit Target">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-outline-danger btn-sm mb-1" onclick="$('#delete-form-{{$target->id}}').submit()"  title="Delete Target">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{$target->id}}" action="{{route('admin.target.destroy',encrypt($target->id))}}" method="POST" onsubmit="return confirm('Are you want delete this target!');">
                                                        @method('DELETE')
                                                        @csrf
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

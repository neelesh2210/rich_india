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
                        @can('course-create')
                            <a href="{{route('admin.course.create')}}?search_key={{$search_key}}" class="btn btn-primary float-right"> Add Course <i class="fas fa-plus"></i></a>
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
                                <div class="card-tools">
                                    <form action="{{route('admin.course.index')}}">
                                        <label>Search</label>
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search...">
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
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            {{-- <th>Fee</th>
                                            <th>Discounted Fee</th>
                                            <th>Referral Commission</th> --}}
                                            <th>Is Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($courses as $key=>$course)
                                            <tr>
                                                <td>{{($key+1) + ($courses->currentPage() - 1)*$courses->perPage()}}</td>
                                                <td>{{$course->name}}</td>
                                                <td>
                                                    <img src="{{asset('backend/img/course/'.$course->image)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" style="height: 50px;width: 50px;">
                                                </td>
                                                {{-- <td>{{$course->price}}</td>
                                                <td>{{$course->discounted_price}}</td>
                                                <td>
                                                    @if($course->referral_commission_type == 'amount')
                                                        ₹{{$course->referral_commission}}
                                                    @else
                                                    {{$course->referral_commission}}%
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    @if($course->status)
                                                        <a href="{{route('admin.course.status',[encrypt($course->id),encrypt('0')])}}" onclick="return confirm('Are you sure you want to not Feature this course?');"><span class="badge bg-success">Active</span></a>
                                                    @else
                                                        <a href="{{route('admin.course.status',[encrypt($course->id),encrypt('1')])}}" onclick="return confirm('Are you sure you want to Feature this course?');"><span class="badge bg-danger">Not Active</span></a>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    @can('course-edit')
                                                        <a href="{{route('admin.course.edit',encrypt($course->id))}}?search_key={{$search_key}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan
                                                    @can('course-delete')
                                                        <form id="delete-form" action="{{route('admin.course.destroy',encrypt($course->id))}}" method="POST" onsubmit="return confirm('Deleting this course will delete all related topics');">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-outline-danger btn-sm mb-1" style="width:32px;">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endcan
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
                                        <p><b>Showing {{($courses->currentpage()-1)*$courses->perpage()+1}} to {{(($courses->currentpage()-1)*$courses->perpage())+$courses->count()}} of {{$courses->total()}} Courses</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $courses->appends(['search_key'=>$search_key])->links() !!}
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

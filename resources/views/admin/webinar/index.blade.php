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
                        <a href="{{route('admin.webinars.create')}}" class="btn btn-primary float-right"> Add Webinar <i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary">
                            {{-- <div class="card-header">
                                <div class="card-tools">
                                    <form action="{{route('admin.course.index')}}">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Date Time</th>
                                            <th>Link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($webinars as $key=>$webinar)
                                            <tr>
                                                <td>{{($key+1) + ($webinars->currentPage() - 1)*$webinars->perPage()}}</td>
                                                <td>{{$webinar->title}}</td>
                                                <td>
                                                    <img src="{{asset('backend/img/webinar/'.$webinar->image)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" style="height: 50px;width: 50px;">
                                                </td>
                                                <td>{{$webinar->date_time}}</td>
                                                <td>{{$webinar->link}}</td>
                                                <td class="d-flex">
                                                    <a href="{{route('admin.webinars.edit',$webinar->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form id="delete-form" action="{{route('admin.webinars.destroy',$webinar->id)}}" method="POST" onsubmit="return confirm('Deleting this webinar');">
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
                                        <p><b>Showing {{($webinars->currentpage()-1)*$webinars->perpage()+1}} to {{(($webinars->currentpage()-1)*$webinars->perpage())+$webinars->count()}} of {{$webinars->total()}} Webinars</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $webinars->links() !!}
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

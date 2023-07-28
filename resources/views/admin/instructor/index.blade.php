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
                        @can('instructor-create')
                            <a href="{{route('admin.instructors.create')}}" class="btn btn-primary float-right"> Add Instructor <i class="fas fa-plus"></i></a>
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
                                    <form action="{{route('admin.instructors.index')}}">
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
                                            <th class="text-center">Designation</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($instructors as $key=>$instructor)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($instructors->currentPage() - 1)*$instructors->perPage()}}</td>
                                                <td class="text-center">{{$instructor->name}}</td>
                                                <td class="text-center">{{$instructor->designation}}</td>
                                                <td class="text-center">
                                                    <img src="{{asset('backend/img/instructors/'.$instructor->image)}}" width="100px" height="100px">
                                                </td>
                                                <td class="d-flex text-center">
                                                    @can('instructor-edit')
                                                        <a href="{{route('admin.instructors.edit',encrypt($instructor->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan
                                                    <form id="delete-form" action="{{route('admin.instructors.destroy',encrypt($instructor->id))}}" method="POST" onsubmit="return confirm('Are you want to delete this instructor!');">
                                                        @method('DELETE')
                                                        @csrf
                                                        @can('instructor-delete')
                                                            <button class="btn btn-outline-danger btn-sm mb-1" style="width:32px;">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        @endcan
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
                                        <p><b>Showing {{($instructors->currentpage()-1)*$instructors->perpage()+1}} to {{(($instructors->currentpage()-1)*$instructors->perpage())+$instructors->count()}} of {{$instructors->total()}} Instructors</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $instructors->links() !!}
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

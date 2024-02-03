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
                        <a href="{{route('admin.blog.create')}}" class="btn btn-primary float-right"> Add Blog <i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Topic</th>
                                            <th class="text-center">Is Publish</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($blogs as $key=>$blog)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($blogs->currentPage() - 1)*$blogs->perPage()}}</td>
                                                <td class="text-center">
                                                    <img src="{{asset('backend/img/blog/'.$blog->image)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" style="height: 50px;width: 50px;">
                                                </td>
                                                <td class="text-center">{{$blog->title}}</td>
                                                <td class="text-center">{{$blog->topic}}</td>
                                                <td class="text-center">
                                                    @if($blog->is_publish)
                                                        <a href="{{route('admin.blog.show',encrypt($blog->id))}}?status={{encrypt('0')}}" onclick="return confirm('Are you sure you want to Unpublish this blog?');"><span class="badge bg-success">Publish</span></a>
                                                    @else
                                                        <a href="{{route('admin.blog.show',encrypt($blog->id))}}?status={{encrypt('1')}}" onclick="return confirm('Are you sure you want to Publish this blog?');"><span class="badge bg-danger">Unpublish</span></a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('admin.blog.edit',encrypt($blog->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-outline-danger btn-sm mb-1" onclick="$('#delete_form_{{$blog->id}}').submit()">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <form id="delete_form_{{$blog->id}}" action="{{route('admin.blog.destroy',encrypt($blog->id))}}" method="POST" onsubmit="return confirm('Are you want to delete this Blog?');">
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
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><b>Showing {{($blogs->currentpage()-1)*$blogs->perpage()+1}} to {{(($blogs->currentpage()-1)*$blogs->perpage())+$blogs->count()}} of {{$blogs->total()}} Blogs</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $blogs->links() !!}
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

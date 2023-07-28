@extends('admin.layouts.app')
@section('content')

<style>
    .select2-container .select2-selection--single {
        height: 31px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 19px;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 0px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 18px;
    }
</style>
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
                        @can('topic-create')
                            <a href="{{route('admin.topic.create')}}?search_course_id={{$search_course_id}}&search_key={{$search_key}}" class="btn btn-primary float-right"> Add Topic <i class="fas fa-plus"></i></a>
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
                                    <form action="{{route('admin.topic.index')}}">
                                        <div class="row">
                                            <div class="input-group input-group-sm mr-2" style="width: 200px;">
                                                <select name="search_course_id" class="form-control select2">
                                                    <option value="">Select Course...</option>
                                                    @foreach (App\CPU\CourseManager::withoutTrash()->orderBy('name','asc')->get() as $search_course)
                                                        <option value="{{$search_course->id}}" @if($search_course_id == $search_course->id) selected @endif>{{$search_course->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group input-group-sm" style="width: 200px;">
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
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course</th>
                                            <th>Title</th>
                                            {{-- <th>Thumbnail Image</th>
                                            <th>Cover Image</th> --}}
                                            <th>Video</th>
                                            {{-- <th>PDF</th> --}}
                                            <th>Is Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($topics as $key=>$topic)
                                            <tr>
                                                <td>{{($key+1) + ($topics->currentPage() - 1)*$topics->perPage()}}</td>
                                                <td>{{$topic->course->name}}</td>
                                                <td>{{$topic->title}}</td>
                                                {{-- <td>
                                                    <img src="{{asset('backend/img/topic/'.$topic->thumbnail_image)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" style="height: 100px;width: 150px;">
                                                </td>
                                                <td>
                                                    <img src="{{asset('backend/img/topic/'.$topic->cover_image)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" style="height: 100px;width: 150px;">
                                                </td> --}}
                                                <td>
                                                    @if($topic->video_url)
                                                        <iframe width="150px" height="100px" src="{{$topic->video_url}}"></iframe>
                                                    @else
                                                        <img src="{{asset('backend/img/no-video.png')}}" style="height: 100px;width: 150px;">
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    @if($topic->pdf)
                                                        <iframe width="150px" height="100px" src="{{asset('backend/img/topic/'.$topic->pdf)}}"></iframe>
                                                    @else
                                                        <img src="{{asset('backend/img/no-pdf.png')}}" style="height: 100px;width: 150px;">
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    @if($topic->status)
                                                        <a href="{{route('admin.topic.status',[encrypt($topic->id),encrypt('0')])}}" onclick="return confirm('Are you sure you want to not Feature this topic?');"><span class="badge bg-success">Active</span></a>
                                                    @else
                                                        <a href="{{route('admin.topic.status',[encrypt($topic->id),encrypt('1')])}}" onclick="return confirm('Are you sure you want to Feature this topic?');"><span class="badge bg-danger">Not Active</span></a>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    @can('topic-edit')
                                                        <a href="{{route('admin.topic.edit',encrypt($topic->id))}}?search_course_id={{$search_course_id}}&search_key={{$search_key}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan
                                                    @can('topic-delete')
                                                        <a href="#" onclick="event.preventDefault();document.getElementById('delete-form').submit();" class="btn btn-outline-danger btn-sm mb-1" style="width:32px;">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    @endcan
                                                    <form id="delete-form" action="{{route('admin.topic.destroy',encrypt($topic->id))}}" method="POST" class="d-none">
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
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><b>Showing {{($topics->currentpage()-1)*$topics->perpage()+1}} to {{(($topics->currentpage()-1)*$topics->perpage())+$topics->count()}} of {{$topics->total()}} Topics</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $topics->appends(['search_course_id'=>$search_course_id,'search_key'=>$search_key])->links() !!}
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

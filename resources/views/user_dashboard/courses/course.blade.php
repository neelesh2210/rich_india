@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xxl-10">
                        <div class="row mt-3 mb-3">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-bordered nav-justified">
                                            <li class="nav-item">
                                                <a href="#Enrolled" data-bs-toggle="tab" aria-expanded="false"
                                                    class="nav-link active">
                                                    <span class="d-inline-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                                                    <span class="d-none d-sm-inline-block">Enrolled Courses ({{$enrolled_courses->count()}})</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#Activee" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                    <span class="d-inline-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                                    <span class="d-none d-sm-inline-block">Active Courses ({{$active_courses->count()}})</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#Completed" data-bs-toggle="tab" aria-expanded="false"
                                                    class="nav-link">
                                                    <span class="d-inline-block d-sm-none"><i class="mdi mdi-email-variant"></i></span>
                                                    <span class="d-none d-sm-inline-block">Completed Courses</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="Enrolled">
                                                <div class="row mt-4 mb-3">
                                                    @foreach ($enrolled_courses as $enrolled_course)
                                                        <div class="col-md-6 col-xl-3">
                                                            <div class="card product-box">
                                                                <div class="product-img">
                                                                    <div class="p-2">
                                                                        <img src="{{asset('backend/img/course/'.$enrolled_course->image)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/default.png')}}'" alt="product-pic" class="img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="product-info border-top p-2">
                                                                        <div class="progress mb-2 progress-sm">
                                                                            <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                        <h5 class="font-14 mt-0 mb-1"><a href="{{ route('user.select.language',encrypt($enrolled_course->id)) }}">{{$enrolled_course->name}}</a> </h5>
                                                                        <a href="{{ route('user.select.language',encrypt($enrolled_course->id)) }}" class="btn learn waves-effect waves-light w-100">Continue Learning </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="Activee">
                                                <div class="row mt-4 mb-3">
                                                    @foreach ($active_courses as $active_course)
                                                        <div class="col-md-6 col-xl-3">
                                                            <div class="card product-box">
                                                                <div class="product-img">
                                                                    <div class="p-2">
                                                                        <img src="{{asset('backend/img/course/'.$active_course->image)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/default.png')}}'" alt="product-pic" class="img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="product-info border-top p-2">
                                                                    <div>
                                                                        <div class="progress mb-2 progress-sm">
                                                                            <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                        <h5 class="font-14 mt-0 mb-1"><a href="{{ route('user.select.language',encrypt($active_course->id)) }}" >{{$active_course->name}}</a> </h5>
                                                                        <a href="{{ route('user.select.language',encrypt($enrolled_course->id)) }}" class="btn learn waves-effect waves-light w-100">Continue Learning </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="Completed">
                                                <div class="row mt-4 mb-3">
                                                    {{-- <div class="col-md-6 col-xl-3">
                                                        <div class="card product-box">
                                                            <div class="product-img">
                                                                <div class="p-2">
                                                                    <img src="https://digiigyan.com/wp-content/uploads/2022/05/6_2.jpg" alt="product-pic" class="img-fluid" />
                                                                </div>
                                                            </div>
                                                            <div class="product-info border-top p-2">
                                                                <div>
                                                                    <div class="progress mb-2 progress-sm">
                                                                        <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                    <h5 class="font-14 mt-0 mb-1"><a href="#">Affiliate Marketing Mastery</a> </h5>
                                                                    <button type="button" class="btn btn-outline-primary waves-effect waves-light w-100">Continue Learning </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

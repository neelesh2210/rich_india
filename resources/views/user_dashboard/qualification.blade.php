@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Qualification</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                @foreach ($targets as $target)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card">
                                        <div class="card-body p-2">
                                            <a href="{{route('user.qualification.details',$target->id)}}">
                                                <img src="{{asset('backend/img/target/'.$target->image)}}"
                                                    alt="Card image" class="img-fluid">
                                            </a>
                                            <h4 class="text-center mb-1 mt-2">
                                                <a href="{{route('user.qualification.details',$target->id)}}"> {{$target->name}}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- container -->
        </div>
    </div>
    </div>
@endsection

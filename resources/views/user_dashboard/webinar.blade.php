@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row mt-3 mb-3">
                    @foreach ($webinars as $webinar)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="teams">
                                    <a href="{{$webinar->link}}" target="_blank">
                                        <img src="{{asset('backend/img/webinar/'.$webinar->image)}}" class="w-100" />
                                        <h5>{{$webinar->title}}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

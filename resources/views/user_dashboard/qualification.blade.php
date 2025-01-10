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
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card">
                                        <div class="card-body p-2">
                                            <a href="{{ route('user.qualification_details') }}">
                                                <img src="https://careerfixx.com/backend/img/target/119278451732096310.jpeg"
                                                    alt="Card image" class="img-fluid">
                                            </a>
                                            <h4 class="text-center mb-1 mt-2">
                                                <a href="{{ route('user.qualification_details') }}"> RichInd National
                                                    Trip</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
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

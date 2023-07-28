@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Marketing Material listing</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="row">
                            @foreach (App\Models\Admin\MarketingMaterial::all() as $marketing_material)
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="{{asset('backend/img/marketing_materials/'.$marketing_material->image)}}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

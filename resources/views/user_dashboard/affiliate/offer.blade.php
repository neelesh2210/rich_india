@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Offers listing</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="row">
                            @foreach (App\Models\Admin\Offer::all() as $offer)
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="{{asset('backend/img/offers/'.$offer->image)}}" class="img-fluid">
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

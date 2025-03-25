@extends('user_dashboard.layouts.app')
@section('content')
    <style>
        .loader{
            position: absolute;
            z-index: 1;
            top: 40%;
            left: 46%;
            z-index:9999;
            display:none;
        }
        .loader {
            background-color: #33333359;
            position: absolute;
            z-index: +100 !important;
            width: 100%;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }
        .loader img {
            width: 50px;
            top: 25%;
            transform: translateY(-50%);
            position: absolute;
            left: 48%;
        }
        .loader-hi8{
            height: 1100px;
        }
    </style>

    <div class="loader loader-hi8" id="loading_div">
        <img src="{{asset('loading.gif')}}" alt="" class="img-responsive">
    </div>

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Create New Id</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.wallet.registration.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" placeholder="Name...">
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email...">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" id="phone" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Phone...">
                                        @error('phone')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <select name="state" class="form-control">
                                            <option value="">Select State...</option>
                                            @foreach (states() as $state)
                                                <option value="{{$state}}" @if(old('state') == $state) selected @endif>{{$state}}</option>
                                            @endforeach
                                        </select>
                                        @error('state')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="plan" class="form-label">Plan</label>
                                        <select name="plan" class="form-control">
                                            <option value="">Select Plan...</option>
                                            @foreach (App\Models\Admin\Plan::oldest('priority')->get() as $plan)
                                                <option value="{{$plan->id}}" @if(old('plan') == $plan->id) selected @endif>{{$plan->title}} (₹ {{$plan->discounted_price}})</option>
                                            @endforeach
                                        </select>
                                        @error('plan')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="wallet_pin" class="form-label">Wallet Pin</label>
                                        <input type="text" id="wallet_pin" name="wallet_pin" value="{{old('wallet_pin')}}" class="form-control" placeholder="Wallet Pin...">
                                        @error('wallet_pin')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

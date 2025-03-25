@extends('user_dashboard.layouts.app')
@section('content')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Security</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.update.security')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="wallet_pin" class="form-label">Wallet Pin</label>
                                        <input type="text" id="wallet_pin" name="wallet_pin" value="{{old('wallet_pin', Auth::guard('web')->user()->wallet_pin)}}" class="form-control" placeholder="Wallet Pin...">
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

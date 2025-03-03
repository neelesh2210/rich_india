@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="preloaders d-none">
            <div class="d-table">
                <div class="d-table-cell">
                    <img src="{{ asset('backend/img/loader.gif') }}">
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title){{ $page_title }}@endisset </h5>
                                <b>Name: </b> {{$user->name}} <br>
                                <b>Email: </b> {{$user->email}} <br>
                                <b>Phone: </b> {{$user->phone}} <br>
                                <b>Referrer Code: </b> {{$user->referrer_code}} <br>
                                <b>Registration Date: </b> {{$user->created_at}} <br>
                                <b>Last Payout Date: </b> {{$user->userDetail?->lastPayout?->created_at}} <br>
                                <b>Last Commission Date: </b> {{$user->userDetail?->lastCommission?->created_at}}
                            </div>
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <form class="form-example" action="{{route('admin.withdrawal.amount.store', $user->id)}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="total_wallet_amount">Total Wallet Amount</label>
                                                    <input class="form-control" value="{{$user->userDetail->total_wallet_balance}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="withdrawal_amount">Withdrawal Amount <span class="text-danger">*</span> </label>
                                                    <input type="number" step="1" class="form-control" name="withdrawal_amount" placeholder="Enter Withdrawal Amount..." required>
                                                </div>
                                                @error('withdrawal_amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-success" >Withdrawal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

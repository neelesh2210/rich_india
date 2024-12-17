@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                @isset($page_title)
                                    {{ $page_title }}
                                @endisset
                            </li>
                        </ol>
                        <b>Credit Balance: </b> ₹ {{$levelup_credit_balance}} <br>
                        <b>Debit Balance: </b> ₹ {{$levelup_debit_balance}} <br>
                        <b>Remaining Balance: </b> ₹ {{$levelup_remainning_balance}}
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
                                <div class="">
                                    <form action="{{ route('admin.levelup.transaction') }}">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Type</label>
                                                <div class="input-group input-group-sm">
                                                    <select name="search_type" class="form-control">
                                                        <option value="">All</option>
                                                        <option value="credit" @if($search_type == 'credit') selected @endif>Credit</option>
                                                        <option value="debit" @if($search_type == 'debit') selected @endif>Debit</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>From</label>
                                                <div class="input-group input-group-sm">
                                                    <select name="search_from" class="form-control">
                                                        <option value="">All</option>
                                                        <option value="active_commission" @if($search_from == 'active_commission') selected @endif>Active Commission</option>
                                                        <option value="passive_commission" @if($search_from == 'passive_commission') selected @endif>Passive Commission</option>
                                                        <option value="upgrade" @if($search_from == 'upgrade') selected @endif>Upgrade</option>
                                                        <option value="main_wallet_transfer" @if($search_from == 'main_wallet_transfer') selected @endif>Main Wallet Transfer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Date</label>
                                                <div class="input-group input-group-sm mr-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="search_date" value="{{ $search_date }}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Search</label>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="search_key" value="{{ $search_key }}" class="form-control float-right" placeholder="Search">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-2">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">User Detail</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">From</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($levelup_transactions as $key=>$levelup_transaction)
                                            <tr>
                                                <td>{{ $key + 1 + ($levelup_transactions->currentPage() - 1) * $levelup_transactions->perPage() }}</td>
                                                <td>
                                                    <b>Name: </b>{{ $levelup_transaction->user->name }} <br>
                                                    <b>Email: </b>{{ $levelup_transaction->user->email }} <br>
                                                    <b>Phone: </b>{{ $levelup_transaction->user->phone }} <br>
                                                    <b>Referrer Code: </b>{{ $levelup_transaction->user->referrer_code }}
                                                </td>
                                                <td class="text-center">₹ {{ $levelup_transaction->amount }}</td>
                                                <td class="text-center">{{ ucfirst($levelup_transaction->type) }}</td>
                                                <td class="text-center">{{ ucwords(str_replace('_',' ',$levelup_transaction->from)) }}</td>
                                                <td class="text-center">{{ $levelup_transaction->created_at }}</td>
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
                                <hr>
                                <div class="row">

                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $levelup_transactions->appends(['search_date' => $search_date, 'search_key' => $search_key,'search_from'=>$search_from,'search_type'=>$search_type])->links() !!}
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

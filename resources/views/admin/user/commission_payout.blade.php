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
                                    <form action="{{ route('admin.user.commission.payout') }}">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">
                                                <label>Payout Date</label>
                                                <input type="date" name="search_payout_date" value="{{$search_payout_date}}" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Commission Date</label>
                                                <input type="date" name="search_commission_date" value="{{$search_commission_date}}" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Search</label>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="search_key" value="" class="form-control float-right" placeholder="Search">
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
                                            <th class="text-center">Last Commission Date</th>
                                            <th class="text-center">Last Payout Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $key=>$user)
                                            <tr>
                                                <td>{{ $key + 1 + ($users->currentPage() - 1) * $users->perPage() }}</td>
                                                <td>
                                                    <b>Name: </b>{{ $user->user->name }} <br>
                                                    <b>Email: </b>{{ $user->user->email }} <br>
                                                    <b>Phone: </b>{{ $user->user->phone }} <br>
                                                    <b>Date: </b>{{ $user->user->created_at->format('d-M-Y h:i A') }} <br>
                                                </td>
                                                <td class="text-center">
                                                    {{$user?->lastCommission?->created_at}}
                                                </td>
                                                <td class="text-center">{{$user?->lastPayout?->created_at}}</td>
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
                                        {!! $users->appends(['search_payout_date'=>$search_payout_date,'search_commission_date'=>$search_commission_date,'search_key' => $search_key])->links() !!}
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

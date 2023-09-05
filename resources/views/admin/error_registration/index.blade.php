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
                                    <form action="{{ route('admin.error.registration') }}">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Date</label>
                                                <div class="input-group input-group-sm mr-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="search_date" value="{{$search_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
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
                                            <th>#</th>
                                            <th>User Detail</th>
                                            <th>Sponsor Details</th>
                                            <th>Plan</th>
                                            <th>Transaction Image</th>
                                            <th>Error</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($error_registrations as $key=>$error_registration)
                                            <tr>
                                                <td>{{ $key + 1 + ($error_registrations->currentPage() - 1) * $error_registrations->perPage() }}</td>
                                                <td>
                                                    <b>Name: </b>{{ $error_registration->name }} <br>
                                                    <b>Email: </b>{{ $error_registration->email }} <br>
                                                    <b>Phone: </b>{{ $error_registration->phone }} <br>
                                                    <b>Date: </b>{{ $error_registration->created_at->format('d-M-Y h:i A') }} <br>
                                                    <b>Added By: </b>
                                                    @if ($error_registration->error == 'Self Registration Payment Error.' || $error_registration->error == 'Payment Verification')
                                                        Website
                                                    @else
                                                        Cosmofeed
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($error_registration->referral_code)
                                                        @php
                                                            $sponsor = App\Models\User::where('referrer_code',$error_registration->referral_code)->first();
                                                        @endphp
                                                        @if($sponsor)
                                                            <b>Name: </b>{{ $sponsor->name }} <br>
                                                            <b>Referrer Code: </b>{{ $sponsor->referrer_code }} <br>
                                                        @else
                                                            {{$error_registration->referral_code}}
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(is_numeric($error_registration->plan))
                                                        @php
                                                            $plan = App\Models\Admin\Plan::where('id',$error_registration->plan)->first();
                                                        @endphp
                                                        {{$plan->title}}
                                                    @else
                                                        {{$error_registration->plan}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($error_registration->payment_image)
                                                        <a href="{{asset('frontend/images/payment_image/'.$error_registration->payment_image)}}" target="_blank"><img src="{{asset('frontend/images/payment_image/'.$error_registration->payment_image)}}" height="100px" width="100px"></a>
                                                    @endif
                                                </td>
                                                <td>{{$error_registration->error}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('admin.add.user')}}?error_registration_id={{$error_registration->id}}" title="Convert to User" class="btn btn-outline-success btn-sm mr-1 mb-1"><i class="fas fa-recycle"></i></a>
                                                </td>
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
                                    <div class="col-md-4">
                                        <p>
                                            <b>Showing {{ ($error_registrations->currentpage() - 1) * $error_registrations->perpage() + 1 }} to
                                                {{ ($error_registrations->currentpage() - 1) * $error_registrations->perpage() + $error_registrations->count() }} of
                                                {{ $error_registrations->total() }} Users
                                            </b>
                                        </p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $error_registrations->appends(['search_date' => $search_date, 'search_key' => $search_key])->links() !!}
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

@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@isset($page_title) {{$page_title}} @endisset</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('admin.create.old.user')}}" class="btn btn-primary float-right">Add Old User <i class="fas fa-plus"></i></a>
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
                                <div class="card-tools">
                                    <form action="{{route('admin.get.old.users')}}">
                                        <div class="row">
                                            <div class="input-group input-group-sm mr-2" style="width: 200px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_date" value="{{$search_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                            </div>
                                            <div class="input-group input-group-sm" style="width: 200px;">
                                                <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
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
                                            <th>Paid Amount</th>
                                            <th>Unpaid Amount</th>
                                            <th>Associate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($old_users as $key=>$old_user)
                                            <tr>
                                                <td>{{($key+1) + ($old_users->currentPage() - 1)*$old_users->perPage()}}</td>
                                                <td>
                                                    <b>Name: </b>{{$old_user->name}} <br>
                                                    <b>Email: </b>{{$old_user->email}} <br>
                                                    <b>Phone: </b>{{$old_user->phone}} <br>
                                                    <b>Referrer Code: </b>{{$old_user->referrer_code}} <br>
                                                    <b>Package: </b>{{$old_user->userDetail->plan->title}}
                                                </td>
                                                <td>
                                                    <b>Name: </b>{{optional($old_user->sponsorDetail)->name}} <br>
                                                    <b>Referrer Code: </b>{{optional($old_user->sponsorDetail)->referrer_code}} <br>
                                                </td>
                                                <td>{{$old_user->userDetail->old_paid_payout}}</td>
                                                <td>{{$old_user->userDetail->old_not_paid_payout}}</td>
                                                <td class="text-center">
                                                    @php
                                                        $associates = App\Models\User::where('referral_code',$old_user->referrer_code)->get();
                                                    @endphp
                                                    <a href="{{route('admin.associates')}}?search_key={{$old_user->referrer_code}}">{{$associates->count()}}</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.edit.old.user',$old_user->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                                                        <i class="fas fa-edit "></i>
                                                    </a>
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
                                        <p><b>Showing {{($old_users->currentpage()-1)*$old_users->perpage()+1}} to {{(($old_users->currentpage()-1)*$old_users->perpage())+$old_users->count()}} of {{$old_users->total()}} Old Users</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $old_users->appends(['search_date'=>$search_date,'search_key'=>$search_key])->links() !!}
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

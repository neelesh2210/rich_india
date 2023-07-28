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
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary">
                            {{-- <div class="card-header">
                                <div class="card-tools">
                                    <form action="{{route('admin.user.index')}}">
                                        <div class="row">
                                            <div class="input-group input-group-sm" style="width: 200px;">
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
                            </div> --}}
                            <div class="card-body table-responsive p-2">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">User Details</th>
                                            <th class="text-center">Plan Details</th>
                                            <th class="text-center">Transaction Detils</th>
                                            <th class="text-center">Transaction Status</th>
                                            <th class="text-center">Sponsor Details</th>
                                            {{-- <th class="text-center">Is Verified</th> --}}
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @forelse ($users as $key=>$user)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($users->currentPage() - 1)*$users->perPage()}}</td>
                                                <td class="text-center">{{$user->name}}</td>
                                                <td class="text-center">{{$user->email}}</td>
                                                <td class="text-center">{{$user->phone}}</td>
                                                <td class="text-center">{{$user->referrer_code}}</td>
                                                <td>
                                                    <b>Name: </b>{{optional($user->sponsorDetail)->name}} <br>
                                                    <b>Email: </b>{{optional($user->sponsorDetail)->email}} <br>
                                                    <b>Phone: </b>{{optional($user->sponsorDetail)->phone}} <br>
                                                    <b>Referrer Code: </b>{{optional($user->sponsorDetail)->referrer_code}} <br>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-outline-primary btn-sm mr-1 mb-1" onclick="showProfileModel({{$user->id}})">
                                                        <i class="fas fa-eye"></i>
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
                                        @endforelse --}}
                                        <tr class="footable-empty">
                                            <td colspan="11">
                                                <center style="padding: 70px;"><i class="far fa-frown" style="font-size: 100px;"></i><br>
                                                    <h2>Nothing Found</h2>
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                {{-- <div class="d-flex justify-content-center mt-3">
                                    {!! $users->appends(['search_date'=>$search_date,'search_key'=>$search_key])->links() !!}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

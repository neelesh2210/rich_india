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
                    @if($search_key)
                    @php
                        $user = App\Models\User::where(function ($query) use ($search_key){
                                        $query->where('name','like','%'.$search_key.'%')
                                            ->orWhere('email','like','%'.$search_key.'%')
                                            ->orWhere('phone','like','%'.$search_key.'%')
                                            ->orWhere('referrer_code',$search_key   );
                                    })->first();
                    @endphp
                    <div class="col-sm-6">
                        <b>Name: </b>{{optional($user)->name}} <br>
                        <b>Phone: </b>{{optional($user)->phone}} <br>
                    </div>
                    @endif
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
                                    <form action="{{route('admin.associates')}}">
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
                                            <th>Active Plan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($associates as $key=>$associate)
                                            <tr>
                                                <td>{{($key+1) + ($associates->currentPage() - 1)*$associates->perPage()}}</td>
                                                <td>
                                                    <b>Name: </b>{{$associate->name}} <br>
                                                    <b>Email: </b>{{$associate->email}} <br>
                                                    <b>Phone: </b>{{$associate->phone}} <br>
                                                    <b>Referrer Code: </b>{{$associate->referrer_code}} <br>
                                                    <b>Date: </b>{{$associate->created_at->format('d-M-Y h:i A')}}
                                                </td>
                                                <td>{{$associate->userDetail->plan->title}}</td>
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
                                        <p><b>Showing {{($associates->currentpage()-1)*$associates->perpage()+1}} to {{(($associates->currentpage()-1)*$associates->perpage())+$associates->count()}} of {{$associates->total()}} Associates</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $associates->appends(['search_date'=>$search_date,'search_key'=>$search_key])->links() !!}
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

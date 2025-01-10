@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        @isset($page_title)
                            {{$page_title}}
                        @endisset
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
                            <u><h4>Target Detail</h4></u>
                            <b>Name: </b>{{$target->name}} <br>
                            <b>Duration: </b>{{$target->start_date}} - {{$target->end_date}} <br>
                            <b>Amount: </b>₹ {{$target->amount}}
                        </div>
                            <div class="card-body table-responsive p-2">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Coupon Code</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">No of Associate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $key=>$user)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($users->currentPage() - 1)*$users->perPage()}}</td>
                                                <td class="text-center">{{$user->name}}</td>
                                                <td class="text-center">{{$user->email}}</td>
                                                <td class="text-center">{{$user->phone}}</td>
                                                <td class="text-center">{{$user->referrer_code}}</td>
                                                <td class="text-center">₹ {{$user->commission_sum_commission}}</td>
                                                <td class="text-center">{{$user->associates_count}}</td>
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
                                        <p><b>Showing {{($users->currentpage()-1)*$users->perpage()+1}} to {{(($users->currentpage()-1)*$users->perpage())+$users->count()}} of {{$users->total()}} Users</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $users->links() !!}
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

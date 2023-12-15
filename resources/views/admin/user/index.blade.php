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
                    <div class="col-sm-6">
                        @can('user-create')
                            <a href="{{ route('admin.add.user') }}" class="btn btn-primary float-right"> Add User <i class="fas fa-plus"></i></a>
                        @endcan

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
                                    <form action="{{ route('admin.user.index') }}">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Register From</label>
                                                <div class="input-group input-group-sm">
                                                    <select name="search_register_from" class="form-control">
                                                        <option value="all" @if($search_register_from == 'all') selected @endif>All</option>
                                                        <option value="admin" @if($search_register_from == 'admin') selected @endif>Manual</option>
                                                        <option value="self" @if($search_register_from == 'self') selected @endif>Website</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Have Sponser</label>
                                                <div class="input-group input-group-sm">
                                                    <select name="search_have_sponser" class="form-control">
                                                        <option value="all" @if($search_have_sponser == 'all') selected @endif>All</option>
                                                        <option value="no_sponser" @if($search_have_sponser == 'no_sponser') selected @endif>No Sponser</option>
                                                        <option value="have_sponser" @if($search_have_sponser == 'have_sponser') selected @endif>Have Sponser</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Commission</label>
                                                <div class="input-group input-group-sm">
                                                    <input type="number" name="search_commission" class="form-control" value="{{$search_commission}}" placeholder="Commission Amount...">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Joining Date</label>
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
                                            <th>#</th>
                                            <th>User Detail</th>
                                            <th>Sponsor Details</th>
                                            <th>Active Plan</th>
                                            <th>Total Earning</th>
                                            <th>Total Withdrawl</th>
                                            <th>Total Wallet Amount</th>
                                            <th>Associate</th>
                                            <th>Old Site Data</th>
                                            {{-- <th class="text-center">Status</th> --}}
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $key=>$user)
                                            <tr>
                                                <td>{{ $key + 1 + ($users->currentPage() - 1) * $users->perPage() }}</td>
                                                <td>
                                                    <b>Name: </b>{{ $user->name }} <br>
                                                    <b>Email: </b>{{ $user->email }} <br>
                                                    <b>Phone: </b>{{ $user->phone }} <br>
                                                    <b>Referrer Code: </b>{{ $user->referrer_code }} <br>
                                                    <b>Date: </b>{{ $user->created_at->format('d-M-Y h:i A') }} <br>
                                                    <b>Added By: </b>
                                                    @if ($user->added_by == 'admin')
                                                        Manual
                                                    @elseif($user->added_by == 'self')
                                                        Website
                                                    @elseif($user->added_by == 'cosmofeed')
                                                        Cosmofeed
                                                    @endif
                                                        <br>
                                                    <b>@if(!empty($user->avatar))<a href="{{asset('frontend/images/avatar/'.$user->avatar)}}" download> <i class="fas fa-download"></i> Download Image</a>@endif </b><br>
                                                </td>
                                                <td>
                                                    <b>Name: </b>{{ optional($user->sponsorDetail)->name }} <br>
                                                    <b>Referrer Code: </b>{{ optional($user->sponsorDetail)->referrer_code }} <br>
                                                </td>
                                                <td>{{ $user->userDetail->plan->title }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.earning') }}?search_key={{ $user->email }}">
                                                        ₹ {{ $user->userDetail->total_commission }}
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.withdrawal') }}?search_key={{ $user->email }}">
                                                        @if ($user->payout_sum_amount)
                                                            ₹ {{ $user->payout_sum_amount }}
                                                        @else
                                                            ₹ 0
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-center">{{$user->userDetail->total_wallet_balance}}</td>
                                                <td class="text-center">
                                                    @php
                                                        $associates = App\Models\User::where('referral_code', $user->referrer_code)->where('delete_status','0')->get();
                                                    @endphp
                                                    <a href="{{ route('admin.associates') }}?search_key={{ $user->referrer_code }}">{{ $associates->count() }}</a>
                                                </td>
                                                <td>
                                                    <b>Paid Amount:</b> {{ $user->userDetail->old_paid_payout }} <br>
                                                    <b>Unpaid Amount:</b> {{ $user->userDetail->old_not_paid_payout }} <br>
                                                    <b>Total Amount:</b>
                                                    {{ $user->userDetail->old_paid_payout + $user->userDetail->old_not_paid_payout }}
                                                </td>
                                                {{-- <td>
                                                    @if($user->status == '1')
                                                    <a href="{{route('admin.change.user.status',[$user->id,'0'])}}" onclick="return confirm('Are you sure you want to Block this User?');">
                                                        <span class="badge bg-success">Active</span>
                                                    </a>
                                                    @elseif($user->status == '0')
                                                        <a href="{{route('admin.change.user.status',[$user->id,'1'])}}" onclick="return confirm('Are you sure you want to Active this User?');">
                                                            <span class="badge bg-danger">Blocked</span>
                                                        </a>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            @can('user-edit')
                                                                <a href="{{route('admin.edit.user',$user->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1" style="width:35px;" title="Edit User">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            @endcan

                                                        </div>
                                                        <div class="col-md-6">
                                                            <a class="btn btn-outline-primary btn-sm mr-1 mb-1" onclick="change_password('{{ $user->email }}')" style="width:35px;" title="Change Password">
                                                                <i class="fas fa-lock"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a class="btn btn-outline-primary btn-sm mr-1 mb-1" onclick="showProfileModel({{ $user->id }})" style="width:35px;" title="View User">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a class="btn btn-outline-primary btn-sm mr-1 mb-1" href="{{route('admin.upgrade.plan.index',$user->id)}}" style="width:35px;" title="Upgrade Plan">
                                                                <i class="fas fa-level-up-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
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
                                            <b>Showing {{ ($users->currentpage() - 1) * $users->perpage() + 1 }} to
                                                {{ ($users->currentpage() - 1) * $users->perpage() + $users->count() }} of
                                                {{ $users->total() }} Users
                                            </b>
                                        </p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $users->appends(['search_date' => $search_date, 'search_key' => $search_key,'search_have_sponser'=>$search_have_sponser,'search_register_from'=>$search_register_from,'search_commission'=>$search_commission])->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-xl">
            <div class="card card-primary card-outline">
                <div class="modal-header">
                    <h5 class="modal-title">User Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_div">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-sm-pass">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.change.password') }}" method="POST">
                        @csrf
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" readonly>
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" class="form-control">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-2">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showProfileModel(user_id) {
            $.ajax({
                type: 'GET',
                url: "{{ route('admin.user.profile', '') }}/" + user_id,
                success: function(data) {
                    $('#modal_div').html(data)
                    $('#modal-sm').modal().show()
                }
            });
        }

        function change_password(user_email) {
            $('#modal-sm-pass').modal().show();
            $('#email').val(user_email)
        }
    </script>
@endsection

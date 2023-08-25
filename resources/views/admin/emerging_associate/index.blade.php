@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item">@isset($page_title) {{$page_title}} @endisset</li>
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
                                <form action="{{route('admin.emerging.associate')}}">
                                    <b>Date:</b> {{$search_date}}
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3">
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
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search">
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
                            <div class="card-body table-responsive p-2">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Detail</th>
                                            <th>Sponsor Details</th>
                                            <th class="text-center">Active Plan</th>
                                            <th class="text-center">Total Earning</th>
                                            <th class="text-center">Total Withdrawl</th>
                                            <th class="text-center">Associate</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
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
                                                    <b>Referrer Code: </b>{{ $user->user->referrer_code }} <br>
                                                    <b>Date: </b>{{ $user->user->created_at->format('d-M-Y h:i A') }} <br>
                                                    <b>Added By: </b>
                                                    @if ($user->added_by == 'admin')
                                                        Manual
                                                    @elseif($user->added_by == 'self')
                                                        Website
                                                    @endif
                                                </td>
                                                <td>
                                                    <b>Name: </b>{{ optional($user->user->sponsorDetail)->name }} <br>
                                                    <b>Referrer Code: </b>{{ optional($user->user->sponsorDetail)->referrer_code }} <br>
                                                </td>
                                                <td>{{ $user->user->userDetail->plan->title }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.earning') }}?search_key={{ $user->user->email }}" target="_blank">
                                                        ₹ {{ $user->user->userDetail->total_commission }}
                                                    </a> <br>
                                                    <b>Target Amount: </b>₹
                                                    @if($user->commission_sum_commission)
                                                        {{$user->commission_sum_commission}}
                                                    @else
                                                        0
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.withdrawal') }}?search_key={{ $user->email }}" target="_blank">
                                                        @if ($user->user->payout_sum_amount)
                                                            ₹ {{ $user->user->payout_sum_amount }}
                                                        @else
                                                            ₹ 0
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.associates') }}?search_key={{ $user->user->referrer_code }}" target="_blank">{{ $user->user->associates_count }}</a>
                                                </td>
                                                <td>
                                                    @if($user->user->status == '1')
                                                        <span class="badge bg-success">Active</span>
                                                    @elseif($user->status == '0')
                                                            <span class="badge bg-danger">Blocked</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="btn btn-outline-primary btn-sm mr-1 mb-1" onclick="showProfileModel({{ $user->user->id }})" style="width:35px;" title="View User">
                                                                <i class="fas fa-eye"></i>
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
                                        {!! $users->appends(['search_date' => $search_date, 'search_key' => $search_key])->links() !!}
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
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_div">

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
    </script>

@endsection

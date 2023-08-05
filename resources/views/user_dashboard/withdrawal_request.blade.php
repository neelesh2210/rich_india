@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-left mt-1">
                                <ol class="breadcrumb m-0">
                                    <a class="btn btn-sm btn-dark waves-effect">
                                        Remaining Commission : ₹ {{$remaining_commission}}
                                    </a>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('user.withdrawal.request.index')}}">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a class="btn btn-primary waves-effect mt-35 w-100" onclick="makeRequest()"> Make Request</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">From</label>
                            <select name="search_status" class="form-control">
                                <option value="">All</option>
                                <option value="pending" @if($search_status == 'pending') selected @endif>Pending</option>
                                <option value="success" @if($search_status == 'success') selected @endif>Success</option>
                                <option value="cancel" @if($search_status == 'cancel') selected @endif>Cancel</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">From</label>
                            <input class="form-control input-daterange-datepicker" id="reservation" type="text" name="search_date" value="{{$search_date}}" placeholder="Select Date Range...">
                        </div>
                        <div class="col-md-1 mb-3">
                            <button type="submit" class="btn btn-primary mt-3_5">Filter</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr. No</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($withdrawal_requests as $key=>$withdrawal_request)
                                        <tr>
                                            <td class="text-center">{{($key+1) + ($withdrawal_requests->currentPage() - 1)*$withdrawal_requests->perPage()}}</td>
                                            <td class="text-center">₹ {{$withdrawal_request->amount}}</td>
                                            <td class="text-center">
                                                @if($withdrawal_request->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($withdrawal_request->status == 'success')
                                                    <span class="badge bg-success">Success</span>
                                                @elseif($withdrawal_request->status == 'cancel')
                                                    <span class="badge bg-danger">Cancel</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{$withdrawal_request->created_at}}</td>
                                        </tr>
                                    @empty
                                        <tr class="footable-empty">
                                            <td colspan="11">
                                                <center style="padding: 70px;"><i class="uil-frown" style="font-size: 100px;"></i><br>
                                                    <h2>Nothing Found</h2>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $withdrawal_requests->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="withdrawal-request-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Withdrawal Request</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('user.withdrawal.request.store')}}" method="post" id="withdrawal-request-form-id">
                    @csrf
                    <div class="modal-body">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control mt-2" name="amount" id="amount" placeholder="Enter Amount..." required>
                        <span class="text-danger error_span"></span>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" onclick="closeModal()">Close</button>
                        <button type="button" class="btn btn-primary" onclick="requestWithdrawal()">Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        function makeRequest(){
            $('#withdrawal-request-modal').modal('show')
        }

        function closeModal(){
            $('#withdrawal-request-modal').modal('hide')
        }

        function requestWithdrawal(){
            var amount = $('#amount').val();
            var remaining_commission = "{{$remaining_commission}}"
            if(amount){
                $('.error_span').text('')
                if(amount < 500){
                    $('.error_span').text('*Amount should be greater then ₹ 500!')
                }else{
                    if(parseInt(amount) <= parseInt(remaining_commission)){
                        Swal.fire({
                            title: 'Are you want to request amount?',
                            text: 'You will not be able to request next amount until this request was not proccessed',
                            showCancelButton: true,
                            confirmButtonColor: '#377dff',
                            cancelButtonColor: 'secondary',
                            confirmButtonText: 'Yes, Go Ahead!'
                        }).then((result) => {
                            if (result.value) {
                                $('#withdrawal-request-form-id').submit()
                            }
                        })
                    }else{
                        $('.error_span').text('*Insufficient Balance!')
                    }
                }
            }else{
                $('.error_span').text('*This field is required!')
            }
        }

    </script>

@endsection

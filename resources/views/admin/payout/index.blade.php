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
                    {{-- <div class="col-sm-6" id="automated_payout_div">
                        <a class="btn btn-primary float-right" onclick="automatedPayout()"> Automated Payout <i class="fas fa-money-bill-alt"></i></a>
                    </div>
                    <div class="col-sm-6 d-none" id="processing_payout_div">
                        <a class="btn btn-primary float-right"> Processing Your Payout <i class="fas fa-money-bill-alt"></i></a>
                    </div> --}}
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
                                    <form action="{{route('admin.payout.index')}}">
                                        <div class="row">
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
                                            <th class="text-center">#</th>
                                            <th class="text-center">User Details</th>
                                            <th class="text-center">Bank Details</th>
                                            <th class="text-center">Total Earning</th>
                                            <th class="text-center">Withdrwal Earning</th>
                                            <th class="text-center">Remaning Earning</th>
                                            {{-- <th class="text-center">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $key=>$user)
                                            @php
                                                $bankDetails = App\Models\BankDetail::where('user_id', $user->id)->first();
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($users->currentPage() - 1)*$users->perPage()}}</td>
                                                <td>
                                                    <b>Name: </b>{{$user->name}} <br>
                                                    <b>Email: </b>{{$user->email}} <br>
                                                    <b>phone: </b>{{$user->phone}} <br>
                                                    <b>Referrer Code: </b>{{$user->referrer_code}}
                                                </td>
                                                <td>
                                                    <b>Holder Name:</b> {{!empty($bankDetails) && $bankDetails ? $bankDetails->holder_name:''}}<br>
                                                    <b>Ifsc Code:</b> {{!empty($bankDetails) && $bankDetails ? $bankDetails->ifsc_code:''}}<br>
                                                    <b>Account Number:</b> {{!empty($bankDetails) && $bankDetails ? $bankDetails->account_number:''}}<br>
                                                    <b>Bank Name:</b> {{!empty($bankDetails) && $bankDetails ? $bankDetails->bank_name:''}}<br>
                                                    <b>Upi Id:</b> {{!empty($bankDetails) && $bankDetails ? $bankDetails->upi_id:''}}<br>
                                                </td>
                                                <td class="text-center">
                                                    @if($user->commission_sum_commission)
                                                        ₹ {{$user->commission_sum_commission}}
                                                    @else
                                                        ₹ 0
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($user->payout_sum_amount)
                                                        ₹ {{$user->payout_sum_amount}}
                                                    @else
                                                        ₹ 0
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    ₹ {{$user->balance}}
                                                </td>
                                                {{-- <td class="text-center">
                                                    <a class="btn btn-outline-success btn-sm mr-1 mb-1" onclick="openModal({{$user->balance}},{{$user->id}})">
                                                        <i class="fas fa-money-bill-alt"></i>
                                                    </a>
                                                </td> --}}
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
                                    <b>Total Remaining Payout :</b>₹ {{$total_remaining_earning}}
                                </table>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><b>Showing {{($users->currentpage()-1)*$users->perpage()+1}} to {{(($users->currentpage()-1)*$users->perpage())+$users->count()}} of {{$users->total()}} Payouts</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $users->appends(['search_key'=>$search_key])->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- <div class="modal fade" id="payout-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pay Payout</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.pay.payout')}}" method="post" id="form_id">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="modal-body">
                        <label for="total_amount">Remaining Amount</label>
                        <input type="text" class="form-control" name="total_amount" id="total_amount" readonly>
                        <label for="payment_type">Payment Mode</label>
                        <select name="payment_type" id="payment_type" class="form-control" required>
                            <option value="">Select Payment Mode...</option>
                            <option value="online">Online</option>
                            <option value="cash">Cash</option>
                        </select>
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount..." required>
                        <span class="text-danger d-none">*You have ₹ 0 Payout</span><br>
                        <label for="remark">Remark</label>
                        <input type="text" class="form-control" name="remark" id="remark" placeholder="Enter Remark...">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="pay_button" onclick="submit_form()">Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    {{-- <script>

        function openModal(remaining_amount,user_id){
            $('#total_amount').val(remaining_amount)
            $('#user_id').val(user_id)
            if(remaining_amount == 0){
                $('#amount').attr('disabled',true)
                $('#pay_button').attr('disabled',true)
                $('.text-danger').removeClass('d-none')
                $('.text-danger').text("*You have ₹ 0 Payout")
            }else{
                $('#amount').attr('disabled',false)
                $('#pay_button').attr('disabled',false)
                $('#amount').attr('onkeyup','maxValue('+remaining_amount+')')
                $('.text-danger').addClass('d-none')
            }
            $('#payout-modal').modal('show')
        }

        function maxValue(remaining_amount){
            var amount = $('#amount').val();
            if(parseInt(remaining_amount) >= parseInt(amount)){
                $('#pay_button').attr('disabled',false)
                $('.text-danger').addClass('d-none')
            }else{
                $('#pay_button').attr('disabled',true)
                $('.text-danger').removeClass('d-none')
                $('.text-danger').text("*You Cann't Pay more then Remaining Amount")
            }
        }

        function submit_form(){
            $('#pay_button').attr('disabled',true)
            $('#form_id').submit();
        }

        function automatedPayout(){
            $('#automated_payout_div').addClass('d-none');
            $('#processing_payout_div').removeClass('d-none');
            Swal.fire({
                title: 'Ready to initiate the payout?',
                text: 'You will not be able to revert this',
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: 'Yes, Go Ahead!'
            }).then((result) => {
                if (result.value) {
                    location.href = "{{route('admin.automated.payout')}}";
                }
            })
        }

    </script> --}}
@endsection

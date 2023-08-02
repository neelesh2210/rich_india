@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Bank Account Information</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h5 class="mb-3 text-uppercase bg-light p-2">Bank Account Information</h5> --}}
                            {{-- <hr> --}}
                            <form action="{{route('user.bank.detail.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="holder_name" class="form-label">Holder Name</label>
                                        <input type="text" id="holder_name" name="holder_name" value="{{old('holder_name',optional($user_details->bankDetail)->holder_name)}}" class="form-control" placeholder="Holder Name...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ifsc_code" class="form-label">IFSC Code</label>
                                        <input type="text" id="ifsc_code" name="ifsc_code" value="{{old('ifsc_code',optional($user_details->bankDetail)->ifsc_code)}}" class="form-control" placeholder="IFSC Code...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="account_number" class="form-label">Account Number</label>
                                        <input type="text" id="account_number" name="account_number" value="{{old('account_number',optional($user_details->bankDetail)->account_number)}}" class="form-control" placeholder="Account Number...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bank_name" class="form-label">Bank Name</label>
                                        <input type="text" id="bank_name" name="bank_name" value="{{old('bank_name',optional($user_details->bankDetail)->bank_name)}}" class="form-control" placeholder="Bank Name...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="upi_id" class="form-label">UPI ID</label>
                                        <input type="text" id="upi_id" name="upi_id" class="form-control" value="{{old('upi_id',optional($user_details->bankDetail)->upi_id)}}" placeholder="UPI ID...">
                                    </div>
                                    <div class="col-md-6 mb-3 @if(count(old()) == 0) d-none @endif  otp-div">
                                        <label for="otp" class="form-label">OTP</label>
                                        <input type="number" id="otp" name="otp" class="form-control" placeholder="OTP..." required>
                                    </div>
                                </div>
                                <a class="btn btn-primary @if(count(old()) != 0) d-none @endif verify-button" onclick="verifyEmailBankdetail()">Get OTP on email to make changes</a>
                                <button type="submit" class="btn btn-primary save-button @if(count(old()) == 0) d-none @endif">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function verifyEmailBankdetail(){
            $.get("{{route('user.verify.email.bank.detail')}}", function(data, status){
                $('.save-button').removeClass('d-none')
                $('.verify-button').addClass('d-none')
                $('.otp-div').removeClass('d-none')
            });
        }
    </script>

@endsection

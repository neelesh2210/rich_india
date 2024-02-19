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
                            {{-- <form action="#" method="POST"> --}}
                                @if(optional($user_details->bankDetail)->holder_name || optional($user_details->bankDetail)->ifsc_code || optional($user_details->bankDetail)->account_number || optional($user_details->bankDetail)->bank_name || optional($user_details->bankDetail)->upi_id)
                                    <form action="#" method="POST">
                                @else
                                    <form action="{{route('user.bank.detail.store')}}" method="POST">
                                @endif
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
                                    {{-- <div class="col-md-6 mb-3 @if(count(old()) == 0) d-none @endif  otp-div">
                                        <label for="otp" class="form-label">OTP</label>
                                        <input type="number" id="otp" name="otp" class="form-control" placeholder="OTP..." required>
                                    </div> --}}
                                </div>
                                @if(Auth::guard('web')->user()->kyc_status != 'verified')
                                    {{-- <a class="btn btn-primary @if(count(old()) != 0) d-none @endif verify-button" onclick="verifyEmailBankdetail()">Get OTP on email to make changes</a> --}}
                                    @if(optional($user_details->bankDetail)->holder_name || optional($user_details->bankDetail)->ifsc_code || optional($user_details->bankDetail)->account_number || optional($user_details->bankDetail)->bank_name || optional($user_details->bankDetail)->upi_id)
                                    @else
                                        <button type="submit" class="btn btn-primary save-button">Save Changes</button>
                                    @endif
                                @endif
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="page-title">Document Detail</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.document.detail.save')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="aadhar_name" class="form-label">Aadhar Name</label>
                                        <input type="text" id="aadhar_name" name="aadhar_name" value="{{old('aadhar_name',optional($user_details->bankDetail)->aadhar_name)}}" class="form-control" placeholder="Aadhar Name...">
                                        @error('aadhar_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="aadhar_number" class="form-label">Aadhar Number</label>
                                        <input type="text" id="aadhar_number" name="aadhar_number" value="{{old('aadhar_number',optional($user_details->bankDetail)->aadhar_number)}}" class="form-control" placeholder="Aadhar Number...">
                                        @error('aadhar_number')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pan_name" class="form-label">Pan Name</label>
                                        <input type="text" id="pan_name" name="pan_name" value="{{old('pan_name',optional($user_details->bankDetail)->pan_name)}}" class="form-control" placeholder="Pan Name...">
                                        @error('pan_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pan_number" class="form-label">Pan Number</label>
                                        <input type="text" id="pan_number" name="pan_number" value="{{old('pan_number',optional($user_details->bankDetail)->pan_number)}}" class="form-control" placeholder="Pan Number...">
                                        @error('pan_number')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="aadhar_front_image" class="form-label">Aadhra Front Image</label>
                                        <input type="file" name="aadhar_front_image" id="aadhar_front_image" class="form-control" accept="image/*">
                                        <div class="p-2">
                                            <img id="img1" src="{{asset('frontend/images/documents/'.optional($user_details->bankDetail)->aadhar_front_image)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" height="100px" width="100px">
                                        </div>
                                        @error('aadhar_front_image')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="aadhar_back_image" class="form-label">Aadhra Back Image</label>
                                        <input type="file" name="aadhar_back_image" id="aadhar_back_image" class="form-control" accept="image/*">
                                        <div class="p-2">
                                            <img id="img2" src="{{asset('frontend/images/documents/'.optional($user_details->bankDetail)->aadhar_back_image)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" height="100px" width="100px">
                                        </div>
                                        @error('aadhar_back_image')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pan_image" class="form-label">Pan Image</label>
                                        <input type="file" name="pan_image" id="pan_image" class="form-control" accept="image/*">
                                        <div class="p-2">
                                            <img id="img3" src="{{asset('frontend/images/documents/'.optional($user_details->bankDetail)->pan_image)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" height="100px" width="100px">
                                        </div>
                                        @error('pan_image')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                @if(Auth::guard('web')->user()->kyc_status != 'verified')
                                    <button type="submit" class="btn btn-primary save-button">Save Changes</button>
                                @endif
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

        aadhar_front_image.onchange = evt =>{
            const [file] = aadhar_front_image.files
            if (file) {
                img1.src = URL.createObjectURL(file)
            }
        }

        aadhar_back_image.onchange = evt =>{
            const [file] = aadhar_back_image.files
            if (file) {
                img2.src = URL.createObjectURL(file)
            }
        }

        pan_image.onchange = evt =>{
            const [file] = pan_image.files
            if (file) {
                img3.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection

@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">User Profile</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3 text-uppercase bg-light p-2">Sponsor Information</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="sponsor_name" class="form-label">Name</label>
                                    <input type="text" id="sponsor_name" class="form-control" value="{{optional($user_details->sponsorDetail)->name}}" placeholder="Sponsor Name..." readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sponsor_email" class="form-label">Email</label>
                                    <input type="email" id="sponsor_email" class="form-control" value="{{optional($user_details->sponsorDetail)->email}}" placeholder="Sponsor Email..." readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sponsor_phone" class="form-label">Phone</label>
                                    <input type="number" id="sponsor_phone" class="form-control" value="{{optional($user_details->sponsorDetail)->phone}}" placeholder="Sponsor Phone..." readonly>
                                </div>
                            </div>
                            <h5 class="mb-3 text-uppercase bg-light p-2">Personal Information</h5>
                            <hr>
                            <form action="{{route('user.save.user.profile')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" id="name" name="name" value="{{$user_details->name}}" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" id="email" name="email" value="{{$user_details->email}}" class="form-control" placeholder="Email" readonly required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                        <input type="number" id="phone" name="phone" value="{{$user_details->phone}}" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="gender" class="form-label">Gender <span  class="text-danger">*</span></label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="male" @if($user_details->gender == 'male') checked @endif> Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="female" @if($user_details->gender == 'female') checked @endif> Female
                                        </label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                        <input type="text" id="address" name="address" class="form-control" value="{{$user_details->address}}" placeholder="Address" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" id="city" name="city" class="form-control" value="{{$user_details->city}}" placeholder="City" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                                        <select class="form-select" id="example-select" name="state" required>
                                            <option value="">Select State...</option>
                                            @foreach (states() as $state)
                                                <option value="{{$state}}" @if($user_details->state == $state) selected @endif>{{$state}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pincode" class="form-label">Pincode <span class="text-danger">*</span></label>
                                        <input type="text" id="pincode" name="pincode" class="form-control" value="{{$user_details->pincode}}" placeholder="Pincode" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="images" class="form-label">Avatar</label>
                                        <input type="file" name="avatar" id="img_input1" class="form-control" accept="image/*">
                                        <div class="p-2">
                                            <img id="img1" src="{{asset('frontend/images/avatar/'.$user_details->avatar)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" height="100px" width="100px">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                            {{-- <h5 class="mb-3 text-uppercase bg-light p-2">Bank Account Information</h5>
                            <hr>
                            <form action="{{route('user.bank.detail.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="holder_name" class="form-label">Holder Name</label>
                                        <input type="text" id="holder_name" name="holder_name" value="{{optional($user_details->bankDetail)->holder_name}}" class="form-control" placeholder="Holder Name...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ifsc_code" class="form-label">IFSC Code</label>
                                        <input type="text" id="ifsc_code" name="ifsc_code" value="{{optional($user_details->bankDetail)->ifsc_code}}" class="form-control" placeholder="IFSC Code...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="account_number" class="form-label">Account Number</label>
                                        <input type="text" id="account_number" name="account_number" value="{{optional($user_details->bankDetail)->account_number}}" class="form-control" placeholder="Account Number...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bank_name" class="form-label">Bank Name</label>
                                        <input type="text" id="bank_name" name="bank_name" value="{{optional($user_details->bankDetail)->bank_name}}" class="form-control" placeholder="Bank Name...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="upi_id" class="form-label">UPI ID</label>
                                        <input type="text" id="upi_id" name="upi_id" class="form-control" value="{{optional($user_details->bankDetail)->upi_id}}" placeholder="UPI ID...">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        img_input1.onchange = evt =>{
            const [file] = img_input1.files
            if (file) {
                img1.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection

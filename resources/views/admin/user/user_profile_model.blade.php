<div class="card-body box-profile">
    <div class="row">
        <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                        <img src="{{asset('frontend/images/avatar/'.$user_details->avatar)}}" onerror="this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}';" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                        </div>
                        <h4 class="mt-3 mb-0 text-center">{{$user_details->name}}</h4>
                        <div class="text-start mt-3">
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Phone :</th>
                                            <td class="text-muted">{{$user_details->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ref Code :</th>
                                            <td class="text-muted">{{$user_details->referrer_code}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Earning :</th>
                                            <td class="text-muted">{{$user_details->userDetail->total_commission}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Withdrawl :</th>
                                            <td class="text-muted">        
                                                @if($user_details->payout_sum_amount)
                                                {{$user_details->payout_sum_amount}}
                                                @else
                                                    0
                                                @endif
                                          </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h4 class="header-title">User Detail</h4>
                        <hr>
                        <div class="text-start mt-3">
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Gender :</th>
                                            <td class="text-muted">{{ucfirst($user_details->gender)}} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email :</th>
                                            <td class="text-muted">{{$user_details->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address :</th>
                                            <td class="text-muted">{{$user_details->address}} {{$user_details->city}},{{$user_details->pincode}} {{$user_details->state}}</td>
                                        </tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Bank Details</h4>
                        <hr>
                        <div class="text-start mt-3">
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Bank Detail :</th>
                                            <td class="text-muted">{{optional($user_details->bankDetail)->holder_name}} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">IFSC Code :</th>
                                            <td class="text-muted">{{optional($user_details->bankDetail)->ifsc_code}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Account Number :</th>
                                            <td class="text-muted">{{optional($user_details->bankDetail)->account_number}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">UPI Id: </th>
                                            <td class="text-muted">{{optional($user_details->bankDetail)->upi_id}}</td>
                                        </tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Sponsor Details</h4>
                            <hr>
                            <div class="text-start mt-3">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-sm">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Name :</th>
                                                <td class="text-muted">{{optional($user_details->sponsorDetail)->name}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone :</th>
                                                <td class="text-muted">{{optional($user_details->sponsorDetail)->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email :</th>
                                                <td class="text-muted">{{optional($user_details->sponsorDetail)->email}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">State :</th>
                                                <td class="text-muted">{{optional($user_details->sponsorDetail)->state}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Referrer Code :</th>
                                                <td class="text-muted">{{optional($user_details->sponsorDetail)->referrer_code}}</td>
                                            </tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@extends('user_dashboard.layouts.app')
@section('content')
    <style>
        .loader{
            position: absolute;
            z-index: 1;
            top: 40%;
            left: 46%;
            z-index:9999;
            display:none;
            }

            .loader
            {
                background-color: #33333359;
                position: absolute;
                z-index: +100 !important;
                width: 100%;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
            }
            .loader img
            {
                width: 50px;
                top: 25%;
                transform: translateY(-50%);
                position: absolute;
                left: 48%;
            }
            .loader-hi8{
                height: 1100px;
            }
    </style>

    <div class="loader loader-hi8" id="loading_div">
        <img src="{{asset('loading.gif')}}" alt="" class="img-responsive">
    </div>

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Registration Request</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.registration.request.store',$user->id)}}" method="POST" id="registerForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name" value="{{old('name',$user->name)}}" class="form-control" placeholder="Name..." readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" value="{{old('email',$user->email)}}" class="form-control" placeholder="Email..." readonly>
                                        <span class="text-danger" id="error_email"></span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" id="phone" name="phone" value="{{old('phone',$user->phone)}}" class="form-control" placeholder="Phone..." readonly>
                                        <span class="text-danger" id="error_phone"></span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" id="state" name="state" value="{{old('state',$user->state)}}" class="form-control" placeholder="State..." readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="plan" class="form-label">Plan</label>
                                        <input type="text" id="plan" name="plan" class="form-control" value="{{old('plan',$user->planDetail->title)}}" placeholder="Plan..." readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" id="amount" name="amount" class="form-control" value="{{old('plan',$user->planDetail->discounted_price)}}" placeholder="Plan..." readonly>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function submit(){
            $('#loading_div').show()
            $.ajax({
                type: 'POST',
                url: "{{route('user.registration.request.store',$user->id)}}",
                data:$('#registerForm').serialize(),
                success: function(data) {
                    window.location.replace("{{route('user.registration.request')}}");
                },
                error: function (request, status, error) {
                    $('#loading_div').hide()
                    if(request.responseJSON.errors.name){
                        $('#error_name').show();
                        $('#error_name').addClass('text-danger');
                        $('#error_name').removeClass('text-success');
                        $('#error_name').text('✖ '+request.responseJSON.errors.name);
                    }else{
                        $('#error_name').show();
                        $('#error_name').addClass('text-success');
                        $('#error_name').removeClass('text-danger');
                        $('#error_name').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.email){
                        $('#error_email').show();
                        $('#error_email').addClass('text-danger');
                        $('#error_email').removeClass('text-success');
                        $('#error_email').text('✖ '+request.responseJSON.errors.email);
                    }else{
                        $('#error_email').show();
                        $('#error_email').addClass('text-success');
                        $('#error_email').removeClass('text-danger');
                        $('#error_email').text('✔ Email Available');
                    }
                    if(request.responseJSON.errors.phone){
                        $('#error_phone').show();
                        $('#error_phone').addClass('text-danger');
                        $('#error_phone').removeClass('text-success');
                        $('#error_phone').text('✖ '+request.responseJSON.errors.phone);
                    }else{
                        $('#error_phone').show();
                        $('#error_phone').addClass('text-success');
                        $('#error_phone').removeClass('text-danger');
                        $('#error_phone').text('✔ Phone Available');
                    }
                    if(request.responseJSON.errors.state){
                        $('#error_state').show();
                        $('#error_state').addClass('text-danger')
                        $('#error_state').removeClass('text-success');
                        $('#error_state').text('✖ '+request.responseJSON.errors.state);
                    }else{
                        $('#error_state').show();
                        $('#error_state').addClass('text-success');
                        $('#error_state').removeClass('text-danger');
                        $('#error_state').text('✔ Correct');
                    }
                }
            });
        }

    </script>

@endsection

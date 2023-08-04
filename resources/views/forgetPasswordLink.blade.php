<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<style>
    .mb-5{
        margin-top: 100px;
    }
    .mb-15{
        margin-bottom: 15px;
    }
    .form-control {
    height: 48px;
    padding: 15px 20px;
    line-height: initial;
    color: var(--paragraph-color);
    background-color: var(--white-color);
    border: 1px solid #ebebeb;
    border-radius: 0 !important;
    -webkit-box-shadow: unset;
    box-shadow: unset;
    -webkit-transition: var(--transition);
    transition: var(--transition);
    font-size: var(--font-size);
    font-weight: 400;
}
.input-group-addon {
    padding: 6px 18px!important;
    font-size: 16px!important;
    border-radius: 0 !important;
}
</style>
<div class="form-gap"></div>
<div class="container">
    <div class="row  mb-50">
        <div class="col-md-6 col-md-offset-3 col-md-12 col-sm-12 centered-element">
            <div class="panel panel-default mb-5">
                <div class="panel-body">
                    <div class="text-center">
                        <img src="{{ asset('frontend/images/logo-2.png') }}" alt="logo" style="width:250px">
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can reset your password here.</p>
                        <div class="panel-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('reset.password.post') }}" id="register-form" role="form" autocomplete="off" class="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group mb-15">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-envelope color-blue"></i>
                                        </span>
                                        <input type="email" id="email_address" class="form-control" name="email" placeholder="Enter Email" required autofocus>
                                    </div>
                                    <div class="input-group mb-15" id="show_hide_password">
                                        <span class="input-group-addon">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </span>
                                        <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control" placeholder="Password" required/>
                                    </div>
                                    <div class="input-group mb-15" id="show_hide_cpassword">
                                        <span class="input-group-addon">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </span>
                                        <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Password" required/>
                                    </div>
                                </div>
                                <div class="form-group mb-15">
                                    <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                </div>
                                <input type="hidden" class="hide" name="token" id="token" value="{{$token}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<script>
        $(document).ready(function() {
            $("#show_hide_password span").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });

            $("#show_hide_cpassword span").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_cpassword input').attr("type") == "text") {
                    $('#show_hide_cpassword input').attr('type', 'password');
                    $('#show_hide_cpassword i').addClass("fa-eye-slash");
                    $('#show_hide_cpassword i').removeClass("fa-eye");
                } else if ($('#show_hide_cpassword input').attr("type") == "password") {
                    $('#show_hide_cpassword input').attr('type', 'text');
                    $('#show_hide_cpassword i').removeClass("fa-eye-slash");
                    $('#show_hide_cpassword i').addClass("fa-eye");
                }
            });
        });
</script>

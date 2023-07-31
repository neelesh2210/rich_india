<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME')}} | Log in</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('backend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/adminlte.min.css')}}">

</head>

 <style>
    .login-page {
    background-color: #e6ecf1 !important;
    width: 100%;
    min-height: 100vh;
    padding: 35px 50px;
    background: url(../../backend/img/login.png);
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
}
.form-control {
    border: 0px;
    height: 45px;
    padding: 5px 10px;
    font-size: 20px;
    line-height: 1.42857143;
    color: #7d7d7d;
    background-color: transparent;
    background-image: none;
    border-bottom: 1px solid #ddd !important;
    box-shadow: none !important;
    outline: none !important;
    margin-bottom: 25px !important;
    border-radius: 0;
}
.card-title {
    float: inherit;
    font-size: 1.1rem;
    font-weight: 400;
    margin: 0;
}
 </style>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <div class="card-title text-center mb-4">
                    <img src="{{ asset('frontend/images/logo-2.png') }}" height="90px" alt="" class="">
                    <h5 class="mt-3"><b>Welcome to Richind</b></h5>
                    <p></p>
                </div>
                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Username" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12 mt-4 mb-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/js/adminlte.min.js')}}"></script>
</body>

</html>

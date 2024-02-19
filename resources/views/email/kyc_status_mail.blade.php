<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Career Fixx</title>
    <meta name="description" content="Career Fixx">
</head>
<style>
    a:hover {
        text-decoration: underline !important;
    }
</style>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background:#fff" width="100%" border="0" align="center" cellpadding="0"
                    cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <!-- Email Content -->
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:650px; background:#7139ac2b; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                                <tr>
                                    <td style="text-align:center;padding: 15px;border-bottom: 1px solid #dddddd6b;">
                                        <a href="{{ asset('frontend/images/logo/logo.png') }}" title="logo"
                                            target="_blank">
                                            <img src="{{ asset('frontend/images/logo/logo.png') }}" title="logo"
                                                alt="logo" style="width:300px">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <!-- Title -->
                                <tr>
                                    <td style="text-align:center;">
                                        <h1
                                            style="color:#1e1e2d; font-weight:400; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">
                                            Hi , @isset($user_name)
                                                {{ $user_name->name }}
                                            @else
                                                User
                                            @endisset
                                        </h1>
                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:10px 0 20px; border-bottom:1px solid #cecece;
                                    width:100px;"></span>
                                    </td>
                                </tr>
                                <!-- Details Table -->
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0" style="width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="thumbs"
                                                            style="width:100px; margin:auto; height:100px;">
                                                            @isset($status)
                                                            @if ($status=='verified')
                                                            <img src="{{ asset('frontend/images/check.png') }}"alt="good" border="0" style="width: 80%; margin: 10px auto;">
                                                            @else
                                                            <img src="{{ asset('frontend/images/reject.png') }}"alt="good" border="0" style="width: 80%; margin: 10px auto;">
                                                            @endif
                                                            @endisset
                                                        </div>
                                                        @isset($status)
                                                            @if ($status=='verified')
                                                                <h1 style="text-align:center;font-size: 19px; font-weight: 600; color: #000; letter-spacing: 0.5px;">Your KYC Status has been Verified!</h1>
                                                            @else
                                                                <h1 style="text-align:center;font-size: 19px; font-weight: 600; color: #000; letter-spacing: 0.5px;">Your KYC Status has been Rejected!</h1>
                                                            @endif
                                                        @endisset
                                                        @isset($admin_message)
                                                            @if ($admin_message)
                                                                <p style="text-align:center">{{$admin_message}}</p>
                                                            @endif
                                                        @endisset
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {{-- <p style="text-align:center; border-top:1px solid #ddd;padding-top: 15px; ">Many
                                            Many Congratulation From Career Fixx.</p> --}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:30px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table><br>
</body>

</html>

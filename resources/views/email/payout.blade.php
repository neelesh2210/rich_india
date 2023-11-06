<!doctype html>
<html lang="en-US">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Rich IND</title>
<meta name="description" content="Rich IND">
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
            <table style="background-color: #fff;" width="100%" border="0"
                align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="height:30px;">&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                            style="max-width:600px; background-image:url('{{ asset('frontend/images/email-bgs.jpg') }}'); border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                            <tr>
                                <td style="height:40px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align:center; border-bottom:1px solid #f2e8dc; padding-bottom: 10px;">
                                    <a href="{{ asset('frontend/images/logo-2.png') }}" title="logo" target="_blank">
                                        <img src="{{ asset('frontend/images/logo-2.png') }}" title="logo" alt="logo" style="height: 70px">
                                    </a>
                                </td>
                            </tr>
                            <!-- Title -->
                            <tr>
                                <td style="text-align:center;">
                                    <h1 style="color:#1e1e2d; margin-top: 20px; margin-bottom:0; font-weight:bold; font-size:32px;font-family:'Rubik',sans-serif;">
                                        Congratulations!</h1>
                                    <h1 style="color:#1e1e2d; font-weight:bold; margin:0;font-size:48px;font-family:'Rubik',sans-serif;">
                                        @isset($user_name)
                                        {{ $user_name }}
                                        @endisset</h1><br>
                                     <h1 style="color:#1e1e2d; font-weight:bold; margin:0;font-size:40px;color:red;font-family:'Rubik',sans-serif;">You Have Earned</h1><br>
                                     <h1 style="color:#1e1e2d; font-weight:bold; margin:0;font-size:60px;font-family:'Rubik',sans-serif;"> @isset($amount)
                                        {{ $amount }}
                                        @endisset INR</h1><br>
                                </td>

                            </tr>
                            <!-- Details Table -->
                            <tr>
                                <td>
                                    <p style="text-align:center;font-size:24px;font-weight:500;margin:5px 0 20px;">We Are Happy To Inform You That We Have Transferred Your Payment Into Your Bank Account.</p>
                                    <h1 style="text-align:center;color:#1e1e2d; font-weight:bold; margin:0;font-size:36px;font-family:'Rubik',sans-serif;">
                                        ({{date('d M Y')}})</h1><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:40px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="height:20px;">&nbsp;</td>
                </tr>

            </table>
        </td>
    </tr>
</table><br>
</body>

</html>

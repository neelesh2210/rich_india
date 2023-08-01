<!doctype html>
<html lang="en-US">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>RichIND</title>
<meta name="description" content="RichIND">
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
                    <td style="height:80px;">&nbsp;</td>
                </tr>
                <!-- Logo -->
                <tr>
                    <td style="height:20px;">&nbsp;</td>
                </tr>
                <!-- Email Content -->
                <tr>
                    <td>
                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                            style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                            <tr>
                                <td style="height:40px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align:center;">
                                    <a href="{{ asset('frontend/images/logo-2.png') }}" title="logo" target="_blank">
                                        <img src="{{ asset('frontend/images/logo-2.png') }}" title="logo" alt="logo">
                                    </a>
                                </td>
                            </tr>
                            <!-- Title -->
                            <tr>
                                <td style="text-align:center;">
                                    <h1 style="color:#1e1e2d; font-weight:bold; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">
                                        Congratulations!</h1><br>
                                    <h1 style="color:#1e1e2d; font-weight:bold; margin:0;font-size:48px;font-family:'Rubik',sans-serif;">
                                        {{ $user_name }}</h1><br>
                                     <h1 style="color:#1e1e2d; font-weight:bold; margin:0;font-size:40px;color:red;font-family:'Rubik',sans-serif;">You Have Earned</h1><br>
                                     <h1 style="color:#1e1e2d; font-weight:bold; margin:0;font-size:60px;font-family:'Rubik',sans-serif;"> {{ $amount }} INR</h1><br>
                                </td>

                            </tr>
                            <!-- Details Table -->
                            <tr>
                                <td>
                                    <p style="text-align:center;font-size:24px;font-weight:500;">We Are Happy To Inform You That We Have Transferred Your Payment Into Your Bank Account.</p>
                                    <h1 style="text-align:center;color:#1e1e2d; font-weight:bold; margin:0;font-size:36px;font-family:'Rubik',sans-serif;">
                                        { {{date('d M Y')}} }</h1><br>
                                    <h1 style="text-align:center;color:#1e1e2d; margin:0;font-weight:bold;font-size:18px;font-family:'Rubik',sans-serif;">.</h1><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:40px;"><img src="https://digiigyan.com/frontend/images/ribbon.png" style="height: 60px;width:100%;"></td>
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
                <tr>
                    <td style="text-align:center;">
                        <p style="font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;">&copy;
                            <strong>{{env('APP_URL')}}</strong></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table><br>
</body>

</html>

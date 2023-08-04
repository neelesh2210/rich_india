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
                    <td style="text-align:center;">
                        <a href="{{ asset('frontend/images/logo-2.png') }}" title="logo" target="_blank">
                            <img src="{{ asset('frontend/images/logo-2.png') }}"
                                title="logo" alt="logo" style="width: 275px;">
                        </a>
                    </td>
                </tr>
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
                            <!-- Title -->
                            <tr>
                                <td style="text-align:center;">
                                    <h1
                                        style="color:#1e1e2d; font-weight:400; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">
                                        Hi {{ $user_name }},</h1>
                                        <p style="margin:5px">Congratulations! </p>
                                        <p style="margin:5px">You are such a Team Player. </p>
                                    <span
                                        style="display:inline-block; vertical-align:middle; margin:10px 0 20px; border-bottom:1px solid #cecece;
                                    width:100px;"></span>
                                    <p style="margin:5px; text-align:left;padding:0">You Get a New Referral.</p>
                                </td>

                            </tr>
                            <!-- Details Table -->
                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0"
                                        style="width: 100%; border: 1px solid #ededed">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                    Amount:</td>
                                                <td
                                                    style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                    ₹ {{ $amount }}</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                    Details: </td>
                                                <td
                                                    style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                    RichIND</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                    Status:</td>
                                                <td
                                                    style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                    Verified</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p style="text-align:center;">Many Many Congratulation From RichIND.</p>
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

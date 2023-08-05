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
                <table style="background-color: #fff;" width="100%" border="0" align="center" cellpadding="0"
                    cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="{{ env('APP_URL') }}" title="logo" target="_blank">
                                <img width="200" src="https://richind.in/frontend/images/logo-2.png" title="logo"
                                    alt="logo">
                            </a>
                        </td>
                    </tr>
                    <!-- Logo -->
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <!-- Email Content -->
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px; background:#333; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <img src="{{ asset('user_dashboard/images/check.png') }}" title="logo"
                                            alt="logo" style="width: 50px;">
                                    </td>
                                </tr>
                                <!-- Title -->
                                <tr>
                                    <td style="text-align:center;">
                                        <h1
                                            style="color:#FFF; font-weight:bold;margin-bottom: 8px; margin-top: 8px;font-size:32px;font-family:'Rubik',sans-serif;">
                                            ₹ {{$amount}}.00</h1>
                                        <h1
                                            style="color:#FFF; font-weight:bold;margin-bottom: 8px; margin-top: 8px;font-size:18px;font-family:'Rubik',sans-serif;">
                                            Received Successfully</h1>
                                        <p
                                            style="border-bottom: 2px solid #4CAF50;border-width: 5px;width: 25px;text-align: center;margin: 0 auto;">
                                        </p>
                                    </td>

                                </tr>
                                <!-- Details Table -->
                                <tr>
                                    <td>
                                        <p
                                            style="text-align:left;font-size:16px;font-weight:500;color:#fff;line-height: 1.5;">
                                            You have received <b>₹ {{$amount}}.00</b> from <b>Rich IND.</b>Please find details
                                            below. </p>
                                        <p
                                            style="text-align:left;font-size:16px;font-weight:500;color:#fff;line-height: 1.5;">
                                            If you haven't received the amount, kindly contact richIND support team.</p>
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
                                <strong>{{ env('APP_URL') }}</strong>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table><br>
</body>

</html>

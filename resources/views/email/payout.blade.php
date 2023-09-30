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
                        <td style="height:50px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:525px; background: linear-gradient(90deg, #9d177e85, #4c27a66e); border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                                <tr>
                                    <td style="height:35px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;padding-bottom: 15px; border-bottom: 1px dashed #c3c3c391;">
                                        <a href="{{ env('APP_URL') }}" title="logo" target="_blank">
                                            <img width="275" src="https://richind.in/frontend/images/logo-2.png" title="logo"
                                                alt="logo">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <img src="{{ asset('frontend/images/check.gif') }}" title="logo"
                                            alt="logo">
                                    </td>
                                </tr>
                                <!-- Title -->
                                <tr>
                                    <td style="text-align:center;">
                                        <h1
                                            style="font-weight:bold;margin-bottom: 8px; margin-top: 0;font-size:32px;font-family:'Rubik',sans-serif;">
                                            ₹ @isset($amount)
                                            {{ $amount }}
                                            @endisset.00</h1>
                                        <h1
                                            style="font-weight:bold;margin-bottom: 8px; margin-top: 8px;font-size:18px;font-family:'Rubik',sans-serif;">
                                            Received Successfully</h1>
                                        <p style="display: inline-block;vertical-align: middle;margin: 10px 0 10px;border-bottom: 1px solid #d6a8de;width: 100px;"> </p>
                                    </td>

                                </tr>
                                <!-- Details Table -->
                                <tr>
                                    <td>
                                        <p
                                            style="text-align:center;font-size:16px;font-weight:500;line-height: 1.5;">
                                            You have received <b>₹  @isset($amount)
                                                {{ $amount }}
                                                @endisset.00</b> from <b>Rich IND.</b>Please find details
                                            below. </p>
                                        <p
                                            style="text-align:center;font-size:16px;font-weight:500;line-height: 1.5;">
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
                </table>
            </td>
        </tr>
    </table><br>
</body>

</html>

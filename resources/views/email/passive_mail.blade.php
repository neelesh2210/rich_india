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
                    <td style="height:50px;">&nbsp;</td>
                </tr>
                <!-- Email Content -->
                <tr>
                    <td>
                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                            style="max-width:525px; background:linear-gradient(90deg, #9d177e85, #4c27a66e); border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                            <tr>
                                <td style="height:35px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align:center;padding-bottom: 15px; border-bottom: 1px dashed #c3c3c391;">
                                    <a href="{{ asset('frontend/images/logo-2.png') }}" title="logo" target="_blank">
                                        <img src="{{ asset('frontend/images/logo-2.png') }}"
                                            title="logo" alt="logo" style="width:275px;">
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
                                        Hey
                                        @isset($user_name)
                                        {{ $user_name }}
                                        @endisset,</h1>
                                        <p style="margin:5px">Your are really awesome,
                                            Congratulations !</p>
                                    <span style="display: inline-block;vertical-align: middle;margin: 10px 0 10px;border-bottom: 1px solid #d6a8de;width: 100px;"></span>
                                    <p style="margin:5px 5px 10px;padding:0">You got a passive Commission from ({{optional($comes_from)->name}}).</p>
                                </td>

                            </tr>
                            <!-- Details Table -->
                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0"
                                        style="width: 100%; border: 1px solid #a183c9">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="padding: 10px; border-bottom: 1px solid #a183c9; width: 35%; font-weight:550; color:rgba(0,0,0,.64)">
                                                    Affiliate Income:</td>
                                                <td
                                                    style="padding: 10px; border-bottom: 1px solid #a183c9; color: #333;">
                                                    ₹  @isset($amount)
                                                    {{ $amount }}
                                                    @endisset</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="padding: 10px; border-bottom: 1px solid #a183c9;  width: 35%; font-weight:550; color:rgba(0,0,0,.64)">
                                                    Details: </td>
                                                <td
                                                    style="padding: 10px; border-bottom: 1px solid #a183c9; color: #333;">
                                                    RichIND</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="padding: 10px; width: 35%; font-weight:550; color:rgba(0,0,0,.64)">
                                                    Status:</td>
                                                <td
                                                    style="padding: 10px; color: #333;">
                                                    Verified</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p style="text-align:center;">Many many congratulations to you.</p>
                                    <p style="text-align:center; margin:5px;">We wish you all the best for your next one.<br>
                                        Thanks & Regards.</p>
                                        <h5 style="text-align:center; margin:5px;">Team RichIND</h5>
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

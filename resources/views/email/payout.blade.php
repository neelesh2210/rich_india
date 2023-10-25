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
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
      <tr>
        <td>
          <table style="background-color: #fff;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td style="height:50px;">&nbsp;</td>
            </tr>
            <tr>
              <td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:650px; background-image: url({{asset('frontend/images/email-bg.jpg')}}); background-size:contain; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 10px;">
                  <tbody>
                    <tr>
                      <td>
                        <div style="margin:0px auto;max-width:650px">
                          <div style="line-height:0;font-size:0">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%">
                              <tbody>
                                <tr>
                                  <td style="direction:ltr;font-size:0px;padding:24px 10px 48px 10px;padding-bottom:48px;padding-left:10px;padding-right:10px;padding-top:24px;text-align:center">
                                    <div style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                                      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
                                        <tbody>
                                          <tr>
                                            <td style="font-size:0px;word-break:break-word">
                                              <div style="height:96px;line-height:96px"> </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td align="left" style="font-size:0px;padding:10px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word">
                                              <div style="font-family:Arial,sans-serif;font-size:20px;letter-spacing:normal;line-height:1;text-align:left;color:#000000">
                                                <p style="line-height:20px;text-align:center;margin:10px 0;margin-top:25px"><span style="color:#ffffff;font-size:20px;letter-spacing:2px"><b>Congratulations,</b></span></p>
                                                <p style="line-height:20px;text-align:center;margin:10px 0;margin-bottom:10px"><span style="color:#ffffff;font-size:14px;letter-spacing:2px"><b>Withdrawal successful on RichInd!</b></span></p>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td style="font-size:0px;word-break:break-word">
                                              <div style="height:36px;line-height:36px"> </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td align="left" style="background:#ffffff;font-size:0px;padding:24px 24px 24px 24px;padding-top:24px;padding-right:10px;padding-bottom:24px;padding-left:10px;word-break:break-word">
                                              <div style="font-family:Arial,sans-serif;font-size:16px;letter-spacing:normal;line-height:1;text-align:left;color:#000000">
                                                <p style="line-height:24px;margin:10px 0;margin-top:10px"><span style="font-family:Poppins,Arial,Helvetica,sans-serif;font-size:16px">Greetings  @isset($user_name)  {{$user_name}} @endisset,</span></p>
                                                <p style="line-height:24px;margin:10px 0"><span style="font-family:Poppins,Arial,Helvetica,sans-serif;font-size:16px">₹ @isset($amount){{$amount}}@endisset Withdrawal Successfully.</span><br>&nbsp; </p>
                                                <p style="line-height:24px;margin:10px 0"><span style="font-family:Poppins,Arial,Helvetica,sans-serif;font-size:16px">We are happy to inform you that we have transferred your payment into your Bank Account</span><br><span style="font-family:Poppins,Arial,Helvetica,sans-serif;font-size:16px"></span></p>
                                                <p style="line-height:24px;margin:10px 0"><span style="font-family:Poppins,Arial,Helvetica,sans-serif;font-size:16px">Date : {{date('d-m-Y')}}</span></p>
                                                <p style="line-height:24px;margin:10px 0"> &nbsp;</p>
                                                <p style="line-height:24px;margin:10px 0"><span style="font-family:Poppins,Arial,Helvetica,sans-serif;font-size:16px">Regards,</span></p>
                                                <p style="line-height:24px;margin:10px 0;margin-bottom:10px"><span style="font-family:Poppins,Arial,Helvetica,sans-serif;font-size:16px">Team RICHIND.</span></p>
                                              </div>
                                            </td>
                                          </tr>
                                          {{-- <tr>
                                            <td align="center" style="background:#3759e0;font-size:0px;padding:10px 25px 10px 25px;padding-right:25px;padding-left:25px;word-break:break-word"></td>
                                          </tr> --}}
                                        </tbody>
                                      </table>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>

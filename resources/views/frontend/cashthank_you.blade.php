@extends('frontend.layouts.app')
@section('content')
    <style>
        tbody, td, tfoot, th, thead, tr{
            border: 0;
        }
    </style>
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:50px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
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
                                <tr>
                                    <td style="text-align:center;">
                                        <img src="{{asset('frontend/images/done.gif')}}" title="logo" alt="check" style="height:100px;margin-bottom: 10px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <h1 style="color:#1e1e2d; font-weight:600; margin:0;font-size:22px;font-family:'Rubik',sans-serif;">Your details has been submitted. Please wait for confirmation !</h1><br>
                                        <h1 style="color:#372d7a; font-weight:600; margin:0;font-size:22px;font-family:'Rubik',sans-serif;">Thank You !</h1><br>
                                    </td>

                                </tr>
                                <tr>
                                    <td style="height:40px;"><img src="{{ asset('frontend/images/ribbon.png') }}" style="height: 60px;width:100%;"></td>
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
    </table>
@endsection

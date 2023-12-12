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
                                        <h1 style="color:#1e1e2d; font-weight:600; margin:0;font-size:22px;font-family:'Rubik',sans-serif;">Thank You For Your Request!</h1><br>
                                        {{-- <h1 style="color:#1e1e2d; font-weight:600; margin:0;font-size:28px;color:red;font-family:'Rubik',sans-serif;">₹ {{request('amount')}}</h1><br> --}}
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <p style="text-align:center; font-size:22px">Your Request Submitted Successfull.</p>
                                        <h1 style="text-align:center;color:#1e1e2d; font-weight:600; margin:0;font-size:22px;font-family:'Rubik',sans-serif;">{ {{date('d M Y')}} }</h1><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0"
                                        style="width: 60%; border-bottom: 1px solid #ededed; margin:0 auto;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 5px 10px; border-bottom: 1px solid #ededed; width: 45%; font-weight:600; color:rgba(0,0,0,.64)">
                                                    Name:
                                                </td>
                                                <td style="padding: 5px 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                    {{$registration_error_log->name}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 5px 10px; border-bottom: 1px solid #ededed; width: 45%; font-weight:600; color:rgba(0,0,0,.64)">
                                                    Email:
                                                </td>
                                                <td style="padding: 5px 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                    {{$registration_error_log->email}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 5px 10px; border-bottom: 1px solid #ededed; width: 45%; font-weight:600; color:rgba(0,0,0,.64)">
                                                    Mobile No:
                                                </td>
                                                <td style="padding: 5px 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                    {{$registration_error_log->phone}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                                </tr><br>
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

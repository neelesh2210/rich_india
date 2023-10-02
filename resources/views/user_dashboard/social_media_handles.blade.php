@extends('user_dashboard.layouts.app')
@section('content')

<link href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" rel="stylesheet">
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Social Media</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                @if(websiteData('whatsappgroup'))
                                    @foreach (json_decode(websiteData('whatsappgroup')) as $whskey=>$whatsappgroup)
                                        <div class="mt-3 col-md-3">
                                            <div class="card product-box-hi8 p-3">
                                            <a href="{{$whatsappgroup->link}}" class="prt-social-whatsap" target="_blank"><i class="uil uil-whatsapp"></i></a>
                                            <p class="mb-1">{{$whatsappgroup->title}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                @if(websiteData('telegramgroup'))
                                    @foreach (json_decode(websiteData('telegramgroup')) as $telkey=>$telegramgroup)
                                        <div class="mt-3 col-md-3">
                                            <div class="card product-box-hi8 p-4">
                                            <a href="{{$telegramgroup->link}}" class="prt-social-telegram" target="_blank"></i><i class="fab fa-telegram"></i></a>
                                            <p class="mt-1 mb-1">{{$telegramgroup->title}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                @if(websiteData('instagramgroup'))
                                    @foreach (json_decode(websiteData('instagramgroup')) as $inskey=>$instagramgroup)
                                        <div class="mt-3 col-md-3">
                                            <div class="card product-box-hi8 p-3">
                                            <a href="{{$instagramgroup->link}}" class="prt-social-instagram" target="_blank"><i class="uil uil-instagram-alt"></i></a>
                                                <p class="mb-1">{{$instagramgroup->title}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                @if(websiteData('foundergroup'))
                                    @foreach (json_decode(websiteData('foundergroup')) as $fonkey=>$foundergroup)
                                        <div class="mt-3 col-md-3">
                                            <div class="card product-box-hi8 p-3">
                                            <a href="{{$foundergroup->link}}" class="prt-social-instagram" target="_blank"><i class="uil uil-instagram-alt"></i></a>
                                            <p class="mb-1">{{$foundergroup->name}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container -->
            </div>
            <!-- content -->
        </div>
    </div>
    <!-- END wrapper -->
@endsection

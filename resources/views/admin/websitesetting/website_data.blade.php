@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title) {{ $page_title }} @endisset</h5>
                            </div>
                            <div class="card-body table-responsive p-2">
                                <form action="{{ route('admin.websitesetting.store') }}?type=website_data" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body p-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="address" class="form-control" value="{{websiteData('address')}}" placeholder="Enter Address...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{websiteData('email')}}" placeholder="Enter Email...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Whatsapp</label>
                                                    <input type="number" minlength="10" maxlength="10" name="whatsapp" value="{{websiteData('whatsapp')}}" class="form-control" placeholder="Enter Whatsapp...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Telegram</label>
                                                    <input type="url" name="telegram" value="{{websiteData('telegram')}}" class="form-control" placeholder="Enter Telegram...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>QR Code</label>
                                                    <input type="file" name="qr_code" class="form-control">
                                                </div>
                                            </div>
                                            @if(websiteData('qr_code'))
                                                <div class="col-md-6">
                                                    <img src="{{asset('frontend/assets/images/'.websiteData('qr_code'))}}" height="200px" width="300px">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row" id="support_div">
                                            @if(websiteData('support_phone'))
                                                @foreach (json_decode(websiteData('support_phone')) as $key=>$support)
                                                    <div class="col-md-4 @if($key == '1') sdiv{{$key}} @endif">
                                                        <div class="form-group">
                                                            <label>Support Phone</label>
                                                            <input type="number" minlength="10" maxlength="10" name="support_phone[]" value="{{$support}}" class="form-control" placeholder="Enter Support Phone...">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 @if($key == '1') sdiv{{$key}} @endif" style="margin-top: 33px">
                                                        @if($key == '0')
                                                            <a class="btn btn-success" onclick="addSupportDiv()"><i class="fas fa-plus"></i></a>
                                                        @else
                                                            <a class="btn btn-danger" onclick="removeSupportDiv({{$key}})"><i class="fas fa-minus"></i></a>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Support Phone</label>
                                                        <input type="number" minlength="10" maxlength="10" name="support_phone[]" class="form-control" placeholder="Enter Support Phone...">
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-top: 33px">
                                                    <a class="btn btn-success" onclick="addSupportDiv()"><i class="fas fa-plus"></i></a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Save?');">
                                            <i class="fa fa-check" aria-hidden="true"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">Statistics</h5>
                            </div>
                            <div class="card-body table-responsive p-2">
                                <form action="{{ route('admin.websitesetting.store') }}?type=statistics" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body p-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Trainers</label>
                                                    <input type="text" name="trainers" class="form-control" value="{{websiteData('trainers')}}" placeholder="Enter Trainers...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Students</label>
                                                    <input type="text" name="students" class="form-control" value="{{websiteData('students')}}" placeholder="Enter Students...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Live Training</label>
                                                    <input type="text" name="live_training" value="{{websiteData('live_training')}}" class="form-control" placeholder="Enter Live Training...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Community Earning</label>
                                                    <input type="text" name="community_earning" value="{{websiteData('community_earning')}}" class="form-control" placeholder="Enter Community Earning...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Save?');">
                                            <i class="fa fa-check" aria-hidden="true"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        @if(websiteData('support_phone'))
            var x = "{{count(json_decode(websiteData('support_phone')))}}";
        @else
            var x =0;
        @endif
        function addSupportDiv(){
            x++;
            $('#support_div').append('<div class="col-md-4 sdiv'+x+'">'+
                                        '<div class="form-group">'+
                                            '<label>Support Phone</label>'+
                                            '<input type="number" minlength="10" maxlength="10" name="support_phone[]" class="form-control" placeholder="Enter Support Phone...">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-2 sdiv'+x+'" style="margin-top: 33px">'+
                                        '<a class="btn btn-danger" onclick="removeSupportDiv('+x+')"><i class="fas fa-minus"></i></a>'+
                                    '</div>')
        }

        function removeSupportDiv(min){
            $('.sdiv'+min).remove();
            x--;
        }

    </script>

@endsection

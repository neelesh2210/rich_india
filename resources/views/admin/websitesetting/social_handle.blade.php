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
                                <form action="{{ route('admin.websitesetting.store') }}?type=social_handle" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body p-2">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5>Whatsapp Group Links</h5>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <a class="btn btn-primary text-right" onclick="addWhatsappDiv()"><i class="fas fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row whatsapp_div">
                                                        @if(websiteData('whatsappgroup'))
                                                            @foreach (json_decode(websiteData('whatsappgroup')) as $whskey=>$whatsappgroup)
                                                            <div class="col-md-6 @if($whskey != 0) remdiv{{$whskey+1}} @endif">
                                                                <div class="form-group">
                                                                    <label>Title {{$whskey+1}}</label>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fa fa-whatsapp"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="whatsapp_title[]" placeholder="Title" value="{{$whatsappgroup->title}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if($whskey == 0)
                                                                <div class="col-md-6">
                                                            @else
                                                                <div class="col-md-4 remdiv{{$whskey+1}}">
                                                            @endif
                                                                    <div class="form-group">
                                                                        <label>Link {{$whskey+1}}</label>
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="fa fa-whatsapp"></i></span>
                                                                            </div>
                                                                            <input type="link" class="form-control" name="whatsapp[]" placeholder="Whatsapp" value="{{$whatsappgroup->link}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if($whskey != 0)
                                                                    <div class="col-md-2 remdiv{{$whskey+1}}">
                                                                        <div class="form-group">
                                                                            <a class="btn btn-danger" onclick="removeWhatsappDiv({{$whskey+1}})" style="margin-top:33px"><i class="fas fa-minus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Title 1</label>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fa fa-whatsapp"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="whatsapp_title[]" placeholder="Title" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Link 1</label>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fa fa-whatsapp"></i></span>
                                                                        </div>
                                                                        <input type="link" class="form-control" name="whatsapp[]" placeholder="Whatsapp" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5>Telegram Links</h5>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <a class="btn btn-primary text-right" onclick="addTelegramDiv()"><i class="fas fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row telegram_div">
                                                        @if(websiteData('telegramgroup'))
                                                            @foreach (json_decode(websiteData('telegramgroup')) as $telkey=>$telegramgroup)
                                                            <div class="col-md-6 @if($telkey != 0) remtdiv{{$telkey+1}} @endif">
                                                                <div class="form-group">
                                                                    <label>Title {{$telkey+1}}</label>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fa fa-telegram"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="title_telegram[]" placeholder="Telegram" value="{{$telegramgroup->title}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                @if($telkey == 0)
                                                                    <div class="col-md-6">
                                                                @else
                                                                    <div class="col-md-4 remtdiv{{$telkey+1}}">
                                                                @endif
                                                                <div class="form-group">
                                                                    <label>Link {{$telkey+1}}</label>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fa fa-telegram"></i></span>
                                                                        </div>
                                                                        <input type="link" class="form-control" name="telegram[]" placeholder="Telegram" value="{{$telegramgroup->link}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                @if($telkey != 0)
                                                                    <div class="col-md-2 remtdiv{{$telkey+1}}">
                                                                        <div class="form-group">
                                                                            <a class="btn btn-danger" onclick="removeTelegramDiv({{$telkey+1}})" style="margin-top:33px"><i class="fas fa-minus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Title 1</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fa fa-telegram"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="title_telegram[]" placeholder="Telegram" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Link 1</label>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fa fa-telegram"></i></span>
                                                                        </div>
                                                                        <input type="link" class="form-control" name="telegram[]" placeholder="Telegram" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5>Instagram Page</h5>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <a class="btn btn-primary text-right" onclick="addInstagramDiv()"><i class="fas fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row instagram_div">
                                                        @if(websiteData('instagramgroup'))
                                                            @foreach (json_decode(websiteData('instagramgroup')) as $inskey=>$instagramgroup)
                                                            <div class="col-md-6 @if($inskey != 0) remidiv{{$inskey+1}} @endif">
                                                                <div class="form-group">
                                                                    <label>Title {{$inskey+1}}</label>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="title_instagram[]" placeholder="Instagram" value="{{$instagramgroup->title}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if($inskey == 0)
                                                                <div class="col-md-6">
                                                            @else
                                                                <div class="col-md-4 remidiv{{$inskey+1}}">
                                                            @endif
                                                                    <div class="form-group">
                                                                        <label>Link {{$inskey+1}}</label>
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                                                            </div>
                                                                            <input type="link" class="form-control" name="instagram[]" placeholder="Instagram" value="{{$instagramgroup->link}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if($inskey != 0)
                                                                    <div class="col-md-2 remidiv{{$inskey+1}}">
                                                                        <div class="form-group">
                                                                            <a class="btn btn-danger" onclick="removeInstagramDiv({{$inskey+1}})" style="margin-top:33px"><i class="fas fa-minus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Title 1</label>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="title_instagram[]" placeholder="Instagram" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Link 1</label>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                                                        </div>
                                                                        <input type="link" class="form-control" name="instagram[]" placeholder="Instagram" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5>Founder & CEO Instagram</h5>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <a class="btn btn-primary text-right" onclick="addFounderDiv()"><i class="fas fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row founder_div">
                                                        @if(websiteData('foundergroup'))
                                                            @foreach (json_decode(websiteData('foundergroup')) as $fonkey=>$foundergroup)
                                                                <div class="col-md-6 remfdiv{{$fonkey+1}}">
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" class="form-control" name="name[]" placeholder="Name" value="{{$foundergroup->name}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 remfdiv{{$fonkey+1}}">
                                                                    <div class="form-group">
                                                                        <label>Image</label>
                                                                        <input type="file" class="form-control" name="image[]">
                                                                        @if($foundergroup->image)
                                                                            <img src="{{asset('backend/img/websitesetting/founder/'.$foundergroup->image)}}" height="100px" width="100px">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 remfdiv{{$fonkey+1}}">
                                                                    <div class="form-group">
                                                                        <label>Link</label>
                                                                        <input type="link" class="form-control" name="link[]" placeholder="Link" value="{{$foundergroup->link}}">
                                                                    </div>
                                                                </div>
                                                                <div class="@if($fonkey == 0) col-md-6 @else col-md-4 remfdiv{{$fonkey+1}} @endif">
                                                                    <div class="form-group">
                                                                        <label>Position</label>
                                                                        <input type="text" class="form-control" name="position[]" placeholder="Position" value="{{$foundergroup->position}}">
                                                                    </div>
                                                                </div>
                                                                @if($fonkey != 0)
                                                                    <div class="col-md-2 remfdiv{{$fonkey+1}}">
                                                                        <div class="form-group">
                                                                            <a class="btn btn-danger" onclick="removeFounderDiv({{$fonkey+1}})" style="margin-top:33px"><i class="fas fa-minus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control" name="name[]" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Image</label>
                                                                    <input type="file" class="form-control" name="image[]">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Link</label>
                                                                    <input type="link" class="form-control" name="link[]" placeholder="Link">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Position</label>
                                                                    <input type="text" class="form-control" name="position[]" placeholder="Position">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
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
        @if(websiteData('whatsappgroup'))
            var x = '{{count(json_decode(websiteData('whatsappgroup')))}}'
        @else
            var x = 1;
        @endif
        function addWhatsappDiv(){
            x++;
            $('.whatsapp_div').append('<div class="col-md-6 remdiv'+x+'">'+
                                            '<div class="form-group">'+
                                                '<label>Title '+x+'</label>'+
                                                '<div class="input-group mb-3">'+
                                                    '<div class="input-group-prepend">'+
                                                        '<span class="input-group-text"><i class="fa fa-whatsapp"></i></span>'+
                                                    '</div>'+
                                                    '<input type="text" class="form-control" name="whatsapp_title[]" placeholder="Title" value="">'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-4 remdiv'+x+'">'+
                                            '<div class="form-group">'+
                                                '<label>Link '+x+'</label>'+
                                                '<div class="input-group mb-3">'+
                                                    '<div class="input-group-prepend">'+
                                                        '<span class="input-group-text"><i class="fa fa-whatsapp"></i></span>'+
                                                    '</div>'+
                                                    '<input type="link" class="form-control" name="whatsapp[]" placeholder="Whatsapp">'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-2 remdiv'+x+'">'+
                                            '<div class="form-group">'+
                                                '<a class="btn btn-danger" onclick="removeWhatsappDiv('+x+')" style="margin-top:33px"><i class="fas fa-minus"></i></a>'+
                                            '</div>'+
                                        '</div>')
        }

        function removeWhatsappDiv(min){
            $('.remdiv'+min).remove()
            x--;
        }

        @if(websiteData('telegramgroup'))
            var y = '{{count(json_decode(websiteData('telegramgroup')))}}'
        @else
            var y = 1;
        @endif
        function addTelegramDiv(){
            y++;
            $('.telegram_div').append('<div class="col-md-6 remtdiv'+y+'">'+
                                            '<div class="form-group">'+
                                                '<label>Title '+y+'</label>'+
                                                '<div class="input-group mb-3">'+
                                                    '<div class="input-group-prepend">'+
                                                        '<span class="input-group-text"><i class="fa fa-telegram"></i></span>'+
                                                    '</div>'+
                                                    '<input type="text" class="form-control" name="title_telegram[]" placeholder="Telegram">'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-4 remtdiv'+y+'">'+
                                            '<div class="form-group">'+
                                                '<label>Link '+y+'</label>'+
                                                '<div class="input-group mb-3">'+
                                                    '<div class="input-group-prepend">'+
                                                        '<span class="input-group-text"><i class="fa fa-telegram"></i></span>'+
                                                    '</div>'+
                                                    '<input type="link" class="form-control" name="telegram[]" placeholder="Telegram">'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-2 remtdiv'+y+'">'+
                                            '<div class="form-group">'+
                                                '<a class="btn btn-danger" onclick="removeTelegramDiv('+y+')" style="margin-top:33px"><i class="fas fa-minus"></i></a>'+
                                            '</div>'+
                                        '</div>')
        }

        function removeTelegramDiv(min){
            $('.remtdiv'+min).remove()
            y--;
        }
        @if(websiteData('instagramgroup'))
            var z = '{{count(json_decode(websiteData('instagramgroup')))}}'
        @else
            var z = 1;
        @endif
        function addInstagramDiv(){
            z++;
            $('.instagram_div').append('<div class="col-md-6 remidiv'+z+'">'+
                                            '<div class="form-group">'+
                                                '<label>Title '+z+'</label>'+
                                                '<div class="input-group mb-3">'+
                                                    '<div class="input-group-prepend">'+
                                                        '<span class="input-group-text"><i class="fa fa-instagram"></i></span>'+
                                                    '</div>'+
                                                    '<input type="text" class="form-control" name="title_instagram[]" placeholder="Instagram">'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-4 remidiv'+z+'">'+
                                            '<div class="form-group">'+
                                                '<label>Link '+z+'</label>'+
                                                '<div class="input-group mb-3">'+
                                                    '<div class="input-group-prepend">'+
                                                        '<span class="input-group-text"><i class="fa fa-instagram"></i></span>'+
                                                    '</div>'+
                                                    '<input type="link" class="form-control" name="instagram[]" placeholder="Instagram">'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-2 remidiv'+z+'">'+
                                            '<div class="form-group">'+
                                                '<a class="btn btn-danger" onclick="removeInstagramDiv('+z+')" style="margin-top:33px"><i class="fas fa-minus"></i></a>'+
                                            '</div>'+
                                        '</div>')
        }

        function removeInstagramDiv(min){
            $('.remidiv'+min).remove()
            z--;
        }

        @if(websiteData('foundergroup'))
            var a = '{{count(json_decode(websiteData('foundergroup')))}}'
        @else
            var a = 0;
        @endif

        function addFounderDiv(){
            a++;
            $('.founder_div').append('<div class="col-md-6 remfdiv'+a+'">'+
                                        '<div class="form-group">'+
                                            '<label>Name</label>'+
                                            '<input type="text" class="form-control" name="name[]" placeholder="Name">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-6 remfdiv'+a+'">'+
                                        '<div class="form-group">'+
                                            '<label>Image</label>'+
                                            '<input type="file" class="form-control" name="image[]">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-6 remfdiv'+a+'">'+
                                        '<div class="form-group">'+
                                            '<label>Link</label>'+
                                            '<input type="link" class="form-control" name="link[]" placeholder="Link">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-4 remfdiv'+a+'">'+
                                        '<div class="form-group">'+
                                            '<label>Position</label>'+
                                            '<input type="text" class="form-control" name="position[]" placeholder="Position">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-2 remfdiv'+a+'">'+
                                        '<div class="form-group">'+
                                            '<a class="btn btn-danger" onclick="removeFounderDiv('+a+')" style="margin-top:33px"><i class="fas fa-minus"></i></a>'+
                                        '</div>'+
                                    '</div>');
        }

        function removeFounderDiv(min){
            $('.remfdiv'+min).remove();
            a--;
        }

    </script>

@endsection

@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title) {{ $page_title }} @endisset</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <form action="{{route('admin.commission-setting.store')}}" method="POST" class="form-example">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="level">Level <span class="text-danger">*</span></label>
                                                    <select name="level" id="level" class="form-control" onchange="addDiv()" required>
                                                        <option value="">Select Level...</option>
                                                        @for ($i=1;$i<=5;$i++)
                                                            <option value="{{$i}}" @if($commission_settings->count() == $i) selected @endif>{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="for_plan">For Plan <span class="text-danger">(This Will Update All Plan Commision)</span></label>
                                                    <input type="checkbox" name="for_plan" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="row">
                                            @foreach ($commission_settings as $key=>$commission_setting)
                                                <div class="col-md-6 form_div">
                                                    <div class="form-group">
                                                        <label for="level">Percent for Level {{$key+1}} <span class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" name="percent[]" value="{{$commission_setting->pecent}}" class="form-control" placeholder="Percent for Level {{$key+1}}... ">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Update?');"><i class="fa fa-check" aria-hidden="true"></i> SAVE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-header">
                                <h5 class="mb-0">Upgrade Commission Level</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <form action="{{route('admin.update.commission.level')}}" method="POST" class="form-example">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="level">Level <span class="text-danger">*</span></label>
                                                    <select name="upgrade_commission_level" class="form-control">
                                                        <option value="">Select Level...</option>
                                                        @for ($i=0;$i<=5;$i++)
                                                            <option value="{{$i}}" @if(optional($update_commission_setting)->content == $i) selected @endif>{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Update?');"><i class="fa fa-check" aria-hidden="true"></i> SAVE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>

        function addDiv(){
            var level = $('#level').val();
            $('#row').empty()
            for(var i=1; i<=level; i++){
                $('#row').append('<div class="col-md-6 form_div">'+
                                    '<div class="form-group">'+
                                        '<label for="level">Percent for Level '+i+' <span class="text-danger">*</span></label>'+
                                        '<input type="number" step="0.01" name="percent[]" class="form-control" placeholder="Percent for Level '+i+'... ">'+
                                    '</div>'+
                                '</div>');
            }
        }

    </script>

@endsection

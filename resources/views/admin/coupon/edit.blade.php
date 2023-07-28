@extends('admin.layouts.app')
@section('content')

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                            <h5 class="mb-0">@isset($page_title) {{$page_title}} @endisset</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="modal-body">
                                <form action="{{route('admin.coupons.update',encrypt($coupon->id))}}" method="POST" class="form-example" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="name">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter Name..." value="{{$coupon->name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="type">Type <span class="text-danger">*</span></label>
                                                <select name="type" id="type" class="form-control" onchange="changePlan()">
                                                    <option value="">Select Plan...</option>
                                                    <option value="new" @if($coupon->type == 'new') selected @endif>New Plan</option>
                                                    <option value="upgrade" @if($coupon->type == 'upgrade') selected @endif>Upgrade Plan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="plan_ids">Plan <span class="text-danger">*</span></label>
                                                <select name="plan_ids[]" id="plan_ids" class="form-control select2" data-placeholder="Select Plan..." multiple>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="start" value="{{date('Y-m-d',strtotime($coupon->start))}}" min="{{date('Y-m-d')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="end" value="{{date('Y-m-d',strtotime($coupon->end))}}" min="{{date('Y-m-d')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Amount <span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" class="form-control" name="amount" min="1" value="{{$coupon->amount}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-outline-success mt-1 mb-1"><i class="fa fa-check" aria-hidden="true"></i> SAVE</button>
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
    $(changePlan())
    function changePlan(){
        var type = $('#type').val();
        if(type == 'new'){
            $('#plan_ids').empty();
            $('#plan_ids').append("@foreach (App\CPU\PlanManager::withoutTrash()->orderBy('priority','asc')->get() as $plan)"+
                                        "<option value='{{$plan->id}}'>{{$plan->title}}</option>"+
                                    "@endforeach");
        }else{
            $('#plan_ids').empty();
            $('#plan_ids').append("<option value=''>Select Upgrade Plan...</option>"+
                                    "@foreach($upgrade_plans as $key=>$upgrade_plan)"+
                                        "<option value='{{$upgrade_plan['id']}}' @if(in_array($upgrade_plan['id'],$coupon->plan_ids)) selected @endif>{{$upgrade_plan['name']}}</option>"+
                                    "@endforeach");
        }
    }

</script>

@endsection

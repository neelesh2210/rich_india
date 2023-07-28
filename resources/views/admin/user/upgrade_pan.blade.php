@extends('admin.layouts.app')
@section('content')
<style>
    .lbl_msg {
        padding-top: 2px;
        font-size: 13px !important;
    }
</style>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title){{ $page_title }}@endisset
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <form class="form-example" id="form_id" action="{{route('admin.upgrade.plan',$user->id)}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Enter Name..." readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="email">Email <span class="text-danger">*</span> </label>
                                                    <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Enter Email..." readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="referrer_code">Referrer Code <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="referrer_code" value="{{$user->referrer_code}}" placeholder="Enter Referrer Code..." readonly required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="plan_id">Plan <span class="text-danger">*</span> </label>
                                                    <select name="plan_id" class="form-control" required>
                                                        @foreach (App\CPU\PlanManager::withoutTrash()->orderBy('priority','asc')->get() as $plan)
                                                            <option value="{{$plan->id}}" @if($user->userDetail->current_plan_id == $plan->id) selected @endif @if($user->userDetail->plan->priority >= $plan->priority) disabled @endif>{{$plan->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-success" onclick="submit_form()">Save</button>
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


@endsection

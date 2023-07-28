@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    @isset($page_title)
                                        {{ $page_title }}
                                    @endisset
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('admin.staff.update', $user->id) }}" method="POST" class="form-example" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        placeholder="Enter Name..." value="{{$user->name}}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email <span class="text-danger">*</span></label>
                                                    <input type="email" id="email" class="form-control" name="email"
                                                        placeholder="Enter Email..." value="{{$user->email}}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="role">Role <span class="text-danger">*</span></label>
                                                    <select name="roles[]" class="form-control select2" multiple data-placeholder="Select Roles...">
                                                        @foreach ($roles as $role)
                                                            <option value="{{$role}}" @if(in_array($role, $userRole)) selected @endif>{{$role}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" id="password" class="form-control" name="password"
                                                        placeholder="Enter Password...">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="c_password">Confirm Password</label>
                                                    <input type="password" id="c_password" class="form-control" name="confirm-password"
                                                        placeholder="Enter Confirm Password...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1"
                                                onclick="return confirm('Are you sure you want to update this staff?');"><i
                                                    class="fa fa-check" aria-hidden="true"></i> Update</button>
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

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
                                    <form action="{{ route('admin.roles.store') }}" method="POST" class="form-example" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Enter Role Name..." required>
                                                </div>
                                            </div>
                                            @foreach ($permissionParent as $parent)
                                                <div class="col-4">
                                                    <div class="card card-outline card-primary">
                                                        <div class="card-header">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="checkbox" id="all_{{ $parent->parent_name }}">
                                                                <label for="all_{{ $parent->parent_name }}">
                                                                    <h5 class="card-title">
                                                                        {{ ucwords(str_replace('-', ' ', ucwords(str_replace('_', ' ', $parent->parent_name)))) }}
                                                                    </h5>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="card-body" style="height: 200px; overflow-x: hidden;">
                                                            @php $permission = Spatie\Permission\Models\Permission::where('parent_name', $parent->parent_name)->get(); @endphp
                                                            @foreach ($permission as $value)
                                                                <div class="icheck-danger">
                                                                    <input type="checkbox" name="permission[]" id="roles_{{ $value->name }}" class="roles_{{ $parent->parent_name }}" value="{{ $value->id }}">
                                                                    <label for="roles_{{ $value->name }}">
                                                                        {{ ucwords(str_replace('-', ' ', ucwords(str_replace('_', ' ', $value->name)))) }}
                                                                    </label>
                                                                </div>

                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    $('#all_{{ $parent->parent_name }}').change(function() {
                                                        $('.roles_{{ $parent->parent_name }}').prop('checked', this.checked);
                                                    });
                                                    $('.roles_{{ $parent->parent_name }}').change(function() {
                                                        if ($('.roles_{{ $parent->parent_name }}:checked').length == $('.roles_{{ $parent->parent_name }}')
                                                            .length) {
                                                            $('#all_{{ $parent->parent_name }}').prop('checked', true);
                                                        } else {
                                                            $('#all_{{ $parent->parent_name }}').prop('checked', false);
                                                        }
                                                    });
                                                </script>
                                            @endforeach
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1"
                                                onclick="return confirm('Are you sure you want to Save this role?');"><i
                                                    class="fa fa-check" aria-hidden="true"></i> SAVE</button>
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

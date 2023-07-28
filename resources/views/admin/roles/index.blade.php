@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@isset($page_title) {{$page_title}} @endisset</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        @can('role-create')
                            <a href="{{route('admin.roles.create')}}" class="btn btn-primary float-right"> Add Role <i class="fas fa-plus"></i></a>
                        @endcan
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary">

                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($roles as $key=>$role)
                                            <tr>
                                                <td>{{($key+1) + ($roles->currentPage() - 1)*$roles->perPage()}}</td>
                                                <td>{{$role->name}}</td>
                                                <td class="d-flex">
                                                    <a class="btn btn-outline-info btn-sm mr-1 mb-1" href="{{ route('admin.roles.show',$role->id) }}"><i class="fas fa-eye"></i></a>
                                                    @can('role-edit')
                                                        <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan
                                                    @can('role-delete')
                                                        <form id="delete-form" action="{{route('admin.roles.destroy',$role->id)}}" method="POST" onsubmit="return confirm('Deleting this role will delete all related topics');">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-outline-danger btn-sm mb-1" style="width:32px;">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form> 
                                                    @endcan
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="footable-empty">
                                                <td colspan="11">
                                                    <center style="padding: 70px;"><i class="far fa-frown" style="font-size: 100px;"></i><br>
                                                        <h2>Nothing Found</h2>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $roles->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

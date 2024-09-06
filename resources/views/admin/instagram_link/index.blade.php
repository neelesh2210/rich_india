@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title) {{ $page_title }} @endisset</h5>
                            </div>
                            <div class="card-body table-responsive p-2">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Link</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($instagram_links as $key=>$instagram_link)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td class="text-center">{{$instagram_link->link}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('admin.instagram-link.edit',$instagram_link->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1" style="width:35px;" title="Edit Language">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-outline-danger btn-sm mb-1" onclick="$('#delete-form-'+{{$instagram_link->id}}).submit();" style="width:32px;">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <form id="delete-form-{{$instagram_link->id}}" action="{{ route('admin.instagram-link.destroy', $instagram_link->id) }}" method="POST" onsubmit="return confirm('Are you want delete this Language!');">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="footable-empty">
                                                <td colspan="11">
                                                    <center style="padding: 70px;"><i class="far fa-frown"
                                                            style="font-size: 100px;"></i><br>
                                                        <h2>Nothing Found</h2>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($edit_instagram_link) Update @else Add @endisset Instagram Link</h5>
                            </div>
                            @isset($edit_instagram_link)
                                <form action="{{ route('admin.instagram-link.update',$instagram_link->id) }}" method="POST">
                                    @method('PUT')
                            @else
                                <form action="{{ route('admin.instagram-link.store') }}" method="POST">
                            @endisset
                                @csrf
                                <div class="card-body p-2">
                                    <div class="row">
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="link">Link</label>
                                                <input type="text" class="form-control" name="link" @isset($edit_instagram_link) value="{{$edit_instagram_link->link}}" @endisset placeholder="Enter Link...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    @isset($edit_instagram_link)
                                        <button type="submit" class="btn btn-outline-warning mt-1 mb-1" onclick="return confirm('Are you sure you want to Update?');"><i class="fa fa-check" aria-hidden="true"></i> Update</button>
                                    @else
                                        <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Save?');"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                                    @endisset
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

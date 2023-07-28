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
                                <form action="{{ route('admin.websitesetting.store') }}?type=social" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body p-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Facebook</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-facebook-f"></i></span>
                                                        </div>
                                                        <input type="link" class="form-control" name="facebook" placeholder="Facebook" value="{{socialMediaLink('facebook')}}">
                                                        <input type="hidden" name="social[]" value="facebook">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Youtube</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-youtube"></i></span>
                                                        </div>
                                                        <input type="link" class="form-control" name="youtube" placeholder="Youtube" value="{{socialMediaLink('youtube')}}">
                                                        <input type="hidden" name="social[]" value="youtube">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Instagram</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                                        </div>
                                                        <input type="link" class="form-control" name="instagram" placeholder="Instagram" value="{{socialMediaLink('instagram')}}">
                                                        <input type="hidden" name="social[]" value="instagram">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Linkedin</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-linkedin"></i></span>
                                                        </div>
                                                        <input type="link" class="form-control" name="linkedin" placeholder="Linkedin" value="{{socialMediaLink('linkedin')}}">
                                                        <input type="hidden" name="social[]" value="linkedin">
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
@endsection

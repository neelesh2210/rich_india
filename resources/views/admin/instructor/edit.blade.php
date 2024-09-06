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
                                    <form action="{{ route('admin.instructors.update', encrypt($instructor->id)) }}" method="POST" class="form-example" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name" value="{{ $instructor->name }}" placeholder="Enter Name..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="designation">Designation <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="designation" value="{{ $instructor->designation }}" placeholder="Enter Designation..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" id="img_input1" class="custom-file-input" accept="image/*">
                                                        <label class="custom-file-label" for="customFile">Choose file...</label>
                                                    </div>
                                                    <div class="p-2">
                                                        <img id="img1" src="{{ asset('backend/img/instructors/' . $instructor->image) }}" height="100px" width="100px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="rating">Rating</label>
                                                    <input type="text" class="form-control" name="rating" value="{{ $instructor->rating }}" placeholder="Enter Rating...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="facebook">Facebook</label>
                                                    <input type="text" class="form-control" name="facebook" value="{{ $instructor->facebook }}" placeholder="Enter Facebook...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="twitter">Twitter</label>
                                                    <input type="text" class="form-control" name="twitter" value="{{ $instructor->twitter }}" placeholder="Enter Twitter...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="whatsapp">Whatsapp</label>
                                                    <input type="text" class="form-control" name="whatsapp" value="{{ $instructor->whatsapp }}" placeholder="Enter Whatsapp...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="instagram">Instagram</label>
                                                    <input type="text" class="form-control" name="instagram" value="{{ $instructor->instagram }}" placeholder="Enter Instagram...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-outline-warning mt-1 mb-1"><i class="fa fa-check" aria-hidden="true"></i> UPDATE</button>
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
        img_input1.onchange = evt => {
            const [file] = img_input1.files
            if (file) {
                img1.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection

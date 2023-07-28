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
                                <form action="{{route('admin.webinars.update',$webinar->id)}}" method="POST" class="form-example" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="title">Title <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title" value="{{$webinar->title}}" placeholder="Enter Title..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image <span class="text-danger">*</span></label>
                                                <div class="custom-file">
                                                    <input type="file" name="image" id="img_input1" class="custom-file-input" accept="image/*" required>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <div class="p-2">
                                                    <img id="img1" src="{{asset('backend/img/webinar/'.$webinar->image)}}" height="100px" width="100px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date Time</label>
                                                <input type="datetime-local" class="form-control" name="date_time" id="date_time" value="{{$webinar->date_time}}" placeholder="Date Time...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="link">Link <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="link" value="{{$webinar->link}}" placeholder="Enter Link..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea id="summernote" name="description">{{$webinar->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-outline-warning mt-1 mb-1" onclick="return confirm('Are you sure you want to Update this webinar?');">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            Update
                                        </button>
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

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
                                <form action="{{route('admin.blog.store')}}" method="POST" class="form-example" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="title">Title <span class="text-danger">*</span></label>
                                                <input type="text" id="title" class="form-control" name="title" value="{{old('title')}}" placeholder="Enter Title..." required>
                                                @error('title')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="topic">Topic <span class="text-danger">*</span></label>
                                                <input type="text" id="topic" class="form-control" name="topic" value="{{old('topic')}}" placeholder="Enter Topic..." required>
                                                @error('topic')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
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
                                                    <img id="img1" src="{{asset('backend/img/no-image.png')}}" height="100px" width="100px">
                                                </div>
                                                @error('image')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="tags">Tags</label>
                                                <input id="form-tags-1" name="tags" type="text" value="{{old('tags')}}">
                                                @error('tags')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 form_div">
                                            <div class="form-group">
                                                <label for="written_by">Written By</label>
                                                <input type="text" id="written_by" class="form-control" name="written_by" value="{{old('written_by')}}" placeholder="Enter Written By...">
                                                @error('written_by')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 form_div">
                                            <div class="form-group">
                                                <label for="writter_position">Written Position</label>
                                                <input type="text" id="writter_position" class="form-control" name="writter_position" value="{{old('writter_position')}}" placeholder="Enter Written Position...">
                                                @error('writter_position')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Writter Image</label>
                                                <div class="custom-file">
                                                    <input type="file" name="writter_image" id="img_input2" class="custom-file-input" accept="image/*">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <div class="p-2">
                                                    <img id="img2" src="{{asset('backend/img/no-image.png')}}" height="100px" width="100px">
                                                </div>
                                                @error('writter_image')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="facebook_link">Facebook Link</label>
                                                <input type="text" id="facebook_link" class="form-control" name="facebook_link" value="{{old('facebook_link')}}" placeholder="Enter Facebook Link...">
                                                @error('facebook_link')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="twitter_link">Twitter Link</label>
                                                <input type="text" id="twitter_link" class="form-control" name="twitter_link" value="{{old('twitter_link')}}" placeholder="Enter Twitter Link...">
                                                @error('twitter_link')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="printrest_link">Printrest Link</label>
                                                <input type="text" id="printrest_link" class="form-control" name="printrest_link" value="{{old('printrest_link')}}" placeholder="Enter Printrest Link...">
                                                @error('printrest_link')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="instagram_link">Instagram Link</label>
                                                <input type="text" id="instagram_link" class="form-control" name="instagram_link" value="{{old('instagram_link')}}" placeholder="Enter Instagram Link...">
                                                @error('instagram_link')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="short_description">Short Description</label>
                                                <textarea class="summernote" name="short_description">{{old('short_description')}}</textarea>
                                                @error('short_description')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="description">Description <span class="text-danger">*</span></label>
                                                <textarea class="summernote" name="description" required>{{old('description')}}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Save this course?');"><i class="fa fa-check" aria-hidden="true"></i> SAVE</button>
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

    img_input2.onchange = evt => {
        const [file] = img_input2.files
        if (file) {
            img2.src = URL.createObjectURL(file)
        }
    }
</script>

@endsection

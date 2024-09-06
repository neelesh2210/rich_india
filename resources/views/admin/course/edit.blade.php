@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper ">
        <section class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12">
                        <form action="{{ route('admin.course.update', encrypt($course->id)) }}?search_key={{ $search_key }}" method="POST" class="form-example" enctype="multipart/form-data">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        @isset($page_title)
                                            {{ $page_title }}
                                        @endisset
                                    </h5>
                                </div>
                                <div class="card-body p-0">
                                    <div class="modal-body">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name" value="{{ $course->name }}" placeholder="Enter Name..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" id="img_input1" class="custom-file-input" accept="image/*">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                    <div class="p-2">
                                                        <img id="img1" src="{{ asset('backend/img/course/' . $course->image) }}" onerror="this.onerror=null;this.src='{{ asset('backend/img/no-image.png') }}'" height="100px" width="100px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="tag">Tag</label>
                                                    <input type="text" class="form-control" name="tag" value="{{old('tag',$course->tag)}}" placeholder="Enter Tag...">
                                                    @error('tag')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="review">Review (avg.)</label>
                                                    <input type="text" class="form-control" name="review" value="{{old('review',$course->review)}}" placeholder="Enter Review (avg.)...">
                                                    @error('review')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="no_of_student">No of Student</label>
                                                    <input type="text" class="form-control" name="no_of_student" value="{{old('no_of_student',$course->student)}}" placeholder="Enter No of Student...">
                                                    @error('no_of_student')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea id="summernote" name="description">{!! $course->description !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">SEO Section</h5>
                                </div>
                                <div class="card-body p-0">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h1>SEO Section</h1>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="seo_title">Seo Title</label>
                                                    <input type="text" class="form-control" name="seo_title" value="{{ $course->seo_title }}" placeholder="Enter Seo Title...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="seo_keyword">Seo Keyword</label>
                                                    <input type="text" class="form-control" name="seo_keyword" value="{{ $course->seo_keyword }}" placeholder="Enter Seo Keyword...">
                                                </div>
                                            </div>
                                            <div class="col-md-12 form_div">
                                                <div class="form-group">
                                                    <label for="seo_description">Seo Description</label>
                                                    <textarea class="form-control" name="seo_description" placeholder="Enter Seo Description...">{!! $course->seo_description !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-outline-warning mt-1 mb-1" onclick="return confirm('Are you sure you want to Save this course?');"><i class="fa fa-check" aria-hidden="true"></i> UPDATE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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

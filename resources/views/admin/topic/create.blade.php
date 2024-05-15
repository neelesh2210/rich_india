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
                                    <form action="{{route('admin.topic.store')}}?search_course_id={{$search_course_id}}&search_key={{$search_key}}" method="POST" class="form-example" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="course_id">Course <span class="text-danger">*</span></label>
                                                    <select name="course_id" class="form-control select2" required>
                                                        <option value="">Select Course...</option>
                                                        @foreach (App\CPU\CourseManager::withoutTrash()->orderBy('name','asc')->get() as $course)
                                                            <option value="{{$course->id}}">{{$course->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="title">Title <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="title" placeholder="Enter Title..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Thumbnail Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="thumbnail_image" id="img_input1" class="custom-file-input" accept="image/*">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                    <div class="p-2">
                                                        <img id="img1" src="{{asset('backend/img/no-image.png')}}" height="100px" width="100px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cover Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="cover_image" id="img_input2" class="custom-file-input" accept="image/*">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                    <div class="p-2">
                                                        <img id="img2" src="{{asset('backend/img/no-image.png')}}" height="100px" width="100px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">Video</label>
                                                    <input type="radio" name="is_url" value="video" class="form-control" onclick="showDiv()" checked>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">URL</label>
                                                    <input type="radio" name="is_url" value="url" class="form-control" onclick="showDiv()">
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="video_div">
                                                <div class="form-group">
                                                    <label>Video</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="video_url" class="custom-file-input" accept="video/*">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-none" id="url_div">
                                                <div class="form-group">
                                                    <label>URL</label>
                                                    <input type="text" class="form-control" name="video_url" placeholder="Enter URL...">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>PDF</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="pdf" class="custom-file-input" accept=".pdf" >
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Langauge</label>
                                                    <select name="language_id" class="form-control select2" required>
                                                        <option value="">Select Language</option>
                                                        @foreach (App\Models\Language::where('is_delete','0')->get() as $language)
                                                            <option value="{{$language->id}}">{{$language->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea id="summernote" name="description"></textarea>
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
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="seo_title">Seo Title</label>
                                                    <input type="text" class="form-control" name="seo_title" placeholder="Enter Seo Title...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="seo_keyword">Seo Keyword</label>
                                                    <input type="text" class="form-control" name="seo_keyword" placeholder="Enter Seo Keyword...">
                                                </div>
                                            </div>
                                            <div class="col-md-12 form_div">
                                                <div class="form-group">
                                                    <label for="seo_description">Seo Description</label>
                                                    <textarea class="form-control" name="seo_description" placeholder="Enter Seo Description..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Save this topic?');"><i class="fa fa-check" aria-hidden="true"></i> SAVE</button>
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
        img_input1.onchange = evt =>{
            const [file] = img_input1.files
            if (file) {
                img1.src = URL.createObjectURL(file)
            }
        }

        img_input2.onchange = evt =>{
            const [file] = img_input2.files
            if (file) {
                img2.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection

<script>

    function showDiv()
    {
        var radio_value = $("input[type='radio']:checked").val();
        if(radio_value == 'video')
        {
            $('#video_div').removeClass('d-none');
            $('#url_div').addClass('d-none');
        }
        if(radio_value == 'url')
        {
            $('#video_div').addClass('d-none');
            $('#url_div').removeClass('d-none');
        }
    }

</script>

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
                                    <form action="{{ route('admin.plan.store') }}" method="POST" class="form-example"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="slug">Slug <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="slug"
                                                        placeholder="Enter Slug..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="title">Title <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="title"
                                                        placeholder="Enter Title..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 form_div">
                                                <div class="form-group">
                                                    <label for="amount">Amount<span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="amount"
                                                        placeholder="Enter Amount..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 form_div">
                                                <div class="form-group">
                                                    <label for="discounted_price">Discounted Price<span
                                                            class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="discounted_price"
                                                        placeholder="Enter Discounted Price..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" id="img_input1"
                                                            class="custom-file-input" accept="image/*">
                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                    </div>
                                                    <div class="p-2">
                                                        <img id="img1" src="{{ asset('backend/img/no-image.png') }}"
                                                            height="100px" width="100px">
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach (App\Models\Admin\CommissionSetting::all() as $key => $commission_setting)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Commission Amount for Level {{ $key + 1 }} <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" name="commission[]"
                                                            class="form-control"
                                                            placeholder="Amount for Level {{ $key + 1 }}... " required>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cosmofeed Base Price Url</label>
                                                    <input type="text" name="cosmofeed_base_price_url"
                                                        class="form-control"
                                                        placeholder="Cosmofeed Base Price Url" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cosmofeed Discounted Price Url </label>
                                                    <input type="text"  name="cosmofeed_discounted_price_url"
                                                        class="form-control"
                                                        placeholder="Cosmofeed Discounted Price Url" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="poins">
                                            <div class="col-md-5 form_div">
                                                <div class="form-group">
                                                    <label>Point 1<span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="points[]"
                                                        placeholder="Enter Point..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-1 form_div">
                                                <div class="form-group" style="padding-top: 35px;">
                                                    <a class="btn btn-outline-primary btn-sm mr-1 mb-1"
                                                        onclick="addField()">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h5 class="mb-0">Course List</h5>
                                    </div>
                                    <div class="card-body table-responsive p-2">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center"><input type="checkbox" id="all_plans"></th>
                                                    <th class="text-center">Image</th>
                                                    <th class="text-center">Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse (App\CPU\CourseManager::withoutTrash()->orderBy('name','asc')->get() as $course)
                                                    <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="course_ids[]"
                                                                value="{{ $course->id }}" class="plan_checkboxes">
                                                        </td>
                                                        <td class="text-center">
                                                            <img src="{{ asset('backend/img/course/' . $course->image) }}"
                                                                onerror="this.onerror=null;this.src='{{ asset('backend/img/no-image.png') }}'"
                                                                style="height: 50px;width: 50px;">
                                                        </td>
                                                        <td class="text-center">{{ $course->name }}</td>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="summernote" name="description"></textarea>
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
                                                <input type="text" class="form-control" name="seo_title"
                                                    placeholder="Enter Seo Title...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="seo_keyword">Seo Keyword</label>
                                                <input type="text" class="form-control" name="seo_keyword"
                                                    placeholder="Enter Seo Keyword...">
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
                                        <button type="submit" class="btn btn-outline-success mt-1 mb-1"
                                            onclick="return confirm('Are you sure you want to Save this plan?');"><i
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
    <script>
        img_input1.onchange = evt => {
            const [file] = img_input1.files
            if (file) {
                img1.src = URL.createObjectURL(file)
            }
        }

        var x = 1;

        function addField() {
            x++;
            $('#poins').append('<div class="col-md-5 form_div' + x + '">' +
                '<div class="form-group">' +
                '<label>Point ' + x + '<span class="text-danger">*</span> </label>' +
                '<input type="text" class="form-control" name="points[]" placeholder="Enter Point..." required>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-1 form_div' + x + '">' +
                '<div class="form-group" style="padding-top: 35px;">' +
                '<a class="btn btn-outline-danger btn-sm mr-1 mb-1" onclick="removeField()">' +
                '<i class="fas fa-trash"></i>' +
                '</a>' +
                '</div>' +
                '</div>')
        }

        function removeField() {
            $('.form_div' + x + '').remove()
            x--;
        }

        $(checkCheckBox())

        $('#all_plans').change(function() {
            $('.plan_checkboxes').prop('checked', this.checked);
        });
        $('.plan_checkboxes').change(function() {
            checkCheckBox()
        });

        function checkCheckBox() {
            if ($('.plan_checkboxes:checked').length == $('.plan_checkboxes').length) {
                $('#all_plans').prop('checked', true);
            } else {
                $('#all_plans').prop('checked', false);
            }
        }
    </script>
@endsection

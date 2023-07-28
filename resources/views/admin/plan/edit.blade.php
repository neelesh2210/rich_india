@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('admin.plan.update', encrypt($plan->id)) }}" method="POST" class="form-example" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
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
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="slug">Slug <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="slug" value="{{ $plan->slug }}" placeholder="Enter Slug..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="title">Title <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="title" value="{{ $plan->title }}" placeholder="Enter Title..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 form_div">
                                                <div class="form-group">
                                                    <label for="amount">Amount<span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="amount" value="{{ $plan->amount }}" placeholder="Enter Amount..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 form_div">
                                                <div class="form-group">
                                                    <label for="discounted_price">Discounted Price<span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="discounted_price" value="{{ $plan->discounted_price }}" placeholder="Enter Discounted Price..." required>
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
                                                        <img id="img1" src="{{ asset('backend/img/plan/' . $plan->image) }}" onerror="this.onerror=null;this.src='{{ asset('backend/img/no-image.png') }}'" height="100px" width="100px">
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach (App\Models\Admin\CommissionSetting::all() as $keys => $commission_setting)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Commission Amount for Level {{ $keys + 1 }} <span class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" name="commission[]" value="@isset($plan->commission[$keys]){{ $plan->commission[$keys] }}@endisset" class="form-control" placeholder="Amount for Level {{ $keys + 1 }}... " required>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            @php
                                                $plans = App\CPU\PlanManager::withoutTrash()->get();
                                            @endphp
                                            @for ($i = 1; $i <= $plans->count() - $plan->priority; $i++)
                                                @php
                                                    $upgrade_plan = App\Models\Admin\Plan::where('priority', $plan->priority + $i)->first();
                                                @endphp
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Upgrade Amount for {{ $upgrade_plan->title }}<span class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" name="upgrade_amount[]" @if ($plan->upgrade_amount) value="{{ $plan->upgrade_amount[$i - 1] }}" @endif class="form-control" placeholder="Upgrade Amount for {{ $upgrade_plan->title }}... " required>
                                                    </div>
                                                </div>
                                                @for($j=1;$j<=App\Models\Admin\WebsiteSetting::where('type','upgrade_commission_level')->first()->content;$j++)
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Upgrade Commission for {{ $upgrade_plan->title }} of Level {{$j}}<span class="text-danger">*</span></label>
                                                            <input type="number" step="0.01" name="upgrade_commission_{{$i}}[]" @if($plan->upgrade_commission) @isset($plan->upgrade_commission[$i - 1][$j-1]) value="{{ $plan->upgrade_commission[$i - 1][$j-1] }}" @endisset @endif class="form-control" placeholder="Upgrade Commission for {{ $upgrade_plan->title }}... " required>
                                                        </div>
                                                    </div>
                                                @endfor
                                            @endfor
                                        </div>
                                        <div class="row" id="poins">
                                            @foreach ($plan->points as $key => $point)
                                                <div class="col-md-5 form_div{{ $key + 1 }}">
                                                    <div class="form-group">
                                                        <label>Point {{ $key + 1 }}<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="points[]" value="{{ $point }}" placeholder="Enter Point..." required>
                                                    </div>
                                                </div>
                                                @if ($key == 0)
                                                    <div class="col-md-1 form_div">
                                                        <div class="form-group" style="padding-top: 35px;">
                                                            <a class="btn btn-outline-primary btn-sm mr-1 mb-1" onclick="addField()">
                                                                <i class="fas fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-md-1 form_div{{ $key + 1 }}">
                                                        <div class="form-group" style="padding-top: 35px;">
                                                            <a class="btn btn-outline-danger btn-sm mr-1 mb-1" onclick="removeField()">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
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
                                                                <input type="checkbox" name="course_ids[]" value="{{ $course->id }}" @if (in_array($course->id, $plan->course_ids)) checked @endif class="plan_checkboxes">
                                                            </td>
                                                            <td class="text-center">
                                                                <img src="{{ asset('backend/img/course/' . $course->image) }}" onerror="this.onerror=null;this.src='{{ asset('backend/img/no-image.png') }}'" style="height: 50px;width: 50px;">
                                                            </td>
                                                            <td class="text-center">{{ $course->name }}</td>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="summernote" name="description">{!! $plan->description !!}</textarea>
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
                                                    <input type="text" class="form-control" name="seo_title" value="{{ $plan->seo_title }}" placeholder="Enter Seo Title...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="seo_keyword">Seo Keyword</label>
                                                    <input type="text" class="form-control" name="seo_keyword" value="{{ $plan->seo_keyword }}" placeholder="Enter Seo Keyword...">
                                                </div>
                                            </div>
                                            <div class="col-md-12 form_div">
                                                <div class="form-group">
                                                    <label for="seo_description">Seo Description</label>
                                                    <textarea class="form-control" name="seo_description" placeholder="Enter Seo Description...">{!! $plan->seo_description !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-outline-warning mt-1 mb-1" onclick="return confirm('Are you sure you want to Update this plan?');"><i class="fa fa-check" aria-hidden="true"></i> UPDATE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

        var x = '{{ $key + 1 }}';

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
            alert(x);
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

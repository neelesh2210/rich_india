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
                                    <form action="{{ route('admin.target.update',encrypt($target->id)) }}" method="POST" class="form-example" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="name" value="{{old('name',$target->name)}}" placeholder="Enter Name..." required>
                                                </div>
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" id="img_input" class="custom-file-input" accept="image/*">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                    <div class="p-2">
                                                        <img id="img" src="{{ asset('backend/img/target/'.$target->image) }}" height="100px" width="100px" onerror="this.onerror=null;this.src='{{ asset('backend/img/no-image.png') }}'">
                                                    </div>
                                                </div>
                                                @error('image')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="amount">Amount<span class="text-danger">*</span> </label>
                                                    <input type="number" step="0.01" class="form-control" name="amount" value="{{old('amount',$target->amount)}}" placeholder="Enter Amount..." required>
                                                </div>
                                                @error('amount')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="reservation">Duration<span class="text-danger">*</span> </label>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-default">
                                                                <i class="fas fa-calendar"></i>
                                                            </button>
                                                        </div>
                                                        <input class="form-control input-daterange-datepicker" id="reservation" type="text" name="date_range" value="{{old('date_range',$target->duration)}}" placeholder="Select Duration..." required>
                                                    </div>
                                                </div>
                                                @error('date_range')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="no_of_referral">No of Referral<span class="text-danger">*</span> </label>
                                                    <input type="number" class="form-control" name="no_of_referral" value="{{old('no_of_referral',$target->no_of_referral)}}" placeholder="Enter No of Referral..." required>
                                                </div>
                                                @error('no_of_referral')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description 1</label>
                                                    <textarea class="form-control" name="description_one">{!!old('description_one',$target->description_one)!!}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description 2</label>
                                                    <textarea class="form-control" name="description_two">{!!old('description_two',$target->description_two)!!}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description 3</label>
                                                    <textarea class="form-control" name="description_three">{!!old('description_three',$target->description_three)!!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-outline-warning mt-1 mb-1" onclick="return confirm('Are you sure you want to Update this target?');"><i class="fa fa-check" aria-hidden="true"></i> UPDATE</button>
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

        img_input.onchange = evt => {
            const [file] = img_input.files
            if (file) {
                img.src = URL.createObjectURL(file)
            }
        }

    </script>

@endsection

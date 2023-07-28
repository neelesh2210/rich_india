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
                                <form action="{{route('admin.course.store')}}?search_key={{$search_key}}" method="POST"
                                    class="form-example" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form_div">
                                            <div class="form-group">
                                                <label for="name">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Enter Name..." required>
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
                                                    <img id="img1" src="{{asset('backend/img/no-image.png')}}"
                                                        height="100px" width="100px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Price <span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" class="form-control" name="price"
                                                    value="0" min="0" id="price" placeholder="Price..."
                                                    onkeyup="calculateDiscountedPrice()" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Discount <span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" class="form-control" name="discount"
                                                    value="0" min="0" id="discount" placeholder="Discount..."
                                                    onkeyup="calculateDiscountedPrice()" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Discounted Price</label>
                                                <input type="number" step="0.01" value="0" class="form-control"
                                                    name="discounted_price" id="discounted_price"
                                                    placeholder="Discounted Price..." required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Referral Commission <span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" class="form-control"
                                                    name="referral_commission" value="0" min="0"
                                                    placeholder="Referral Commission..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Referral Commission Type</label>
                                                <select name="referral_commission_type" class="form-control" required>
                                                    <option value="amount">Amount</option>
                                                    <option value="percent">Percent</option>
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

                    <div class="card card-outline card-primary">
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
                                            <textarea class="form-control" name="seo_description"
                                                placeholder="Enter Seo Description..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-outline-success mt-1 mb-1"
                                        onclick="return confirm('Are you sure you want to Save this course?');"><i
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
</script>

@endsection

<script>
function calculateDiscountedPrice() {
    var price = $('#price').val();
    var discount = $('#discount').val();
    if (parseInt(discount) > parseInt(price)) {
        alert('discount is not more then fee!');
        $('#discount').val('');
        return false;
    }
    var discounted_price = parseInt(price) - parseInt(discount);

    $('#discounted_price').val(discounted_price)
}
</script>
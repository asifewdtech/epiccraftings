@extends('layouts.admin')
@section('title','Update Product')
@section('breadcrumb')
    <li><a href="{{route('products.index')}}">Products</a></li>
    <li class="active">Update</li>
@endsection
@section('content')
<div class="padd-top">
    <h3 class="text-center">Update Product</h3>
</div>
<div class="row m-0 justify-content-center align-items-center padd-top">
    <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>
    <div class="col-md-8 col-lg-8 col-sm-12 col-12 ">
        <form id="edit-form" enctype="multipart/form-data">
            @csrf
			@method('put')
            <div class="form-group">
                <label>Category</label>
                <select class="form-control select2" name="category">
                    <option selected="selected" disabled>Select Category</option>
                    @foreach($categories as $category)
                        <option @if($product->category_id==$category->id) selected @endif value="{{$category->id}}">{{ucfirst($category->title)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Title"  value="{{ $product->title }}"/>
            </div>
            <div class="form-group">
                <label>Size</label>
                <input type="text" name="size" class="form-control" placeholder="Enter Size (Width x Height)"  value="{{ $product->size }}"/>
            </div>
            <div class="form-group">
                <label>Min price</label>
                <input type="number" name="min_price" class="form-control" placeholder="Enter Minimun price"  value="{{ $product->min_price }}"/>
            </div>
            <div class="form-group">
                <label>Max price</label>
                <input type="number" name="max_price" class="form-control" placeholder="Enter Maximum price"  value="{{ $product->max_price }}"/>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" value="{{ $product->quantity }}" />
            </div>

            <div class="form-group">
                <label>Summery</label>
                <textarea class="form-control" name="summery">{{$product->summery}}</textarea>
            </div>

            <div class="box border-none">
                <div class="box-header">
                    <h3 class="box-title">Description</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i
                                class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                    <textarea id="description" name="description" rows="10" cols="80">{{ $product->description }}</textarea>
                </div>
            </div><!-- /.box -->
            <div class="box border-none">
                <div class="box-header">
                    <h3 class="box-title">Additional information</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i
                                class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                    <textarea id="additional_information" name="additional_information" rows="10" cols="80">{{ $product->additional_information }}</textarea>
                </div>
            </div><!-- /.box -->
            <div class="box border-none">
                <div class="box-header">
                    <h3 class="box-title">How To Order</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i
                                class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                    <textarea id="how_to_order" name="how_to_order" rows="10" cols="80">{{ $product->how_to_order }}</textarea>
                </div>
            </div><!-- /.box -->
            <div class="box border-none">
                <div class="box-header">
                    <h3 class="box-title">Features</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i
                                class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                    <textarea id="features" name="features" rows="10" cols="80">{{ $product->features }} </textarea>
                </div>
            </div><!-- /.box -->
            <div class="box border-none">
                <div class="box-header">
                    <h3 class="box-title">Packaging / Packaging Items</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i
                                class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                    <textarea id="packaging" name="packaging" rows="10" cols="80">{{ $product->packaging }}</textarea>
                </div>
            </div><!-- /.box -->
            <div class="box border-none">
                <div class="box-header">
                    <h3 class="box-title">Shipping Process</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i
                                class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                    <textarea id="shipping_process" name="shipping_process" rows="10" cols="80">{{ $product->shipping_process }}</textarea>
                </div>
            </div><!-- /.box -->

            <div class="form-group mb-3">

                <label for="exampleInputPassword1">Upload Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="hidden" id="upload_path" name="upload_path" value="/admin/uploads/products">
                        <input type="hidden" id="uploaded-file" name="image" value="{{$product->image}}">
                        <input type="file" class="form-control-file" id="upload-file" onchange="uploadFile($('#upload-file'))"  accept=".jpg,.jpeg,.png,.gif">
                    </div>
                </div>
                
                <div class="form-group" style="width: 300px;">
                    <div class="progress d-none" style="margin-bottom: 2px;margin-top: 5px;">
                        <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                    </div>
                    <div class="msg"></div>
                </div>

                <img src="{{ asset($product->image) }}" id="previewImg" class="mt-2" style="width: 100px; height:100px;">

            </div>

            <div class="text-center">
                <button type="button" onclick="edit_resource({{$product->id}});" class="btn btn-primary submit">Update</button>
            </div>
        </form>
    </div>
    <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>

</div>
@endsection

@section('script')
<script>
    function edit_resource(id) {
        $('.all-loader').removeClass('d-none');
        var myform = document.getElementById("edit-form");
        var fd = new FormData(myform);
        fd.append("_token", "{{ csrf_token() }}");
        fd.append('description',CKEDITOR.instances['description'].getData());
        fd.append('how_to_order',CKEDITOR.instances['how_to_order'].getData());
        fd.append('additional_information',CKEDITOR.instances['additional_information'].getData());
        fd.append('shipping_process',CKEDITOR.instances['shipping_process'].getData());
        fd.append('features',CKEDITOR.instances['features'].getData());
        fd.append('packaging',CKEDITOR.instances['packaging'].getData());
        var c_url = '{{ route("products.update", ":id") }}';
        c_url = c_url.replace(':id',id);
        $.ajax({
            url: c_url,
            type: "post",
            processData: false,
            contentType: false,
            data: fd,
            success: function(data) {
                $('.all-loader').addClass('d-none');
                if (data.success == true) {
                    swal("success", data.message, "success").then((value) => {

                        window.location = "{{ route('products.index') }}";
                    });
                } else {
                    if (data.hasOwnProperty("message")) {
                        var wrapper = document.createElement("div");
                        var err = "";
                        $.each(data.message, function(i, e) {
                            err += "<p>" + e + "</p>";
                        });

                        wrapper.innerHTML = err;
                        swal({
                            icon: "error",
                            text: "{{ __('Please fix following error!') }}",
                            content: wrapper,
                            type: "error",
                        });
                    }
                }
            },
        });
    }

</script>
<script type="text/javascript">
    CKEDITOR.replace('description');
    CKEDITOR.replace('additional_information');
    CKEDITOR.replace('how_to_order');
    CKEDITOR.replace('features');
    CKEDITOR.replace('packaging');
    CKEDITOR.replace('shipping_process');
</script>
@endsection
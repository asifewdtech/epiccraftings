@extends('layouts.admin')
@section('title','Create Product')
@section('breadcrumb')
    <li><a href="{{route('products.index')}}">Products</a></li>
    <li class="active">Create</li>
@endsection
@section('content')
<div class="padd-top">
    <h3 class="text-center">Create Product</h3>
</div>
<div class="row m-0 justify-content-center align-items-center padd-top">
    <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>
    <div class="col-md-8 col-lg-8 col-sm-12 col-12 ">
        <form id="create-form" enctype="multipart/form-data">
            <div class="form-group">
                <label>Category</label>
                <select class="form-control select2" name="category">
                    <option selected="selected" disabled>Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{ucfirst($category->title)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Title" />
            </div>
            <div class="form-group">
                <label>Size</label>
                <input type="text" name="size" class="form-control" placeholder="Enter Size (Width x Height)" />
            </div>
            <div class="form-group">
                <label>Min price</label>
                <input type="number" name="min_price" class="form-control" placeholder="Enter Minimun price" />
            </div>
            <div class="form-group">
                <label>Max price</label>
                <input type="number" name="max_price" class="form-control" placeholder="Enter Maximum price" />
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" />
            </div>

            <div class="form-group">
                <label>Summery</label>
                <textarea class="form-control" name="summery"></textarea>
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
                    <textarea id="description" name="description" rows="10" cols="80">
                            
                    </textarea>
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
                    <textarea id="additional_information" name="additional_information" rows="10" cols="80">
                            
                    </textarea>
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
                    <textarea id="how_to_order" name="how_to_order" rows="10" cols="80">
                            
                    </textarea>
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
                    <textarea id="features" name="features" rows="10" cols="80">
                            
                    </textarea>
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
                    <textarea id="packaging" name="packaging" rows="10" cols="80">
                            
                    </textarea>
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
                    <textarea id="shipping_process" name="shipping_process" rows="10" cols="80">
                            
                    </textarea>
                </div>
            </div><!-- /.box -->

            <div class="form-group" style="margin-bottom: 5px !important;">
                <label for="InputFile">Upload Image</label>
                <input type="hidden" id="upload_path" name="upload_path" value="/admin/uploads/products">
                <input type="file" multiple name="images[]" id="images" accept=".jpg,.jpeg,.png,.gif">
            </div>

            {{-- <div class="form-group" style="margin-bottom: 5px !important;">
                <input type="file" name="images[]" class="images" accept=".jpg,.jpeg,.png,.gif">
            </div> --}}

            <div class="col-md-12">
                <div class="mt-1 text-center">
                    <div class="show-multiple-image-preview" style="display: flex" > </div>
                </div>  
            </div>

            <div class="form-group" style="width: 300px;">
                <div class="progress d-none" style="margin-bottom: 2px;">
                    <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                </div>
                <div class="msg"></div>
            </div>

            <div class="text-center">
                <button type="button" onclick="create_resource();" class="btn btn-primary submit">Submit</button>
            </div>
        </form>

        <div id="addMoreImage" style="display: none">
            <div class="form-group" style="margin-bottom: 5px !important;">
                <input type="file" name="images[]" class="images" accept=".jpg,.jpeg,.png,.gif">
            </div>
        </div>
        
    </div>
    <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>

</div>
@endsection

@section('script')
<script>

    var TotalImages = 0;

    function create_resource() {
        // $('.all-loader').removeClass('d-none');
        var myform = document.getElementById("create-form");
        var fd = new FormData(myform);
        fd.append("_token", "{{ csrf_token() }}");
        fd.append('description',CKEDITOR.instances['description'].getData());
        fd.append('how_to_order',CKEDITOR.instances['how_to_order'].getData());
        fd.append('additional_information',CKEDITOR.instances['additional_information'].getData());
        fd.append('shipping_process',CKEDITOR.instances['shipping_process'].getData());
        fd.append('features',CKEDITOR.instances['features'].getData());
        fd.append('packaging',CKEDITOR.instances['packaging'].getData());

        // let TotalImages = $('#images').files.length; //Total Images
        // console.log(TotalImages);
        // return false;
        // let images = $('#images')[0];
        // for (let i = 0; i < TotalImages; i++) {
        //     fd.append('newImages' + i, images.files[i]);
        // }
        // fd.append('totalImages', TotalImages);

        $.ajax({
            url: "{{ route('products.store') }}",
            type: "post",
            data: fd,
            processData: false,
            contentType: false,
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


    // // remove file
    // function removeFile(e) {

    //     filelistall = $('#images').prop("files");
    //     let index = $(e).data("file");
    //     let fileBuffer=[];
    //     Array.prototype.push.apply( fileBuffer, filelistall );
    //     fileBuffer.splice(index, 1);
    //     const dT = new ClipboardEvent('').clipboardData || new DataTransfer(); 
    //     for (let file of fileBuffer) { dT.items.add(file); }
    //     $('#images').prop("files",dT.files);
    //     $(e).parent().remove();
    // }

    // // Multiple images preview with JavaScript
    // let ShowMultipleImagePreview = function(input, imgPreviewPlaceholder) {
    //     $(imgPreviewPlaceholder).html("");
    //     if (input.files) {
    //         var filesAmount = input.files.length;
    //         console.log(input.files.length)
    //         for (i = 0; i < filesAmount; i++) {
    //             var reader = new FileReader();
    //             let newDiv = $('<div style="position:relative;"></div>');
    //             $(newDiv).css({"width":"100px","height":"100px"});
    //             reader.onload = function(event) {
    //                 $($.parseHTML('<img class="mr-3" width="100" height="100" style="padding:12px;">')).attr('src', event.target.result).appendTo(newDiv);
    //             }

    //             $($.parseHTML('<span  onclick="removeFile(this)" data-file="'+i+'" style="padding: 0px;cursor:pointer;position: absolute;top: 4px;right: 6px;background: red;border-radius: 50%;width: 20px;height: 20px;"></span>')).html("x").appendTo(newDiv);
    //             $(newDiv).appendTo(imgPreviewPlaceholder);
    //             reader.readAsDataURL(input.files[i]);
    //         }
    //     }
    // }

    // $('#images').on('change', function() {
    //     ShowMultipleImagePreview(this, 'div.show-multiple-image-preview');
    // });

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

@extends('layouts.admin')
@section('title','Create Category')
@section('breadcrumb')
    <li><a href="{{route('categories.index')}}">Categories</a></li>
    <li class="active">Create</li>
@endsection

@section('content')
    <div class="padd-top">
        <h3 class="text-center">Create Category</h3>
    </div>
    <div class="row m-0 justify-content-center align-items-center padd-top">
        <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>
            <div class="col-md-8 col-lg-8 col-sm-12 col-12 ">
                <form id="create-form">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" />
                    </div>
                
                    <div class="text-center">
                        <button type="button" onclick="create_resource();" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>
    </div>
@endsection

@section('script')
    <script>
        
        function create_resource(){
            var myform = document.getElementById("create-form");
            var fd = new FormData(myform);
            fd.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('categories.store') }}",
                type: "post",
                processData: false,
                contentType: false,
                data: fd,
                success: function (data) {
                    if (data.success == true) {
                        swal("success", data.message, "success").then((value) => {
                           
                            window.location='{{ route("categories.index") }}';
                        });
                    } else {
                        if (data.hasOwnProperty("message")) {
                            var wrapper = document.createElement("div");
                            var err = "";
                            $.each(data.message, function (i, e) {
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
@endsection
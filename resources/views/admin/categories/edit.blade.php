@extends('layouts.admin')
@section('title','Update Create')
@section('breadcrumb')
    <li><a href="{{route('categories.index')}}">Categories</a></li>
    <li class="active">Update</li>
@endsection

@section('content')
<div class="padd-top">
    <h3 class="text-center">Edit Category</h3>
</div>
<div class="row m-0 justify-content-center align-items-center padd-top">
<div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>
    <div class="col-md-8 col-lg-8 col-sm-12 col-12 ">
        <form id="edit-form">
            @csrf
			@method('put')
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{ $category->title }}"/>
            </div>
        
            <div class="text-center">
                <button type="button" onclick="edit_resource({{ $category->id }});" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
<div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>

</div>
@endsection

@section('script')
    <script>
        function edit_resource(id) {
            var myform = document.getElementById("edit-form");
            var fd = new FormData(myform);
            fd.append("_token", "{{ csrf_token() }}");
            var c_url = '{{ route("categories.update", ":id") }}';
            c_url = c_url.replace(':id',id);
            $.ajax({
                url: c_url,
                type: "post",
                processData: false,
                contentType: false,
                data: fd,
                success: function(data) {
                    if (data.success == true) {
                        swal("success", data.message, "success").then((value) => {

                            window.location = "{{ route('categories.index') }}";
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
@endsection
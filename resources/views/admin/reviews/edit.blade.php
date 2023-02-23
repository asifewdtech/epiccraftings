@extends('layouts.admin')
@section('title','Update Review')

@section('breadcrumb')
    <li><a href="{{route('reviews.index')}}">Reviews</a></li>
    <li class="active">Update</li>
@endsection

@section('style')
    <style>
        :root {
            --color: #7E13AE;;

        }

        .widget.rate .starrr i {
            font-size: 20px;
            cursor: pointer;
            color: var(--color);
            padding: 0 5px 0 0 !important;
        }

        .bg-yellow {
            background-color: var(--color) !important;
        }

        .fillStar {
            color: var(--color);
            font-size: 20px !important;
            padding: 0px !important;
        }

        .fillStarSmall {
            color: var(--color);
            font-size: 14px !important;
            padding: 0px !important;
        }

        .ratingFontSize {
            font-size: 12px;
        }

        .inputDiv {
            width: 175px;
        }

        .hoverRating:hover {
            cursor: pointer;
            opacity: 0.7;
        }

        .customClassProgress {
            height: 0.7rem !important;
            width: 129px;
            border-radius: 0px !important;
            margin-right: 5px;
        }

        input[type='radio'].checked:after {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            top: 0px;
            left: 0px;
            position: relative;
            background-color: #7E13AE;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid #7E13AE;
            cursor: pointer;
        }

        @media only screen and (max-width:768px){

            .customerReviewsMain{
                flex-direction: column;
            }
            .customerReviewsMain div:nth-child(1){
                padding: 0px !important;
                border-right: 0px !important;
            }
            .customerReviewsMain div:last-child{
                padding: 0px !important;
                border: 0px !important;
            }

            .reviewBtn{
                display: flex;
                justify-content: center;
                margin-top: 20px !important;
                padding: 0px !important;
            }


        }

    </style>
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
                <label>Domain Name</label>
                <select class="form-control select2" name="domain_name">
                    <option selected="selected" disabled>Select Domain</option>
                    @if(count(getDomains()) > 0)
                        @foreach(getDomains() as $domain)
                            <option @if($review->domain==$domain) selected @endif value="{{$domain}}">{{$domain}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label>Customer Name</label>
                <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name" value="{{$review->name}}"/>
            </div>

            <div class="form-group">
                <div class="w-100" style="display: flex;flex-direction:row;">
                    <label>Customer Comment</label>
                    <fieldset class="rating" style="margin-left: 10px;">
                        <input type="radio" id="mystar1" name="customer_rating" value="1" @if($review->rating=="1") checked @endif class='@if($review->rating=="1" || $review->rating=="2" || $review->rating=="3" || $review->rating=="4" || $review->rating=="5") checked @endif' onchange="ratingChange(this)"/>
                        <label onclick="labelChange(this);" data-id="1" class="full" for="mystar1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="mystar2" name="customer_rating" @if($review->rating=="2") checked @endif value="2"  class='@if($review->rating=="2" || $review->rating=="3" || $review->rating=="4" || $review->rating=="5") checked @endif' onchange="ratingChange(this)"/>
                        <label onclick="labelChange(this);" data-id="2" class="full" for="mystar2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="mystar3" name="customer_rating" @if($review->rating=="3") checked @endif value="3" class='@if($review->rating=="3" || $review->rating=="4" || $review->rating=="5") checked @endif' onchange="ratingChange(this)"/>
                        <label onclick="labelChange(this);" data-id="3" class="full" for="mystar3" title="Meh - 3 stars"></label>
                        <input type="radio" id="mystar4" name="customer_rating" @if($review->rating=="4") checked @endif value="4" class='@if($review->rating=="4" || $review->rating=="5") checked @endif' onchange="ratingChange(this)"/>
                        <label onclick="labelChange(this);" data-id="4" class="full" for="mystar4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="mystar5" name="customer_rating" @if($review->rating=="5") checked @endif value="5" class='@if($review->rating=="5") checked @endif' onchange="ratingChange(this)"/>
                        <label onclick="labelChange(this);" data-id="5" class="full" for="mystar5" title="Awesome - 5 stars"></label>
                        
                    </fieldset>
                </div>
                {{-- <div class="widget rate" style="display: flex; flex-direction:row;">
                    <label for="ratingId" class="form-label">Customer Rating</label>
                    <input type="hidden" name="customer_rating" id="ratingId" value="{{$review->rating}}">
                    <div class="starrr" style="margin-left:10px;"></div>
                </div> --}}
            </div>

            <div class="form-group">
                <label>Customer Comment</label>
                <textarea class="form-control" name="customer_comment" placeholder="Enter Customer Comment">{{$review->review}}</textarea>
            </div>

            <div class="form-group" style="margin-bottom: 5px !important;">
                <label for="InputFile">Upload Image</label>
                <input type="hidden" id="uploaded-file" name="image" value="{{$review->picture}}">
                <input type="hidden" id="upload_path" name="upload_path" value="admin/uploads/reviews">
                <input type="file" name="file" id="InputFile" onchange="uploadFile($('#InputFile'))" accept=".jpg,.jpeg,.png">
            </div>

            <div class="form-group" style="width: 300px;">
                <div class="progress d-none" style="margin-bottom: 2px;">
                    <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                </div>
                <div class="msg"></div>
            </div>

            @if($review->picture!='') <img src="{{ asset($review->picture) }}" id="previewImg" class="mt-2" style="width: 100px; height:100px;"> @endif

            <div class="text-center">
                <button type="button" onclick="commonFunctionForAllRequest(false,false,'','{{route('reviews.update',$review->id)}}','{{route('reviews.index')}}','post','','edit-form');" class="btn btn-primary submit">Update</button>
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
            var c_url = '{{ route("reviews.update", ":id") }}';
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
                            window.location = "{{ route('reviews.index') }}";
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

<script>

    function labelChange(elem) {
        let e = $(elem).data("id");
        console.log("#star" + e);
        $("#star" + e).attr("checked", true);
    }

    function ratingChange(elem) {
        $(elem).addClass("checked");
        $(elem).prevAll().addClass("checked");
        $(elem).nextAll().removeClass("checked");
        $(elem).nextAll().children("input").attr("checked", false);
        $("span.checked").each(function () {
            $(this).children("input").attr("checked", true);
        });
    }

</script>
@endsection
@extends('layouts.admin')
@section('title','Create Review')
@section('breadcrumb')
    <li><a href="{{route('reviews.index')}}">Reviews</a></li>
    <li class="active">Create</li>
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
    <h3 class="text-center">Create Review</h3>
</div>
<div class="row m-0 justify-content-center align-items-center padd-top">
    <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>
    <div class="col-md-8 col-lg-8 col-sm-12 col-12 ">
        <form id="create-form" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Domain Name</label>
                <select class="form-control select2" name="domain_name">
                    <option selected="selected" disabled>Select Domain</option>
                    @if(count(getDomains()) > 0)
                        @foreach(getDomains() as $domain)
                            <option value="{{$domain}}">{{$domain}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label>Customer Name</label>
                <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name" />
            </div>

            <div class="form-group">
                <div class="w-100" style="display: flex;flex-direction:row;">
                    <label>Customer Comment</label>
                    <fieldset class="rating" style="margin-left:10px;">
                        <input type="radio" id="mystar1" name="customer_rating" value="1" onchange="ratingChange(this)"/>
                        <label onclick="labelChange(this);" data-id="1" class="full" for="mystar1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="mystar2" name="customer_rating" value="2" onchange="ratingChange(this)"/>
                        <label onclick="labelChange(this);" data-id="2" class="full" for="mystar2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="mystar3" name="customer_rating" value="3" onchange="ratingChange(this)"/>
                        <label onclick="labelChange(this);" data-id="3" class="full" for="mystar3" title="Meh - 3 stars"></label>
                        <input type="radio" id="mystar4" name="customer_rating" value="4" onchange="ratingChange(this)"/>
                        <label onclick="labelChange(this);" data-id="4" class="full" for="mystar4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="mystar5" name="customer_rating" value="5" onchange="ratingChange(this)"/>
                        <label onclick="labelChange(this);" data-id="5" class="full" for="mystar5" title="Awesome - 5 stars"></label> 
                    </fieldset>
                </div>
                {{-- <div class="widget rate" style="display: flex; flex-direction:row;">
                    <label for="ratingId" class="form-label">Customer Rating</label>
                    <input type="hidden" name="customer_rating" id="ratingId" value="5">
                    <div class="starrr" style="margin-left:10px;"></div>
                </div> --}}
            </div>

            <div class="form-group">
                <label>Customer Comment</label>
                <textarea class="form-control" name="customer_comment" placeholder="Enter Customer Comment"></textarea>
            </div>

            <div class="form-group" style="margin-bottom: 5px !important;">
                <label for="InputFile">Upload Image</label>
                <input type="hidden" id="uploaded-file" name="image" value="">
                <input type="hidden" id="upload_path" name="upload_path" value="admin/uploads/reviews">
                <input type="file" name="file" id="InputFile" onchange="uploadFile($('#InputFile'))" accept=".jpg,.jpeg,.png">
            </div>

            <div class="form-group" style="width: 300px;">
                <div class="progress d-none" style="margin-bottom: 2px;">
                    <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                </div>
                <div class="msg"></div>
            </div>

            <div class="text-center">
                <button type="button" onclick="commonFunctionForAllRequest(false,false,'','{{route('reviews.store')}}','{{route('reviews.index')}}','post','','create-form');" class="btn btn-primary submit">Add Review</button>
            </div>
        </form>
    </div>
    <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>

</div>
@endsection

@section('script')
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


        function create_resource() {
            $('.all-loader').removeClass('d-none');
            var myform = document.getElementById("create-form");
            var fd = new FormData(myform);
            fd.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('reviews.store') }}",
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
        var __slice = [].slice;
        const getRatingNumber = (e) =>{ ratingId.value = e.getAttribute('data-number'); }
        !function(a, b) {
            var c;
            return b.Starrr = c = function() {
                function b(b, c) {
                    var d, e, f;
                    this.options = a.extend({}, this.defaults, c), this.$el = b, f = this.defaults;
                    for (d in f) e = f[d], null != this.$el.data(d.toLowerCase()) && (this.options[d] = this.$el.data(d
                        .toLowerCase()));
                    this.$el.data("connected-input") && (this.$connectedInput = a('[name="' + this.$el.data(
                            "connected-input") + '"]'), this.options.rating = this.$connectedInput.val() ? parseInt(
                            this.$connectedInput.val(), 10) : void 0), this.createStars(), this.syncRating(), this
                        .$connectedInput && this.$connectedInput.is(":disabled") || (this.$el.on("mouseover.starrr",
                                "i",
                                function(a) {
                                    return function(b) {
                                        return a.syncRating(a.getStars().index(b.currentTarget) + 1)
                                    }
                                }(this)), this.$el.on("mouseout.starrr", function(a) {
                                return function() {
                                    return a.syncRating()
                                }
                            }(this)), this.$el.on("click.starrr", "i", function(a) {
                                return function(b) {
                                    return a.setRating(a.getStars().index(b.currentTarget) + 1)
                                }
                            }(this)), this.$el.on("starrr:change", this.options.change), null != this.$connectedInput &&
                            this.$el.on("starrr:change", function(a) {
                                return function(b, c) {
                                    return a.$connectedInput.val(c), a.$connectedInput.trigger("focusout")
                                }
                            }(this)))
                }
                return b.prototype.defaults = {
                    rating: void 0,
                    numStars: 5,
                    emptyStarClass: "fa fa-star-o",
                    fullStarClass: "fa fa-star",
                    change: function() {}
                }, b.prototype.getStars = function() {
                    return this.$el.find("i")
                }, b.prototype.createStars = function() {
                    var a, b, c;
                    for (c = [], a = 1, b = this.options.numStars; b >= 1 ? b >= a : a >= b; b >= 1 ? a++ : a--) c
                        .push(this.$el.append("<i class='" + this.options.emptyStarClass + "'></i>"));
                    return c
                }, b.prototype.setRating = function(a) {
                    return this.options.rating === a && (a = void 0), this.options.rating = a, this.syncRating(),
                        this.$el.trigger("starrr:change", a)
                }, b.prototype.getRating = function() {
                    return this.options.rating
                }, b.prototype.syncRating = function(a) {
                    var b, c, d, e, f;
                    if (a || (a = this.options.rating), a)
                        for (b = c = 0, e = a - 1; e >= 0 ? e >= c : c >= e; b = e >= 0 ? ++c : --c) this.getStars()
                            .eq(b).removeClass(this.options.emptyStarClass).addClass(this.options.fullStarClass);
                    if (a && a < this.options.numStars)
                        for (b = d = a, f = this.options.numStars - 1; f >= a ? f >= d : d >= f; b = f >= a ? ++d :
                            --d) this.getStars().eq(b).removeClass(this.options.fullStarClass).addClass(this.options
                            .emptyStarClass);
                    return a ? void 0 : this.getStars().removeClass(this.options.fullStarClass).addClass(this
                        .options.emptyStarClass)
                }, b
            }(), a.fn.extend({
                starrr: function() {
                    var b, d;
                    return d = arguments[0], b = 2 <= arguments.length ? __slice.call(arguments, 1) : [], this
                        .each(function() {
                            var e;
                            return e = a(this).data("starrr"), e || a(this).data("starrr", e = new c(a(
                                this), d)), "string" == typeof d ? e[d].apply(e, b) : void 0
                        })
                }
            })
        }(window.jQuery, window), $(function() {
            return $(".starrr").starrr()
        });
    </script>
@endsection

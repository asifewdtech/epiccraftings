@extends('layouts.app')

@section('title', 'Home')

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


@section('content')

    <section class="main-padding">
        <div class="border p-4">
            <h3>Customer Reviews</h3>

            <div class="row m-0 pt-2">
                <div class="col-12 col-lg-7 ps-0">
                    <div class="d-flex customerReviewsMain">
                        {{-- Total reviews section start --}}
                        <div class="pe-4 border-end">
                            <div>
                                <i class="fa fa-star fillStar"></i>
                                <i class="fa fa-star fillStar"></i>
                                <i class="fa fa-star fillStar"></i>
                                <i class="fa fa-star fillStar"></i>
                                <i class="fa fa-star fillStar"></i>
                            </div>
                            <div class="h5 fw-light">
                                Based on 319 reviews
                            </div>
                        </div>
                        {{-- Total reviews section end --}}

                        <div class="px-4 border-start border-end">
                            {{-- Rating 5 start code Start --}}
                            <div class="d-flex align-items-center hoverRating">
                                <div>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star fillStarSmall"></i>
                                </div>

                                <div class="ps-2 inputDiv">
                                    <div class="d-flex align-items-center me-2">
                                        <div class="progress customClassProgress">
                                            <div class="progress-bar bg-yellow" role="progressbar" style="width: 97%"
                                                aria-valuenow="97" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="ratingFontSize">97%</div>
                                    </div>
                                </div>
                                <div class="ratingFontSize">
                                    (302)
                                </div>
                            </div>
                            {{-- Rating 5 start code Start --}}

                            {{-- Rating 4 start code Start --}}
                            <div class="d-flex align-items-center hoverRating">
                                <div>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star-o fillStarSmall"></i>
                                </div>
                                <div class="ps-2 inputDiv">
                                    <div class="d-flex align-items-center me-2">
                                        <div class="progress customClassProgress">
                                            <div class="progress-bar bg-yellow" role="progressbar" style="width: 3%"
                                                aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="ratingFontSize">3%</div>
                                    </div>
                                </div>
                                <div class="ratingFontSize">
                                    (8)
                                </div>
                            </div>
                            {{-- Rating 4 start code end --}}

                            {{-- Rating 3 start code Start --}}
                            <div class="d-flex align-items-center hoverRating">
                                <div>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star-o fillStarSmall"></i>
                                    <i class="fa fa-star-o fillStarSmall"></i>
                                </div>
                                <div class="ps-2 inputDiv">
                                    <div class="d-flex align-items-center me-2">
                                        <div class="progress customClassProgress">
                                            <div class="progress-bar bg-yellow" role="progressbar" style="width: 1%"
                                                aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="ratingFontSize">1%</div>
                                    </div>
                                </div>
                                <div class="ratingFontSize">
                                    (2)
                                </div>
                            </div>
                            {{-- Rating 3 start code end --}}

                            {{-- Rating 2 start code Start --}}
                            <div class="d-flex align-items-center hoverRating">
                                <div>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star-o fillStarSmall"></i>
                                    <i class="fa fa-star-o fillStarSmall"></i>
                                    <i class="fa fa-star-o fillStarSmall"></i>
                                </div>
                                <div class="ps-2 inputDiv">
                                    <div class="d-flex align-items-center me-2">
                                        <div class="progress customClassProgress">
                                            <div class="progress-bar bg-yellow" role="progressbar" style="width: 0%"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="ratingFontSize">0%</div>
                                    </div>
                                </div>
                                <div class="ratingFontSize">
                                    (0)
                                </div>
                            </div>
                            {{-- Rating 2 start code end --}}

                            {{-- Rating 1 start code Start --}}
                            <div class="d-flex align-items-center hoverRating">
                                <div>
                                    <i class="fa fa-star fillStarSmall"></i>
                                    <i class="fa fa-star-o fillStarSmall"></i>
                                    <i class="fa fa-star-o fillStarSmall"></i>
                                    <i class="fa fa-star-o fillStarSmall"></i>
                                    <i class="fa fa-star-o fillStarSmall"></i>
                                </div>
                                <div class="ps-2 inputDiv">
                                    <div class="d-flex align-items-center me-2">
                                        <div class="progress customClassProgress">
                                            <div class="progress-bar bg-yellow" role="progressbar" style="width: 0%"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="ratingFontSize">0%</div>
                                    </div>
                                </div>
                                <div class="ratingFontSize">
                                    (0)
                                </div>
                            </div>
                            {{-- Rating 1 start code end --}}

                        </div>


                    </div>





                </div>
                <div class="col-12 col-lg-5 text-end pe-0 reviewBtn">
                    <button class="btn btn-transparent border" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                        onclick="changeInnerText(this)">
                        Write a review
                    </button>
                </div>

                <div class="col-12 px-0 mt-5">
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body border-top border-0 px-0">
                            <form id="createForm" class="row gx-0 gy-3 justify-content-between needs-validation" novalidate>
                                <div class="col-md-12">
                                    <div class="has-validation">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter your name"
                                            name="name" required>
                                        <div class="invalid-feedback">
                                            Please enter this field
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="has-validation">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email"
                                            required>
                                        <div class="invalid-feedback">
                                            Please enter this field
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="has-validation">
                                        <div class="widget rate">
                                            <label for="ratingId" class="form-label">Rating</label>
                                            <input type="hidden" name="rating" id="ratingId" value="5">
                                            <div class="starrr"></div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter this field
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="has-validation">
                                        <label for="reviewTitle" class="form-label">Review Title</label>
                                        <input type="text" class="form-control" id="reviewTitle" placeholder="Give your review a title"
                                            name="review_title" required>
                                        <div class="invalid-feedback">
                                            Please enter this field
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="has-validation">
                                        <label for="reviewDesc" class="form-label">Review</label>
                                        <textarea name="review" id="reviewDesc" class="form-control" cols="30" rows="5" placeholder="Write your comments here" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter this field
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="has-validation">
                                        <label class="form-label">Picture (optional)</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02">
                                            {{-- <label class="input-group-text" for="inputGroupFile02">Upload</label> --}}
                                            </div>
                                        <div class="invalid-feedback">
                                            Please enter this field
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn bg-7E13AE text-white f-22 font-w-600" type="button" onclick="commonFunctionForAllRequest(false,false,'','{{route('custmerReviews.store')}}','','post','','createForm')"> Add Review</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </section>

@endsection


@section('script')
    <script>
        const changeInnerText = (e) => {
            let text = e.innerText == 'Write a review' && $('.collapse.show') ? 'Cancel review' : 'Write a review';
            e.innerText = text;

           setTimeout(() => {
                document.getElementsByClassName('starrr')[0].lastElementChild.click();
                let allStar = document.getElementsByClassName('starrr')[0].childNodes;
                let num = 0;
                for (const single of allStar) {
                   single.setAttribute('data-number',++num)
                   single.setAttribute('onclick','getRatingNumber(this)')
                }
           }, 100);

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

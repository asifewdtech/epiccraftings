@extends('layouts.app')
@section('title','Shop')
@section('style')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

@section('content')
    <section>
        <div class="main-padding py-5">
            <div class="row m-0">
                <div class="col-md-2 co-lg-2 p-0">
                    @if($categories->count() > 0)

                        <h3 class="cl-444444">Categories</h3>
                        <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-pills nav-pills1 ms-2" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link {{$check?'':'active'}} " id="v-pills-all-taball" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-all" type="button" role="tab" aria-controls="v-pills-all"
                                    aria-selected="true">All</button>
                                @foreach ($categories as $category)
                                    <button class="nav-link {{$check && $category->id==$filterCategory->id?'active':''}}" id="v-pills-{{$category->id}}-tab{{$category->id}}" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-{{$category->id}}" type="button" role="tab" aria-controls="v-pills-{{$category->id}}"
                                    aria-selected="false">{{ ucwords($category->title)}}</button>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-10 p-0">
                    <div class="tab-content" id="v-pills-tabContent">
                        @if($categories->count() >0)

                            <div class="tab-pane animate__animated animate__fadeInRightBig {{$check?'':'active show'}} " id="v-pills-all" role="tabpanel"
                                aria-labelledby="v-pills-all-taball">
                                <section>
                                    <div class="row m-0">
                                        <input type="hidden" id="shop_quantity" value="1" />
                                        @foreach ($categories as $category)
                                            @foreach($category->products as $product)
                                                @if($product->quantity >0)
                                                    <div class="col-lg-4 col-md-3 mb-5 col-sm-12 text-center">
                                                        <div class="shadow pb-2">
                                                            <a href="{{route('product-detail',$product->slug)}}">
                                                                <div class="border w-100 ">
                                                                    <img src="{{asset($product->image)}}" class="w-100 imageSize" alt="">
                                                                </div>
                                                                <div class="cl-44444 pt-2">{{ ucwords($product->category->title) }}</div>
                                                                <div class="cl-7E13AE fw-600 pt-1">{{ ucwords($product->title) }}</div>
                                                            </a>
                                                            <div class="price fw-600 pt-1">${{ $product->min_price }}</div>
                                                            <button type="button" class="btn bg-white addCart py-1 px-4 shadow fw-600 mt-2" onclick="addToCart({{$product->id}})">
                                                            Buy now
                                                            </button>

                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endforeach

                                    </div>
                                </section>
                            </div>

                            @foreach ($categories as $category)
                                <div class="tab-pane animate__animated animate__fadeInRightBig {{$check && $category->id==$filterCategory->id?'active show':''}} " id="v-pills-{{$category->id}}" role="tabpanel"
                                    aria-labelledby="v-pills-{{$category->id}}-tab{{$category->id}}">
                                    <section>
                                        <div class="row m-0">
                                            @foreach($category->products as $product)
                                                @if($product->quantity >0)
                                                    <div class="col-lg-4 col-md-3 mb-5 col-sm-12 text-center">
                                                        <div class="shadow pb-2">
                                                            <a href="{{route('product-detail',$product->slug)}}">
                                                                <div class="border w-100 ">
                                                                    <img src="{{asset($product->image)}}" class="w-100 imageSize" alt="">
                                                                </div>
                                                                <div class="cl-44444 pt-2">{{ ucwords($product->category->title) }}</div>
                                                                <div class="cl-7E13AE fw-600 pt-1">{{ ucwords($product->title) }}</div>
                                                            </a>

                                                            <div class="price fw-600 pt-1">${{ $product->min_price }}</div>
                                                            <button type="button" class="btn bg-white addCart py-1 px-4 shadow fw-600 mt-2" onclick="addToCart({{$product->id}})">
                                                            Buy now
                                                            </button>

                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    </section>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



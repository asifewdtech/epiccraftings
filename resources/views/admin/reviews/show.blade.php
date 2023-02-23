@extends('layouts.admin')
@section('title','Product Detail')
@section('breadcrumb')
    <li><a href="{{route('products.index')}}">Products</a></li>
    <li class="active">View Product</li>
@endsection
@section('content')
<div class="padd-top">
    <h3 class="text-center">Product</h3>
</div>
<br>
<div class="row m-0 justify-content-center">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-sm-12 col-lg-8 col-md-8">
        <img src="{{asset($product->image)}}" class="previewImage">
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>
<div class="row m-0 alignment-preview padd-top-items">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-sm-6 col-lg-4 col-md-4">
        <h3>Title:</h3>
    </div>
    <div class="col-sm-6 col-lg-4 col-md-4">
        <h5>{{ $product->title }}</h5>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>
<div class="row m-0 alignment-preview padd-top-items">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-sm-6 col-lg-4 col-md-4">
        <h3>Category:</h3>
    </div>
    <div class="col-sm-6 col-lg-4 col-md-4">
        <h5>{{ $product->category->title }}</h5>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>
<div class="row m-0 alignment-preview padd-top-items">
    <div class="col-lg-2 col-md-2"></div>
    
    <div class="col-sm-6 col-lg-2 col-md-2">
        <h3>Min Price:</h3>
    </div>
    <div class="col-sm-6 col-lg-2 col-md-2">
        <h5>{{ $product->min_price }}</h5>
    </div>
    <div class="col-sm-6 col-lg-2 col-md-2">
        <h3>Max Price:</h3>
    </div>
    <div class="col-sm-6 col-lg-2 col-md-2">
        <h5>{{ $product->max_price }}</h5>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>
<div class="row m-0 alignment-preview padd-top-items">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-sm-6 col-lg-2 col-md-2">
        <h3>Size:</h3>
    </div>
    <div class="col-sm-6 col-lg-2 col-md-2">
        <h5>{{ $product->size }}</h5>
    </div>
    <div class="col-sm-6 col-lg-2 col-md-2">
        <h3>Quantity:</h3>
    </div>
    <div class="col-sm-6 col-lg-2 col-md-2">
        <h5>{{ $product->quantity }}</h5>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>

@if($product->summery !==null)
    <div class="row m-0 justify-content-center padd-top-items">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-sm-12 col-lg-8 col-md-8">
            <h3>Summery</h3>
            <div>{!! $product->summery !!}</div>
        </div>
        <div class="col-lg-2 col-md-2"></div>
    </div>
@endif

@if($product->description !==null)
    <div class="row m-0 justify-content-center padd-top-items">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-sm-12 col-lg-8 col-md-8">
            <h3>Description</h3>
            <div>{!! $product->description !!}</div>
        </div>
        <div class="col-lg-2 col-md-2"></div>
    </div>
@endif

@if($product->additional_information !==null)
    <div class="row m-0 justify-content-center padd-top-items">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-sm-12 col-lg-8 col-md-8">
            <h3>Additional information</h3>
            <div>{!! $product->additional_information !!}</div>
        </div>
        <div class="col-lg-2 col-md-2"></div>
    </div>
@endif

@if($product->how_to_order !==null)
    <div class="row m-0 justify-content-center padd-top-items">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-sm-12 col-lg-8 col-md-8">
            <h3>How To Order</h3>
            <div>{!! $product->how_to_order !!}</div>
        </div>
        <div class="col-lg-2 col-md-2"></div>
    </div>
@endif

@if($product->features !==null)
    <div class="row m-0 justify-content-center padd-top-items">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-sm-12 col-lg-8 col-md-8">
            <h3>Features</h3>
            <div>{!! $product->features !!}</div>
        </div>
        <div class="col-lg-2 col-md-2"></div>
    </div>
@endif
@if($product->packaging !==null)
    <div class="row m-0 justify-content-center padd-top-items">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-sm-12 col-lg-8 col-md-8">
            <h3>Packaging / Packaging Items</h3>
            <div>{!! $product->packaging !!}</div>
        </div>
        <div class="col-lg-2 col-md-2"></div>
    </div>
@endif

@if($product->shipping_process !==null)
    <div class="row m-0 justify-content-center padd-top-items">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-sm-12 col-lg-8 col-md-8">
            <h3>Shipping Process</h3>
            <div>{!! $product->shipping_process !!}</div>
        </div>
        <div class="col-lg-2 col-md-2"></div>
    </div>
@endif


@endsection
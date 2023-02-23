@extends('layouts.admin')
@section('title','Add Order Tracking')
@section('breadcrumb')
    <li><a href="{{route('orders.index')}}">Orders</a></li>
    <li class="active">Add Tracking</li>
@endsection
@section('content')
    <div class="padd-top">
        <h3 class="text-center">Add Order Tracking</h3>
    </div>
    <div class="row m-0 justify-content-center align-items-center padd-top">
        <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>
            <div class="col-md-8 col-lg-8 col-sm-12 col-12 ">
                <form id="create-form">
                    <input type="hidden" name="order_id" value="{{$id}}">
                    <div class="form-group">
                        <label>Tracking Number</label>
                        <input type="text" class="form-control" name="order_tracking" placeholder="Enter Tracking Number" />
                    </div>

                    <div class="form-group">
                        <label>Order Courier</label>
                        <input type="text" class="form-control" name="order_tracking_courier" placeholder="Enter Courier" />
                    </div>

                    <div class="form-group">
                        <label>Order Shipping Date</label>
                        <input type="date" class="form-control" name="order_shipping_date" placeholder="Enter Shipping Date" />
                    </div>
                
                    <div class="text-center">
                        <button type="button" onclick="createUpdateResource(this,'{{route('addOrderTrackingPost')}}','{{route('orders.index')}}','post','create-form');" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>
    </div>
@endsection

@extends('layouts.admin')
@section('title','Update Order Tracking')
@section('breadcrumb')
    <li><a href="{{route('orders.index')}}">Orders</a></li>
    <li class="active">Update Tracking</li>
@endsection
@section('content')
    <div class="padd-top">
        <h3 class="text-center">Update Order Tracking</h3>
    </div>
    <div class="row m-0 justify-content-center align-items-center padd-top">
        <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>
            <div class="col-md-8 col-lg-8 col-sm-12 col-12 ">
                <form id="edit-form">
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <div class="form-group">
                        <label>Tracking Number</label>
                        <input type="text" class="form-control" name="order_tracking" value="{{$order->order_tracking}}" placeholder="Enter Tracking Number" />
                    </div>

                    <div class="form-group">
                        <label>Order Courier</label>
                        <input type="text" class="form-control" name="order_tracking_courier" value="{{$order->order_courier}}" placeholder="Enter Courier" />
                    </div>

                    <div class="form-group">
                        <label>Order Shipping Date</label>
                        <input type="date" class="form-control" name="order_shipping_date" value="{{$order->order_shipping_date}}" placeholder="Enter Shipping Date" />
                    </div>
                
                    <div class="text-center">
                        <button type="button" onclick="createUpdateResource(this,'{{route('updateOrderTrackingPost')}}','{{route('orders.index')}}','post','edit-form');" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>
    </div>
@endsection

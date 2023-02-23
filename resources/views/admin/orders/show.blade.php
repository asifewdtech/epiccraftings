@extends('layouts.admin')
@section('title','Order Detail')
@section('breadcrumb')
  <li><a href="{{route('orders.index')}}">Orders</a></li>
  <li class="active">View Order</li>
@endsection
@section('content')
  <style>
    .bg-warning{
      background-color: #ffc107 !important;
      border:none !important;  
      outline: none !important;
    }
    .bg-danger{
      background-color:#DC3545 !important;
      border:none !important;
      outline: none !important;
    }
  </style>
      
  <section class="invoice">

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog" style="z-index: 10000">
      <div class="modal-dialog modal-lg" style="width: 80%;margin: auto;margin-top:-3% !important;">

        <!-- Modal content-->
        <div class="modal-content" style="min-width: 80%;">
          <div class="modal-header">
            <h4 class="modal-title">Image Preview</h4>
            <button type="button" class="close" data-dismiss="modal" style="margin-top: -50px;">&times;</button>
          </div>
          <div class="modal-body">
            <img id="img01" style="width: 100%;height: auto;">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-inline btn-info bg-danger btn-sm" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    @php
      $createdAt = Carbon\Carbon::parse($order->created_at)->timezone('Asia/Karachi')->toDateTimeString();
    @endphp
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> {{$order->order_from}}
          <small class="pull-right">Date: {{date('d/m/Y',strtotime($createdAt))}}</small>
        </h2>
      </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="row">
        <div class="col-xs-12">
          <h2>
            <small class="pull-right">
              @if($order->is_track =='0' && $order->status=='paid')
                <a href="{{route('addOrderTracking',$order->id)}}" class="btn btn-inline btn-info btn-sm" style="margin-top: 5px;margin-right:10px;">Add Order Tracking</a>
              @elseif($order->is_track =='1' && $order->status=='paid')
                <a href="{{route('updateOrderTracking',$order->id)}}" class="btn btn-inline btn-success btn-sm" style="margin-top: 5px;margin-right:10px;">Update Order Tracking</a>
              @endif

              @if($order->status=='paid' || ($order->status=='cancel' && $order->payment->refund_status=='no'))
                @if($order->payment !=null)
                  @if(($order->status=="paid" || $order->status=='cancel') && ( $order->payment->payment_method=='stripe' || $order->payment->payment_method=='paypal') && $order->payment->refund_status=='no')
                  {{-- @if(($order->status=="paid" || $order->status=='cancel') && ( $order->payment->payment_method=='stripe') && $order->payment->refund_status=='no') --}}
                    <button class="btn btn-inline btn-info btn-sm bg-warning" style="margin-top: 5px;margin-right:10px;" type="button" onclick="commonFunction(true,'{{route($order->payment->payment_method=='stripe'?'stripeRefund':'paypalRefund',$order->id)}}','','get','Are you sure you want to refund order?')">Refund</button>
                    {{-- <button class="btn btn-inline btn-info btn-sm bg-warning" style="margin-top: 5px;margin-right:10px;" type="button" onclick="commonFunction(true,'{{route('stripeRefund',$order->id)}}','','get','Are you sure you want to refund order?')">Refund</button> --}}
                  @endif
                @endif
              @endif

              @if($order->status!='cancel' && ($order->payment!=null && $order->payment->refund_status=='no'))
                <button class="btn btn-inline btn-info bg-danger btn-sm" style="margin-top: 5px;margin-right:10px;" type="button" onclick="commonFunction(true,'{{route('orders.update',$order->id)}}','','put','Are you sure you want to cancel order?')">Cancel</button>
              @elseif($order->status!='cancel' && $order->payment==null)
                <button class="btn btn-inline btn-info bg-danger btn-sm" style="margin-top: 5px;margin-right:10px;" type="button" onclick="commonFunction(true,'{{route('orders.update',$order->id)}}','','put','Are you sure you want to cancel order?')">Cancel</button>
              @endif

            </small>
          </h2>
        </div><!-- /.col -->
      </div>
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Oneon Crafts</strong><br>
          5272 Lyngate Ct Burke, VA 22015-1688<br>
          Phone: +1(843) 474-1356<br/>
          Email: info@oneoncrafts.com
        </address>
      </div><!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>{{ $order->customer->first_name.' '.$order->customer->last_name }}</strong><br>
          {{$order->customer->address}}<br>
          Phone: {{$order->customer->phone}}<br/>
          Email: {{ $order->customer->email }}
        </address>
      </div><!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice: {{date('Ymd').'-'.$order->id}}</b><br/>
        <b>Order Number: </b> {{ $order->order_number }}<br/>
        <b>Payment Method: </b> {{ $order->payment_method }}<br/>
      </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Title</th>
              <th>Qty</th>
              <th>Line One Text</th>
              <th>Line Two Text</th>
              <th>Line Three Text</th>
              <th>Size</th>
              <th>Fonts</th>
              <th>Colors</th>
              <th>Install</th>
              <th>Width</th>
              <th>Height</th>
              <th>Backing Color</th>
              <th>Backing Shape</th>
              <th>Rush Order</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order->orderDetails as $key=>$item)

              <tr>
                <td>{{ ++$key }}</td>
                <td><img width="60" height="30" src="{{ asset($item->image) }}" data-toggle="modal" data-target="#myModal"  alt="" onclick="imagePopUp(this);"></td>
                <td>{{ $item->title }}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->line_one_text}}</td>
                <td>{{$item->line_two_text}}</td>
                <td>{{$item->line_three_text}}</td>
                <td>{{$item->size}}</td>
                <td>{{$item->fonts}}</td>
                <td>{{$item->colors}}</td>
                <td>{{$item->install}}</td>
                <td>{{$item->width}}</td>
                <td>{{$item->height}}</td>
                <td>{{$item->backing_color}}</td>
                <td>{{$item->backing_shape}}</td>
                <td>{{$item->is_rush_order=='1'?'Yes':'No'}}</td>
                <td>${{$item->sub_total}}</td>
              </tr>

            @endforeach
          </tbody>
        </table>
      </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        @if($order->is_track=='1')
          <p class="lead">Order Tracking</p>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Tracking Number:</th>
                <td>{{$order->order_tracking}}</td>
              </tr>
              {{-- <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr> --}}
              <tr>
                <th>Courier:</th>
                <td>{{$order->order_courier}}</td>
              </tr>
              <tr>
                <th>Shipping Date:</th>
                <td>{{$order->order_shipping_date}}</td>
              </tr>
            </table>
          </div>
        @endif
      </div><!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Amount Due {{date('d/m/Y',strtotime($order->created_at))}}</p>
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>${{$order->sub_total + $order->discount_amount}}</td>
            </tr>
            {{-- <tr>
              <th>Tax (9.3%)</th>
              <td>$10.34</td>
            </tr> --}}
            <tr>
              <th>Discount:</th>
              <td>${{$order->discount_amount}}</td>
            </tr>
            <tr>
              <th>Shipping:</th>
              <td>${{$order->shipping_cost}}</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>${{$order->total}}</td>
            </tr>
          </table>
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12"><h3>Shipping Detail</h3></div>
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Country</th>
              <th>City</th>
              <th>Post Code</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $order->customer->first_name." ".$order->customer->last_name }}</td>
              <td>{{ $order->customer->email }}</td>
              <td>{{ $order->customer->phone }}</td>
              <td>{{ $order->customer->country }}</td>
              <td>{{ $order->customer->city }}</td>
              <td>{{ $order->customer->post_code }}</td>
              <td>{{ $order->customer->address }}</td> 
            </tr>
          </tbody>
        </table>
      </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12"><h3>Billing Detail</h3></div>
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Country</th>
              <th>City</th>
              <th>Post Code</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $order->customer->billing_first_name." ".$order->customer->billing_last_name }}</td>
              <td>{{ $order->customer->billing_email }}</td>
              <td>{{ $order->customer->billing_phone }}</td>
              <td>{{ $order->customer->billing_country }}</td>
              <td>{{ $order->customer->billing_city }}</td>
              <td>{{ $order->customer->billing_post_code }}</td>
              <td>{{ $order->customer->billing_address }}</td> 
            </tr>
          </tbody>
        </table>
      </div><!-- /.col -->
    </div><!-- /.row -->

  </section><!-- /.content -->

@endsection

@section('script')
  <script>
    var modal = document.getElementById("myModal");
    function imagePopUp(e){
      var modalImg = document.getElementById("img01");
      var captionText = document.getElementById("caption");
      modal.style.display = "block";
      modalImg.src = e.src;
      captionText.innerHTML = e.alt;
    }

    setInterval(function(){
      $('body').css('padding-right','0px');
      $('.modal-backdrop').remove();
    },100);
  </script>
@endsection
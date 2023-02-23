@extends('layouts.admin')
@section('title','Orders List')
@section('breadcrumb')
    <li><a href="{{route('orders.index')}}">Orders</a></li>
    <li class="active">List</li>
@endsection
@section('content')
<style>
    .bg-paid{
        background-color:#28a745 !important;
    }
    .bg-cancel{
        background-color: #DC3545 !important;

    }
    .bg-refund{
        background-color: #ffc107 !important;

    }
    .bg-unpaid{
        background-color: #6C757D !important;

    }
    #ordersTable:active{
        cursor: grab;
    }
    .alterMessage{
        width:30%;
        color: #ffffff;
        background-color: #95c781;
        border-color: #d6e9c6;
        position: fixed;
        top: 60px;
        z-index: 11;
    }

    [data-style=mypops] + .popover {background: #4194ca;}
    [data-style=mypops] + .popover.bottom .arrow:after {border-bottom-color: #4194ca;}
    [data-style=mypops] + .popover-content {}

</style>

<div class="alert alterMessage d-none" role="alert"></div>

    <div class="padd-top"> <h3 class="text-center">All Orders</h3></div>
    <div class="row">
        <div class="col-xs-12">
          <h2>
            <small class="pull-right">
                <a href="{{route('exportOrdersWithImage')}}" class="btn btn-inline btn-info btn-sm mr-5" style="margin-top: 5px;margin-right:10px;">Export Orders</a>
            </small>
          </h2>
        </div><!-- /.col -->
      </div>
    <div class="box-body">
        <div class="col-xs-12 table-responsive scroller">
            <table id="ordersTable" class="table table-bordered table-striped"  data-ordering="true">
                <thead>
                    <tr>
                        <th></th>
                        <th>Order Date</th>
                        <th>Order From</th>
                        <th>Order Number</th>
                        <th>Standard/Rush</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>No. of products</th>
                        <th>Status</th>
                        <th>Shipping cost</th>
                        <th>Total amount</th>
                        <th>Payment Method</th>
                        <th>Special Instruction</th>
                        <th>Order Track</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($orders->count()>0)
                        
                        @foreach($orders as $order)
                            @php
                                $emailPartialization = explode('@',$order->order_email_from);
                                $orderFrom = $emailPartialization[1];
                                $totalShippingCost = ($orderFrom=="montrealneons.com")? "CAD$ ".$order->shipping_cost: (($orderFrom=="customneons.net") ? "Rs ".$order->shipping_cost : "$ ".$order->shipping_cost);
                                $totalCost = ($orderFrom=="montrealneons.com")? "CAD$ ".$order->total: (($orderFrom=="customneons.net") ? "Rs ".$order->total : "$ ".$order->total);
                                $createdAt = Carbon\Carbon::parse($order->created_at)->timezone('Asia/Karachi')->toDateTimeString();
                                $copyContent = implode(' ', array(date('d-m-Y h:i a',strtotime($createdAt)),$orderFrom, $order->order_number,$order->is_rush_order=='1'? 'Rush':'Standard',isset($order->customer->first_name) || isset($order->customer->last_name)?$order->customer->first_name.' '.$order->customer->last_name:'',isset($order->customer->email)?$order->customer->email:'',$order->total_products,$order->status,$totalShippingCost,$totalCost,$order->payment_method,$order->special_instruction));
                            @endphp
                            <tr>
                                <td><button onclick="copyContentTd(this);" data-content="{{$copyContent}}" class="btn btn-primary btn-sm">Copy</button></td>
                                <td ondblclick="copyContentTd(this);" data-content="{{date('d-m-Y h:i a',strtotime($createdAt))}}"><span class="d-none">{{strtotime($createdAt)}}</span> {{ date('d-m-Y h:i a',strtotime($createdAt))}}</td>
                                {{-- <td ondblclick="copyContentTd(this);" data-content="{{date('d-m-Y h:i a',strtotime($createdAt))}}"><span class="d-none">{{strtotime($createdAt)}}</span> {{ Carbon\Carbon::parse($createdAt)->timezone('Asia/Karachi')->toDateTimeString()}}</td> --}}
                                <td ondblclick="copyContentTd(this);" data-content="{{ $orderFrom }}">{{ $orderFrom }} </td>
                                <td ondblclick="copyContentTd(this);" data-content="{{$order->order_number}}">{{ $order->order_number }}</td>
                                <!--<td ondblclick="copyContentTd('{{$copyContent}}')">{{ $order->is_email_send=='1'? "Success":"Failled" }}</td>-->
                                <td ondblclick="copyContentTd(this);" data-content="{{$order->is_rush_order=='1'? "Rush":"Standard"}}">{{ $order->is_rush_order=='1'? "Rush":"Standard" }}</td>
                                <td ondblclick="copyContentTd(this);" data-content="{{isset($order->customer->first_name) || isset($order->customer->last_name)?$order->customer->first_name." ".$order->customer->last_name:""}}">{{ isset($order->customer->first_name) || isset($order->customer->last_name)?$order->customer->first_name." ".$order->customer->last_name:"" }}</td>
                                <td ondblclick="copyContentTd(this);" data-content="{{isset($order->customer->email)?$order->customer->email:""}}">{{ isset($order->customer->email)?$order->customer->email:"" }}</td>
                                <td ondblclick="copyContentTd(this);" data-content="{{$order->total_products}}">{{ $order->total_products }}</td>
                                <td ondblclick="copyContentTd(this);" data-content="{{$order->status}}"><span class="badge bg-{{$order->status}}">{{ $order->status }}</span></td>
                                <td ondblclick="copyContentTd(this);" data-content="{{$totalShippingCost}}">{{ $totalShippingCost }}</td>
                                <td ondblclick="copyContentTd(this);" data-content="{{$totalCost}}">{{ $totalCost }}</td>
                                <td ondblclick="copyContentTd(this);" data-content="{{$order->payment_method}}">{{ $order->payment_method }}</td>
                                <td ondblclick="copyContentTd(this);" data-content="{{$order->special_instruction}}">{{ $order->special_instruction }}</td>
                                <td>
                                    @if($order->is_track =='0' && $order->status=="paid")
                                        <a href="{{route('addOrderTracking',$order->id)}}" class="btn btn-inline btn-info btn-sm">Add Order Tracking</a>
                                    @elseif($order->is_track =='1' && $order->status=="paid")
                                        <a href="{{route('updateOrderTracking',$order->id)}}" class="btn btn-inline btn-success btn-sm">Update Order Tracking</a>
                                    @endif
                                </td>
                                <td>
                                    {{-- @if($order->is_email_send =='0')<button class="btn btn-inline btn-primary btn-sm" onclick="commonFunction(true,'{{route('againSendOrderEmailToCustomer')}}','{{route('orders.index')}}',{_token: '{{ csrf_token() }}',id:'{{ $order->id }}'},'post','Are you sure to want send email to customer?')">Send Email</button>@endif --}}
                                    <a href="{{ route('orders.show',$order->id) }}"><button class="btn btn-inline btn-info btn-sm">View Detail</button></a>
                                    {{-- <button class="btn btn-inline btn-danger btn-sm" onclick="delete_resource('{{ route('orders.destroy',$order->id) }}','{{ route('orders.index') }}')">Delete</button> --}}
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div><!-- /.box-body -->

@endsection

@section('script')

    <script type="text/javascript">

        function exportOrders(){
            $.ajax({
                url: "{{route('exportOrdersWithImage')}}",
                type: 'get',
                success: function (data) {

                },
            });
        }

        $(function() {
            $("#ordersTable").DataTable({ "order": [[ 1, "desc" ]],"lengthMenu": [[-1], ["All"]], "scrollX": true, fixedHeader: true});
        });

        setTimeout(() => {
            let elem = $('#ordersTable_wrapper').children()[1];
            elem.style.height = '100vh';
            elem.style.overflow = 'auto';
        }, 1000);

        function copyContentTd(elem){
            let code = $(elem).data('content');
            var inp =document.createElement('input');
            document.body.appendChild(inp);
            inp.value = code;
            inp.select();
            $('.alterMessage').removeClass('d-none').html(`"${code}"` + ' has been copied.' );
            setTimeout(() => {

                $('.alterMessage').addClass('d-none');

            }, 2000);
            document.execCommand('copy',false);
            inp.remove();
        }

        // Datatable Scrolbar code start

        $(document).ready( function () {

            var $container = $("#ordersTable");
            var $scroller = $(".dataTables_scrollBody");
            bindDragScroll($container, $scroller);

        } );

        function bindDragScroll($container, $scroller) {

             var $window = $(window);

             var x = 0;
             var y = 0;

             var x2 = 0;
             var y2 = 0;
             var t = 0;

             $container.on("mousedown", down);
             $container.on("click", preventDefault);
             $scroller.on("mousewheel", horizontalMouseWheel); // prevent macbook trigger prev/next page while scrolling

             function down(evt) {
                //alert("down");
                 if (evt.button === 0) {

                     t = Date.now();
                     x = x2 = evt.pageX;
                     y = y2 = evt.pageY;

                     $container.addClass("down");
                     $window.on("mousemove", move);
                     $window.on("mouseup", up);

                     evt.preventDefault();

                 }

             }

             function move(evt) {
               // alert("move");
                 if ($container.hasClass("down")) {

                     var _x = evt.pageX;
                     var _y = evt.pageY;
                     var deltaX = _x - x;
                     var deltaY = _y - y;

                    $scroller[0].scrollLeft -= deltaX;

                     x = _x;
                     y = _y;

                 }

             }

             function up(evt) {

                 $window.off("mousemove", move);
                 $window.off("mouseup", up);

                 var deltaT = Date.now() - t;
                 var deltaX = evt.pageX - x2;
                 var deltaY = evt.pageY - y2;
                 if (deltaT <= 300) {
                     $scroller.stop().animate({
                         scrollTop: "-=" + deltaY * 3,
                         scrollLeft: "-=" + deltaX * 3
                     }, 500, function (x, t, b, c, d) {
                         // easeOutCirc function from http://gsgd.co.uk/sandbox/jquery/easing/
                         return c * Math.sqrt(1 - (t = t / d - 1) * t) + b;
                     });
                 }

                 t = 0;

                 $container.removeClass("down");

             }

             function preventDefault(evt) {
                 if (x2 !== evt.pageX || y2 !== evt.pageY) {
                     evt.preventDefault();
                     return false;
                 }
             }

             function horizontalMouseWheel(evt) {
                 evt = evt.originalEvent;
                 var x = $scroller.scrollLeft();
                 var max = $scroller[0].scrollWidth - $scroller[0].offsetWidth;
                 var dir = (evt.deltaX || evt.wheelDeltaX);
                 var stop = dir > 0 ? x >= max : x <= 0;
                 if (stop && dir) {
                     evt.preventDefault();
                 }
             }

         }
        // Datatable Scrolbar code end

    </script>

@endsection

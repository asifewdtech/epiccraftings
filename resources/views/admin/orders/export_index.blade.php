{{-- <table>
    <thead>
        <tr>
            <th style="font:bold">Order Date</th>
            <th style="font:bold">Order From</th>
            <th style="font:bold">Order Number</th>
            <th style="font:bold">Standard/Rush</th>
            <th style="font:bold">Name</th>
            <th style="font:bold">Email</th>
            <th style="font:bold">No. of products</th>
            <th style="font:bold">Status</th>
            <th style="font:bold">Shipping cost</th>
            <th style="font:bold">Total amount</th>
            <th style="font:bold">Payment Method</th>
            <th style="font:bold">Special Instruction</th>
            <th style="font:bold">Images</th>
        </tr>
    </thead>
    <tbody>
        @if($orders->count()>0)
            @foreach($orders as $order)
                <tr>
                    <td >{{date('d-m-Y h:i a',strtotime($order->created_at))}}</td>
                    <td >{{ $order->order_from }}</td>
                    <td >{{ $order->order_number }}</td>
                    <td >{{ $order->is_rush_order=='1'? "Rush":"Standard" }}</td>
                    <td >{{ isset($order->customer->first_name) || isset($order->customer->last_name)?$order->customer->first_name." ".$order->customer->last_name:"" }}</td>
                    <td >{{ isset($order->customer->email)?$order->customer->email:"" }}</td>
                    <td >{{ $order->total_products }}</td>
                    <td ><span class="badge bg-{{$order->status}}">{{ $order->status }}</span></td>
                    <td >{{ $order->shipping_cost }}</td>
                    <td >{{ $order->total }}</td>
                    <td >{{ $order->payment_method }}</td>
                    <td >{{ $order->special_instruction }}</td>
                    <td>
                        @if(count($order->orderDetails)>0)
                            <table>
                                <tbody>
                                    <tr>
                                        @foreach($order->orderDetails as $detail)
                                            @php 
                                                $image = $detail->image;
                                                $image = str_replace('http://localhost/laravelprojects/oneoncraftlarave/','',$image);
                                                $image = str_replace("\\",'/',public_path($image));
                                            @endphp
                                            <td><img src="{{$image}}" width="100" height="100"></td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                        
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table> --}}

<table>
    <thead>
        <tr>
            <th>Order Date</th>
            <th>Order From</th>
            <th>Order Number</th>
            <th>Standard/Rush</th>
            <th>Name</th>
            <th>Email</th>
            <th>Payment Method</th>
            <th>Special Instruction</th>
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
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>

        @if($orders->count()>0)
            @foreach($orders as $order)
                @if(isset($order->orderDetails) && $order->orderDetails->count() >0)
                    @foreach($order->orderDetails as $key=>$item)
                        @php 
                            $image = $item->image;
                            $image = str_replace('http://localhost/laravelprojects/oneoncraftlarave/','',$image);
                            $image = str_replace("\\",'/',public_path($image));
                        @endphp
                        <tr>
                            <td >{{date('d-m-Y h:i a',strtotime($order->created_at))}}</td>
                            <td >{{ explode('@',$order->order_email_from)[1] }}</td>
                            <td >{{ $order->order_number }}</td>
                            <td >{{ $order->is_rush_order=='1'? "Rush":"Standard" }}</td>
                            <td >{{ isset($order->customer->first_name) || isset($order->customer->last_name)?$order->customer->first_name." ".$order->customer->last_name:"" }}</td>
                            <td >{{ isset($order->customer->email)?$order->customer->email:"" }}</td>
                            <td >{{ $order->payment_method }}</td>
                            <td >{{ $order->special_instruction }}</td>
                            <td><img width="100" height="100" src="{{$item->image}}"></td>
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
                            <td>${{$item->sub_total}}</td>
                        </tr>

                    @endforeach
                @endif
                
            @endforeach
        @endif

    </tbody>
</table>
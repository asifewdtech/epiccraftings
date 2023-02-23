@extends('layouts.admin')
@section('title','Coupons List')

@section('breadcrumb')
    <li><a href="{{route('coupons.index')}}">Coupons</a></li>
    <li class="active">List</li>
@endsection

@section('content')

    <div class="padd-top"><h3 class="text-center">All Coupons</h3></div>
    <div class="pr-4 text-right"><a href="{{route("coupons.create")}}" class="btn btn-info btn-sm" >Create Coupon</a></div>
    <div class="box-body">
        <div class="col-xs-12 table-responsive">
            <table id="example1" class="table table-bordered table-striped"  data-ordering="false">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Coupon Code</th>
                        <th>Coupon Type</th>
                        <th>Coupon Type Value</th>
                        <th>Coupon Restriction Type</th>
                        <th>Coupon Restriction Value</th>
                        <th>Coupon Expiry Date</th>
                        <th>Coupon Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($coupons->count()>0)
                        @foreach($coupons as $key=>$coupon)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $coupon->user_coupon_code }}</td>
                                <td>{{$coupon->coupon_type}}</td>
                                <td>{{ $coupon->coupon_type_value }}</td>
                                <td>{{ $coupon->coupon_restriction_type }}</td>
                                <td>{{ $coupon->coupon_restriction_value }}</td>
                                <td>{{$coupon->coupon_expiry_date}}</td>
                                <td>
                                    <span class="badge {{ $coupon->status=='1'?'badge-success':'badge-danger' }}">{{ $coupon->status=='1'?'Enable':'Disable' }}</span>
                                </td>
                                <td>
                                    <button class="btn btn-inline btn-primary btn-sm" title="Click To Copy Coupon" onclick="copyCouponCode('{{ $coupon->id }}','{{ $coupon->user_coupon_code }}')">Copy Code</button>
                                    <a href="{{route("coupons.edit",$coupon->id)}}" title="Click To Update Coupon" class="btn btn-inline btn-success btn-sm" >Edit</a>
                                    <button class="btn btn-inline {{ $coupon->status=='1'?'btn-danger':'btn-success' }} btn-sm" title="Click To Change Coupon Status" onclick="enableDisable('{{ route('coupons.status.update',$coupon->id) }}','{{ route('coupons.index') }}','{{ $coupon->status=='1'?'0':'1' }}','Are you sure you want to cou{{ $coupon->status=='1'?'disable':'enable' }}?')">{{ $coupon->status=='1'?'Disable':'Enable' }}</button>
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

    <script>
        function copyCouponCode(id,code){
            var inp =document.createElement('input');
            document.body.appendChild(inp);
            inp.value =code;
            inp.select();
            document.execCommand('copy',false);
            inp.remove();
        }

        function enableDisable(targetUrl,returnUrl,status){
            let txt = 'Are you sure you want to ';
            txt+= status==1?'enable?':'disable?';
            swal({
                text: txt,
                icon: "warning",
                buttons: {
                    cancel: "Cancel",
                    confirm: "OK"
                    },
            }).then((willDelete) => {
                if (willDelete)
                { 
                    $.ajax({
                        url: targetUrl,
                        type: "get",
                        data: {status:status},
                        success: function(data) {
                            if (data.success == true) {
                                swal("success", data.message, "success").then((value) => {
                                    window.location = returnUrl;
                                });
                            }
                        },
                    });
                } 
            });            
        }
    </script>

@endsection
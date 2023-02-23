@extends('layouts.admin')
@section('title','Update Coupon')

@section('breadcrumb')
    <li><a href="{{route('coupons.index')}}">Coupons</a></li>
    <li class="active">Update</li>
@endsection

@section('content')
    <div class="padd-top">
        <h3 class="text-center">Update Coupon</h3>
    </div>
    <div class="row m-0 justify-content-center align-items-center padd-top">
        <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>
            <div class="col-md-8 col-lg-8 col-sm-12 col-12 ">
                <form id="update-form">
                    @csrf
			        @method('put')
                    <div class="input-group">
                        <label>Coupon Code</label>
                        <input type="text" class="form-control" id="coupon_code" name="user_coupon_code" placeholder="Enter Coupon Code" value="{{$coupon->user_coupon_code}}"/>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" style="margin-top: 24px;outline:none;" type="button" onclick="autoGenerateCode(20)">Auto Generate</button>
                        </span>
                    </div>

                    <div class="form-group">
                        <label>Coupon Type</label>
                        <select name="coupon_type" class="form-control">
                            <option disabled selected>Select Coupon Type</option>
                            <option {{$coupon->coupon_type=="Fixed"?'selected':''}} value="Fixed">Fixed</option>
                            <option {{$coupon->coupon_type=="Percentage"?'selected':''}} value="Percentage">Percentage</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Coupon Type Value</label>
                        <input type="text" class="form-control" name="coupon_type_value" placeholder="Enter Coupon Type Value" value="{{$coupon->coupon_type_value}}"/>
                    </div>

                    <div class="form-group">
                        <label>Coupon Restriction Type</label>
                        <select name="coupon_restriction_type" class="form-control">
                            <option disabled selected>Select Coupon Restriction Type</option>
                            <option {{$coupon->coupon_restriction_type=="limited"?'selected':''}} value="limited">Limited</option>
                            <option {{$coupon->coupon_restriction_type=="unlimited"?'selected':''}} value="unlimited">Unlimited</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Coupon Restriction Value</label>
                        <input type="text" class="form-control" name="coupon_restriction_value" value="{{$coupon->coupon_restriction_value}}" placeholder="Enter Coupon Restriction Value" />
                    </div>

                    <div class="form-group">
                        <label>Coupon Expiry Date</label>
                        <input type="date" class="form-control" name="coupon_expiry_date" value="{{$coupon->coupon_expiry_date}}"/>
                    </div>
                
                    <div class="text-center">
                        <button type="button" onclick="createUpdateResource(this,'{{route('coupons.update',$coupon->id)}}','{{route('coupons.index')}}','post','update-form');" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        <div class="col-md-2 col-lg-2 col-sm-0 col-0 text-center"></div>
    </div>
@endsection

@section('script')
    <script>

    function autoGenerateCode(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$@&*!';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        $('#coupon_code').val(result);
    }

    </script>
@endsection

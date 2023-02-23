@extends('layouts.app')
@section('title','Checkout')
@section('style')
    <style>
        .hide{
            display: none;
        }
        .orderCheckbox:checked + label:before, .orderCheckbox:not(:checked) + label:before {
            top: 0px !important;
        }
        .orderCheckbox:checked + label:after, .orderCheckbox:not(:checked) + label:after {
            top: 3px !important;
        }
    </style>
@endsection
@section('content')
    <section class="main-padding pt-4">
        <div class="row g-0 smBorderZero ml-0 mr-0  align-items-center flex-nowrap alignStart">
            <div class="col-md-9 p-0 m-auto">
                @if(Session::has('success'))<div class="alert alert-success">{{Session::get('success')}}</div>@endif
                @if(Session::has('error'))<div class="alert alert-warning">{{Session::get('error')}}</div>@endif
            </div>
        </div>
    </section>

    @php
        Session::forget('success');
        Session::forget('error');
    @endphp
    @php $rushOrderCheck = false; @endphp
    @if(Session::has('cart') && !empty(Session::get('cart')))
        @foreach(Session::get('cart') as $item)
            @if($item['is_rush_order']==1) @php $rushOrderCheck = true; @endphp @endif
        @endforeach
        <section class="main-padding pt-4">
            <div class="f-35 font-w-600 border-bottom pb-2">Checkout</div>
            @foreach(Session::get('cart') as $item)
                <div class="row mb-4 g-0 border smBorderZero ml-0 mr-0  align-items-center flex-nowrap alignStart">
                    <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                        <div class="w-75">
                            <img src="{{asset($item['image'])}}" class="w-131" alt="">
                        </div>
                    </div>
                    <div class="col-8 col-sm-8 col-md-10 col-lg-10">
                        <div class="row m-0 g-0 pl-35">

                            <div class="col-12 col-sm-12 pt-3px col-md-3 col-lg-3 text-center flexCenter">
                                <div class="orderHeading">Title</div>
                                <div class="py-4 pl-Sm-15">{{ $item['title'] }} </div>
                            </div>
                            <div class="col-12 col-sm-12 pt-3px col-md-2 col-lg-2 text-center flexCenter">
                                <div class="orderHeading">Quantity</div>
                                <div class="py-4 pl-Sm-15"> <input data-price="{{$item["price"]}}" data-id="{{$item['id']}}" onchange="quantityUpdate(this);" oninput="quantityUpdate(this);" class="quantities quantity{{$item['id']}}" type="number" value="{{ $item['quantity'] }}" style="width:60px" class="ps-2" /></div>
                            </div>
                            <div class="col-12 col-sm-12 pt-3px col-md-2 col-lg-2 text-center flexCenter">
                                <div class="orderHeading">Price</div>
                                <div class="py-4 pl-Sm-15">{{ "$ ".$item['price'] }}</div>
                            </div>
                            {{-- <div class="col-12 col-sm-12 pt-3px col-md-4 col-lg-3 text-center flexCenter">
                                <div class="orderHeading">In Rush Order</div>
                                <div class="py-4 pl-Sm-15">@if($rushOrderCheck)  True @else False @endif</div>
                            </div> --}}
                            <div class="col-12 col-sm-12 pt-3px col-md-3 col-lg-3 text-center flexCenter">
                                <div class="orderHeading">Sub Total</div>
                                <div class="py-4 pl-Sm-15 subTotalPrice price{{$item['id']}}" data-flag="false" data-subtotal="{{$item["quantity"]*$item["price"]}}">{{ "$ ".$item['quantity']*$item['price'] }}</div>
                            </div>
                            <div class="col-12 col-sm-12 pt-3px col-md-1 col-lg-1 text-center flexCenter">
                                <div class="orderHeading">Action</div>
                                <div class="py-4 pl-Sm-15"><i class="fa fa-trash-o text-danger curser-pointer" onclick="myDelete({{$item['id']}})" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
        <!--<form action="" id="create-order" class=" require-validation needs-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ Config::get('stripe')['stripe_pk'] }}" method="post" novalidate>-->
        <form action="{{route("stripe.payment")}}" id="create-order" class=" require-validation needs-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ Config::get('stripe')['stripe_pk'] }}" method="post" novalidate>
            <section class="main-padding pt-4">

                <div class="row gx-0 gy-3 justify-content-between">
                    @csrf
                    @php 
                        $whichShow = false;
                        if($rushOrderCheck && (old('is_rush_order')!="0" && old('is_rush_order')!="1") ){$whichShow = true;}
                        if($rushOrderCheck && old('is_rush_order') && old('is_rush_order')=="1"){$whichShow = true;}
                        if($rushOrderCheck && old('is_rush_order') && old('is_rush_order')=="0"){$whichShow = false;}   
                    @endphp
                    <input type="hidden" id="rushOrderCheck" value="{{$whichShow}}">
                    <div class="col-md-7 col-lg-7">
                        {{-- Delivery Date Code Start --}}
                        <div class="row m-0 pb-4">
                            <div class="col-6 p-0">
                                <div class="d-flex justify-content-between flex-wrap">
                                   
                                    <div class="form-group">
                                        <input type="radio" id="standeredOrder" class="orderCheckbox" value="0" name="is_rush_order" @if(!$whichShow) checked @endif onchange="getDeliveryDate({{Config::get('app.normal_order')}})">
                                        <label for="standeredOrder">Standard order: Today + {{Config::get('app.normal_order')}} days</label>
                                    </div>

                                    <div class="form-group mt-2 d-none is_rush_order">
                                        <input type="radio" id="rushOrder" @if($whichShow) checked @endif class="orderCheckbox" name="is_rush_order" value="1" onchange="getDeliveryDate({{Config::get('app.rush_order')}})">
                                        <label for="rushOrder">Rush order: Today + {{Config::get('app.rush_order')}} days</label>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-6 p-0 text-end">
                                <span class="fw-bold">Expected Delivery Date:</span> <span class="deliveryDate"></span>
                            </div>
                        </div>
                        {{-- Delivery Date Code end --}}

                        <div class="pb-4">
                            <div class="f-35 font-w-600 pb-2">
                                Special Instruction
                            </div>
                            <textarea id="" rows="3" class="w-100 p-3 form-control" name="special_instruction" style="resize:none;">{{old('special_instruction')}}</textarea>
                        </div>

                        <div class="f-35 font-w-600 pb-2">
                            Shipping Details
                        </div>

                        <div class="row m-0 gx-0 gy-3">

                            <div class="col-md-6 pe-2">
                                <!-- <label for="firstname" class="form-label"></label> -->
                                <input type="text" class="form-control" name="first_name" id="firstname" placeholder="First Name*" value="{{old('first_name')}}" required>
                                @error('first_name')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6 ps-2">
                                <!-- <label for="lastName" class="form-label"></label> -->
                                <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Last Name*" value="{{old('last_name')}}" required>
                                @error('last_name')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="email" class="form-label"></label> -->
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email*" value="{{old('email')}}" required>
                                @error('email')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="phone" class="form-label"></label> -->
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone*" value="{{old('phone')}}" required>
                                @error('phone')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="CompanyName" class="form-label"></label> -->
                                <input type="text" class="form-control" name="company" value="{{old('company')}}" id="CompanyName"
                                        placeholder="Company name (optional)">
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="city" class="form-label"></label> -->
                                <input type="text" class="form-control" name="city" id="city" value="{{old('city')}}" placeholder="City/Town*" required>
                                @error('city')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="country" class="form-label"></label> -->
                                <!-- <input type="text" class="form-control" name="country" id="country" placeholder="State/Country*" required> -->

                                <div class="input-group align-items-center mb-2 border border-1 rounded ps-2 d-flex flex-nowrap">
                                    <div><em class="fa fa-map-marker"></em></div>
                                    <div class="ps-2 w-100">
                                        <select id="country" name="country" class="border-0 form-control country-select w-100">
                                            <option selected="" disabled="">Choose a Country...</option>
                                            @foreach (countries() as $country)
                                                {{-- <option {{ucwords(strtolower($country['name']))==old('country')?"selected":""}}  value="{{ ucwords(strtolower($country['name'])) }}" data-code="{{ $country['code'] }}">{{ $country['name'] }}</option> --}}
                                                <option {{$country['country_code']==old('country')?"selected":""}}  value="{{ $country['country_code'] }}" data-code="{{ $country['code'] }}">{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error('country')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="postCode" class="form-label"></label> -->
                                <input type="text" class="form-control" name="postal_code" value="{{ old('postal_code') }}"  id="postCode" placeholder="Postcode/ZIP*" required>
                                @error('postal_code')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="address" class="form-label"></label> -->
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="address" placeholder="Address*" required>
                                @error('address')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-check pt-1 pb-1">
                                <input class="form-check-input" type="checkbox" onchange="billingDetailSameOrDifferent(this)" name="billing_same_different" {{old('billing_same_different')=='same'?"checked":""}} value="same" id="billingSameDifferentChk">
                                <label class="form-check-label" for="billingSameDifferentChk">Billing Detail As Shipping</label>
                            </div>

                            {{-- <div class="form-check pt-1 pb-1 col-md-6">
                                <input type="radio" name="billing_same_different" checked onchange="billingDetailSameOrDifferent(this)" {{old('billing_same_different')=='same'?"checked":""}} value="same" id="same">
                                <label class="form-check-label" for="same">Billing Detail Same</label>
                            </div>

                            <div class="form-check pt-1 pb-1 col-md-6">
                                <input class="form-check-input" type="radio" name="billing_same_different" onchange="billingDetailSameOrDifferent(this)" {{old('billing_same_different')=='different'?"checked":""}} value="different" id="different">
                                <label class="form-check-label" for="different">Billing Detail Different</label>
                            </div> --}}
                        </div>

                        <div class="row m-0 gx-0 gy-3 billing-detail-div d-none">
                            <div class="f-35 font-w-600 pb-2">
                                Billing Details
                            </div>

                            <div class="col-md-6 pe-2">
                                <!-- <label for="firstname" class="form-label"></label> -->
                                <input type="text" class="form-control" name="billing_first_name" id="firstname" placeholder="First Name*" value="{{old('billing_first_name')}}" required>
                                @error('billing_first_name')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6 ps-2">
                                <!-- <label for="lastName" class="form-label"></label> -->
                                <input type="text" class="form-control" name="billing_last_name" id="lastName" placeholder="Last Name*" value="{{old('billing_last_name')}}" required>
                                @error('billing_last_name')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="email" class="form-label"></label> -->
                                <input type="email" name="billing_email" class="form-control" id="email" placeholder="Email*" value="{{old('billing_email')}}" required>
                                @error('billing_email')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="phone" class="form-label"></label> -->
                                <input type="text" name="billing_phone" class="form-control" id="phone" placeholder="Phone*" value="{{old('billing_phone')}}" required>
                                @error('billing_phone')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="CompanyName" class="form-label"></label> -->
                                <input type="text" class="form-control" name="billing_company" value="{{old('billing_company')}}" id="CompanyName"
                                        placeholder="Company name (optional)">
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="city" class="form-label"></label> -->
                                <input type="text" class="form-control" name="billing_city" id="city" value="{{old('billing_city')}}" placeholder="City/Town*" required>
                                @error('billing_city')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="country" class="form-label"></label> -->
                                <!-- <input type="text" class="form-control" name="country" id="country" placeholder="State/Country*" required> -->

                                <div class="input-group align-items-center mb-2 border border-1 rounded ps-2 d-flex flex-nowrap">
                                    <div><em class="fa fa-map-marker"></em></div>
                                    <div class="ps-2 w-100">
                                        <select id="country" name="billing_country" class="border-0 form-control country-select w-100">
                                            <option selected="" disabled="">Choose a Country...</option>
                                            @foreach (countries() as $country)
                                                <option {{$country['country_code']==old('country')?"selected":""}}  value="{{ $country['country_code'] }}" data-code="{{ $country['code'] }}">{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error('billing_country')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="postCode" class="form-label"></label> -->
                                <input type="text" class="form-control" name="billing_postal_code" value="{{ old('billing_postal_code') }}"  id="postCode" placeholder="Postcode/ZIP*" required>
                                @error('billing_postal_code')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- <label for="address" class="form-label"></label> -->
                                <input type="text" class="form-control" name="billing_address" value="{{ old('billing_address') }}" id="address" placeholder="Address*" required>
                                @error('billing_address')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="cl-7E13AE font-w-600 pb-1 f-22">ORDER SUMMARY</div>
                        @php $sub_total =0; @endphp
                        @foreach(Session::get('cart') as $item)
                            @php $sub_total +=$item['quantity']*$item['price']; @endphp
                            <div class="row m-0 py-3 justify-content-between border-top border-bottom">
                                <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                                    <div class="py-1 font-w-600">Product: {{ $item['title'] }}</div>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-end">
                                    <div class="py-1 price{{$item['id']}}">$ {{ $item['quantity']*$item['price'] }}</div>
                                </div>
                            </div>
                        @endforeach


                        <div class="row m-0 py-3 justify-content-between border-top border-bottom">
                            <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                                <div class="py-1 font-w-600">Sub Total</div>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-end">
                                <div class="py-1 subTotalCost">$ {{ $sub_total }}</div>
                            </div>
                        </div>

                        <div class="row m-0 py-3 justify-content-between border-top border-bottom discountDiv">
                            <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                                <div class="py-1 font-w-600">Discount</div>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-end">
                                <div class="py-1 discountValue">$ 0</div>
                            </div>
                        </div>

                        <div class="row m-0 py-3 justify-content-between border-top border-bottom">
                            <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                                <div class="py-1 font-w-600">Shipping</div>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-end">
                                <div class="py-1 shippingCostDiv">$ 0</div>
                            </div>
                        </div>

                        <input type="hidden" name="discount_check" id="discount_check" value="{{ Session::has('coupon')?1:0}}">
                        <input type="hidden" name="discount_amount" id="discount_amount" value="{{old('discount_amount')?old('discount_amount'):0}}">
                        <input type="hidden" name="coupon_applied" id="coupon_applied" value="{{ Session::has('coupon')?true:false}}">
                        <input type="hidden" name="coupon_applied_type" id="coupon_applied_type" value="{{Session::has('coupon')?Session::get('coupon')['type']:''}}">
                        <input type="hidden" name="coupon_applied_value" id="coupon_applied_value" value="{{Session::has('coupon')?Session::get('coupon')['value']:''}}">
                        {{-- <input type="hidden" name="discount_check" id="discount_check" value="{{ old('discount_check')?old('discount_check'):0}}">
                        <input type="hidden" name="discount_value" id="discount_value" value="{{old('discount_value')}}">
                        <input type="hidden" name="coupon_applied" id="coupon_applied" value="{{ old('coupon_applied')?old('coupon_applied'):false}}">
                        <input type="hidden" name="coupon_applied_type" id="coupon_applied_type" value="{{old('coupon_applied_type')}}">
                        <input type="hidden" name="coupon_applied_value" id="coupon_applied_value" value="{{old('coupon_applied_value')}}"> --}}
                        <input type="hidden" name="sub_total" value="{{$sub_total}}">
                        @php $total =$sub_total + 0; @endphp
                        <div class="row m-0 py-1 justify-content-between">
                            <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                                <div class="py-1 h5">Total</div>

                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-end">
                                <div class="py-1 totalCost">$ {{ $total }}</div>
                            </div>
                        </div>
                        <input type="hidden" name="total" id="total" value="{{$total}}">
                        <input type="hidden" id="shippingCostInput" name="shipping_cost" value="0">
                        <div class="row m-0 g-0">
                            <div class="col-12">
                                <!-- Payment Section code start -->
                                
                                    <!--<div class="form-check p-0 d-flex align-items-center">-->
                                    <!--    <div class="col-md-1">-->
                                    <!--        <input type="radio" id="paypal" name="payment_method" @if(old('payment_method')!=null && old('payment_method')=='paypal') checked @elseif(old('payment_method')==null) checked @endif value="paypal" onclick="paymentRadio()">-->
                                    <!--        <label for="paypal" class="font-w-600"></label>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-md-11"> <img src="{{asset('assets/img/paypal.png')}}" width="50"  alt=""></div>-->
                                    <!--</div>-->
                                    <!--<div id="paypalDiv">-->
                                    <!--    <div class="px-3 bg-f0ecec rounded py-3 my-4">-->
                                    <!--        Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                    <div class="form-check p-0 d-flex align-items-center">
                                        <div class="col-md-1">
                                            <!--<input class="form-check-input" type="radio" name="payment_method" @if(old('payment_method')=='stripe') checked @endif value="stripe" onclick="paymentRadio()" id="creditCard">-->
                                            <input class="form-check-input" type="radio" name="payment_method" checked value="stripe" onclick="paymentRadio()" id="creditCard">
                                            <label class="form-check-label" for="creditCard"></label>
                                        </div>
                                        <div class="col-md-11"><img src="{{asset('assets/img/creditCard.png')}}" class="w-220px w-100" alt="" /></div>
                                    </div>
                                    <!--<div id="creditCardDiv"></div>-->
                                    <div id="creditCardDiv">
                                        <div class="px-3 bg-f0ecec rounded py-3 my-4">
                                            <div class="font-w-600 f-22 ">
                                                Secure Payment via Credit/Debit Card
                                            </div>
                                            <div class="row m-0">
                                                <div class="col-md-12 pt-4 g-0">
                                                    <input type="text" class="form-control card-name" id="name" placeholder="Name on Card*"
                                                        required>
                                                </div>
                                                <div class="col-md-12 py-3 g-0">
                                                    <input pattern="[0-9 ]+" type="text" onkeyup="validateCard(this)" class="form-control card-number" id="cardNumber" placeholder="1234 1234 1234 1234" maxlength="19" required>
        
                                                </div>
                                                <div class="col-md-6 pb-3 ps-0">
                                                    <input type="number" class="form-control card-expiry-month" onfocusout="checkMonth(this);" onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;" id="month" placeholder="MM" required>
        
                                                </div>
        
                                                <div class="col-md-6 pb-3 pe-0">
                                                    <input type="number" class="form-control card-expiry-year" onfocusout="checkYear(this);" onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;" id="year" placeholder="YY" required>
                                                </div>
        
                                                <div class="col-md-12 pb-3 p-0">
                                                    <input type="number" class="form-control card-cvc" id="name" placeholder="CVC*" required>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                <!-- Payment Section code end -->

                                <div class="form-check pt-1 pb-1">
                                    <input class="form-check-input" type="checkbox" onchange="showHideCouponPortion(this)" name="coupon_check" {{(Session::has('coupon')?'checked':old('coupon_check')=='check')?'checked':''}} value="check" id="invalidCheck">
                                    <label class="form-check-label" for="invalidCheck">Use Coupon</label>
                                </div>

                                <div class="input-group mb-3 couponDiv {{(Session::has('coupon')?'':old('coupon_check')!='check')?'d-none':''}}">
                                    <input type="text" class="form-control" name="coupon_code" placeholder="Enter Coupon" {{Session::has('coupon')?'readonly':''}} id="coupon_code" value="{{ Session::has('coupon')?Session::get('coupon')['code']:old('coupon_code')}}">
                                    <button class="btn bg-7E13AE text-white {{Session::has('coupon')?'disabled':''}} " type="button" onclick="addCoupon(this)">Add Coupon</button>
                                </div>

                                <div class="form-check pt-1 pb-3">
                                    <input class="form-check-input" type="checkbox" name="term_conditions" {{old('term_conditions')=='check'?"checked":""}} value="check" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        I have read and agree to the website terms and conditions
                                    </label>
                                    @error('term_conditions')
                                        <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-row row">
                                <div class="col-md-12 error form-group hide">
                                    <div class="alert-danger alert">Please correct the errors and try again.</div>
                                </div>
                            </div>

                            <div class="row m-0 g-0">
                                <button class="btn bg-7E13AE text-white col-12 f-22 font-w-600" type="submit">Place Order</button>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </form>
    @else
        <section class="main-padding">
            <div class="row mb-4 g-0 smBorderZero ml-0 mr-0  align-items-center flex-nowrap alignStart">
                <div class="col-md-9 p-0 m-auto">
                    <img src="{{asset('assets/img/empty-cart.png')}}" loading="lazy" alt="Cart is Empty" class="img-fluid rounded w-100">
                </div>
            </div>
        </section>
    @endif
@endsection

@section('script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        if(new Date() > new Date('2021-11-16')){$('.is_rush_order').removeClass('d-none');}
        
        // validate credit number and add space after every 4 characters
        function validateCard(elem) {
            // var foo = $(elem).val().split(" ").join(""); // remove hyphens
            // if (foo.length > 0) {
            //     foo = foo.match(new RegExp('.{1,4}', 'g')).join(" ");
            // }
            // $(elem).val(foo.replace(/[a-zA-Z](.*)/g, '').replace(/[^\w\s]/gi, ''));
            $(elem).val($(".card-number").val().replace(/[^0-9- ]/g, ''));
        }


        function showHideCouponPortion(elem){
           if($(elem).prop('checked')){
                $('.couponDiv').removeClass('d-none');
           }else{
                $('.couponDiv').addClass('d-none');
           }
        }

        $(function () {
            var $form = $(".require-validation");
            $("form.require-validation").bind("submit", function (e) {
                var $form = $(".require-validation"),
                    inputSelector = ["input[type=email]", "input[type=password]", "input[type=text]", "input[type=file]", "textarea"].join(", "),
                    $inputs = $form.find(".required").find(inputSelector),
                    $errorMessage = $form.find("div.error"),
                    valid = true;
                $errorMessage.addClass("hide");

                $(".has-error").removeClass("has-error");
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === "") {
                        $input.parent().addClass("has-error");
                        $errorMessage.removeClass("hide");
                        e.preventDefault();
                    }
                });

                if (!$form.data("cc-on-file") && $('input[name=payment_method]:checked').val()=='stripe') {
                    e.preventDefault();
                    $('.all-loader').removeClass('d-none');
                    Stripe.setPublishableKey($form.data("stripe-publishable-key"));
                    Stripe.createToken(
                        {
                            number: $(".card-number").val().replace(/ /g,'').replace(/-/g,''),
                            cvc: $(".card-cvc").val(),
                            exp_month: $(".card-expiry-month").val(),
                            exp_year: $(".card-expiry-year").val(),
                        },
                        stripeResponseHandler
                    );
                }
                else{
                    $('.all-loader').removeClass('d-none');
                    $('#create-form').submit();
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.all-loader').addClass('d-none');
                    $(".error").removeClass("hide").find(".alert").text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response["id"];
                    // insert the token into the form so it gets submitted to the server
                    $form.find("input[type=text]").empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $('.all-loader').removeClass('d-none');
                    $form.get(0).submit();
                }
            }
        });

        const paymentRadio = () => {
            // paypal append code
            // if (paypal.checked === true) {
            //     $('#create-order').attr('action','{{route("paypal.payment")}}');
            //     paypalDiv.innerHTML =
            //         ` <div class="px-3 bg-f0ecec rounded py-3 my-4">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</div>`;
            // } else {
            //     paypalDiv.innerHTML = '';
            // }
            // paypal append code
            // creditCard append code
            // if (paypal.checked === true) {
            //     creditCardDiv.innerHTML = ``;
            // } else {
            //     $('#create-order').attr('action','{{route("stripe.payment")}}');
            //     creditCardDiv.innerHTML = `<div class="px-3 bg-f0ecec rounded py-3 my-4">
            //                         <div class="font-w-600 f-22 ">
            //                             Secure Payment via Credit/Debit Card
            //                         </div>
            //                         <div class="row m-0">
            //                             <div class="col-md-12 pt-4 g-0">
            //                                 <input type="text" class="form-control card-name" id="name" placeholder="Name on Card*"
            //                                     required>

            //                             </div>
            //                             <div class="col-md-12 py-3 g-0">
            //                                 <input pattern="[0-9 ]+" type="text" onkeyup="validateCard(this)" class="form-control card-number" id="cardNumber" placeholder="1234 1234 1234 1234" maxlength="19" required>

            //                             </div>
            //                             <div class="col-md-6 pb-3 ps-0">
            //                                 <input type="number" class="form-control card-expiry-month" onfocusout="checkMonth(this);" onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;" id="month" placeholder="MM" required>

            //                             </div>

            //                             <div class="col-md-6 pb-3 pe-0">
            //                                 <input type="number" class="form-control card-expiry-year" onfocusout="checkYear(this);" onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;" id="year" placeholder="YY" required>
            //                             </div>

            //                             <div class="col-md-12 pb-3 p-0">
            //                                 <input type="number" class="form-control card-cvc" id="name" placeholder="CVC*" required>
            //                             </div>
            //                         </div>
            //                     </div>`;

            // }
            
            $('#create-order').attr('action','{{route("stripe.payment")}}');
            creditCardDiv.innerHTML = `<div class="px-3 bg-f0ecec rounded py-3 my-4">
                <div class="font-w-600 f-22 ">
                    Secure Payment via Credit/Debit Card
                </div>
                <div class="row m-0">
                    <div class="col-md-12 pt-4 g-0">
                        <input type="text" class="form-control card-name" id="name" placeholder="Name on Card*"
                            required>

                    </div>
                    <div class="col-md-12 py-3 g-0">
                        <input pattern="[0-9 ]+" type="text" onkeyup="validateCard(this)" class="form-control card-number" id="cardNumber" placeholder="1234 1234 1234 1234" maxlength="19" required>

                    </div>
                    <div class="col-md-6 pb-3 ps-0">
                        <input type="number" class="form-control card-expiry-month" onfocusout="checkMonth(this);" onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;" id="month" placeholder="MM" required>

                    </div>

                    <div class="col-md-6 pb-3 pe-0">
                        <input type="number" class="form-control card-expiry-year" onfocusout="checkYear(this);" onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;" id="year" placeholder="YY" required>
                    </div>

                    <div class="col-md-12 pb-3 p-0">
                        <input type="number" class="form-control card-cvc" id="name" placeholder="CVC*" required>
                    </div>
                </div>
            </div>`;
            
            // creditCard append code
        }

        function addCoupon(elem){
            let coupon = $('#coupon_code').val();
            $.ajax({
                url: '{{route("checkValidCoupon")}}',
                type: "get",
                data: {coupon:coupon},
                success: function(data) {
                    if (data.success == true) {
                        $(elem).addClass('disabled');
                        $('#discount_check').val(1);
                        $('#coupon_applied').val(data.success);
                        $('#coupon_applied_type').val(data.type);
                        $('#coupon_applied_value').val(data.value);
                        // $('#total').val(data.total);
                        // $('.totalCost').val("$ "+data.total);
                        Swal.fire('Success',data.message,'success');
                    }else{
                        Swal.fire('Error!',data.message,'error');
                    }
                }
            });
        }

        function checkMonth(elem){
            if($(elem).val() > 12){
                $(elem).val(12);
            }

            if($(elem).val()<=0 ){
                $(elem).val(1);
            }
        }

        function checkYear(elem){
            var date = new Date(); // date object
            var getYear =  date.getFullYear(); // get current year
            var getTwodigitYear = getYear.toString().substring(2);
            if($(elem).val() < getTwodigitYear){
                $(elem).val(getTwodigitYear);
            }
        }

        function billingDetailSameOrDifferent(elem){
            if($(elem).prop('checked')){
                $('.billing-detail-div').addClass('d-none');
            }else{
                $('.billing-detail-div').removeClass('d-none');
            }
        }

        $(document).ready(function(){
            if($('#billingSameDifferentChk').prop('checked')){
                $('.billing-detail-div').addClass('d-none');
            }else{
                $('.billing-detail-div').removeClass('d-none');
            }

            paymentRadio();
        });


    </script>
@endsection

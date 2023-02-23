@extends('layouts.app')
@section('title','Payment Error')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
@section('style')
    <style>
        .hide{display: none;}
    </style>
@endsection
@section('content')
    @if(Session::has('errorArray'))    
        <section class="main-padding my-4">
            <div class="row mb-4 g-0 smBorderZero ml-0 mr-0  align-items-center flex-nowrap alignStart">
                <div class="col-md-8 col-lg-8 col-sm-12 col-12 shadow p-lg-5 p-md-5 p-sm-1 p-1 m-auto">
                    <div class="text-center"><img width="160" src="{{asset('assets/img/warning-sign-9743.svg')}}" loading="lazy" alt="Cart is Empty" class="img-fluid rounded "></div>
                    @if(Session::get('errorArray')['type'])<h4 class="text-center py-2">{{ ucwords(str_replace('_',' ',Session::get('errorArray')['type']))}}</h4>@endif
                    @if(Session::get('errorArray')['message'])<p style="color:#2b2b2b;font-size:18px;font-weight:600;" class="text-center">{{Session::get('errorArray')['message']}}</p>@endif
                    <p style="color:#7E13AE;font-size:18px;font-weight:600;" class="text-center blinker">Payment has been failed please try again and pay your order</p>
                    <div class="pt-3 text-center"><a href="{{route('checkout')}}" style="white-space: nowrap;background: #e80000;" class=" btn text-white shadow btn-danger btn-lg px-lg-5 px-md-5 px-sm-1 px-1"><i class="bi bi-arrow-left-circle"></i> &nbsp;&nbsp;Back To Checkout</a href="{{route('shop')}}"></div>
                    </div>
            </div>
        </section>
    @endif
@endsection
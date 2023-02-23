@extends('layouts.app')
@section('title','Order Submitted')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
@section('style')
    <style>
        .hide{
            display: none;
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

    <section class="main-padding my-4">
        <div class="row mb-4 g-0 smBorderZero ml-0 mr-0  align-items-center flex-nowrap alignStart">
            <div class="col-md-8 col-lg-8 col-sm-12 col-12 shadow p-lg-5 p-md-5 p-sm-1 p-1 m-auto">
                <div class="text-center"><img src="{{asset('assets/img/thankyou.png')}}" loading="lazy" alt="Cart is Empty" class="img-fluid rounded "></div>
                 <p style="color:#2b2b2b;font-size:22px;font-weight:600;" class="text-center">
                You have placed your order successfully!<br/>
                We will get in touch with you in 24 - 48 hours.
                </p>
                 <div class="pt-3 text-center"><a href="{{route('shop')}}" style="white-space: nowrap;" class=" btn text-white shadow bg-7E13AE btn-lg px-lg-5 px-md-5 px-sm-1 px-1"><i class="bi bi-arrow-left-circle"></i> &nbsp;&nbsp;Back To Shop</a href="{{route('shop')}}"></div>
                </div>
        </div>
    </section>
@endsection

@section('script')

@endsection

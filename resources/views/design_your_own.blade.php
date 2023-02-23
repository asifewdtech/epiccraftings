<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="description" content="design your own neon sign"/>
    <title>Custom Neon Sign</title>

    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('assets/singlePageAsset/css/bootstrap.css')}}" />
    <!--<link rel="stylesheet" href="{{ asset('assets/singlePageAsset/css/utility.css') }}" />-->
    <!--<link rel="stylesheet" href="{{ asset('assets/singlePageAsset/css/index.css') }}" />-->
    <!--<link rel="stylesheet" href="{{ asset('assets/singlePageAsset/css/media1900.css') }}" />-->
    <!--<link rel="stylesheet" href="{{ asset('assets/singlePageAsset/css/loader.css') }}" />-->
    <!--<link rel="stylesheet" href="{{ asset('assets/singlePageAsset/css/headerFooter.css') }}" />-->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-209150931-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-209150931-1');
    </script>


    <!-- Pinterest Tag -->
    <script>
        !function(e){if(!window.pintrk){window.pintrk = function () {
        window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var
        n=window.pintrk;n.queue=[],n.version="3.0";var
        t=document.createElement("script");t.async=!0,t.src=e;var
        r=document.getElementsByTagName("script")[0];
        r.parentNode.insertBefore(t,r)}}("https://s.pinimg.com/ct/core.js");
        pintrk('load', '2613659580801', {em: '<user_email_address>'});
        pintrk('page');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none;" alt=""
        src="https://ct.pinterest.com/v3/?event=init&tid=2613659580801&pd[em]=<hashed_email_address>&noscript=1" />
    </noscript>
    <!-- end Pinterest Tag -->

    <script>
        pintrk('track', 'checkout', {
        value: 100,
        order_quantity: 1,
        currency: 'USD'
        });
    </script>

    <script>
        pintrk('track', 'addtocart', {
        value: 100,
        order_quantity: 1,
        currency: 'USD'
        });
    </script>

    <script>
        pintrk('track', 'pagevisit');
    </script>

    <script>
        pintrk('track', 'lead', {
        lead_type: 'Newsletter'
        });
    </script>

    <script>
        pintrk('track', 'search', {
        search_query: 'boots'
        });
    </script>

    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '333544491872223');
      fbq('track', 'PageView');
    </script>

    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=333544491872223&ev=PageView&noscript=1" />
    </noscript>
<!-- End Facebook Pixel Code -->

    <!--<script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '1089872064883212'); fbq('track', 'PageView');</script><noscript> <img height="1" width="1" src="https://www.facebook.com/tr?id=1089872064883212&ev=PageView&noscript=1"/></noscript><!-- End Facebook Pixel Code -->

    <script>
        fbq('track', 'ViewContent');
    </script>

</head>
<style>
    #mockup1,#mockup2,#mockup3 {
        position: absolute;
        white-space: nowrap;
    }

    .disable-select {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .purple:hover{
        color: #7E13AE !important;
        font-weight: 600;
    }
    .navActive{
        font-weight: 600;
        color: #7E13AE !important;
    }
    .cart_number{
    border-radius: 25px;
    font-size: 10px;
    background-color: purple;
    color: #fff;
    padding: 3px 8px;
    top: -15px;
    position: absolute;
}
.rushCheckbox label:before {
      content: "";
      -webkit-appearance: none;
      background-color: red;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05),
        inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
      padding: 8px;
      display: inline-block;
      position: relative;
      vertical-align: middle;
      cursor: pointer;
      margin-right: 5px;
    }

    .rushCheckbox input:checked + label:after {
     content: "";
      display: block;
      position: absolute;
      top: 7px;
      left: 6px;
      width: 4px;
      height: 9px;
      border: solid #fff;
      border-width: 0 2px 2px 0;
      transform: rotate(45deg);
    }
    .rushCheckbox input {
        padding: 0;
        height: initial;
        width: initial;
        margin-bottom: 0;
        display: none;
        cursor: pointer;
    }

    .all-loader{
        position: fixed;
        width: 100%;
        z-index: +2222;
        height:100vh;
        background:white;
        display:flex;
        justify-content:center;
        align-items:center;
    }
</style>

<body class="bg-img disable-select" oncontextmenu="return false">
    <div class="all-loader d-none"><img src="{{asset('assets/img/loader.gif')}}"></div>
    <div class="fixed-whatsapp-parent" style="position: fixed;left: 25px;bottom: 25px;z-index: 1000;width: 60px;background: #32bb46;border-radius: 50%;height: 60px;">
        <a href="https://api.whatsapp.com/send?phone=16197691968" class="d-flex justify-content-center align-items-center"><i class="fa fa-whatsapp text-white" style="font-size: 45px;margin-top: 7px;"></i></a>
    </div>

    <div class="fixed-facebook-parent" style="position: fixed;right: 25px;bottom: 25px;z-index: 1000;width: 60px;background: #006AFF;border-radius: 50%;height: 60px;">
        <a href="http://m.me/oNeonCrafts" class="d-flex justify-content-center align-items-center">
            <svg style="margin-top: 10px;margin-left: 10px;" x="10" y="10"><g transform="translate(0.000000, -10.000000)" fill="#FFFFFF"><g id="logo" transform="translate(0.000000, 10.000000)"><path d="M20,0 C31.2666,0 40,8.2528 40,19.4 C40,30.5472 31.2666,38.8 20,38.8 C17.9763,38.8 16.0348,38.5327 14.2106,38.0311 C13.856,37.9335 13.4789,37.9612 13.1424,38.1098 L9.1727,39.8621 C8.1343,40.3205 6.9621,39.5819 6.9273,38.4474 L6.8184,34.8894 C6.805,34.4513 6.6078,34.0414 6.2811,33.7492 C2.3896,30.2691 0,25.2307 0,19.4 C0,8.2528 8.7334,0 20,0 Z M7.99009,25.07344 C7.42629,25.96794 8.52579,26.97594 9.36809,26.33674 L15.67879,21.54734 C16.10569,21.22334 16.69559,21.22164 17.12429,21.54314 L21.79709,25.04774 C23.19919,26.09944 25.20039,25.73014 26.13499,24.24744 L32.00999,14.92654 C32.57369,14.03204 31.47419,13.02404 30.63189,13.66324 L24.32119,18.45264 C23.89429,18.77664 23.30439,18.77834 22.87569,18.45674 L18.20299,14.95224 C16.80079,13.90064 14.79959,14.26984 13.86509,15.75264 L7.99009,25.07344 Z"></path></g></g></svg>
        </a>
    </div>

    <!-- Navbar code start-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top px-0">

        <div class="container-fluid main-padding-nav">
            <div class="d-block d-sm-block d-md-none d-lg-none"><i class="fa fa-bars" id="menuIcon"
                    onclick="menuFunction()" aria-hidden="true"></i></div>
            <div id="menuBarId" class="bg-white menuConetntMain d-block d-sm-block d-md-none d-lg-none px-3 py-3"
                style="margin-left:-50rem;">
                <a class="purple {{ Request::is('/') ? 'navActive' : ''  }}" href="{{ url('/') }}">
                    <div class="shadow bg-white py-1 px-3 my-2 fw-600 rounded">Home</div>
                </a>
                <a class="purple {{ Request::is('shop') ? 'navActive' : ''  }}" href="{{ url('/shop') }}">
                    <div class="shadow bg-white py-1 px-3 my-2 fw-600 rounded">Shop</div>
                </a>
                <a class="purple {{ Request::is('design') ? 'navActive' : ''  }}" href="{{ url('/design') }}">
                    <div class="shadow bg-white py-1 px-3 my-2 fw-600 rounded">
                        Design Your Own Neon Sign
                    </div>
                </a>
                <a class="purple {{ Request::is('terms-condition') ? 'navActive' : ''  }}" href="{{ url('/terms-condition') }}">
                    <div class="shadow bg-white py-1 px-3 my-2 fw-600 rounded">
                        Terms & conditions
                    </div>
                </a>
                <a class="purple {{ Request::is('return-policy') ? 'navActive' : ''  }}" href="{{ url('/return-policy') }}">
                    <div class="shadow bg-white py-1 px-3 my-2 fw-600 rounded">
                        Return policy
                    </div>
                </a>
                <a class="purple" href="{{ url('/') }}">
                    <div class="shadow bg-white py-1 px-3 my-2 fw-600 rounded">
                        Privacy
                    </div>
                </a>
                <a class="purple {{ Request::is('faq') ? 'navActive' : ''  }}" href="{{ url('/faq') }}">
                    <div class="shadow bg-white py-1 px-3 my-2 fw-600 rounded">
                        FAQ
                    </div>
                </a>
                <a class="purple {{ Request::is('about') ? 'navActive' : ''  }}" href="{{ url('/about') }}">
                    <div class="shadow bg-white py-1 px-3 my-2 fw-600 rounded">
                        About us
                    </div>
                </a>
                <a class="purple {{ Request::is('contact-us') ? 'navActive' : ''  }}" href="{{ url('/contact-us') }}">
                    <div class="shadow bg-white py-1 px-3 my-2 fw-600 rounded">
                        Contact us
                    </div>
                </a>
            </div>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('assets/img/nav-Icon_updated.png')}}" alt="" width="200" class="">
            </a>
            <div class="collapse navbar-collapse  " id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0 SmDisplayNone">
                    <li class="nav-item px-lg-5 ">
                        <a class="nav-link f-22-nav purple {{ Request::is('/') ? 'navActive' : ''  }} pl-0" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item px-lg-5 ">
                        <a class="nav-link f-22-nav purple {{ Request::is('shop') ? 'navActive' : ''  }} pl-0" aria-current="page" href="{{ url('/shop') }}">Shop</a>
                    </li>
                    <li class="nav-item px-lg-5 ">
                        <a class="nav-link f-22-nav purple {{ Request::is('design') ? 'navActive' : ''  }} pl-0" style="position:relative; font-weight:700;" href="{{ url('/design') }}">
                            Design Your Own Neon Sign
                            <span class="small cart_number blinker" style="top:3px;background:red;right:-30px">
                            New
                        </span>
                        </a>
                    </li>
                </ul>
                <div class="dropdown">
                    <div class="card border-0 cursor" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="{{ asset('assets/img/cart-Img.png')}}" width="28" id="defaultDropdown" alt="">
                        <div class="card-img-overlay p-0 " id="sameBlockDiv">
                            <div class="w-fitContent m-auto ps-1">
                                <span class="small cart_number" id="sameBlockSpan">
                                    @if(Session::has('cart') && !empty(Session::get('cart')))
                                    {{ count(Session::get('cart')) }} @else 0 @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    @if(Session::has('cart') && !empty(Session::get('cart')))
                    <ul id="headerDropDown" class="dropdown-menu headerDropdown px-0 mt-4 bg-white pb-0"
                        aria-labelledby="defaultDropdown">

                        <div>
                            <div class="d-flex px-3 justify-content-end pb-3"><i class="fa fa-times cursor-pointer"
                                    aria-hidden="true" onclick="myNone(this)"></i></div>
                            @php $total = 0; @endphp
                            <div class="cartOverflow">
                                @foreach(Session::get('cart') as $item)
                                    @php $total += $item["quantity"]*$item["price"]; @endphp
                                    <div class="row px-3  m-0 align-items-center border-top py-3 justify-content-end g-2">
                                        <div class="col-4 col-sm-4 col-md-3 col-lg-3 ps-0">
                                        <img src="{{asset($item["image"])}}" width="120" height="77" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-8 col-sm-8 col-md-5 col-lg-5">
                                        <div class="cl-44444 fw-600">{{ ucwords($item["title"]) }}</div>
                                        <div class="cl-828282">Rush in Order: @if($item['is_rush_order']==1) True @else False @endif</div>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-0">
                                        <div>
                                            <div class="d-flex">
                                                <div><input type="number" class="form-control quantity quantity{{$item['id']}} quantityInput"
                                                        value="{{ $item["quantity"] }}" data-price="{{$item["price"]}}" data-id="{{$item['id']}}" onchange="quantityUpdate(this);" oninput="quantityUpdate(this);"></div>
                                                <div class="ps-3 subTotalPrice price{{$item['id']}} fw-600" data-flag="true" data-subtotal="{{$item["quantity"]*$item["price"]}}">${{ $item["quantity"]*$item["price"] }}</div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-2 col-sm-2 col-md-1 col-lg-1 pe-0"><i class="fa fa-trash-o text-danger cursor-pointer"
                                            onclick="myDelete({{$item['id']}})" aria-hidden="true"></i></div>
                                    </div>

                                @endforeach
                            </div>

                        </div>

                        <div class="d-flex justify-content-between bg-f0ecec py-2 align-items-center px-3">
                            <div>
                                <a href="{{url('checkout')}}">
                                    <button type="button"
                                        class="bg-7E13AE border-0 shadow text-white px-4 rounded py-1">Go to
                                        Checkout</button>
                                </a>
                            </div>
                            <div class="totalCost" data-cost="{{$total}}">Total: ${{$total}}</div>
                        </div>
                    </ul>
                    @endif
                </div>



        </div>
        </div>
    </nav>
    <!-- Navbar code end-->

    <input type="hidden" id="csrf_token" value="{{csrf_token()}}">
    <div id="sectionOpacity"></div>
    <section class="main-padding pt-3">
        <div class="row p-1 p-sm-1 p-md-2 p-lg-2 mx-1 mx-sm-2 mx-lg-2 mx-md-2 bg-F34EFF-top text-white justify-content-center align-items-center robotoMedium box-shadow-font blinker f-22"
            id="bannarTopText">FREE GLOBAL SHIPPING + REMOTE CONTROL ON ALL ORDERS <span><i
                    class="fa fa-check text-white bg-success p-1 border ml-2" aria-hidden="true"></i></span></div>
        <div class="container-fluid px-0 px-md-2 px-lg-3">
            <div class="row">
                <div class="col-md-7 col-lg-7 col-sm-12 px-1 px-sm-2 px-md-2 px-lg-2">
                    <!-- Top Text code start -->
                    <div class="bg-white pl-1 pl-sm-1 pl-md-2 pl-lg-4 pr-1 pr-sm-1 pr-md-2 pr-lg-4  pt-2 pb-2 box-shadow-font"
                        id="copyimage">
                        <section class="pb-0 pb-sm-0 pb-md-2 pb-lg-3 d-none d-md-block d-lg-block">
                            <div class="text-center">
                                <img src="{{asset('assets/img/nav-Icon_updated.png')}}" alt="" width="200" class="img-fluid">
                            </div>

                        </section>
                        <!-- Top Text code end -->




                        <!-- tabs view only on mobile screens code end-->
                        <!-- <div class="mySlides main-img rounded h-700" id="sence" style="background: url(assets/singlePageAsset/img/room_wall.jpg) center center / 100% no-repeat; position:relative;"> -->
                        <div class="mySlides main-img rounded h-700 bannar-img-main-zoom" id="sence"
                            style="background: url({{ asset('assets/singlePageAsset/img/compress/room_wall.png') }});overflow:hidden;">
                            <!-- tabs view only on mobile screens code start-->

                            <!-- Top Text code end -->
                            <div id="mockupmain">
                                <div id="whole-backing"
                                    style="position: absolute; width: 141.844px; height: 80px; left: 407.125px; top: 150px; border-radius:5px;">
                                </div>
                                <div id="mockup1" class="mockup" onmouseover="onClickFun('noenText1',1);">
                                    <div class="backing-style">
                                        <span id="noenText1backing"
                                            class="WildScript noenText1backing noen noenText1 backing-text-behind backText1-top backing-clear z-index-1"
                                            data-color_name="Orange" data-mob="70" data-size="95" data-height="10"
                                            data-aspect_ratio="4.840" data-color="cl-tube-9" data-class="WildScript"
                                            style="position: absolute;">
                                            text1
                                        </span>
                                        <span id="noenText1" class="WildScript cl-tube-9-text noen noenText1 z-index-1"
                                            data-color_name="Orange" data-class="WildScript" data-mob="70"
                                            data-color="cl-tube-9" data-size="95" data-height="10"
                                            data-aspect_ratio="4.840" style="position: absolute;">Your Text</span>
                                    </div>
                                </div>
                                <div id="mockup2" class="mockup" onmouseover="onClickFun('noenText2',2);">
                                    <div class="backing-style">
                                        <span id="neonbacking2"
                                            class="KIONA  noenText2backing noen noenText2 backing-text-behind backText2-top backing-clear z-index-2"
                                            data-color_name="Yellow" data-size="45" data-mob="17" data-height="5"
                                            data-aspect_ratio="1.835" data-class="KIONA" data-color="cl-tube-2"
                                            style="position: absolute; display: none;">
                                            text2
                                        </span>
                                        <span id="noenText2" style="position: absolute; display: none;"
                                            class="KIONA  noen noenText2 cl-tube-2-text z-index-2"
                                            data-color_name="Yellow" data-size="45" data-mob="17" data-height="5"
                                            data-aspect_ratio="1.835" data-class="KIONA" data-color="cl-tube-2">Your
                                            Text 2</span>
                                    </div>
                                </div>
                                <div id="mockup3" class="mockup" onmouseover="onClickFun('noenText3',3);">
                                    <div class="backing-style">
                                        <span id="neonbacking3"
                                            class="Alexa noenText3backing noen noenText3 backing-text-behind backText3-top backing-clear z-index-3"
                                            data-color_name="Ice-Blue" data-size="80" data-mob="45" data-class="Alexa"
                                            data-height="7" data-aspect_ratio="2.621" data-color="cl-tube-6"
                                            style="position: absolute; display: none;">
                                            text3
                                        </span>
                                        <span id="noenText3" style="position: absolute; display: none;"
                                            class="Alexa noen cl-tube-6-text noenText3 z-index-3"
                                            data-color_name="Ice-Blue" data-size="80" data-mob="45" data-height="7"
                                            data-aspect_ratio="2.621" data-class="Alexa" data-color="cl-tube-6">Your
                                            Text 3</span>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper-secleted-output">
                                <div class="d-flex align-items-center ">
                                    <div class="blink_text d-none cursor-pointer bg-white mb-1 mb-sm-0 mb-lg-0 mb-md-0 py-1 py-sm-1 py-md-2 py-lg-2 w-100 text-center font-weight-bolder"
                                        id="copy-html" onclick=" myFunction();">
                                        <div class="blinker">Click to order on ETSY</div>
                                    </div>
                                    <textarea id="copy_content"
                                        style="width: 0px; height: 0px; z-index: -10;opacity: 0;"></textarea>
                                </div>

                                <div class="d-flex justify-content-between block-font flex-wrap " id="copyText">
                                    <div class="w-100 w-sm-50 w-md-50 w-lg-50 copy-html d-none">
                                        <div class="cl-606060 f-22 text-white robotoMedium">ID# <span
                                                class="unique_id"></span></div>
                                        <div class="cl-606060 f-22 text-white text-overflow">
                                            <span class="robotoMedium">1. Text:</span>
                                            <span class="pl-1 robotoRegular" id="finaltext"><span
                                                    id="lineonefinaltext"></span><span
                                                    id="linetwofinaltext"></span><span
                                                    id="linethreefineltext"></span>;</span>
                                        </div>
                                        <div class="cl-606060 f-22 text-white"><span class="robotoMedium">2.
                                                Font:</span><span id="finalfont"
                                                class="pl-1 robotoRegular text-one-font-name"></span><span
                                                id="finalfont"
                                                class="pl-1 robotoRegular text-two-font-name "></span><span
                                                id="finalfont" class="pl-1 robotoRegular text-three-font-name "></span>
                                        </div>
                                        <div class="cl-606060 f-22 text-white"><span class="robotoMedium">3.
                                                Color:</span><span
                                                class="pl-1 robotoRegular text-one-color-name">Hot-Pink,</span><span
                                                class="pl-1 robotoRegular text-two-color-name "></span><span
                                                class="pl-1 robotoRegular text-three-color-name "></span></div>
                                        <div class="cl-606060 f-22 text-white">
                                            <span class="robotoMedium">4. Backing Color:</span><span
                                                class="pl-1 robotoRegular"><span class="backing-color-text"> Clear
                                                    Acrylic</span>;</span>
                                        </div>
                                        <div class="cl-606060 f-22 text-white">
                                            <span class="robotoMedium">5. Backing Shape:</span><span
                                                class="pl-1 robotoRegular"><span class="backing-shape-text"> Text
                                                    Shape</span>;</span>
                                        </div>
                                        <div class="cl-606060 f-22 text-white"><span class="robotoMedium">6.
                                                Install:</span><span
                                                class="pl-1 robotoRegular install-text">Wall-Mounting-Kit, ;</span>
                                        </div>
                                        <div class="cl-606060 f-22 text-white"><span
                                                class="robotoMedium">Deliver</span><span
                                                class="pl-1 robotoRegular deliveryDate">4-19-2021;</span></div>
                                    </div>
                                </div>
                                {{-- {{ url('add-to-cart/1') }} --}}
                                <div class="cl-606060 f-22 text-white d-flex justify-content-between" id="priceDiv">
                                    <span class="robotoMedium">Price:</span>
                                    <div class="Arial f-w-600"><span class="pr-1">$</span><span
                                            class="price finalPrice pr-1">0</span>
                                    </div>
                                </div>

                                <div class="cl-606060 f-22 text-white d-flex  justify-content-between pb-1">
                                    <div>
                                        <span class="robotoMedium delivery_date" style="font-size: 16px">Delivery Date:</span>
                                        <div class="rushOrder d-none">
                                               <div class="form-group mb-0 d-flex align-items-center rushCheckbox" style="position:relative;">
                                                    <input type="checkbox" class="checkboxCategories" id="rush-checkbox" checked>
                                                    Rush Order &nbsp;&nbsp;   <label for="rush-checkbox" class="mb-0 position-relative"></label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="Arial f-w-600">
                                        <span class="pl-1 robotoRegular deliveryDate">4-19-2021</span>
                                    </div>
                                </div>

                                <div>
                                    <button class="btn btn-success w-100 mb-2 d-flex justify-content-center align-items-center" onclick="createOrder();"><i
                                            class="fa fa-cart-plus d-block d-sm-block d-md-block d-lg-block" aria-hidden="true"></i>&nbsp; <span class="">Buy</span> &nbsp;<span class="d-none d-sm-block d-md-block d-lg-block">now</span> </button>
                                </div>
                                {{-- <p class="btn-holder m-0">
                                <button {{Session::has('cart') ?count(session('cart')) == 1 ? 'disabled':'':'' }}
                                onclick="createOrder()"
                                class="btn btn-blue-gradient rounded text-white btn-block d-flex justify-content-center
                                align-items-center pr-0"
                                role="button"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>&nbsp; Proceed to checkout

                                </button>
                                </p> --}}
                            </div>
                            <div class="h-100 d-flex align-items-end">
                                <div class="dimensionBox d-flex justify-content-between align-items-center rounded w-26 px-2 px-sm-2 px-md-4 px-lg-4 py-2 whiteSpaceNoWrap">

                                    <div>
                                        <div class="sizeHeading f-w-600">Size</div>
                                        <div class="f-widthHeight">Width: <span id="textWidth"></span></div>
                                        <div class="f-widthHeight">Height: <span id="textHeight"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex m-0 justify-content-between pt-2">
                                <div
                                    class="col-lg-2 col-md-2 mob_slide_image col-sm-2 p-0 demo text-center img-tabs img-tab-shadow mobile_tab_img_active">
                                    <img src="assets/singlePageAsset/img/thumbnails/116_room_wall.png" alt="" class="cursor w-100"
                                        onclick="currentSlide(this,'room','{{asset('assets/singlePageAsset/img/compress/room_wall.png')}}')">
                                </div>
                                <div
                                    class="col-lg-2 col-md-2 mob_slide_image col-sm-2 p-0 demo text-center img-tab-shadow img-tabs">
                                    <img src="assets/singlePageAsset/img/thumbnails/116_hedge_wall.png" alt="" class="cursor w-100"
                                        onclick="currentSlide(this,'green','{{asset('assets/singlePageAsset/img/compress/hedge_wall.png')}}')">
                                </div>
                                <div
                                    class="col-lg-2 col-md-2 mob_slide_image col-sm-2 p-0 demo text-center img-tab-shadow img-tabs">
                                    <img src="assets/singlePageAsset/img/thumbnails/116_bridal_wall.png" alt="" class="cursor w-100"
                                        onclick="currentSlide(this,'bridal','{{asset('assets/singlePageAsset/img/compress/bridal_wall.png')}}')">
                                </div>
                                <div
                                    class="col-lg-2 col-md-2 mob_slide_image col-sm-2 p-0 demo text-center img-tab-shadow img-tabs">
                                    <img src="assets/singlePageAsset/img/thumbnails/116_baby_room.png"
                                        onclick="currentSlide(this,'baby','{{asset('assets/singlePageAsset/img/compress/baby_room.png')}}')" alt="" class="cursor w-100">
                                </div>
                                <div
                                    class="col-lg-2 col-md-2 mob_slide_image col-sm-2 p-0 demo text-center img-tab-shadow img-tabs">
                                    <img src="assets/singlePageAsset/img/thumbnails/116_white_wall.png"
                                        onclick="currentSlide(this,'night','{{asset('assets/singlePageAsset/img/compress/white_wall.png')}}')" alt="" class="cursor w-100">
                                </div>
                                <div
                                    class="col-lg-2 col-md-2 mob_slide_image col-sm-2 p-0 demo text-center img-tab-shadow img-tabs">
                                    <img src="assets/singlePageAsset/img/thumbnails/116_night_room.png"
                                        onclick="currentSlide(this,'night','{{asset('assets/singlePageAsset/img/compress/night_room.png')}}')" alt="" class="cursor w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5 col-sm-12 px-1 px-sm-2 px-md-2 px-lg-2">
                    <div
                        class="bg-white pb-1 pt-0 pt-sm-1 pt-md-4 pt-lg-4 pl-1 pl-sm-1 pl-md-2 pl-lg-3 pr-1 pr-sm-1 pr-md-2 pr-lg-3 box-shadow-font">
                        <div class="d-flex">
                            <div class="w-50 mr-lg-3 mr-md-3 mr-sm-3 mr-0">
                                <ul class="nav pb-1 pb-sm-2 pb-md-3 pb-lg-3" id="lineTab" role="tablist">
                                    <li onclick="selectLineColumn(this);" class="nav-item one btns-input-mob rounded"
                                        role="presentation">
                                        <a class="nav-link-tabs active f-19-tabs robotoMedium common-btn rounded"
                                            id="one-line-tab" data-tab="one" data-toggle="tab" href="#oneline"
                                            role="tab" aria-controls="online" onclick="tabClick('one')"
                                            aria-selected="true">
                                            One Line
                                        </a>
                                    </li>
                                    <li onclick="selectLineColumn(this);" class="nav-item two btns-input-mob rounded"
                                        role="presentation">
                                        <a class="nav-link-tabs f-19-tabs robotoMedium common-btn rounded"
                                            id="two-line-tab" data-tab="two" data-toggle="tab" href="#twoline"
                                            role="tab" aria-controls="twoline" aria-selected="false"
                                            onclick="tabClick('two')">
                                            Two Line
                                        </a>
                                    </li>
                                    <li onclick="selectLineColumn(this);" class="nav-item three btns-input-mob rounded"
                                        role="presentation">
                                        <a class="nav-link-tabs f-19-tabs robotoMedium common-btn rounded"
                                            id="three-line-tab" data-tab="three" data-toggle="tab" href="#threeline"
                                            role="tab" aria-controls="threeline" aria-selected="false"
                                            onclick="tabClick('three')">
                                            Three Line
                                        </a>
                                    </li>
                                </ul>
                                <!-- code changes -->
                                <div class="">
                                    <input type="hidden" id="input-text-id" value="#noenText1" />
                                    <input type="hidden" id="input-font-id" value="#one_text_1" />
                                    <div class="tab-content pt-1 pt-sm-2 pt-md-2 pt-lg-2" id="myTabContent">
                                        <div class="tab-pane fade show active" id="oneline" role="tabpanel"
                                            aria-labelledby="one-line-tab">
                                            <form action="">
                                                <div class="form-group">
                                                    <input class="form-control first_input" type="text" id="one_text_1"
                                                        onfocus="onFocusFun('noenText1','one_text_1');"
                                                        value="Your text" oninput="updateText(event,this , '1');"
                                                        data-tab="tab-one" placeholder="First line" rows="2" cols="30">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="twoline" role="tabpanel"
                                            aria-labelledby="two-line-tab">
                                            <form action="">
                                                <div class="form-group">
                                                    <input class="form-control first_input" type="text"
                                                        oninput="updateText(event,this, '1');"
                                                        onfocus="onFocusFun('noenText1','two_text_1');"
                                                        value="Neon Crafts" id="two_text_1" data-tab="tab-two"
                                                        placeholder="First line" rows="2" cols="30">
                                                    <input class="form-control second_input" type="text"
                                                        oninput="updateText(event,this, '2');"
                                                        onfocus="onFocusFun('noenText2','two_text_2');"
                                                        value="EST. 2020" id="two_text_2" data-tab="tab-two"
                                                        placeholder="Two line" rows="2" cols="30">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="threeline" role="tabpanel"
                                            aria-labelledby="three-line-tab">
                                            <form action="">
                                                <div class="form-group">
                                                    <input class="form-control first_input" type="text"
                                                        oninput="updateText(event,this, '1');"
                                                        onfocus="onFocusFun('noenText1','three_text_1');" value="Custom"
                                                        id="three_text_1" data-tab="tab-three" placeholder="First line"
                                                        rows="2" cols="30">
                                                    <input class="form-control second_input" type="text"
                                                        oninput="updateText(event,this, '2');"
                                                        onfocus="onFocusFun('noenText2','three_text_2');" value="Your"
                                                        id="three_text_2" data-tab="tab-three" placeholder="Two line"
                                                        rows="2" cols="30">
                                                    <input class="form-control third_input" type="text"
                                                        oninput="updateText(event,this, '3');"
                                                        onfocus="onFocusFun('noenText3','three_text_3');"
                                                        value="NeonSign" id="three_text_3" data-tab="tab-three"
                                                        placeholder="Three line" rows="2" cols="30">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- code changes -->
                            </div>
                            <div class="w-50 ml-3">
                                <div class="row pb-1 pb-sm-2 pb-md-2 pb-lg-2 m-0 border-bottom flex-nowrap">
                                    <div
                                        class="col-md-6 border-right pt-1 pt-sm-2 pt-md-2 pt-lg-2 pl-0 pr-0 text-center">
                                        <div class="robotoRegular pb-2 pb-sm-2 pb-md-3 pb-lg-3 f-16">Sign Size:</div>
                                        <div class="d-flex justify-content-around">
                                            <div class="button-color" onclick="decreaseSize();">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </div>
                                            <div class="button-color " onclick="increaseSize();">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-1 pt-sm-2 pt-md-2 pt-lg-2 pl-0 pr-0 text-center">
                                        <div class="robotoRegular pb-2 pb-sm-2 pb-md-3 pb-lg-3 f-16">Sign Align:</div>
                                        <div class="d-flex justify-content-around">
                                            <div class="button-color cursor-pointer" onclick="textAlign('left')">
                                                <i class="fa fa-caret-left f-17-icon" aria-hidden="true"></i>
                                            </div>
                                            <div class="button-color cursor-pointer" onclick="textAlign('center')">
                                                <i class="fa fa-bars f-17-icon" aria-hidden="true"></i>
                                            </div>
                                            <div class="button-color cursor-pointer" onclick="textAlign('right')">
                                                <i class="fa fa-caret-right f-17-icon" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Arrows for mobile view start-->
                                <div class="d-block d-md-none">
                                    <div class="robotoRegular py-1 py-sm-1 f-16 text-center">Adjust text position
                                        (optional)
                                    </div>
                                    <div class="row m-0 text-center justify-content-center pt-1">
                                        <div class="col-sm-1 col-2 p-0" onclick="moveTextUp()">
                                            <div class="button-color cursor-pointer">
                                                <i class="fa fa-arrow-up f-17-icon" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0 text-center justify-content-center py-1">
                                        <div class="col-sm-6 col-8 p-0">
                                            <div class="row m-0">
                                                <div class="col-sm-2 col-3 p-0" onclick="moveTextLeft()">
                                                    <div class="button-color cursor-pointer">
                                                        <i class="fa fa-arrow-left f-17-icon" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8 col-6 p-0"></div>
                                                <div class="col-sm-2 col-3 p-0" onclick="moveTextRight()">
                                                    <div class="button-color cursor-pointer">
                                                        <i class="fa fa-arrow-right f-17-icon" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0 text-center justify-content-center">
                                        <div class=" col-sm-1 col-2 p-0" onclick="moveTextDown()">
                                            <div class="button-color cursor-pointer">
                                                <i class="fa fa-arrow-down f-17-icon" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Arrows for mobile view end-->


                            </div>
                        </div>

                        <!-- The font section is to be changed -->
                        <div>
                            <div class="robotoMedium pb-1 f-18">Select Your Font.</div>
                        </div>

                        <div class="p-1 p-sm-2 p-md-2 p-lg-2 box-shadow-font">
                            <div class="row pl-2 pr-2 flex-nowrap">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Alexa font-div d-flex" data-path="{{public_path('assets/fonts/Alexa.ttf')}}"  data-desk="80" data-mob="45" data-height="7" data-aspect_ratio="2.621" data-class="Alexa" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Bayshore font-div d-flex" data-path="{{public_path('assets/fonts/Bayview.ttf')}}" data-desk="105" data-mob="62" data-height="8" data-aspect_ratio="3.505" data-class="Bayshore" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Dancer font-div d-flex " data-path="{{public_path('assets/fonts/Amsterdam.ttf')}}" data-desk="80" data-mob="38" data-height="7" data-aspect_ratio="2.779" data-class="Dancer" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Gruenewald font-div d-flex " data-path="{{public_path('assets/fonts/Greenworld.ttf')}}" data-desk="100" data-mob="65" data-height="7" data-aspect_ratio="2.683" data-class="Gruenewald" onclick="getClass(this);">The</div>
                                </div>
                            </div>
                            <div class="row pt-2 pl-2 pr-2 flex-nowrap">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded NewCursive font-div d-flex " data-path="{{public_path('assets/fonts/NewCursive.ttf')}}" data-desk="100" data-mob="46" data-height="7" data-aspect_ratio="2.979" data-class="NewCursive" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Barcelony font-div d-flex " data-path="{{public_path('assets/fonts/Barcelona.ttf')}}" data-desk="70" data-mob="35" data-height="10" data-aspect_ratio="3.906" data-class="Barcelony" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Vintage font-div d-flex " data-path="{{public_path('assets/fonts/Vintage.ttf')}}" data-desk="75" data-mob="45" data-height="7" data-aspect_ratio="3.028" data-class="Vintage" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Amanda font-div d-flex " data-path="{{public_path('assets/fonts/Amanda.ttf')}}" data-desk="85" data-mob="47" data-height="9" data-aspect_ratio="3.384" data-class="Amanda" onclick="getClass(this);">The</div>
                                </div>
                            </div>
                            <div class="row pt-2 pl-2 pr-2 flex-nowrap">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Budhayan font-div d-flex " data-path="{{public_path('assets/fonts/Freespirit.ttf')}}" data-desk="47" data-mob="22" data-height="10" data-aspect_ratio="3.443" data-class="Budhayan" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Sebastian font-div d-flex " data-path="{{public_path('assets/fonts/Chelsea.ttf')}}" data-desk="110" data-mob="70" data-height="10" data-aspect_ratio="3.828" data-class="Sebastian" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Signature font-div d-flex " data-path="{{public_path('assets/fonts/Signature.ttf')}}" data-desk="100" data-mob="65" data-height="9" data-aspect_ratio="3.230" data-class="Signature" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Assalwa font-div d-flex " data-path="{{public_path('assets/fonts/Austin.ttf')}}" data-desk="115" data-mob="71" data-height="8" data-aspect_ratio="3.454" data-class="Assalwa" onclick="getClass(this);">The</div>
                                </div>
                            </div>
                            <div class="row pt-2 pl-2 pr-2 flex-nowrap">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Hamilton font-div d-flex " data-path="{{public_path('assets/fonts/Neonscript.ttf')}}" data-desk="100" data-mob="62" data-height="10" data-aspect_ratio="4.520" data-class="Hamilton" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Hesterica font-div d-flex " data-path="{{public_path('assets/fonts/Freehand.ttf')}}" data-desk="90" data-mob="52" data-height="9" data-aspect_ratio="4.131" data-class="Hesterica" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded LoveNote font-div d-flex " data-path="{{public_path('assets/fonts/LoveNote.ttf')}}" data-desk="70" data-mob="36" data-height="7" data-aspect_ratio="2.681" data-class="LoveNote" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Northwell font-div d-flex " data-path="{{public_path('assets/fonts/Northshore.ttf')}}" data-desk="93" data-mob="56" data-height="10" data-aspect_ratio="4.871" data-class="Northwell" onclick="getClass(this);">The</div>
                                </div>
                            </div>
                            <div class="row pt-2 pl-2 pr-2 flex-nowrap">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Quinzey font-div d-flex " data-path="{{public_path('assets/fonts/Beachfront.ttf')}}" data-desk="73" data-mob="37" data-height="8" data-aspect_ratio="3.181" data-class="Quinzey" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded RedVelvet font-div d-flex " data-path="{{public_path('assets/fonts/Royalty.ttf')}}" data-desk="68" data-mob="30" data-height="9" data-aspect_ratio="3.052" data-class="RedVelvet" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Rocket font-div d-flex " data-path="{{public_path('assets/fonts/Rocket.ttf')}}" data-desk="50" data-mob="20" data-height="7" data-aspect_ratio="2.616" data-class="Rocket" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded WildScript font-div d-flex " data-path="{{public_path('assets/fonts/Neontrace.ttf')}}" data-desk="115" data-mob="70" data-height="10" data-aspect_ratio="4.840" data-class="WildScript" onclick="getClass(this);">The</div>
                                </div>
                            </div>
                            <div class="row pt-2 pl-2 pr-2 flex-nowrap">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded AvantGrade font-div d-flex " data-path="{{public_path('assets/fonts/Avante.ttf')}}" data-desk="75" data-mob="35" data-height="5" data-aspect_ratio="2.381" data-class="AvantGrade" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Bauhaus font-div d-flex " data-path="{{public_path('assets/fonts/Bauhaus.ttf')}}" data-desk="65" data-mob="44" data-height="6" data-aspect_ratio="2.247" data-class="Bauhaus" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded DOLCEVITA font-div d-flex " data-path="{{public_path('assets/fonts/Monaco.ttf')}}" data-desk="70" data-mob="30" data-height="5" data-aspect_ratio="2.205" data-class="DOLCEVITA" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded KIONA font-div d-flex " data-path="{{public_path('assets/fonts/Waikiki.ttf')}}" data-desk="65" data-mob="17" data-height="5" data-aspect_ratio="1.835" data-class="KIONA" onclick="getClass(this);">The</div>
                                </div>
                            </div>
                            <div class="row pt-2 pl-2 pr-2 flex-nowrap">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded NixieOne font-div d-flex " data-path="{{public_path('assets/fonts/ClassicType.ttf')}}" data-desk="65" data-mob="30" data-height="5" data-aspect_ratio="2.112" data-class="NixieOne" onclick="getClass(this);"> The </div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Typewriter font-div d-flex " data-path="{{public_path('assets/fonts/Typewriter.ttf')}}" data-desk="70" data-mob="21" data-height="5" data-aspect_ratio="2.017" data-class="Typewriter" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded PaperDaisy font-div d-flex " data-path="{{public_path('assets/fonts/Buttercup.ttf')}}" data-desk="120" data-mob="59" data-height="6" data-aspect_ratio="4.317" data-class="PaperDaisy" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Roboto font-div d-flex " data-path="{{public_path('assets/fonts/Melbourne.ttf')}}" data-desk="70" data-mob="35" data-height="6" data-aspect_ratio="2.500" data-class="Roboto" onclick="getClass(this);">The</div>
                                </div>
                            </div>
                            <div class="row pt-2 pl-2 pr-2 flex-nowrap">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded BRAVE font-div d-flex " data-path="{{public_path('assets/fonts/NeoTokyo.ttf')}}" data-desk="73" data-mob="33" data-height="6" data-aspect_ratio="2.609" data-class="BRAVE" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded LOVELO font-div d-flex " data-path="{{public_path('assets/fonts/LoveNeon.ttf')}}" data-desk="60" data-mob="28" data-height="9" data-aspect_ratio="1.623" data-class="LOVELO" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Marquee font-div d-flex " data-path="{{public_path('assets/fonts/Marquee.ttf')}}" data-desk="85" data-mob="40" data-height="9" data-aspect_ratio="2.811" data-class="Marquee" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded NeonGlow font-div d-flex " data-path="{{public_path('assets/fonts/NeonGlow.ttf')}}" data-desk="75" data-mob="40" data-height="9" data-aspect_ratio="2.556" data-class="NeonGlow" onclick="getClass(this);">The</div>
                                </div>
                            </div>
                            <div class="row pt-2 pl-2 pr-2 flex-nowrap">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded NeonLite font-div d-flex " data-path="{{public_path('assets/fonts/NeonLite.ttf')}}" data-desk="62" data-mob="30" data-height="6" data-aspect_ratio="1.992" data-class="NeonLite" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded NEONTUBE font-div d-flex " data-path="{{public_path('assets/fonts/Neontrace.ttf')}}" data-desk="62" data-mob="25" data-height="8" data-aspect_ratio="1.773" data-class="NEONTUBE" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded Outline font-div d-flex " data-path="{{public_path('assets/fonts/Outline.ttf')}}" data-desk="65" data-mob="55" data-height="9" data-aspect_ratio="2.212" data-class="Outline" onclick="getClass(this);">The</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 text-center pl-1 pr-1">
                                    <div class="font-btn py-1 py-sm-1 py-md-2 py-lg-2 border rounded SciFi font-div d-flex " data-path="{{public_path('assets/fonts/SciFi.ttf')}}" data-desk="48" data-mob="18" data-height="9" data-aspect_ratio="1.468" data-class="SciFi" onclick="getClass(this);">The</div>
                                </div>
                            </div>
                        </div>

                        <!-- The font section is to be changed -->
                        <div class="d-flex justify-content-between">
                            <!-- Color tubes main wrapper -->
                            <div class="w-100 mr-1 mr-sm-2 mr-md-3 mr-lg-3">
                                <div class="robotoMedium pt-2 pt-sm-2 pt-md-2 pt-lg-2 pb-1 f-18">Select Your Color.
                                </div>

                                <div class="d-flex px-1 px-sm-2 px-md-3 px-lg-3 justify-content-between">
                                    <div class="color-selection clr-tube cl-tube-12" data-class="cl-tube-12"
                                        data-name="Warm-White" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-13" data-class="cl-tube-13"
                                        data-name="Cold-White" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-1" data-class="cl-tube-1"
                                        data-name="Light-Yellow" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-2" data-class="cl-tube-2"
                                        data-name="Yellow" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-3" data-class="cl-tube-3"
                                        data-name="Orange" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-4" data-class="cl-tube-4"
                                        data-name="Dark-Blue" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-5" data-class="cl-tube-5"
                                        data-name="Sky-Blue" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-6" data-class="cl-tube-6"
                                        data-name="Ice-Blue" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-7" data-class="cl-tube-7"
                                        data-name="Green" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-8" data-class="cl-tube-8"
                                        data-name="Light-Pink" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-9-on" data-class="cl-tube-9"
                                        data-name="Hot-Pink" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-10" data-class="cl-tube-10"
                                        data-name="Red" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-11" data-class="cl-tube-11"
                                        data-name="Purple" onclick="changeclass(this)"></div>
                                    <div class="color-selection clr-tube cl-tube-14" data-class="cl-tube-14"
                                        data-name="Teal" onclick="changeclass(this)"></div>
                                </div>
                            </div>
                            <!-- Color tubes main wrapper -->
                        </div>
                        <!-- The font section is to be changed -->

                        <!-- Colors code section  -->
                        <div class="row pt-2 pt-sm-2 pt-md-2 pt-lg-2 pb-1 m-0 border-bottom flex-nowrap">
                            <div class="col-md-6 border-right pt-2 px-1 px-sm-2 px-md-2 px-lg-2 text-center">
                                <div class="robotoMedium pb-1 pb-sm-2 pb-md-2 pb-lg-2 f-16">Backing Colors.</div>
                                <div class="justify-content-center">
                                    <ul class="nav d-flex pb-1 pb-sm-2 pb-md-2 pb-lg-2 justify-content-between"
                                        id="backingColorOption">
                                        <li id="clearBackingColor btn-padding"
                                            class="nav-item backing-li rounded btns-backing-mob" role="presentation"
                                            data-class="backing-clear" onclick="backingClass(this)">
                                            <a
                                                class="nav-link-btns f-16-btn rounded robotoMedium px-1 px-sm-2 px-md-2 px-lg-3 py-1 py-sm-2 py-md-2 py-lg-2 common-btn1 bg-F34EFF ">Clear
                                                Acrylic</a>
                                        </li>
                                        <li id="whiteBackingColor btn-padding"
                                            class="nav-item backing-li rounded btns-backing-mob" role="presentation"
                                            data-class="backing-white" onclick="backingClass(this)">
                                            <a
                                                class="nav-link-btns f-16-btn rounded robotoMedium px-1 px-sm-2 px-md-2 px-lg-3 py-1 py-sm-2 py-md-2 py-lg-2 common-btn1">White</a>
                                        </li>
                                        <li id="blackBackingColor btn-padding"
                                            class="nav-item backing-li rounded btns-backing-mob" role="presentation"
                                            data-class="backing-black" onclick="backingClass(this)">
                                            <a
                                                class="nav-link-btns f-16-btn rounded robotoMedium px-1 px-sm-2 px-md-2 px-lg-3 py-1 py-sm-2 py-md-2 py-lg-2 common-btn1">Black</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 px-1 px-sm-2 px-md-2 px-lg-2 pt-2 text-center">
                                <div class="robotoMedium pb-1 pb-sm-2 pb-md-2 pb-lg-2 f-16">Backing Shapes</div>
                                <div class="justify-content-center">
                                    <ul class="nav d-flex pb-1 pb-sm-2 pb-md-2 pb-lg-2 justify-content-between"
                                        id="backingShapeOption">
                                        <li id="btn-padding" class="nav-item backing-shape-li btns-backing-mob"
                                            role="presentation " data-class="backing-clear"
                                            onclick="backingShapeClass(this)">
                                            <a
                                                class="nav-link-btns f-16-btn rounded robotoMedium px-1 px-1 px-sm-2 px-md-2 px-lg-3 py-1 py-sm-2 py-md-2 py-lg-2 common-btn2 bg-F34EFF">Text
                                                Shape</a>
                                        </li>
                                        <li id="btn-padding" class="nav-item backing-shape-li btns-backing-mob rounded"
                                            role="presentation" data-class="shape-rectangle"
                                            onclick="backingShapeClass(this)">
                                            <a
                                                class="nav-link-btns f-16-btn rounded robotoMedium px-1 px-sm-2 px-md-2 px-lg-3 py-1 py-sm-2 py-md-2 py-lg-2 common-btn2">Rectangle</a>
                                        </li>
                                        <li id="btn-padding" class="nav-item backing-shape-li btns-backing-mob rounded"
                                            role="presentation" data-class="shape-invisible"
                                            onclick="backingShapeClass(this)">
                                            <a
                                                class="nav-link-btns f-16-btn rounded robotoMedium px-1 px-sm-2 px-md-2 px-lg-3 py-1 py-sm-2 py-md-2 py-lg-2 common-btn2">Invisible</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Colors code section  -->

                        <div>
                            <div class="robotoMedium pt-1 pt-sm-2 pt-md-2 pt-lg-2 pb-1 f-18">Accessories</div>
                        </div>
                        <div class="p-1 p-sm-2 p-md-2 p-lg-2 box-shadow-font">
                            <div class="">
                                <div class="row pt-0 pt-sm-1 pt-md-2 pt-lg-2 px-1 px-sm-2 px-md-2 px-lg-2 clas-no-wrap">
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-6 text-center p-1">
                                        <div class="accessary-btn robotoMedium f-16-btn border rounded common-btn3 bg-F34EFF default d-flex justify-content-between px-4">
                                            Wall-Mounting-Kit <div> <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; $0.00 </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-6 text-center p-1">
                                        <div class="accessary-btn robotoMedium f-16-btn border rounded common-btn3 d-flex justify-content-between px-4"
                                            onclick="commonBtnFun3(this)">
                                            Hanging-Kit <div> <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; $10.00 </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-6 text-center p-1">
                                        <div class="accessary-btn robotoMedium f-16-btn border rounded common-btn3 d-flex justify-content-between px-4"
                                            onclick="commonBtnFun3(this)">
                                            Stand <div> <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; $10.00 </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-6 text-center p-1 d-none is_rush_order">
                                        <div class="accessary-btn robotoMedium f-16-btn border rounded common-btn3 rush-order text-center px-0"
                                            onclick="commonBtnFun3(this)">
                                            <div class="blink_text border-0  cursor-pointer px-0" id="blink_text-mob">
                                                <div class="blinker d-flex justify-content-between px-4">Rush-Order <div> <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; $50.00 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-6 text-center p-1">
                                        <div class="accessary-btn robotoMedium f-16-btn border rounded common-btn3 d-flex justify-content-between px-4"
                                            onclick="commonBtnFun3(this)">
                                            OUT-DOOR-USE <div> <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; $10.00 </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div>
                                    <button class="btn btn-success w-100 mb-2 d-flex justify-content-center align-items-center" onclick="createOrder();"><i
                                            class="fa fa-cart-plus d-block d-sm-block d-md-block d-lg-block" aria-hidden="true"></i>&nbsp; <span class="">Buy</span> &nbsp;<span class="d-none d-sm-block d-md-block d-lg-block">now</span> </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- footer Code Start -->
    <footer class="border-top mt-5 ">
        <div class="py-4 main-padding-nav bg-7E13AE text-white shadow ">
            <div class="row m-0 g-0 align-items-center textMobileCenter">
                <div class="col-md-3 pl-0">
                    <div><img src="{{asset('assets/img/nav-Icon_white.png')}}" alt="" width="200" class=" marginMobileAuto"></div>
                    <div class="f-18-footer w-75 marginMobileAuto w-Sm-100">EpicCraftings creates beautiful, handmade neon
                        signs, LED neon light
                        installations, lamps & wall art.</div>
                </div>
                <div class="col-md-3">
                    <div class="f-18-footer w-75 pt-3 pt-sm-3 pt-md-5 marginMobileAuto">
                        <div><a class="text-white" href="{{ url('/faq') }}">FAQ</a></div>
                        <div><a class="text-white" href="#">Privacy</a></div>
                        <div><a class="text-white" href="{{ url('/terms-condition') }}">Terms & Conditions</a></div>
                        <div><a class="text-white" href="{{ url('/return-policy') }}">Returns Policy</a></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="f-18-footer w-75 pt-3 pt-sm-3 pt-md-5 marginMobileAuto">
                        <div><a class="text-white" href="{{ url('/about') }}">About us</a></div>
                        <div><a class="text-white" href="{{ url('/contact-us') }}">Contact us</a></div>
                        <div><a class="text-white" href="{{ url('/shop') }}">Shop</a></div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="f-18-footer pt-3 pt-sm-3 pt-md-5 marginMobileAuto">
                        <div class="d-flex justify-content-between w-50 pb-3 marginMobileAuto">
                            <a href="https://www.facebook.com/EpicCraftings/">
                                <img src="{{asset('assets/img/facebook-icon.png')}}" alt="Facebook icon" class="w-75">
                            </a>
                            <a href="https://www.instagram.com/EpicCraftings/">
                                <img src="{{asset('assets/img/instagram-icon.png')}}" alt="Instagram icon" class="w-75">
                            </a>
                            <!-- <a href="#">
                                <img src="{{asset('assets/img/twitter-img.png')}}" alt="Twitter Icon" class="w-75">
                            </a> -->
                            <a href="https://api.whatsapp.com/send?phone={{Config::get('app.whatsapp')}}">
                                <img src="{{asset('assets/img/whatsapp-icon.png')}}" alt="Whatsapp icon" class="w-75">
                            </a>
                        </div>
                        <!-- <div class='SmDisplayNone'><a href="#">Contact Info</a></div> -->
                        <div><a class="text-white" href="#">5272 Lyngate Ct Burke, VA 22015-1688</a></div>
                        <div><a class="text-white" href="tel:{{Config::get('app.whatsapp')}}">{{Config::get('app.whatsapp')}}</a></div>
                        <div><a class="text-white" href="mailto:info@epiccraftings.com">info@epiccraftings.com</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-1 cl-7E13AE bg-light text-center">Copyright © 2019 - <script>document.write(new Date().getFullYear())</script> EpicCraftings. All Rights Reserved.</div>
    </footer>
    <!-- footer Code end -->
     <!-- Messenger Chat plugin Code -->
     <div id="fb-root"></div>

     <!-- Your Chat plugin code -->
     <div id="fb-customer-chat" class="fb-customerchat"></div>

    <script src="{{asset('assets/singlePageAsset/script/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/singlePageAsset/script/index.js') }}"></script>
    @include('includes.frontend.jsCommonCode')
    <!--<script src="{{asset('assets/singlePageAsset/script/bootstrap.bundle.js')}}"></script>-->
    <!--<script src="{{ asset('assets/singlePageAsset/script/noenlink.js') }}"></script>-->
    <!--<script src="{{asset('assets/sweetalert2/sweetalert2.min.js')}}"></script>-->
    <script>
        
        if(new Date() > new Date('2021-11-16')){$('.is_rush_order').removeClass('d-none');}
        $(document).ready(function() {
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/singlePageAsset/css/google_fonts.css') }}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{asset('assets/singlePageAsset/css/utility.css')}}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/singlePageAsset/css/index.css') }}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/singlePageAsset/css/media1900.css') }}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/singlePageAsset/css/loader.css') }}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/singlePageAsset/css/headerFooter.css') }}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/singlePageAsset/css/site-color.css') }}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{asset('assets/sweetalert2/sweetalert2.css')}}"});
            $.getScript("{{ asset('assets/singlePageAsset/script/html2canvas.js') }}");
            $.getScript("{{asset('assets/singlePageAsset/script/bootstrap.bundle.js')}}");
            $.getScript("{{ asset('assets/singlePageAsset/script/noenlink.js') }}");
            $.getScript("{{asset('assets/sweetalert2/sweetalert2.min.js')}}");
            $.getScript("{{ asset('assets/singlePageAsset/script/hotjar_script.js') }}");
            if(document.body.clientWidth<769){
                $('.fb-customerchat').hide();
                $('.fixed-facebook-parent').show();
            }else if(document.body.clientWidth>=769){
                $('.fixed-facebook-parent').hide();
                $.getScript("{{ asset('assets/singlePageAsset/script/facebook_script.js') }}");
            }

        });

    </script>
    <script>

        setInterval(() => {
            var total = 0;
            $('.subTotalPrice').each(function(){
                total +=$(this).data('subtotal');
            });
            $('.totalCost').html("Total: $"+total);
        }, 1000);

        function quantityUpdate(elem){
            let qty = $(elem).val();
            if(qty<=0){
                $(elem).val(1);
            }else{
                $.ajax({
                    url:"{{ route('updateCartQuantity') }}",
                    type:"get",
                    data:{id:$(elem).data('id'),price:$(elem).data('price'),qty:qty},
                    success:function(res){
                        if(!res.success){
                            $('.quantity'+res.data.id).val(res.quantity);
                            $('.price'+res.data.id).html('$'+res.quantity*res.data.price);
                            $('.price'+res.data.id).data('subtotal',res.quantity*res.data.price);
                            Swal.fire(
                                'Warning!',
                                res.message,
                                'warning'
                            );
                        }else{
                            $('.quantity'+res.data.id).val(res.data.qty);
                            $('.price'+res.data.id).html('$'+res.data.qty*res.data.price);
                            $('.price'+res.data.id).data('subtotal',res.data.qty*res.data.price);
                        }

                    }
                });
            }
        }
        const myDelete = (id, index) => {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('delete-item-from-cart') }}" + "/" + id,
                    type: "get",
                    success: function(data) {
                        if (data.success == true) {
                            Swal.fire(
                                'Success!',
                                data.message,
                                'success'
                            ).then((value) => {
                                window.location = '';
                            });
                        }
                    }
                });
            }
        });
    }
    @if(Session::has('cart') && !empty(Session::get('cart')))
        document.body.addEventListener('click', function(evt) {
            if (evt.target.id == "sameBlockSpan" || evt.target.id == "sameBlockDiv" || evt.target.class ==
                "quantityInput") {
                document.querySelector('.dropdown-menu').style.display = 'block';
                // console.log(evt);
            } else {
                // console.log(evt);
                document.querySelector('.dropdown-menu').style.display = 'none';
            }
        });

        $("#headerDropDown").click(function(e) {
            e.stopPropagation();
        });
        const myNone = (e) => {
            if (document.querySelector('.dropdown-menu').style.display = 'block') {
                document.querySelector('.dropdown-menu').style.display = 'none';
            } else {
                document.querySelector('.dropdown-menu').style.display = 'none';
            }
        }
    @endif
    </script>


    <script>
    const menuFunction = () => {
        if (menuBarId.style.marginLeft == '-50rem') {
            menuBarId.style.marginLeft = '0rem'
            menuIcon.classList.remove("fa-bars")
            menuIcon.classList.add("fa-close")
        } else {
            menuBarId.style.marginLeft = '-50rem'
            menuIcon.classList.remove("fa-close")
            menuIcon.classList.add("fa-bars")
        }
    }
    </script>

</body>

</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
    <meta name="facebook-domain-verification" content="1obbsfe0fm6didgm7cmonoie89uxc0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <!--<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <!--<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}"/>-->
    <!--<link rel="stylesheet" href="{{asset('assets/css/utility.css')}}">-->
    <!--<link rel="stylesheet" href="{{asset('assets/css/index.css')}}">-->
    <!--<link rel="stylesheet" href="{{asset('assets/css/shop.css')}}">-->
    <!--<link rel="stylesheet" href="{{asset('assets/css/checkout.css')}}">-->
    <!--<link rel="stylesheet" href="{{asset('assets/css/mediaquery.css')}}">-->
    <title>@yield('title')</title>
    <link href="{{asset('assets/sweetalert2/sweetalert2.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @yield('style')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VBBVS81L87"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-VBBVS81L87');
    </script>

    <!-- Pinterest Tag -->
    <script>
        !function(e){if(!window.pintrk){window.pintrk = function () {
        window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var
          n=window.pintrk;n.queue=[],n.version="3.0";var
          t=document.createElement("script");t.async=!0,t.src=e;var
          r=document.getElementsByTagName("script")[0];
          r.parentNode.insertBefore(t,r)}}("https://s.pinimg.com/ct/core.js");
        pintrk('load', '2612729900135', {em: '<user_email_address>'});
        pintrk('page');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none;" alt="" src="https://ct.pinterest.com/v3/?event=init&tid=2612729900135&pd[em]=<hashed_email_address>&noscript=1" />
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
        pintrk('track', 'signup');
    </script>


    <script>
        pintrk('track', 'watchvideo', {
        video_title: 'How to style your Parker Boots'
        });
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

    <script>
        pintrk('track', 'viewcategory');
    </script>

    <script>
        pintrk('track', 'custom');
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
        fbq('track', 'AddPaymentInfo');
        fbq('track', 'AddToCart');
        fbq('track', 'ViewContent');
        fbq('track', 'Purchase', {value: 0.00, currency: 'USD'});
    </script>

    <script>
        pintrk('track', 'user_defined_event_name');
    </script>
    <style>
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
</head>

<body>
    <input type="hidden" value="{{ csrf_token() }}" id="laravelToken">
    <div class="all-loader d-none"><img src="{{asset('assets/img/loader.gif')}}"></div>
    <div id="app">
        <div class="fixed-whatsapp-parent" style="position: fixed;left: 25px;bottom: 25px;z-index: 1000;width: 60px;background: #32bb46;border-radius: 50%;height: 60px;">
            <a href="https://api.whatsapp.com/send?phone=16197691968" class="d-flex justify-content-center align-items-center">
                <i class="fa fa-whatsapp text-white" style="font-size: 45px;margin-top: 7px;"></i>
                <!--<img src="http://localhost/laravelprojects/oneoncraftlarave/assets/img/whatsapp-icon.png" alt="Whatsapp icon" style="margin-left: 9px;margin-top: 7px;width: 70%!important;">-->
            </a>
        </div>

        <div class="fixed-facebook-parent" style="position: fixed;right: 25px;bottom: 25px;z-index: 1000;width: 60px;background: #006AFF;border-radius: 50%;height: 60px;">
            <a href="http://m.me/oNeonCrafts" class="d-flex justify-content-center align-items-center">
                <svg style="margin-top: 10px;margin-left: 10px;" x="10" y="10"><g transform="translate(0.000000, -10.000000)" fill="#FFFFFF"><g id="logo" transform="translate(0.000000, 10.000000)"><path d="M20,0 C31.2666,0 40,8.2528 40,19.4 C40,30.5472 31.2666,38.8 20,38.8 C17.9763,38.8 16.0348,38.5327 14.2106,38.0311 C13.856,37.9335 13.4789,37.9612 13.1424,38.1098 L9.1727,39.8621 C8.1343,40.3205 6.9621,39.5819 6.9273,38.4474 L6.8184,34.8894 C6.805,34.4513 6.6078,34.0414 6.2811,33.7492 C2.3896,30.2691 0,25.2307 0,19.4 C0,8.2528 8.7334,0 20,0 Z M7.99009,25.07344 C7.42629,25.96794 8.52579,26.97594 9.36809,26.33674 L15.67879,21.54734 C16.10569,21.22334 16.69559,21.22164 17.12429,21.54314 L21.79709,25.04774 C23.19919,26.09944 25.20039,25.73014 26.13499,24.24744 L32.00999,14.92654 C32.57369,14.03204 31.47419,13.02404 30.63189,13.66324 L24.32119,18.45264 C23.89429,18.77664 23.30439,18.77834 22.87569,18.45674 L18.20299,14.95224 C16.80079,13.90064 14.79959,14.26984 13.86509,15.75264 L7.99009,25.07344 Z"></path></g></g></svg>
            </a>
        </div>

        @include('includes.frontend.navbar')
        <main class="">
            @yield('content')
        </main>

        @include('includes.frontend.footer')

        <!-- Messenger Chat plugin Code -->
        <div id="fb-root"></div>

        <!-- Your Chat plugin code -->
        <div id="fb-customer-chat" class="fb-customerchat"></div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{asset('assets/plugins/bootstrap/script/jquery.min.js')}}"></script>
    <!--<script src="{{asset('assets/plugins/bootstrap/script/bootstrap.min.js')}}"></script>-->
    <!--<script src="{{asset('assets/sweetalert2/sweetalert2.min.js')}}"></script>-->
    <script src="{{ asset('assets/singlePageAsset/script/aos.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>

    @include('includes.frontend.jsCommonCode')

    <script>
        
        $(document).ready(function () {

            if ($(".bbb_viewed_slider").length) {
            var viewedSlider = $(".bbb_viewed_slider");
        
            viewedSlider.owlCarousel({
                loop: true,
                margin: 0,
                autoplay: true,
                autoplayTimeout: 6000,
                nav: false,
                dots: false,
                responsive: {
                0: { items: 2 },
                575: { items: 2 },
                768: { items: 3 },
                991: { items: 4 },
                1199: { items: 6 },
                },
            });
        
            if ($(".bbb_viewed_prev").length) {
                var prev = $(".bbb_viewed_prev");
                prev.on("click", function () {
                viewedSlider.trigger("prev.owl.carousel");
                });
            }
        
            if ($(".bbb_viewed_next").length) {
                var next = $(".bbb_viewed_next");
                next.on("click", function () {
                viewedSlider.trigger("next.owl.carousel");
                });
            }
            }
        });
        $(document).ready(function () {
        if ($(".bbb_viewed_slider1").length) {
        var viewedSlider = $(".bbb_viewed_slider1");
    
        viewedSlider.owlCarousel({
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 6000,
            nav: false,
            dots: false,
            responsive: {
            0: { items: 2 },
            575: { items: 2 },
            768: { items: 3 },
            991: { items: 4 },
            1199: { items: 4 },
            },
        });
    
        if ($(".bbb_viewed_prev1").length) {
            var prev = $(".bbb_viewed_prev1");
            prev.on("click", function () {
            viewedSlider.trigger("prev.owl.carousel");
            });
        }
    
        if ($(".bbb_viewed_next1").length) {
            var next = $(".bbb_viewed_next1");
            next.on("click", function () {
            viewedSlider.trigger("next.owl.carousel");
            });
        }
        }
    });
        $(document).ready(function () {
            if ($(".bbb_viewed_slider_for_item_one").length) {
                var viewedSlider = $(".bbb_viewed_slider_for_item_one");
                viewedSlider.owlCarousel({
                    loop: true,
                    margin: 25,
                    autoplay: true,
                    autoplayTimeout: 6000,
                    nav: false,
                    dots: false,
                    responsive: {
                    0: { items: 1 },
                    575: { items: 1 },
                    768: { items: 1 },
                    991: { items: 1 },
                    1199: { items: 1 },
                    },
                });
        
                if ($(".bbb_viewed_prev2").length) {
                    var prev = $(".bbb_viewed_prev2");
                    prev.on("click", function () {
                    viewedSlider.trigger("prev.owl.carousel");
                    });
                }
        
                if ($(".bbb_viewed_next2").length) {
                    var next = $(".bbb_viewed_next2");
                    next.on("click", function () {
                    viewedSlider.trigger("next.owl.carousel");
                    });
                }
            }

            if ($(".bbb_viewed_slider_for_item_two").length) {
                var viewedSlider = $(".bbb_viewed_slider_for_item_two");
                viewedSlider.owlCarousel({
                    loop: true,
                    margin: 25,
                    autoplay: true,
                    autoplayTimeout: 6000,
                    nav: false,
                    dots: false,
                    responsive: {
                    0: { items: 1 },
                    575: { items: 1 },
                    768: { items: 2 },
                    991: { items: 2 },
                    1199: { items: 2 },
                    },
                });
        
                if ($(".bbb_viewed_prev2").length) {
                    var prev = $(".bbb_viewed_prev2");
                    prev.on("click", function () {
                    viewedSlider.trigger("prev.owl.carousel");
                    });
                }
        
                if ($(".bbb_viewed_next2").length) {
                    var next = $(".bbb_viewed_next2");
                    next.on("click", function () {
                    viewedSlider.trigger("next.owl.carousel");
                    });
                }
            }

            if ($(".bbb_viewed_slider_for_item_three_more").length) {
                var viewedSlider = $(".bbb_viewed_slider_for_item_three_more");
                viewedSlider.owlCarousel({
                    loop: true,
                    margin: 25,
                    autoplay: true,
                    autoplayTimeout: 6000,
                    nav: false,
                    dots: false,
                    responsive: {
                    0: { items: 1 },
                    575: { items: 1 },
                    768: { items: 3 },
                    991: { items: 4 },
                    1199: { items: 3 },
                    },
                });
        
                if ($(".bbb_viewed_prev2").length) {
                    var prev = $(".bbb_viewed_prev2");
                    prev.on("click", function () {
                    viewedSlider.trigger("prev.owl.carousel");
                    });
                }
        
                if ($(".bbb_viewed_next2").length) {
                    var next = $(".bbb_viewed_next2");
                    next.on("click", function () {
                    viewedSlider.trigger("next.owl.carousel");
                    });
                }
            }
        });
    
    </script>
    <script>
        AOS.init();
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

    <script>
        $(document).ready(function() {

            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{asset('assets/css/utility.css')}}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{asset('assets/css/index.css')}}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{asset('assets/css/carousel.css')}}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{asset('assets/css/shop.css')}}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{asset('assets/css/checkout.css')}}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{asset('assets/css/mediaquery.css')}}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/css/animate.min.css') }}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{asset('assets/sweetalert2/sweetalert2.css')}}"});

            $.getScript("{{asset('assets/plugins/bootstrap/script/bootstrap.min.js')}}");
            $.getScript("{{asset('assets/sweetalert2/sweetalert2.min.js')}}");
            $.getScript("{{asset('assets/js/custom.js')}}");
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

        function addToCart(id){
            $('.all-loader').removeClass('d-none');
            let quantity = $('#shop_quantity').val();
            $.ajax({
                url: "{{ route('addToCart') }}",
                type: "get",
                data:{id:id,quantity:1},
                success: function (data) {
                    $('.all-loader').addClass('d-none');
                    if (data.success == true) {
                        Swal.fire(
                            'Success!',
                            data.message,
                            'success'
                        ).then((value) => {
                           window.location='{{route("checkout")}}';
                        });
                    } else {
                        Swal.fire(
                            'Warning!',
                            data.message,
                            'warning'
                        ).then((value) => {
                           window.location='';
                        });
                    }
                },
            });
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
                    $('.all-loader').removeClass('d-none');
                    $.ajax({
                        url: "{{ url('delete-item-from-cart') }}"+"/"+id,
                        type: "get",
                        success: function (data) {
                            $('.all-loader').addClass('d-none');
                            if (data.success == true) {
                                Swal.fire(
                                    'Success!',
                                    data.message,
                                    'success'
                                ).then((value) => {
                                window.location='';
                                });
                            }
                        }
                    });
                }
            });
        }

        setInterval(() => {
            var total = 0.00;
            var discount = 0;
            $('.subTotalPrice').each(function(){
                if($(this).data('flag')){
                    total +=$(this).data('subtotal');
                }
            });
            $('.subTotalCost').html("$ "+parseFloat(total).toFixed(2));
            if($('#coupon_applied').val()){
                // $('.discountDiv').removeClass('d-none');
                if($('#coupon_applied_value').val()=='Fixed'){
                    discount =  $('#coupon_applied_value').val();
                }else{
                    discount = (total*$('#coupon_applied_value').val())/100;
                }
                $('#discount_amount').val(discount);
                total = total - discount;
                // $('.discountValue').html('$'+discount);

            }
            let quantities = 0;
            let rushOrderCharges = 0;
            $('.quantities').each(function(){
                quantities +=parseInt($(this).val());
            });
            
            if($("#rushOrderCheck").val()=='true' || $("#rushOrderCheck").val()=='1'){
                rushOrderCharges = quantities*50; 
            }

            $('#shippingCostInput').val(rushOrderCharges);
            $('.shippingCostDiv').html("$ "+rushOrderCharges);
            
            $('.discountValue').html('$ '+discount);
            $('input[name=sub_total]').val(total);
            total = (parseFloat(total) + rushOrderCharges).toFixed(2);
            $('input[name=total]').val(total);
            $('.totalCost').html("$ "+total);
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
                            $('.price'+res.data.id).html('$ '+(res.quantity*res.data.price).toFixed(2));
                            $('.price'+res.data.id).data('subtotal',(res.quantity*res.data.price).toFixed(2));
                            Swal.fire(
                                'Warning!',
                                res.message,
                                'warning'
                            );
                        }else{
                            $('.quantity'+res.data.id).val(res.data.qty);
                            $('.price'+res.data.id).html('$ '+(res.data.qty*res.data.price).toFixed(2));
                            $('.price'+res.data.id).data('subtotal',(res.data.qty*res.data.price).toFixed(2));
                        }

                    }
                });
            }
        }

        @if(Session::has('cart') && !empty(Session::get('cart')))
            document.body.addEventListener('click', function(evt) {
                if (evt.target.id == "sameBlockSpan" || evt.target.id == "sameBlockDiv" || evt.target.class ==
                    "quantityInput") {
                    document.querySelector('.dropdown-menu').style.display = 'block';
                    console.log(evt);
                } else {
                    console.log(evt);
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
    @yield('script')

</body>

</html>

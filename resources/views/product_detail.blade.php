@extends('layouts.app')
@section('title','Product Detail')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.3/jquery.fancybox.css">
@section('content')

<style>
.nav-pills .nav-link.active,
.nav-pills .show>.nav-link {
    color: #7e13ae;
    background-color: transparent;
}

.productDetailsPlaceorder:focus {
    box-shadow: transparent !important;

}

.productDetailsPlaceorder {
    border: 1px solid #7E13AE;
}

.productDetailsPlaceorder:hover {
    border: 1px solid #7E13AE;
    background-color: #fff !important;
    color: #7E13AE !important;
}

.img1,
.iframe1,
.video1 {
    max-width: 100%;
    width: 100%;
    vertical-align: middle;
    border: 0;
    display: block;
    margin: 0 auto;
}

.one-product {
    /* max-width: 500px; */
    width: 100%;
}

.one-product__slider {
    max-width: 82%;
    flex: 0 0 82%
        /* padding: 1rem; */
        display: inline-block;
    padding-top: 0%;
}

.one-product__slider_navigation {
    max-width: 18%;
    flex: 0 0 18%;
    display: inline-block;
    vertical-align: top;
    padding-top: 7%;
}

.one-product__slider_navigation .item {
    padding: 0.8rem;
    margin: 2%;
    width: 85px !important;
    height: 85px;
}

.button-prev-slider {
    position: absolute;
    left: 28%;
    top: 0;
    cursor: pointer;
}

.itemNav {
    cursor: pointer;
}

.button-next-slider {
    position: absolute;
    left: 28%;
    cursor: pointer;
}

.one-product__slider_navigation .item img {
    max-width: 70px;
    max-height: 58px;
    object-fit: cover;
    object-position: center;
}

.one-product__slider_navigation .cont-btn {
    width: 0;
    height: 0;
    display: block;
}

.zoomContainer {
    z-index: 9000;
}

.itemNav.slick-current.slick-active {
    border: 2px solid red;
}

@media screen and (max-width: 500px) {
    .one-product__slider {
        width: 100%;
    }

    .one-product__slider_navigation {
        width: 100%;
    }
}

@media screen and (max-width: 768px) {
    .details___ {
        flex-direction: column-reverse;
    }

    .one-product__slider_navigation {
        max-width: 100%;
        flex: 0 0 100%;
    }

    .one-product__slider {
        max-width: 100%;
        flex: 0 0 100% display: inline-block;
        padding-top: 0%;
    }

    .button-prev-slider {
        position: absolute;
        left: -7%;
        top: 26%;
        cursor: pointer;
    }

    .button-prev-slider svg {
        transform: rotate(-86deg);
    }

    .button-next-slider svg {
        transform: rotate(-86deg);
    }

    .button-next-slider {
        position: absolute;
        right: 7%;
        cursor: pointer;
        left: auto !important;
        top: 26%;
    }
}
</style>
<section class="main-padding mt-5 detailsSection">
    <div class="row mx-0 mb-4 pt-5">
        <div class="col-lg-6 col-md-6 col-sm-12">
            @if($product->images->count() > 0)
            <div class="one-product d-flex details___ justify-content-between">
                <div class="one-product__slider_navigation">

                    @foreach($product->images as $image)

                    <div class="item itemNav">
                        <img class="img1" src="{{$image->image_url}}" alt="" />
                    </div>

                    @endforeach

                </div>

                <div class="one-product__slider">

                    @foreach($product->images as $image)

                    <div class="item">
                        <a class="fancybox" rel="group" href="{{$image->image_url}}">
                            <img class="img1 zoom" src="{{$image->image_url}}" alt=""
                                data-zoom-image="{{$image->image_url}}" />
                        </a>
                    </div>

                    @endforeach

                </div>

            </div>
            @endif
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 ps-0 ps-lg-5 ps-md-0 ps-sm-0">
            <div class="pt-3 h3">{{ucwords($product->title)}}</div>
            <h5 class="m-0 pt-3 h4">${{$product->min_price}}</h5>
            <p class="m-0 pt-3 f-17">{{$product->summery}}</p>
            @if($product->size !==null)
            <div class="f-17 pt-3">Size: {{$product->size}}</div>
            @endif
            <form class="d-flex align-items-center pt-3">
                <input type="hidden" id="shop_quantity" value="1" />
                <div class="value-button " id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                <input type="number" class="" id="number" onchange="changeQuantity(this);" value="1" />
                <div class="value-button " id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                <div class=""><button type="button" name="add-to-cart" value="80"
                        class="single_add_to_cart_button button alt px-4 py-1 text-white"
                        onclick="addToCart({{$product->id}})">Buy Now</button></div>
            </form>
            <ul class="nav nav-pills mb-3 pt-3" id="pills-tab" role="tablist">
                @if($product->description!==null)
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bolder active    " id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Description</button>
                </li>
                @endif

                @if($product->how_to_order!==null)
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bolder" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">How To Order</button>
                </li>
                @endif

                @if($product->features!==null)
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bolder" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Features</button>
                </li>
                @endif

                @if($product->packaging!==null)
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bolder" id="pills-contact-tab1" data-bs-toggle="pill"
                        data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Packaging</button>
                </li>
                @endif

                @if($product->shipping_process!==null)
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bolder" id="pills-contact-tab2" data-bs-toggle="pill"
                        data-bs-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Shipping</button>
                </li>
                @endif

                @if($product->additional_information!==null)
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bolder" id="pills-contact-tab3" data-bs-toggle="pill"
                        data-bs-target="#pills-contact3" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Additional Information</button>
                </li>
                @endif

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <section>
                        {!! $product->description !!}
                    </section>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <section>
                        {!! $product->how_to_order !!}
                    </section>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <section>
                        {!! $product->features !!}
                    </section>
                </div>
                <div class="tab-pane fade" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact-tab1">
                    <section>
                        {!! $product->packaging !!}
                    </section>
                </div>
                <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab2">
                    <section>
                        {!! $product->shipping_process !!}
                    </section>
                </div>
                <div class="tab-pane fade" id="pills-contact3" role="tabpanel" aria-labelledby="pills-contact-tab3">
                    <section>
                        {!! $product->additional_information !!}
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div>
        <h3 class="cl-7E13AE py-1">Custom Neon Signs for Home
        </h3>
        <p class="cl-44444 text-justify">Light up your rooms with our custom neon lights for rooms. Our neon wall signs
            for homes are perfect for bedrooms, kid’s rooms, lounge areas, home bars and virtually any other area at
            your home. Add that stand-out touch to your bedroom or give your kids their own personalized neon signs for
            their rooms. Our neon LED signs are perfectly safe, eco-friendly, and easy to install. You can also use our
            custom mockup tool to craft custom neon signs for home bars.</p>
    </div>
    <div>
        <h3 class="cl-7E13AE py-1">Custom Neon LED Lights for Kids Rooms
        </h3>
        <p class="cl-44444 text-justify">Looking for some really cool kids room décor ideas? We have got the perfect
            answer. Our custom neon signs for kids rooms also double as kids room lighting. You can choose Olivia, Ava,
            Noah, Charlotte, John or any other name to personalized children’s room signs. Or you can go with a fun text
            like ‘Play All Day’, ‘Game Room’, ‘Twilight’ or ‘Life is Fun.’ You also get to decide the color, shape,
            font, size and other details. Use our mockup tool for a quick view.</p>
    </div>
    <div>
        <h3 class="cl-7E13AE py-1">Custom Neon LED Business Signs
        </h3>
        <p class="cl-44444 text-justify">Stand out from the competition and be the talk of the town. Our custom neon
            business signs are a perfect way to draw customers, add a unique décor element to your commercial
            establishment, or simply show off your logo or tagline. Use our free mockup tool to create your very own
            neon business logo or choose from our inspiring range of designs. Our neon LED signs are 100% customizable
            so that they are suitable for all business locations and spaces.</p>
    </div>
    <div>
        <h3 class="cl-7E13AE py-1">Custom Neon Bar Signs
        </h3>
        <p class="cl-44444 text-justify">Use our custom neon bar signs add some zing and pop and dash of illuminated
            color to your bar area. Let your customers know you are here and serving their best cocktails non-stop. Our
            handcrafted custom neon bar lights can truly ramp up the ambience at your bar. Our custom neon bar and grill
            signs are also sure to be a social media sensation, triggering loved snaps and posts from your customers. We
            offer custom neon bar signs for the United States, United Kingdom, Canada, and Australia.</p>
    </div>
</section>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script>
// incre

function changeQuantity(elem) {
    var value = parseInt(elem.value, 10);
    if (value <= 0) {
        value = 1;
    }
    document.getElementById('number').value = value;
    document.getElementById('shop_quantity').value = value;
}

function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    if (value <= 0) {
        value = 1;
    }
    document.getElementById('number').value = value;
    document.getElementById('shop_quantity').value = value;
}

function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    if (value <= 0) {
        value = 1;
    }
    document.getElementById('number').value = value;
    document.getElementById('shop_quantity').value = value;
}
// dcre



$('.one-product__slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.one-product__slider_navigation',
    arrows: false,
    dots: false,
    infinite: true,
    focusOnSelect: true,
    fade: true,
    cssEase: 'linear'
});
// Slider | one-product-slider
$('.one-product__slider_navigation').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    infinite: true,
    asNavFor: '.one-product__slider',
    focusOnSelect: true,
    centerMode: false,
    vertical: true,
    prevArrow: '<span class="cont-btn button-prev-slider"><svg style="fill: #fff;width: 30px;height: 30px;" aria-hidden="true" focusable="false" role="presentation" class="icon icon-arrow-up" viewBox="0 0 32 32"><path fill="#444" d="M26.984 23.5l1.516-1.617L16 8.5 3.5 21.883 5.008 23.5 16 11.742z"></path></svg></span>',
    nextArrow: '<span class="cont-btn button-next-slider"><svg style="fill: #fff;width: 30px;height: 30px; aria-hidden="true" focusable="false" role="presentation" class="icon icon-arrow-down" viewBox="0 0 32 32"><path fill="#444" d="M26.984 8.5l1.516 1.617L16 23.5 3.5 10.117 5.008 8.5 16 20.258z"></path></svg></span>',
    responsive: [{
        breakpoint: 500,
        settings: {
            arrows: false,
            vertical: false,
        }
    }]
});
const cuponFun = (e) => {
    if (e.checked === true) {
        couponDiv.style.display = 'block'
    } else {
        couponDiv.style.display = 'none'
    }
}
// Slider | Product	
$('.one-product__slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.one-product__slider_navigation',
    arrows: false,
    infinite: false,
    focusOnSelect: true,
    fade: true,
    cssEase: 'linear'
});
// Slider | one-product-slider
$('.one-product__slider_navigation').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    infinite: false,
    asNavFor: '.one-product__slider',
    focusOnSelect: true,
    centerMode: false,
    vertical: true,
    prevArrow: '<span class="cont-btn button-prev-slider"><svg style="fill: #000;width: 30px;height: 30px;" aria-hidden="true" focusable="false" role="presentation" class="icon icon-arrow-up" viewBox="0 0 32 32"><path fill="#444" d="M26.984 23.5l1.516-1.617L16 8.5 3.5 21.883 5.008 23.5 16 11.742z"></path></svg></span>',
    nextArrow: '<span class="cont-btn button-next-slider"><svg style="fill: #000;width: 30px;height: 30px; aria-hidden="true" focusable="false" role="presentation" class="icon icon-arrow-down" viewBox="0 0 32 32"><path fill="#444" d="M26.984 8.5l1.516 1.617L16 23.5 3.5 10.117 5.008 8.5 16 20.258z"></path></svg></span>',
    responsive: [{
        breakpoint: 500,
        settings: {
            arrows: true,
            vertical: true,
            
        }
    }]
});
</script>

@endsection
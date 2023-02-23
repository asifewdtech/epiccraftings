@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
@section('title','Home')
<style>
   .imgOpc:hover {
   opacity: 0.8 !important;
   transition: 0.5s;
   }
   .bannar-image1 {
    background-image: url('');
}
  /* Css for iphone devices */
   @supports (-webkit-touch-callout: none) {
        #videoIphone{
            height: 250px !important;
        }
    }
    /* Css for iphone devices */
</style>
@section('content')
<section>

   <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item ">
            <img src="{{asset('assets/img/Slider/1.png')}}" class="d-block w-100 carouselHeight" alt="...">
            <div class="carousel-caption"></div>
         </div>
         <div class="carousel-item">
            <img src="{{asset('assets/img/Slider/2.png')}}" class="d-block w-100 carouselHeight" alt="...">
            <div class="carousel-caption"></div>
         </div>
         <div class="carousel-item">
            <img src="{{asset('assets/img/Slider/3.png')}}" class="d-block w-100 carouselHeight" alt="...">
            <div class="carousel-caption"></div>
         </div>
         <div class="carousel-item active">
            <img src="{{asset('assets/img/Slider/4.png')}}" class="d-block w-100 carouselHeight" alt="...">
            <div class="carousel-caption"></div>
         </div>
      </div>
                <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" style="right:0px" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
     <div style="    position: absolute;
     top: 0;
     /* justify-content: center; */
     width: 100%;" class="pt-1 pt-sm-2 pt-md-4 pt-lg-4 row m-0 h-100 align-items-center justify-content-center animate__animated animate__zoomInLeft">
            <div class="col-10 col-sm-7 col-md-7 col-lg-7">
               <div class="bannarHeading1 bannerHeadings__Shadow f-60 font-w-600 mainbannerBlock py-5 px-4 text-white text-center bannerHeadings">
                  100% Custom, 100% Handmade
                  Light Up Your Life With Our Neon Signs
               </div>
               <div class="d-flex justify-content-center pt-1 pt-sm-2 pt-md-3 pt-lg-3 indexMainButtonDiv">
                  <div class="d-inline">
                     <a href="{{ url('/design') }}">
                     <button class="btn buutonFontSize bg-7E13AE text-white f-22 font-w-600 w-100 px-lg-5 px-md-5 px-sm-3 px-3"
                        type="submit">Create Your Own Neon Sign</button>
                     </a>
                  </div>
                  <div class="d-inline ps-3">
                     <a href="{{ url('/shop') }}">
                     <button class="btn bg-7E13AE buutonFontSize text-white f-22 font-w-600 w-100 px-lg-5 px-md-5 px-sm-3 px-2"
                        type="submit">Shop From Our Artwork</button>
                     </a>
                  </div>
               </div>
            </div>
         </div>
   </div>

   <div>
      {{-- <div class="videoOverlay">
         <div class="pt-1 pt-sm-2 pt-md-4 pt-lg-4 row m-0 h-100 align-items-center justify-content-center animate__animated animate__zoomInLeft">
            <div class="col-10 col-sm-7 col-md-7 col-lg-7">
               <div class="bannarHeading1 bannerHeadings__Shadow f-60 font-w-600 mainbannerBlock py-5 px-4 text-white text-center bannerHeadings">
                  100% Custom, 100% Handmade
                  Light Up Your Life With Our Neon Signs
               </div>
               <div class="d-flex justify-content-center pt-1 pt-sm-2 pt-md-3 pt-lg-3 indexMainButtonDiv">
                  <div class="d-inline">
                     <a href="{{ url('/design') }}">
                     <button class="btn buutonFontSize bg-7E13AE text-white f-22 font-w-600 w-100 px-lg-5 px-md-5 px-sm-3 px-3"
                        type="submit">Create Your Own Neon Sign</button>
                     </a>
                  </div>
                  <div class="d-inline ps-3">
                     <a href="{{ url('/shop') }}">
                     <button class="btn bg-7E13AE buutonFontSize text-white f-22 font-w-600 w-100 px-lg-5 px-md-5 px-sm-3 px-2"
                        type="submit">Shop From Our Artwork</button>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div> --}}
   </div>
   <div class="marginBanner" >
      <div class="bannar-image1 d-flex" style="background-image:url('{{asset('assets/img/bannar-1-sub.png')}}')">
         <div class="bannarHeading f-60 bannerHeadings__Shadow font-w-600 p-5 text-white bannerHeadings w-75 m-auto text-center mainbannerBlock">
            <!--{{Config::get('app.name')}} Is Pakistan Leading Manufacturer of Custom LED Neon Signs.-->
            <!-- <div class="video-belowInnerPara">Add fun and glamor to your life with our custom neon signs. Whether you are looking for wedding neon signs, stand-out home décor, or a flashy business logo to light up your office space, we have got you covered. Our 100% custom, hand-made LED neon signs are sure to stand out at any place, every time.</div> -->
         </div>
      </div>
   </div>
</section>
<section class="main-padding  mt-5 mb-3">
   <div class="bbb_viewed">
      <div>
         <div class="row m-0">
            <div class="col p-0">
               <div class="bbb_main_container">
                  <div class="bbb_viewed_slider_container">
                     <div class="owl-carousel owl-theme bbb_viewed_slider1">
                         <img src="{{asset('assets/img/topSlider-330X330/27.png')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/topSlider-330X330/28.png')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/topSlider-330X330/29.png')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/topSlider-330X330/30.png')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/topSlider-330X330/31.png')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/topSlider-330X330/32.png')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/topSlider-330X330/33.png')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/topSlider-330X330/34.png')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/topSlider-330X330/35.png')}}" alt="" class="w-100 imgOpc">
                     </div>
                     <!-- <div class="owl-carousel owl-theme bbb_viewed_slider1">
                        <img src="{{asset('assets/img/neon_collage/1.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/2.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/3.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/5.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/6.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/7.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/8.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/9.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/10.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/11.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/12.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/13.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/14.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/15.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/16.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/17.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/18.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/19.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/20.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/21.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/22.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/23.jpg')}}" alt="" class="w-100 imgOpc">
                        <img src="{{asset('assets/img/neon_collage/24.jpg')}}" alt="" class="w-100 imgOpc">
                     </div> -->
                  </div>
                  <div class="bbb_viewed_nav_container">
                     <div class="bbb_viewed_nav bbb_viewed_prev1 leftOWlTcon"><i class="fa fa-chevron-left f-15" aria-hidden="true"></i></div>
                     <div class="bbb_viewed_nav bbb_viewed_next1 rightOWlTcon"><i class="fa fa-chevron-right f-15" aria-hidden="true"></i></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="main-padding py-2">
   <div class="f-60 font-w-600 bannerHeadings cl-7E13AE text-center midTitle my-4">Product Feature </div>
   <div class="row m-0">
      <div class="col-lg-3 col-md-3 col-sm-12 text-center">
         <img src="{{asset('assets/img/product-features/Customizeicon.png')}}" width="110" class="m-auto" alt="">
         <h5 class="cl-7E13AE text-center m-0 py-2 ">Fully Customized</h5>
         <p class="text-center m-0">Customize font, color, size, text and more</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 text-center">
         <img src="{{asset('assets/img/product-features/Handmadeicon.png')}}" width="110" class="m-auto" alt="">
         <h5 class="cl-7E13AE text-center m-0 py-2 ">100% Handmade</h5>
         <p class="text-center m-0">Each sign is crafted by hand with love</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 text-center">
         <img src="{{asset('assets/img/product-features/DIYicon.png')}}" width="110" class="m-auto" alt="">
         <h5 class="cl-7E13AE text-center m-0 py-2 ">DIY Installation</h5>
         <p class="text-center m-0">Complete kit for do-it-yourself installation</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 text-center">
         <img src="{{asset('assets/img/product-features/CleannGreenicon.png')}}" width="110" class="m-auto" alt="">
         <h5 class="cl-7E13AE text-center m-0 py-2 ">Clean, Green & Durable</h5>
         <p class="text-center m-0">Lifespan of 48,000+ with low-energy operation </p>
      </div>
   </div>
   </div>
</section>
    <section class="main-padding">
    @if($homeDocer->count()>0 || $event->count()>0 || $bar->count()>0 || $wedding->count()>0)
    <div class="f-60 font-w-600 bannerHeadings cl-7E13AE text-center midTitle my-4">Shop By Categories</div>
    @endif
    <ul class="nav nav-pills nav-pills2 mb-3 justify-content-center mb-0 my-4" id="pills-tab" role="tablist">
        @if($homeDocer->count()>0 )
        <li class="nav-item" role="presentation"><button class="nav-link me-3 active indexnavlinks" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home Decor</button></li>
        @endif
        {{-- @if($bar->count()>0)
            <li class="nav-item" role="presentation"><button class="nav-link me-3 indexnavlinks " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Bar Signs</button></li>
        @endif
        @if($event->count()>0)
            <li class="nav-item" role="presentation"><button class="nav-link me-3 indexnavlinks"  id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Event Signs</button></li>
        @endif --}}
        @if($wedding->count()>0)
        <li class="nav-item" role="presentation"><button class="nav-link me-3 indexnavlinks"  id="pills-contact-tab1" data-bs-toggle="pill" data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="pills-contact1" aria-selected="false">Weddings</button></li>
        @endif
    </ul>
    <div class="tab-content" id="pills-tabContent">
        @if($homeDocer->count() > 0)
        <div class="tab-pane fade show active animate__animated animate__fadeIn py-4" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row m-0">
                @foreach($homeDocer as $product)
                <div class="col-lg-3 col-md-3 col-sm-12 text-center mb-lg-4  mb-4 mb-sm-4 ">
                <div class="position-relative mainCat_div shadow">
                    <div class="video-overlay invisible imgOverlay" ></div>
                    <img src="{{$product->image}}"  class="w-100 imgTabs" alt="">
                    <div class="showBtn_div"><a type="button" class="btn btn-primary btnOvlay px-4" onclick="addToCart({{$product->id}})">Buy Now</a></div>
                    <div class="p-3">
                        <div class="cl-7E13AE fw-600 pt-1">{{$product->title}}</div>
                        <div class="price fw-600 pt-1">Rs {{number_format($product->min_price*170*0.12)}}</div>
                    </div>
                </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        {{-- @if($bar->count() > 0)
            <div class="tab-pane @if($homeDocer->count()==0) show active @endif animate__animated animate__fadeIn py-4" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row m-0">
                    @foreach($bar as $product)
                    <div class="col-lg-3 col-md-3 col-sm-12 text-center mb-lg-4 mb-4 mb-sm-4 ">
                    <div class="position-relative mainCat_div shadow">
                        <div class="video-overlay invisible imgOverlay" ></div>
                        <img src="{{$product->image}}"  class="w-100 imgTabs" alt="">
                        <div class="showBtn_div"><a type="button" class="btn btn-primary btnOvlay px-4" onclick="addToCart({{$product->id}})">Buy Now</a></div>
                        <div class="p-3">
                            <div class="cl-7E13AE fw-600 pt-1">{{$product->title}}</div>
                            <div class="price fw-600 pt-1">${{$product->min_price}}</div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif --}}
        {{-- @if($event->count() > 0)
            <div class="tab-pane animate__animated animate__fadeIn py-4 @if($homeDocer->count()==0 && $bar->count()==0) show active @endif " id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="row m-0">
                    @foreach($event as $product)
                    <div class="col-lg-3 col-md-3 col-sm-12 text-center mb-lg-4 mb-4 mb-sm-4 ">
                    <div class="position-relative mainCat_div shadow">
                        <div class="video-overlay invisible imgOverlay" ></div>
                        <img src="{{$product->image}}"  class="w-100 imgTabs" alt="">
                        <div class="showBtn_div"><a type="button" class="btn btn-primary btnOvlay px-4" onclick="addToCart({{$product->id}})">Buy Now</a></div>
                        <div class="p-3">
                            <div class="cl-7E13AE fw-600 pt-1">{{$product->title}}</div>
                            <div class="price fw-600 pt-1">${{$product->min_price}}</div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif --}}
        @if($wedding->count() > 0)
        <div class="tab-pane py-4 animate__animated animate__fadeIn @if($homeDocer->count()==0 && $bar->count()==0 && $event->count()==0) show active @endif" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact-tab1">
            <div class="row m-0">
                @foreach($wedding as $product)
                <div class="col-lg-3 col-md-3 col-sm-12 text-center mb-lg-4 mb-4 mb-sm-4 ">
                <div class="position-relative mainCat_div shadow">
                    <div class="video-overlay invisible imgOverlay" ></div>
                    <img src="{{$product->image}}"  class="w-100 imgTabs" alt="">
                    <div class="showBtn_div"><a type="button" class="btn btn-primary btnOvlay px-4" onclick="addToCart({{$product->id}})">Buy Now</a></div>
                    <div class="p-3">
                        <div class="cl-7E13AE fw-600 pt-1">{{$product->title}}</div>
                        <div class="price fw-600 pt-1">Rs {{number_format($product->min_price*170*0.12)}}</div>
                    </div>
                </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    </section>
<section class="main-padding">
   <div>
      <h3 class="cl-7E13AE py-1">The Return of the Retro
      </h3>
      <p class="cl-44444 text-justify mb-1">Neon signs were once identified with urban evenings across the United States. Although they dwindled in popularity, they are making a roaring comeback now.</p>
      <p class="cl-44444 text-justify mb-0">Custom neon signs today feature an advanced technology that is both safe and easy to use, eco-friendly profile, ease of installation, and incredibly affordable costs. Suitable for both formal and informal occasions, neon word signs can be used for any and all spaces.
      </p>
   </div>
   <div class="pt-3">
      <h3 class="cl-7E13AE py-1">A Fun Addition to Any Space
      </h3>
      <p class="cl-44444 text-justify mb-0">Are you looking to add a stand-out feature to your wedding? Or want to add that extra touch of glamor to your next birthday event? Our modern neon signs are perfect for every occasion. Add them to a party or event, use them as brand logos, or install a custom neon sign for a room at your home.
      </p>
   </div>
   <div class="pt-3">
      <h3 class="cl-7E13AE py-1">Create Your Custom Design </h3>
      <p class="cl-44444 text-justify mb-0">Our awesome design tool lets you choose from a huge range of fonts, backlight colors, hanging options, and a lot more. Ultimately, you get a design that is picture-perfect. You can get a full custom neon sign mockup using our online design tool. This gives a very clear picture of how your sign is going to look like.
      </p>
   </div>
   <div class="pt-3">
      <h3 class="cl-7E13AE py-1">Business Branding with Customized Neon Signs</h3>
      <p class="cl-44444 text-justify mb-0">Custom neon signs not only serve as a unique marketing tool for your business. They also help you add an element of décor and fun to both indoor and outdoor spaces. Our signs have been used by coffee bars, beauty salons, restaurants, nightclubs, and other commercial establishments around the world. Get a trendy neon art logo for your business or simply grab one to create a social media corner at your office.</p>
   </div>
</section>
<section class="main-padding1 my-5">
   <div class="bbb_viewed">
      <div>
         <div class="row m-0">
            <div class="col p-0">
               <div class="bbb_main_container">
                  <div class="bbb_viewed_slider_container">
                     <div class="owl-carousel owl-theme bbb_viewed_slider">
                        <a  href="https://www.instagram.com/epiccraftings/"> <img src="{{asset('assets/img/instagram-gallery/1.jpg')}}" alt="" srcset="">  </a>
                        <a href="https://www.instagram.com/epiccraftings/"> <img src="{{asset('assets/img/instagram-gallery/2.jpg')}}" alt="" srcset=""></a>
                        <a href="https://www.instagram.com/epiccraftings/"> <img src="{{asset('assets/img/instagram-gallery/3.jpg')}}" alt="" srcset=""></a>
                        <a href="https://www.instagram.com/epiccraftings/"> <img src="{{asset('assets/img/instagram-gallery/4.jpg')}}" alt="" srcset=""></a>
                        <a href="https://www.instagram.com/epiccraftings/"> <img src="{{asset('assets/img/instagram-gallery/5.jpg')}}" alt="" srcset=""></a>
                        <a href="https://www.instagram.com/epiccraftings/"> <img src="{{asset('assets/img/instagram-gallery/6.jpg')}}" alt="" srcset=""></a>
                        <a href="https://www.instagram.com/epiccraftings/"> <img src="{{asset('assets/img/instagram-gallery/7.jpg')}}" alt="" srcset=""></a>
                        <a href="https://www.instagram.com/epiccraftings/"> <img src="{{asset('assets/img/instagram-gallery/8.jpg')}}" alt="" srcset=""></a>
                        <a href="https://www.instagram.com/epiccraftings/"> <img src="{{asset('assets/img/instagram-gallery/9.jpg')}}" alt="" srcset=""></a>
                     </div>
                  </div>
                  <div class="bbb_viewed_nav_container">
                     <div class="bbb_viewed_nav bbb_viewed_prev  leftOWlTcon"><i class="fa fa-chevron-left f-15" aria-hidden="true"></i></div>
                     <div class="bbb_viewed_nav bbb_viewed_next rightOWlTcon"><i class="fa fa-chevron-right f-15" aria-hidden="true"></i></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

    @if($reviews->count()>0)
        <section class=" bg-light py-2  my-2">
            <div class="text-center"><img src="{{asset('assets/img/hands_heart.png')}}" alt="" srcset=""></div>
            <h1 class="trustpilot-reviews__title text-center py-4">We're feeling the love</h1>
            <div class="bbb_viewed container  px-lg-5 ps-md-0 px-sm-5 px-5">
                <div class="px-lg-5 ps-md-0 px-sm-0 px-0">
                        <div class="row m-0">
                            <div class="col p-0">
                                <div class="bbb_main_container">
                                        <div class="bbb_viewed_slider_container">
                                            <div class="owl-carousel owl-theme @if($reviews->count()==1) bbb_viewed_slider_for_item_one @elseif($reviews->count()==2) bbb_viewed_slider_for_item_two @elseif($reviews->count()>=3) bbb_viewed_slider_for_item_three_more @endif">
                                                @foreach($reviews as $review)
                                                    <div class="">
                                                        @for ($i =1 ; $i <=$review->rating ; $i++)
                                                            <i class="fa fa-star fa__Stars" aria-hidden="true"></i>
                                                        @endfor

                                                        @for ($i =1 ; $i <=(5 -$review->rating) ; $i++)
                                                            <i class="fa fa-star-o fa__Stars" aria-hidden="true"></i>
                                                        @endfor

                                                        <div>
                                                            <p class="trustpilot-reviews__item-text py-3 mb-0 text-justify">{{$review->review}}</p>
                                                            @if($review->picture!="")
                                                                <img style="width: 206px !IMPORTANT; height: 189px;object-fit: cover;object-position: center;" src="{{$review->picture}}" />
                                                             @endif
                                                            <p class="trustpilot-reviews__item-author mb-0 pt-2 h5">{{$review->name}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>


                                        </div>
                                     <div class="bbb_viewed_nav_container">
                                        <div class="bbb_viewed_nav bbb_viewed_prev2   leftOWlTcon123" style="border: 1px solid #000;color: #000;"><i class="fa fa-chevron-left f-15" aria-hidden="true"></i> </div>
                                        <div class="bbb_viewed_nav bbb_viewed_next2  rightOWlTcon123"  style="border: 1px solid #000;color: #000;"><i class="fa fa-chevron-right f-15" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    @endif
@endsection

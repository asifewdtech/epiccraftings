<style>

.purple:hover{
    color: #7E13AE !important;
    font-weight: 600;
}
.navActive{
    font-weight: 600;
    color: #7E13AE !important;
}
.fw-700{
    font-weight: 700 !important;
}
 </style>

 <!-- Navbar code start-->

  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">

      <div class="container-fluid main-padding">
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
              <a class="purple {{ Request::is('terms-condition') ? 'navActive' : ''  }}"  href="{{ url('/terms-condition') }}">
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
              <img src="{{asset('assets/img/nav-Icon_updated.png')}}" alt="" width="200">
          </a>
          <div class="collapse navbar-collapse  " id="navbarSupportedContent">
              <ul class="navbar-nav m-auto mb-2 mb-lg-0 SmDisplayNone">
                  <li class="nav-item px-lg-5 ">
                      <a class="nav-link active f-22 purple {{ Request::is('/') ? 'navActive' : ''  }}" aria-current="page" href="{{ url('/') }}">Home</a>
                  </li>
                  <li class="nav-item px-lg-5 ">
                      <a class="nav-link f-22 purple {{ Request::is('shop') ? 'navActive' : ''  }}" aria-current="page" href="{{ url('/shop') }}">Shop</a>
                  </li>
                  <li class="nav-item px-lg-5 ">
                      {{-- <a class="nav-link f-22 rounded  px-3 text-white {{ Request::is('design') ? 'navActive' : ''  }}" href="{{ url('/design') }}"><img src="{{asset('assets/img/DesignsLogo.png')}}"></a> --}}
                      <a class="nav-link f-22 rounded  px-3 fw-700 position-relative {{ Request::is('design') ? 'navActive' : ''  }}" href="{{ url('/design') }}">Design Your Own Neon Sign
                        <span class="small cart_number blinker" style="top:3px;background:red;">
                            New
                        </span>
                    </a>
                  </li>
              </ul>
              <div class="dropdown">
                  <div class="card border-0 curser-pointer" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            <div class="d-flex px-3 justify-content-end pb-3"><i class="fa fa-times curser-pointer"
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
                                            <div class="cl-828282">
                                                {{-- Rush in Order: @if($item['is_rush_order']==1) True @else False @endif --}}
                                            </div>
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
                                        <div class="col-2 col-sm-2 col-md-1 col-lg-1 pe-0"><i class="fa fa-trash-o text-danger curser-pointer"
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
              {{-- <div>
            <a href="{{ url('/checkout') }}">
              <div class="card border-0 bg-light">
                  <img src="{{asset('assets/img/cart-Img.png')}}" class="" width="23" alt="">
              </div>
              </a>
          </div> --}}


      </div>
      </div>
  </nav>
  <!-- Navbar code end-->

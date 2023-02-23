<footer class="border-top mt-5">
    <div class="py-4 main-padding bg-7E13AE shadow text-white">
        <div class="row m-0 g-0 align-items-center textMobileCenter">
            <div class="col-md-3 ps-0">
                <div><img src="{{asset('assets/img/nav-Icon_white.png')}}" alt="" width="200" class=" marginMobileAuto"></div>
                <div class="f-18 w-75 marginMobileAuto w-Sm-100">EpicCraftings creates beautiful, handmade neon
                    signs, LED neon light
                    installations, lamps & wall art.</div>
                <!-- <div class="d-flex justify-content-between w-50 pt-4 marginMobileAuto">
                            <a href="#">
                                <img src="{{asset('assets/img/facebook-icon.png')}}" alt="Facebook icon" class="w-75">
                            </a>
                            <a href="#">
                                <img src="{{asset('assets/img/instagram-icon.png')}}" alt="Instagram icon" class="w-75">
                            </a>
                            <a href="#">
                                <img src="{{asset('assets/img/twitter-img.png')}}" alt="Twitter Icon" class="w-75">
                            </a>
                            <a href="#">
                                <img src="{{asset('assets/img/whatsapp-icon.png')}}" alt="Whatsapp icon" class="w-75">
                            </a>
                        </div> -->
            </div>
            <div class="col-md-3">
                <div class="f-18 w-75 pt-3 pt-sm-3 pt-md-5 marginMobileAuto">
                    <div><a class="text-white" href="{{ url('/faq') }}">FAQ</a></div>
                    <div><a class="text-white" href="#">Privacy</a></div>
                    <div><a class="text-white" href="{{ url('/terms-condition') }}">Terms & Conditions</a></div>
                    <div><a class="text-white" href="{{ url('/return-policy') }}">Returns Policy</a></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="f-18 w-75 pt-3 pt-sm-3 pt-md-5 marginMobileAuto">
                    <div><a class="text-white" href="{{ url('/about') }}">About us</a></div>
                    <div><a class="text-white" href="{{ url('/contact-us') }}">Contact us</a></div>
                    <div><a class="text-white" href="{{ url('/shop') }}">Shop</a></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="f-18 pt-3 pt-sm-3 pt-md-5 marginMobileAuto">
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
                    <div><a class="text-white" href="mailto:info@epicCraftings.com">info@epiccraftings.com</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1 cl-7E13AE bg-light text-center">Copyright © 2019 - <script>document.write(new Date().getFullYear())</script> EpicCraftings. All Rights Reserved.</div>
</footer>

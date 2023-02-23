@extends('layouts.app')
@section('content')
<section class="main-padding mt-5">
    <div class="row mx-0 pt-5">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <figure class="zoom" onmousemove="zoom(event)"
                style="background-image: url(assets/img/better-2-1.jpg)">
                <img src="{{asset('assets/img/better-2-1.jpg')}}" />
            </figure>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 ps-0 ps-lg-5 ps-md-0 ps-sm-0">
            <div class="pt-3 h3">Better Together- Delivery In 7 Days</div>
            <h5 class="m-0 pt-3 h4">$149.00</h5>
            <p class="m-0 pt-3 f-17">Light up your room with this elevating sign lighting up your life! Made from LED
                neon flex, this stunning
                sign is perfect for weddings, rooms, parties or even as a gift for your loved ones.</p>
            <div class="f-17 pt-3">Size: 47″W x 27″H / 120cm x 68cm approx. size</div>
            <form class="d-flex align-items-center pt-3">
                <div class="value-button " id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                <input type="number" class="" id="number" value="1" />
                <div class="value-button " id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                <div class=""><button type="submit" name="add-to-cart" value="80"
                        class="single_add_to_cart_button button alt px-4 py-1 text-white">Buy Now</button></div>
            </form>
            <ul class="nav nav-pills mb-3 pt-3 justify-content-between" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bolder active    " id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bolder" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">HOW TO ORDER</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bolder" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Features</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bolder" id="pills-contact-tab1" data-bs-toggle="pill"
                        data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Packaging</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bolder" id="pills-contact-tab2" data-bs-toggle="pill"
                        data-bs-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Shipping</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <section>
                        <p>Better Together Neon Sign/ Neon Light/ Neon Light Sign/ Handmade Neon Sign/ Neon Wall
                            Hanging/
                            Neon Wall Art/ Neon Sign Bedroom</p>
                        <p>Create a romantic ambiance throughout your bedroom with this bright yet sophisticated neon
                            sign.
                            This neon sign creates no noise and is very quiet that’s why it can be placed anywhere.
                            There is
                            no denying that it would become a wow factor and a unique piece of art to your space.</p>
                        <p>Moreover, this neon sign is made up of insanely high-quality material that does not break and
                            causes no harm.</p>
                    </section>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <section>

                        <div class="h5">HOW TO ORDER</div>
                        <div>Send us these details and receive a quote:</div>
                        <ul class="lsn">
                            <li class="pt-1">Text:</li>
                            <li class="pt-1">Color:</li>
                            <li class="pt-1">Size:</li>
                            <li class="pt-1">Font:</li>
                            <li class="pt-1">Acrylic shape:</li>
                        </ul>
                        <div class="pt-2">*Don’t hesitate and send us any other detail if needed*

                        </div>
                    </section>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <section>
                        <div class="h5">HOW TO ORDER</div>
                        <div class="pt-2">> Neon light: Luminous</div>
                        <div class="pt-2">> Neon flex color: Multicolor

                        </div>
                        <div class="pt-2">> Base plate material: Acrylic</div>
                        <div class="pt-2">> Baseplate color: Transparent</div>
                        <div class="pt-2">> Place of use: Indoor</div>
                    </section>
                </div>
                <div class="tab-pane fade" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact-tab1">
                    <div class="h5">Packaging</div>
                    <p>A cardboard box is used to pack these neon signs to ensure the package’s safe delivery to your
                        door.

                    </p>
                </div>
                <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab2">
                    <div class="h5">Shipping</div>
                    <p>The estimated shipping time for a custom made neon sign is 1-2 weeks in ideal cases.

                    </p>
                    <p>————– >> PLEASE NOTE << —————- </p>
                            <p>We do NOT accept customized neon sign returns or refunds.

                            </p>
                            <p>*HURRY UP AND CREATE YOUR VERY OWN NEON SIGN WITH US*</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
// incre
function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}

function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
}
// dcre
// image zoom Code
function zoom(e){
  var zoomer = e.currentTarget;
  e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
  e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
  x = offsetX/zoomer.offsetWidth*100
  y = offsetY/zoomer.offsetHeight*100
  zoomer.style.backgroundPosition = x + '% ' + y + '%';
}
// image zoom Code
</script>
@endsection
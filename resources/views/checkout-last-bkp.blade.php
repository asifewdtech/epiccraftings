@extends('layouts.app')
@section('style')
    <style>
        .hide{
            display: none;
        }
    </style>
@endsection
@section('content')
    @if(Session::has('cart') && !empty(Session::get('cart')))
        <section class="main-padding pt-4">
            <div class="f-35 font-w-600 border-bottom pb-2">
                Checkout
            </div>
            {{-- <div class="cl-7E13AE font-w-600 py-3 f-22">
                Order ID: 281197
            </div> --}}
            <!-- table code start-->
            @foreach(Session::get('cart') as $item)

                <div class="row mb-4 g-0 border smBorderZero ml-0 mr-0  align-items-center flex-nowrap alignStart">
                    <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                        <div class="w-75">
                            <img src="{{asset($item['image'])}}" class="w-131" alt="">
                        </div>
                    </div>
                    <div class="col-8 col-sm-8 col-md-10 col-lg-10">
                        <div class="row m-0 g-0 pl-35">
                            <!-- <div class="col-12 col-sm-12 col-md-2 col-lg-2 text-center flexCenter">
                                <div class="orderHeading">Text</div>
                                <div class="py-4 pl-Sm-15">Your Text Here</div>
                            </div> -->
                            <!-- <div class="col-12 col-sm-12 pt-3px col-md-2 col-lg-2 text-center flexCenter">
                                <div class="orderHeading">Font</div>
                                <div class="py-4 pl-Sm-15">WildScript</div>
                            </div> -->
                            <!-- <div class="col-12 col-sm-12 pt-3px col-md-2 col-lg-2 text-center flexCenter">
                                <div class="orderHeading">Install</div>
                                <div class="py-4 pl-Sm-15">Wall Mounting Cut</div>
                            </div> -->
                            <div class="col-12 col-sm-12 pt-3px col-md-3 col-lg-3 text-center flexCenter">
                                <div class="orderHeading">Quantity</div>
                                <div class="py-4 pl-Sm-15"> <input type="number" value="{{ $item['quantity'] }}" style="width:100px" class="ps-2" /></div>
                            </div>
                            <div class="col-12 col-sm-12 pt-3px col-md-3 col-lg-3 text-center flexCenter">
                                <div class="orderHeading">Price</div>
                                <div class="py-4 pl-Sm-15">${{ $item['price'] }}</div>
                            </div>
                            <div class="col-12 col-sm-12 pt-3px col-md-4 col-lg-3 text-center flexCenter">
                                <div class="orderHeading">In Rush Order</div>
                                <div class="py-4 pl-Sm-15">False</div>
                            </div>
                            <div class="col-12 col-sm-12 pt-3px col-md-3 col-lg-3 text-center flexCenter">
                                <div class="orderHeading">Sub Total</div>
                                <div class="py-4 pl-Sm-15">${{ $item['quantity']*$item['price'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach
           

            <!-- <div class="table-responsive">
                <table class="table table-borderless border">
                    <tr class="bg-transparent  ">
                        <th scope="col" rowspan="2" class="p-0">
                            <div style="width:150px">
                                <img src="{{asset('assets/img/orderImg.png')}}" alt="">
                            </div>
                        </th>
                        <th scope="col">Text</th>
                        <th scope="col">Font</th>
                        <th scope="col">Install</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">In Rush Order</th>
                        <th scope="col">Sub Total</th>
                    </tr>
                    <tr>
                        <td>Your Text Here</td>
                        <td>WildScript</td>
                        <td>Wall Mounting Cut</td>
                        <td>
                            <input type="number" style="width:100px" class="ps-2">
                        </td>
                        <td>$ 270</td>
                        <td>False</td>
                        <td>$ 270</td>
                    </tr>
                </table>
            </div> -->
            <!-- table code end-->
        </section>
        <section class="main-padding pt-4">
            <div class="f-35 font-w-600 pb-2">
                Shipping Details
            </div>
            <form action="" id="create-order" class="row gx-0 gy-3 justify-content-between require-validation needs-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_51J57xIBcWjNyiMcZsfJQAEMtE2uSXeAFDh3yKVEcAsAhB5ZHZb7aoKtogqyyhrNxIfMBgL6Z8fmWkIgrNsxEWIXV00x9mVuhLH" method="post" novalidate>
                @csrf
                <div class="col-md-7 col-lg-7">
                    <div class="row m-0 gx-0 gy-3">

                        <div class="col-md-6 pe-2">
                            <!-- <label for="firstname" class="form-label"></label> -->
                            <input type="text" class="form-control" name="first_name" id="firstname" placeholder="First Name*" required>
                            @error('first_name')
                                <p class="text-danger mt-1 m-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 ps-2">
                            <!-- <label for="lastName" class="form-label"></label> -->
                            <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Last Name*" required>
                            @error('last_name')
                                <p class="text-danger mt-1 m-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="input-group has-validation">
                                <!-- <label for="email" class="form-label"></label> -->
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email*" required>
                                @error('email')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group has-validation">
                                <!-- <label for="phone" class="form-label"></label> -->
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone*" required>
                                @error('phone')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group has-validation">
                                <!-- <label for="CompanyName" class="form-label"></label> -->
                                <input type="text" class="form-control" name="company" id="CompanyName"
                                    placeholder="Company name (optional)">
                                <div class="invalid-feedback">
                                    Please enter your company.
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="input-group has-validation">
                                <!-- <label for="city" class="form-label"></label> -->
                                <input type="text" class="form-control" name="city" id="city" placeholder="City/Town*" required>
                                @error('city')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="input-group has-validation">
                                <!-- <label for="country" class="form-label"></label> -->
                                <input type="text" class="form-control" name="country" id="country" placeholder="State/Country*" required>
                                <div class="invalid-feedback">
                                    Please enter your Country.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group has-validation">
                                <!-- <label for="postCode" class="form-label"></label> -->
                                <input type="text" class="form-control" name="postal_code"  id="postCode" placeholder="Postcode/ZIP*" required>
                                @error('')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group has-validation">
                                <!-- <label for="address" class="form-label"></label> -->
                                <input type="text" class="form-control" name="address" id="address" placeholder="Address*" required>
                                @error('address')
                                    <p class="text-danger mt-1 m-1">{{ $message }}</p>
                                @enderror
                            </div>
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
                                <div class="py-1">$ {{ $item['quantity']*$item['price'] }}</div>
                            </div>
                        </div>
                    @endforeach
                    

                    <div class="row m-0 py-3 justify-content-between border-top border-bottom">
                        <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                            <div class="py-1 font-w-600">Subtotal</div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-end">
                            <div class="py-1">$ {{ $sub_total }}</div>
                        </div>
                    </div>

                    <div class="row m-0 py-3 justify-content-between border-top border-bottom">
                        <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                            <div class="py-1 font-w-600">Shipping</div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-end">
                            <div class="py-1">Free </div>
                        </div>
                    </div>
                    <input type="hidden" name="sub_total" value="{{$sub_total}}">
                    @php $total =$sub_total + 0; @endphp
                    <div class="row m-0 py-1 justify-content-between">
                        <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                            <div class="py-1 h5">Total</div>

                        </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-end">
                            <div class="py-1">$ {{ $total }}</div>
                        </div>
                    </div>
                    <input type="hidden" name="total" value="{{$total}}">
                    <input type="hidden" name="shipping_cost" value="0">
                    <div class="row m-0 g-0">
                        <div class="col-12">
                            <!-- Payment Section code start -->
                            <div class="form-check p-0 d-flex align-items-center">
                                <div class="col-md-3">
                                    <input type="radio" id="paypal" name="payment_method" value="paypal" onclick="paymentRadio()"
                                        checked>
                                    <label for="paypal" class="font-w-600">PayPal</label>
                                </div>
                                <div class="col-md-9"> <img src="{{asset('assets/img/paypal.png')}}" alt=""></div>
                            </div>
                            <div id="paypalDiv">
                                <div class="px-3 bg-f0ecec rounded py-3 my-4">
                                    Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.
                                </div>
                            </div>
                            <div class="form-check p-0 d-flex align-items-center">
                                <div class="col-md-3">
                                    <input class="form-check-input" type="radio" name="payment_method" value="stripe"
                                        onclick="paymentRadio()" id="creditCard">
                                    <label class="form-check-label" for="creditCard"> Credit Card</label>
                                </div>
                                <div class="col-md-9"><img src="{{asset('assets/img/creditCard.png')}}" class="w-220px" alt="" /></div>
                            </div>
                            <div id="creditCardDiv">

                            </div>
                            <!-- Payment Section code end -->
                            <div class="form-check pt-4 pb-3">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    I have read and agree to the website TERMS AND COINDITIONS
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>

                        <div class="form-row row">
                            <div class="col-md-12 error form-group hide">
                                <div class="alert-danger alert">Please correct the errors and try again.</div>
                            </div>
                        </div>

                        <div class="row m-0 g-0">
                            <button class="btn bg-7E13AE text-white col-12 f-22 font-w-600" type="submit">Place
                                Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    @endif
@endsection

@section('script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        @if(Session::has('success'))
            Swal.fire(
                'Success!',
                "{{ Session::get('success') }}",
                'success'
            ).then((value) => {
                window.location='';
            });
        @endif

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
                    Stripe.setPublishableKey($form.data("stripe-publishable-key"));
                    Stripe.createToken(
                        {
                            number: $(".card-number").val(),
                            cvc: $(".card-cvc").val(),
                            exp_month: $(".card-expiry-month").val(),
                            exp_year: $(".card-expiry-year").val(),
                        },
                        stripeResponseHandler
                    );
                }
                else{
                    $('#create-form').submit();
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $(".error").removeClass("hide").find(".alert").text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response["id"];
                    // insert the token into the form so it gets submitted to the server
                    $form.find("input[type=text]").empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });

        const paymentRadio = () => {
            // paypal append code
            if (paypal.checked === true) {
                $('#create-order').attr('action','{{route("paypal.payment")}}');
                paypalDiv.innerHTML =
                    ` <div class="px-3 bg-f0ecec rounded py-3 my-4">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</div>`;
            } else {
                paypalDiv.innerHTML = '';
            }
            // paypal append code
            // creditCard append code
            if (paypal.checked === true) {
                creditCardDiv.innerHTML = ``;
            } else {
                $('#create-order').attr('action','{{route("stripe.payment")}}');
                creditCardDiv.innerHTML = ` <div class="px-3 bg-f0ecec rounded py-3 my-4">
                                    <div class="font-w-600 f-22 ">
                                        Secure Payment via Credit/Debit Card
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-md-12 pt-4 g-0">
                                            <input type="text" class="form-control card-name" id="name" placeholder="Name on Card*"
                                                required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-12 py-3 g-0">
                                            <input type="number" class="form-control card-number" id="cardNumber" placeholder="Card Number*"
                                                required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-6 pb-3 ps-0">
                                            <input type="text" class="form-control card-expiry-month" id="name" placeholder="Expiration Month*"
                                                required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-6 pb-3 ps-0">
                                            <input type="text" class="form-control card-expiry-year" id="name" placeholder="Expiration Year*"
                                                required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-6 pb-3 pe-0">
                                            <input type="number" class="form-control card-cvc" id="name" placeholder="CVC*"
                                                required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

            }
            // creditCard append code
        }

        $(document).ready(function(){
            paymentRadio();
        });
    </script>
@endsection
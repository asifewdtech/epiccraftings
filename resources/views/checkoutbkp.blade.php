@extends('layouts.app')
@section('content')
    <section class="main-padding pt-4">
        <div class="f-35 font-w-600 border-bottom pb-2">
            Checkout
        </div>
        <div class="cl-7E13AE font-w-600 py-3 f-22">
            Order ID: 281197
        </div>
        <!-- table code start-->
        <div class="row m-0 g-0 border smBorderZero   align-items-center flex-nowrap alignStart">
            <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                <div class="w-75">
                    <img src="{{asset('assets/img/orderImg.png')}}" class="w-131" alt="">
                </div>
            </div>
            <div class="col-8 col-sm-8 col-md-10 col-lg-10">
                <div class="row m-0 g-0 pl-35">
                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 text-center flexCenter">
                        <div class="orderHeading">Text</div>
                        <div class="py-4 pl-Sm-15">Your Text Here</div>
                    </div>
                    <div class="col-12 col-sm-12 pt-3px col-md-2 col-lg-2 text-center flexCenter">
                        <div class="orderHeading">Font</div>
                        <div class="py-4 pl-Sm-15">WildScript</div>
                    </div>
                    <div class="col-12 col-sm-12 pt-3px col-md-2 col-lg-2 text-center flexCenter">
                        <div class="orderHeading">Install</div>
                        <div class="py-4 pl-Sm-15">Wall Mounting Cut</div>
                    </div>
                    <div class="col-12 col-sm-12 pt-3px col-md-2 col-lg-2 text-center flexCenter">
                        <div class="orderHeading">Quantity</div>
                        <div class="py-4 pl-Sm-15"> <input type="number" style="width:100px" class="ps-2" /></div>
                    </div>
                    <div class="col-12 col-sm-12 pt-3px col-md-1 col-lg-1 text-center flexCenter">
                        <div class="orderHeading">Price</div>
                        <div class="py-4 pl-Sm-15">$ 270</div>
                    </div>
                    <div class="col-12 col-sm-12 pt-3px col-md-2 col-lg-2 text-center flexCenter">
                        <div class="orderHeading">In Rush Order</div>
                        <div class="py-4 pl-Sm-15">False</div>
                    </div>
                    <div class="col-12 col-sm-12 pt-3px col-md-1 col-lg-1 text-center flexCenter">
                        <div class="orderHeading">Sub Total</div>
                        <div class="py-4 pl-Sm-15">$ 270</div>
                    </div>
                </div>
            </div>
        </div>


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
        <form class="row gx-0 gy-3 justify-content-between needs-validation" novalidate>
            <div class="col-md-7 col-lg-7">
                <div class="row m-0 gx-0 gy-3">
                    <div class="col-md-6 pe-2">
                        <!-- <label for="firstname" class="form-label"></label> -->
                        <input type="text" class="form-control" id="firstname" placeholder="First Name*" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 ps-2">
                        <!-- <label for="lastName" class="form-label"></label> -->
                        <input type="text" class="form-control" id="lastName" placeholder="Last Name*" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group has-validation">
                            <!-- <label for="CompanyName" class="form-label"></label> -->
                            <input type="text" class="form-control" id="CompanyName"
                                placeholder="Company name (optional)">
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group has-validation">
                            <!-- <label for="address" class="form-label"></label> -->
                            <input type="text" class="form-control" id="address" placeholder="Address*" required>
                            <div class="invalid-feedback">
                                Please enter your Address.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group has-validation">
                            <!-- <label for="city" class="form-label"></label> -->
                            <input type="text" class="form-control" id="city" placeholder="City/Town*" required>
                            <div class="invalid-feedback">
                                Please enter your City.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group has-validation">
                            <!-- <label for="country" class="form-label"></label> -->
                            <input type="text" class="form-control" id="country" placeholder="State/Country*" required>
                            <div class="invalid-feedback">
                                Please enter your Country.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group has-validation">
                            <!-- <label for="postCode" class="form-label"></label> -->
                            <input type="text" class="form-control" id="postCode" placeholder="Postcode/ZIP*" required>
                            <div class="invalid-feedback">
                                Please enter your Postcode/ZIP.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group has-validation">
                            <!-- <label for="phone" class="form-label"></label> -->
                            <input type="number" class="form-control" id="phone" placeholder="Phone*" required>
                            <div class="invalid-feedback">
                                Please enter your Phone.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group has-validation">
                            <!-- <label for="email" class="form-label"></label> -->
                            <input type="email" class="form-control" id="email" placeholder="Email*" required>
                            <div class="invalid-feedback">
                                Please enter your Email.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="cl-7E13AE font-w-600 pb-1 f-22">
                    ORDER SUMMARY
                </div>
                <div class="row m-0 py-3 justify-content-between border-top border-bottom">
                    <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                        <div class="py-1 font-w-600">Product: Custom Neon Sign</div>
                        <div class="py-1 font-w-600">Product: Better Together, Wall</div>
                        <div class="py-1 font-w-600">Subtotal</div>
                        <div class="py-1 font-w-600">Shipping</div>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-end">
                        <div class="py-1">$ 270</div>
                        <div class="py-1">$ 270</div>
                        <div class="py-1">$ 540</div>
                        <div class="py-1">Free </div>
                    </div>
                </div>
                <div class="row m-0 py-1 justify-content-between">
                    <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                        <div class="py-1 h5">Total</div>

                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-end">
                        <div class="py-1">$ 540</div>
                    </div>
                </div>

                <div class="row m-0 g-0">
                    <div class="col-12">
                        <!-- Payment Section code start -->
                        <div class="form-check p-0 d-flex align-items-center">
                            <div class="col-md-3">
                                <input type="radio" id="paypal" name="flexRadioDefault" onclick="paymentRadio()"
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
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
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
                    <div class="row m-0 g-0">
                        <button class="btn bg-7E13AE text-white col-12 f-22 font-w-600" type="submit">Place
                            Order</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('script')
<script>
    const paymentRadio = () => {
        // paypal append code
        if (paypal.checked === true) {
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
            creditCardDiv.innerHTML = ` <div class="px-3 bg-f0ecec rounded py-3 my-4">
                                <div class="font-w-600 f-22 ">
                                    Secure Payment via Credit/Debit Card
                                </div>
                                <div class="row m-0">
                                    <div class="col-md-12 pt-4 g-0">
                                        <input type="text" class="form-control" id="name" placeholder="Name on Card*"
                                            required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-12 py-3 g-0">
                                        <input type="number" class="form-control" id="cardNumber" placeholder="Card Number*"
                                            required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 pb-3 ps-0">
                                        <input type="number" class="form-control" id="name" placeholder="Expiration Date*"
                                            required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 pb-3 pe-0">
                                        <input type="number" class="form-control" id="name" placeholder="CVC*"
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
    </script>
@endsection
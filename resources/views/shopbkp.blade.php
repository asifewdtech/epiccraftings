<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/utility.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/sweetalert2/sweetalert2.css')}}">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{asset('assets/plugins/bootstrap/script/bootstrap.bundle.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>oNeon Crafts</title>
</head>
<style>
.nav-link {
    color: #444444 !important;
    text-align: start;
    padding-left: 0px !important;
}

.nav-pills .nav-link.active,
.nav-pills .show>.nav-link {
    color: #7E13AE !important;
    background: transparent !important;
    font-weight: 600;
}
</style>

<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> -->




    <!-- Navbar code start-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
        <div class="container-fluid main-padding">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/img/nav-Icon.png')}}" alt="" class="w-75">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item px-lg-5">
                        <a class="nav-link active f-22" aria-current="page" href="#">SHOP</a>
                    </li>
                    <li class="nav-item px-lg-5">
                        <a class="nav-link f-22" href="#">DESIGN YOUR OWN NEON</a>
                    </li>
                </ul>

                <div class="dropdown">
                    <div class="card border-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('assets/img/cart-Img.png')}}" id="defaultDropdown" alt="">
                        <div class="card-img-overlay p-0 " id="sameBlockDiv">
                            <div class="w-fitContent m-auto ps-1">
                                <span class=" small" id="sameBlockSpan">12</span>
                            </div>
                        </div>
                    </div>
                    <ul id="headerDropDown" class="dropdown-menu headerDropdown px-0 mt-4 bg-white pb-0"
                        aria-labelledby="defaultDropdown">
                        <div>
                            <div class="d-flex px-3 justify-content-end pb-3"><i class="fa fa-times curser-pointer"
                                    aria-hidden="true" onclick="myNone(this)"></i></div>
                            <div class="row px-3     m-0 align-items-center flex-nowrap  border-top py-3">

                                <div class="col-lg-3 ps-0"> <img src="{{asset('assets/img/orderImg.png')}}" width="120"
                                        height="77" alt=""></div>
                                <div class="col-lg-5">
                                    <div class="cl-44444 fw-600">Better Together, Wall Hanging</div>
                                    <div class="cl-828282">Rush in Order: false</div>
                                </div>
                                <div class="col-lg-3 p-0">
                                    <div>
                                        <div class="d-flex">
                                            <div><input type="number" class="form-control quantity"></div>
                                            <div class="ps-3 price fw-600">$ 540.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 pe-0"><i class="fa fa-trash-o text-danger curser-pointer" onclick="myDelete(this)"
                                        aria-hidden="true"></i></div>
                            </div>
                            <div class="row px-3 m-0 align-items-center  flex-nowrap   border-top py-3 ">

                                <div class="col-lg-3 ps-0"> <img src="{{asset('assets/img/orderImg.png')}}" width="120"
                                        height="77" alt=""></div>
                                <div class="col-lg-5">
                                    <div class="cl-44444 fw-600">Better Together, Wall Hanging</div>
                                    <div class="cl-828282">Rush in Order: false</div>
                                </div>
                                <div class="col-lg-3 p-0">
                                    <div>
                                        <div class="d-flex">
                                            <div><input type="number" class="form-control quantity"></div>
                                            <div class="ps-3 price fw-600">$ 370.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 pe-0"><i class="fa fa-trash-o text-danger curser-pointer" onclick="myDelete(this)"
                                        aria-hidden="true"></i></div>
                            </div>
                            <div class="row px-3 m-0 align-items-center  flex-nowrap   border-top py-3 ">

                                <div class="col-lg-3 ps-0"> <img src="{{asset('assets/img/orderImg.png')}}" width="120"
                                        height="77" alt=""></div>
                                <div class="col-lg-5">
                                    <div class="cl-44444 fw-600">Better Together, Wall Hanging</div>
                                    <div class="cl-828282">Rush in Order: false</div>
                                </div>
                                <div class="col-lg-3 p-0">
                                    <div>
                                        <div class="d-flex">
                                            <div><input type="number" class="form-control quantity"></div>
                                            <div class="ps-3 price fw-600">$ 240.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 pe-0"><i class="fa fa-trash-o text-danger curser-pointer" onclick="myDelete(this)"
                                        aria-hidden="true"></i></div>
                            </div>
                            <div class="row px-3 m-0 align-items-center  flex-nowrap   border-top py-3 ">

                                <div class="col-lg-3 ps-0"> <img src="{{asset('assets/img/orderImg.png')}}" width="120"
                                        height="77" alt=""></div>
                                <div class="col-lg-5">
                                    <div class="cl-44444 fw-600">Better Together, Wall Hanging</div>
                                    <div class="cl-828282">Rush in Order: false</div>
                                </div>
                                <div class="col-lg-3 p-0">
                                    <div>
                                        <div class="d-flex">
                                            <div><input type="number" class="form-control quantity"></div>
                                            <div class="ps-3 price fw-600">$ 340.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 pe-0"><i class="fa fa-trash-o text-danger curser-pointer" onclick="myDelete(this)"
                                        aria-hidden="true"></i></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between bg-f0ecec py-2 align-items-center px-3">
                            <div> <a href="{{url('checkout')}}"><button type="button"
                                        class="bg-7E13AE border-0 shadow text-white px-4 rounded py-1">Go to
                                        Checkout</button></a></div>
                            <div>Total: $810.00</div>
                        </div>
                    </ul>
                </div>
                <!-- <div>
                    <div class="card border-0">
                        <img src="{{asset('assets/img/cart-Img.png')}}" alt="">
                        <div class="card-img-overlay p-0">
                            <div class="w-fitContent m-auto ps-1">
                                <span class="text-white small">12</span>
                            </div>

                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </nav>
    <!-- Navbar code end-->






    <section>
        <div class="main-padding py-5">
            <div class="row m-0">
                <div class="col-md-2 co-lg-2 p-0">
                    <h3 class="cl-444444">Categories</h3>
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">ART</button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">Home Decor</button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-messages" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">Signs Open</button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-settings" type="button" role="tab"
                                aria-controls="v-pills-settings" aria-selected="false">Bar Signs</button>
                            <button class="nav-link" id="v-pills-settings-tab1" data-bs-toggle="pill"
                                data-bs-target="#v-pills-settings1" type="button" role="tab"
                                aria-controls="v-pills-settings1" aria-selected="false">Bar Signs</button>
                            <button class="nav-link" id="v-pills-settings-tab2" data-bs-toggle="pill"
                                data-bs-target="#v-pills-settings2" type="button" role="tab"
                                aria-controls="v-pills-settings2" aria-selected="false">Lamps Neon</button>
                            <button class="nav-link" id="v-pills-settings-tab3" data-bs-toggle="pill"
                                data-bs-target="#v-pills-settings3" type="button" role="tab"
                                aria-controls="v-pills-settings2" aria-selected="false">Personalized</button>
                            <button class="nav-link" id="v-pills-settings-tab4" data-bs-toggle="pill"
                                data-bs-target="#v-pills-settings4" type="button" role="tab"
                                aria-controls="v-pills-settings2" aria-selected="false">Event Signs</button>
                            <button class="nav-link" id="v-pills-settings-tab6" data-bs-toggle="pill"
                                data-bs-target="#v-pills-settings6" type="button" role="tab"
                                aria-controls="v-pills-settings2" aria-selected="false">Neon Open</button>
                            <button class="nav-link" id="v-pills-settings-tab7" data-bs-toggle="pill"
                                data-bs-target="#v-pills-settings7" type="button" role="tab"
                                aria-controls="v-pills-settings2" aria-selected="false">Weddings</button>
                        </div>

                    </div>

                </div>
                <div class="col-lg-10 p-0">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <section>
                                <div class="row m-0">
                                    <div class="col-lg-3 col-md-3 mb-5 col-sm-12 text-center">
                                        <div class="border w-100 imageSize">
                                            <!-- <img src="{{asset('assets/img/')}}" alt=""> -->
                                        </div>
                                        <div class="cl-44444 pt-2">Art & Sculptures</div>
                                        <div class="cl-7E13AE fw-600 pt-1">Design your Own Neon</div>
                                        <div class="price fw-600 pt-1">$98.00</div>
                                        <button type="button"
                                            class="btn bg-white addCart py-1 px-5 shadow fw-600 mt-2">Add to
                                            Cart</button>
                                    </div>
                                    <div class="col-lg-3 col-md-3 mb-5 col-sm-12 text-center">
                                        <div class="border w-100 imageSize">
                                            <!-- <img src="{{asset('assets/img/')}}" alt=""> -->
                                        </div>
                                        <div class="cl-44444 pt-2">Art & Sculptures</div>
                                        <div class="cl-7E13AE fw-600 pt-1">Design your Own Neon</div>
                                        <div class="price fw-600 pt-1">$98.00</div>
                                        <button type="button"
                                            class="btn bg-white addCart py-1 px-5 shadow fw-600 mt-2">Add to
                                            Cart</button>
                                    </div>
                                    <div class="col-lg-3 col-md-3 mb-5 col-sm-12 text-center">
                                        <div class="border w-100 imageSize">
                                            <!-- <img src="{{asset('assets/img/')}}" alt=""> -->
                                        </div>
                                        <div class="cl-44444 pt-2">Art & Sculptures</div>
                                        <div class="cl-7E13AE fw-600 pt-1">Design your Own Neon</div>
                                        <div class="price fw-600 pt-1">$98.00</div>
                                        <button type="button"
                                            class="btn bg-white addCart py-1 px-5 shadow fw-600 mt-2">Add to
                                            Cart</button>
                                    </div>
                                    <div class="col-lg-3 col-md-3 mb-5 col-sm-12 text-center">
                                        <div class="border w-100 imageSize">
                                            <!-- <img src="{{asset('assets/img/')}}" alt=""> -->
                                        </div>
                                        <div class="cl-44444 pt-2">Art & Sculptures</div>
                                        <div class="cl-7E13AE fw-600 pt-1">Design your Own Neon</div>
                                        <div class="price fw-600 pt-1">$98.00</div>
                                        <button type="button"
                                            class="btn bg-white addCart py-1 px-5 shadow fw-600 mt-2">Add to
                                            Cart</button>
                                    </div>
                                    <div class="col-lg-3 col-md-3 mb-5 col-sm-12 text-center">
                                        <div class="border w-100 imageSize">
                                            <!-- <img src="{{asset('assets/img/')}}" alt=""> -->
                                        </div>
                                        <div class="cl-44444 pt-2">Art & Sculptures</div>
                                        <div class="cl-7E13AE fw-600 pt-1">Design your Own Neon</div>
                                        <div class="price fw-600 pt-1">$98.00</div>
                                        <button type="button"
                                            class="btn bg-white addCart py-1 px-5 shadow fw-600 mt-2">Add to
                                            Cart</button>
                                    </div>
                                    <div class="col-lg-3 col-md-3 mb-5 col-sm-12 text-center">
                                        <div class="border w-100 imageSize">
                                            <!-- <img src="{{asset('assets/img/')}}" alt=""> -->
                                        </div>
                                        <div class="cl-44444 pt-2">Art & Sculptures</div>
                                        <div class="cl-7E13AE fw-600 pt-1">Design your Own Neon</div>
                                        <div class="price fw-600 pt-1">$98.00</div>
                                        <button type="button"
                                            class="btn bg-white addCart py-1 px-5 shadow fw-600 mt-2">Add to
                                            Cart</button>
                                    </div>
                                    <div class="col-lg-3 col-md-3 mb-5 col-sm-12 text-center">
                                        <div class="border w-100 imageSize">
                                            <!-- <img src="{{asset('assets/img/')}}" alt=""> -->
                                        </div>
                                        <div class="cl-44444 pt-2">Art & Sculptures</div>
                                        <div class="cl-7E13AE fw-600 pt-1">Design your Own Neon</div>
                                        <div class="price fw-600 pt-1">$98.00</div>
                                        <button type="button"
                                            class="btn bg-white addCart py-1 px-5 shadow fw-600 mt-2">Add to
                                            Cart</button>
                                    </div>
                                    <div class="col-lg-3 col-md-3 mb-5 col-sm-12 text-center">
                                        <div class="border w-100 imageSize">
                                            <!-- <img src="{{asset('assets/img/')}}" alt=""> -->
                                        </div>
                                        <div class="cl-44444 pt-2">Art & Sculptures</div>
                                        <div class="cl-7E13AE fw-600 pt-1">Design your Own Neon</div>
                                        <div class="price fw-600 pt-1">$98.00</div>
                                        <button type="button"
                                            class="btn bg-white addCart py-1 px-5 shadow fw-600 mt-2">Add to
                                            Cart</button>
                                    </div>
                                    <div class="col-lg-3 col-md-3 mb-5 col-sm-12 text-center">
                                        <div class="border w-100 imageSize">
                                            <!-- <img src="{{asset('assets/img/')}}" alt=""> -->
                                        </div>
                                        <div class="cl-44444 pt-2">Art & Sculptures</div>
                                        <div class="cl-7E13AE fw-600 pt-1">Design your Own Neon</div>
                                        <div class="price fw-600 pt-1">$98.00</div>
                                        <button type="button"
                                            class="btn bg-white addCart py-1 px-5 shadow fw-600 mt-2">Add to
                                            Cart</button>
                                    </div>
                                    <div class="col-lg-3 col-md-3 mb-5 col-sm-12 text-center">
                                        <div class="border w-100 imageSize">
                                            <!-- <img src="{{asset('assets/img/')}}" alt=""> -->
                                        </div>
                                        <div class="cl-44444 pt-2">Art & Sculptures</div>
                                        <div class="cl-7E13AE fw-600 pt-1">Design your Own Neon</div>
                                        <div class="price fw-600 pt-1">$98.00</div>
                                        <button type="button"
                                            class="btn bg-white addCart py-1 px-5 shadow fw-600 mt-2">Add to
                                            Cart</button>
                                    </div>
                                </div>

                            </section>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            B
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">C</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">D</div>
                        <div class="tab-pane fade" id="v-pills-settings1" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab1">E</div>
                        <div class="tab-pane fade" id="v-pills-settings2" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab2">F</div>
                        <div class="tab-pane fade" id="v-pills-settings3" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab3">G</div>
                        <div class="tab-pane fade" id="v-pills-settings4" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab4">H</div>
                        <div class="tab-pane fade" id="v-pills-settings5" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab5">I</div>
                        <div class="tab-pane fade" id="v-pills-settings6" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab6">J</div>
                        <div class="tab-pane fade" id="v-pills-settings7" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab7">L</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="border-top">
        <div class="py-4 main-padding bg-light shadow ">
            <div class="row m-0 g-0 align-items-center">
                <div class="col-md-3">
                    <div><img src="{{asset('assets/img/nav-Icon.png')}}" alt="" class="w-25"></div>
                    <div class="f-18 w-75">Neon Crafts creates beautiful, handmade neon signs, LED neon light
                        installations, lamps & wall art.</div>
                    <div class="d-flex justify-content-between w-50 pt-4">
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
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="f-18 w-75 pt-5">
                        <div><a href="#">FAQ</a></div>
                        <div><a href="#">Privacy</a></div>
                        <div><a href="#">Terms & Conditions</a></div>
                        <div><a href="#">Returns Policy</a></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="f-18 w-75 pt-5">
                        <div><a href="#">About us</a></div>
                        <div><a href="#">Contact US</a></div>
                        <div><a href="#">Shop</a></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="f-18 w-75 pt-5">
                        <div><a href="#">Contact Info</a></div>
                        <div><a href="#">5272 Lyngate Ct Burke, VA 22015-1688</a></div>
                        <div><a href="#">+1(843) 474-1356</a></div>
                        <div><a href="#">info@oneoncrafts.com</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4 bg-7E13AE"></div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="{{asset('assets/plugins/bootstrap/script/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/script/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/sweetalert2.min.js')}}"></script>

    <script>

      const myDelete = (e, index) => {
      const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

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
    e.parentNode.parentNode.remove();
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )

  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})      
        }
    </script>

    <script>
    // const myFunction = () => {
    //     var myDropdown = document.getElementById('asad')
    //     myDropdown.classList.add("show");
    // }
    document.body.addEventListener('click', function(evt) {
        if (evt.target.id == "sameBlockSpan" || evt.target.id == "sameBlockDiv") {
            document.querySelector('.dropdown-menu').style.display = 'block';
        } else {
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
    </script>

</body>

</html>
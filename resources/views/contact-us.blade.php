@extends('layouts.app')
@section('title','Contact Us')
@section('content')
<!-- Terms and Conditions Section -->
<section class="main-padding">
    <h1 class="cl-7E13AE pt-5 text-center">CONTACT EpicCraftings</h1>
    <h5 class="cl-7E13AE  text-center">LED Neon Business Signs</h5>
    <h5 class="cl-7E13AE  text-center">EpicCraftings Light Signs, Business Logos & Neon Art</h5>

    <div class="pt-3">
        <p class="mb-3 cl-44444 text-justify">If you’re looking for anything else, tell us about it. We look forward
            to working with you to create
            something amazing!
        </p>
        <p class=" cl-44444  text-justify">Call us now on <a class="cl-44444" href="tel:+1(843) 474-1356">+1(843) 474-1356</a> or send us a message using the form below.
        </p>

    </div>
</section>
<section class="main-padding pt-5">
<!-- 1 -->
<div class="col-lg-8 m-auto">
<form class="row g-3  needs-validation" novalidate id="contact-us-form">
  <div class="col-md-12">
    <input type="text" name="username" class="form-control" id="validationCustom01" placeholder="Username" required>
    <div class="invalid-feedback">
        Please choose a username.
      </div>
  </div>
  <div class="col-md-12">
    <!-- <label for="validationCustomUsername" class="form-label">Username</label> -->
    <div class="input-group has-validation">
      <input type="email" name="email" class="form-control" placeholder="Email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Please provide a Email.
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="input-group has-validation">
      <input type="text" name="subject" class="form-control" placeholder="Subject" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Please provide a Subject.
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <textarea type="text" name="message" class="form-control" id="validationCustom04" placeholder="Message" required  style="height: 100px"></textarea>
    <div class="invalid-feedback">
      Please provide a valid message.
    </div>
  </div>
 


  <div class="col-12 d-flex justify-content-end">
    <button class="btn bg-7E13AE text-white py-1 px-5 shadow fw-600 mt-2" type="submit">Send</button>
  </div>
</form>
</div>

</section>

<!-- Terms and Conditions Section -->
@endsection
@section('script')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated');
        if(form.checkValidity()) {
            event.preventDefault();
            var myform = document.getElementById("contact-us-form");
            var fd = new FormData(myform);
            fd.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('contact-us-email') }}",
                type:"post",
                processData: false,
                contentType: false,
                data: fd,
                success: function (data) {
                    if (data.success == true) {
                        Swal.fire(
                            'Success!',
                            data.message,
                            'success'
                        ).then((value) => {
                           window.location='';
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
      }, false)
    });
})()
</script>
@endsection
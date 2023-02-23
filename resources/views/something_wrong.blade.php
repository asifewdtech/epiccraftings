<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Something Went Wrong</title>
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    
    <style>
        a{
            text-decoration: none;
            color:#000;
        }
    </style>
</head>
<body>
    
<section>
    <div class="row m-0 justify-content-center align-items-center h-100vh" style="height:100vh;">
        <div class="col-md-10 col-lg-9 col-sm-10  ">
                <div class="w-75 m-auto">
                    <img src="{{asset('assets/img/something_went_wrong.svg')}}" alt="" class="img-fluid w-100">
                </div>
                <div class="h1 py-3 m-0 text-center">Something went wrong</div>
                <p class="text-center h5" style="font-weight: 400;">Please contact with our support at <a href="mailto:info@EpicCraftings.com">info@EpicCraftings.com</a> </p>
        </div>
    </div>
</section>





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{asset('assets/plugins/bootstrap/script/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/script/bootstrap.bundle.min.js')}}"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="{{asset('assets/plugins/bootstrap/script/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/script/popper.min.js')}}"></script>
</body>
</html>

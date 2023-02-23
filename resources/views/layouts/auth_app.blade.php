<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/font-awesome.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/iCheck/square/blue.css')}}">
    <title>oNeon Crafts</title>
    <link href="{{asset('assets/sweetalert2/sweetalert2.css')}}" rel="stylesheet" />
    <!-- Scripts -->

    @yield('style')
</head>

<body class="login-page">
    <div id="app">

        <main class="">
            @yield('content')
        </main>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{asset('assets/plugins/bootstrap/script/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/script/bootstrap.bundle.min.js')}}"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="{{asset('assets/plugins/bootstrap/script/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/script/popper.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/iCheck/icheck.js')}}"></script>
    <script>
        $(function () {
          $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
          });
        });
      </script>
    @yield('script')
</body>

</html>
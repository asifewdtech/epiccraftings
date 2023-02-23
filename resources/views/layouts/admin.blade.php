<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title')</title>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{asset('assets/admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset('assets/css/admin-custom.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('assets/admin/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('assets/admin/plugins/iCheck/flat/blue.css')}}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{asset('assets/admin/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- Date Picker -->
    <link href="{{asset('assets/admin/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{asset('assets/admin/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('assets/admin/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css"	/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/sweetalert/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <style>
        .badge-danger{
            background: #d62626 !important;
        }
        .badge-success{
            background: #00a65a !important;
        }
    
        .all-loader{
            position: fixed;
            width: 100%;
            z-index: +2222;
            height:100vh;
            background:white;
            display:flex;
            justify-content:center; 
            align-items:center;
        }

        .d-none{display: none;}
        .d-flex{display: flex !important;}
        .flex-direction-column{flex-direction:row !important;}
        .flex-direction-row{flex-direction:column !important;}
        .ml-10-px{margin-left:10px !important;}
    </style>

    @yield('style')
</head>

<body class="skin-blue sidebar-mini">
    <input type="hidden" value="{{ csrf_token() }}" id="laravelToken">
    <div class="all-loader d-none"><img src="{{asset('assets/img/loader.gif')}}"></div>
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="https://oneoncrafts.com/" class="logo class1">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>O</b>C</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Oneon</b>Craft</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" id="class2" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                   
                        <!-- Notifications: style can be found in dropdown.less -->
                  
                        <!-- Tasks: style can be found in dropdown.less -->
                 
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="user-image"
                                    alt="User Image" />
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle"
                                        alt="User Image" />
                                    <p>{{ Auth::user()->name }}</p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        {{-- <a href="#" class="btn btn-default btn-flat">Profile</a> --}}
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                      
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle"
                            alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::user()->name}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
           
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="{{ Request::is('admin/products') || Request::is('admin/products/create')?'active':'' }} treeview" onclick="menuOpenClose(this)">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Product</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::is('admin/products')?'active':'' }}"><a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i> All  product</a></li>
                            <li class=" {{ Request::is('admin/products/create')?'active':'' }}"><a href="{{ route('products.create') }}"><i class="fa fa-circle-o"></i> Create product</a></li>
                        </ul>
                    </li>
                    <li class=" {{ Request::is('admin/categories') || Request::is('admin/categories/create')?'active':'' }} treeview" onclick="menuOpenClose(this)">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Category</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li  class="{{ Request::is('admin/categories')?'active':'' }}"><a href="{{ route('categories.index') }}"><i class="fa fa-circle-o"></i> All  category</a></li>
                            <li  class="{{ Request::is('admin/categories/create')?'active':'' }}"><a href="{{ route('categories.create') }}"><i class="fa fa-circle-o"></i> Create category</a></li>
                        </ul>
                    </li>

                    <li class=" {{ Request::is('admin/coupons') || Request::is('admin/coupons/create')?'active':'' }} treeview" onclick="menuOpenClose(this)">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Coupon</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li  class="{{ Request::is('admin/coupons')?'active':'' }}"><a href="{{ route('coupons.index') }}"><i class="fa fa-circle-o"></i> All  Coupon</a></li>
                            <li  class="{{ Request::is('admin/coupons/create')?'active':'' }}"><a href="{{ route('coupons.create') }}"><i class="fa fa-circle-o"></i> Create Coupon</a></li>
                        </ul>
                    </li>

                    <li class=" {{ Request::is('admin/orders')?'active':'' }} treeview" onclick="menuOpenClose(this)">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Orders</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li  class="{{ Request::is('admin/orders')?'active':'' }}"><a href="{{ route('orders.index') }}"><i class="fa fa-circle-o"></i> All  orders</a></li>
                        </ul>
                    </li>

                    <li class=" {{ Request::is('admin/reviews') || Request::is('admin/reviews/create')?'active':'' }} treeview" onclick="menuOpenClose(this)">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Review</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li  class="{{ Request::is('admin/reviews')?'active':'' }}"><a href="{{ route('reviews.index') }}"><i class="fa fa-circle-o"></i> All Review</a></li>
                            <li  class="{{ Request::is('admin/reviews/create')?'active':'' }}"><a href="{{ route('reviews.create') }}"><i class="fa fa-circle-o"></i> Create Review</a></li>
                        </ul>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"style="min-height: 1066px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <ol class="breadcrumb">
                    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    @yield('breadcrumb')
                </ol>

            </section>

            <!-- Main content -->
            <section class="content" >
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <footer class="main-footer">
            {{-- <div class="pull-right hidden-xs">
                <b>Version</b> 2.2.0
            </div> --}}
            <strong>Copyright &copy; 2021-2022 <a href="http://oneoncrafts.com">OneonCraft</a>.</strong> All
            rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript::;">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript::;">
                                <i class="menu-icon fa fa-user bg-yellow"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript::;">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript::;">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul><!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript::;">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript::;">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript::;">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript::;">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul><!-- /.control-sidebar-menu -->

                </div><!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked />
                            </label>
                            <p>
                                Some information about this general settings option
                            </p>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked />
                            </label>
                            <p>
                                Other sets of options are available
                            </p>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked />
                            </label>
                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div><!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked />
                            </label>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right" />
                            </label>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div><!-- /.form-group -->
                    </form>
                </div><!-- /.tab-pane -->
            </div>
        </aside><!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->


    <!-- jQuery 2.1.4 -->
    <script src="{{asset('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('assets/admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('assets/admin/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{asset('assets/admin/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript">
    </script>
    <script src="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"
        type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('assets/admin/plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="{{asset('assets/admin/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{asset('assets/admin/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"
        type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{asset('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{asset('assets/admin/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/admin/dist/js/app.js')}}" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('assets/admin/dist/js/pages/dashboard.js')}}" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets/admin/dist/js/demo.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/sweetalert/sweetalert.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript">
    </script>
    <script type="text/javascript">
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

        function menuOpenClose(e){
            // $('.treeview').ex.removeClass('active');
            if($(e).hasClass('active')){
                $(e).removeClass('active');
            }else{
                $(e).addClass('active');
                $('.treeview').not(e).removeClass('active');
            }
        }

        // upload file using ajax with progress bar 
        function uploadFile(id) {
            $('.myprogress').css('width', '0');
            $('.msg').text('');
            var formData = new FormData();
            formData.append('file', id[0].files[0]);
            formData.append('upload_path', $('#upload_path').val());
            formData.append('_token', '{{csrf_token()}}');
            $('.msg').text('Uploading in progress...');
            $.ajax({
                url: "{{route('uploadFile')}}",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                // this part is progress bar
                xhr: function () {
                    $('.submit').addClass('disabled');
                    $('.progress').removeClass('d-none');
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            $('.myprogress').text(percentComplete + '%');
                            $('.myprogress').css('width', percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function (data) {
                    if(data.status =true){
                        $('.submit').removeClass('disabled');
                        $('.progress-bar').css('background-color','#3ac574');
                        $('#previewImg').attr('src',data.path);
                        $('.msg').text('Uploading complete');
                        $('#uploaded-file').val(data.path);
                    }
                }
            });
        }

        // remove file
        function removeFile(e) {

            filelistall = $('#images').prop("files");
            let index = $(e).data("file");
            let fileBuffer=[];
            Array.prototype.push.apply( fileBuffer, filelistall );
            fileBuffer.splice(index, 1);
            const dT = new ClipboardEvent('').clipboardData || new DataTransfer(); 
            for (let file of fileBuffer) { dT.items.add(file); }
            $('#images').prop("files",dT.files);
            $(e).parent().remove();
        }

        // Multiple images preview with JavaScript
        let ShowMultipleImagePreview = function(input, imgPreviewPlaceholder) {
            $(imgPreviewPlaceholder).html("");
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    let newDiv = $('<div style="position:relative;"></div>');
                    $(newDiv).css({"width":"100px","height":"100px"});
                    reader.onload = function(event) {
                        $($.parseHTML('<img class="mr-3" width="100" height="100" style="padding:12px;">')).attr('src', event.target.result).appendTo(newDiv);
                    }

                    $($.parseHTML('<span  onclick="removeFile(this)" data-file="'+i+'" style="padding: 0px;cursor:pointer;position: absolute;top: 4px;right: 6px;background: red;border-radius: 50%;width: 20px;height: 20px;"></span>')).html("x").appendTo(newDiv);
                    $(newDiv).appendTo(imgPreviewPlaceholder);
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }

        $('#images').on('change', function() {
            ShowMultipleImagePreview(this, 'div.show-multiple-image-preview');
        });

        // upload file using ajax with progress bar 
        function uploadMultipleFiles(id) {
            $('.myprogress').css('width', '0');
            $('.msg').text('');
            var formData = new FormData();
            formData.append('file', id[0].files[0]);
            formData.append('upload_path', $('#upload_path').val());
            formData.append('_token', '{{csrf_token()}}');
            $('.msg').text('Uploading in progress...');
            $.ajax({
                url: "{{route('uploadFile')}}",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                // this part is progress bar
                xhr: function () {
                    $('.submit').addClass('disabled');
                    $('.progress').removeClass('d-none');
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            $('.myprogress').text(percentComplete + '%');
                            $('.myprogress').css('width', percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function (data) {
                    if(data.status =true){
                        $('.submit').removeClass('disabled');
                        $('.progress-bar').css('background-color','#3ac574');
                        $('#previewImg').attr('src',data.path);
                        $('.msg').text('Uploading complete');
                        $('#uploaded-file').val(data.path);
                    }
                }
            });
        }

        // common fuction for all requests
        function commonFunctionForAllRequest(html=false,confirmation=false,targetElement='',targetUrl,returnUrl='',method,msg='',formID=''){
            if(confirmation){
                swal({
                    text: msg,
                    icon: "warning",
                    buttons: {
                        cancel: "Cancel",
                        confirm: "OK"
                    },
                }).then((willDelete) => {
                    if (willDelete)
                    {
                        $.ajax({
                            type: method,
                            url: targetUrl,
                            data: {_token: $('#laravelToken').val()},
                            success: function(data) {
                                if(data.success==true){
                                    swal("success", data.message, "success").then((value) => {
                                        window.location = returnUrl;
                                    });
                                }else if(data.success==false ){
                                    swal("warning", data.message, "warning").then((value) => {
                                        // window.location = returnUrl;
                                    });
                                }

                            }
                        });
                    }
                });
            }else{
                ajaxCommonCodeForFormData(html,targetElement,targetUrl,returnUrl,method,formID);
            }

        }

        // common code for ajax request for form Data
        function ajaxCommonCodeForFormData(html,targetElement,targetUrl,returnUrl,method,formID){
            var fd = new FormData(document.getElementById(formID));
            fd.append("_token", $('#laravelToken').val());
            $.ajax({
                url: targetUrl,
                type: method,
                processData: false,
                contentType: false,
                data: fd,
                success: function (data) {

                    if (data.success == true && html) {
                    $(targetElement).html(data.html)
                    } else if (data.success == true && !html) {
                        swal("success", data.message, "success").then((value) => {
                            window.location=returnUrl;
                        });
                    } else {
                        if (data.hasOwnProperty("message")) {
                            var wrapper = document.createElement("div");
                            var err = "";
                            $.each(data.message, function (i, e) {
                                err += "<p>" + e + "</p>";
                            });

                            wrapper.innerHTML = err;
                            console.log(wrapper);
                            swal({
                                icon: "error",
                                // text: "Please fix following error!",
                                content: wrapper,
                                type: "error",
                            });
                        }
                    }
                },
            });
        }

        function createUpdateResource(elem,targetUrl,returnUrl,method,formID){
            // $(elem).attr('disabled','disabled');
            var myform = document.getElementById(formID);
            var fd = new FormData(myform);
            fd.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: targetUrl,
                type: method,
                processData: false,
                contentType: false,
                data: fd,
                success: function (data) {
                    if (data.success == true) {
                        swal("success", data.message, "success").then((value) => {
                            window.location=returnUrl;
                        });
                    } else {
                        if (data.hasOwnProperty("message")) {
                            var wrapper = document.createElement("div");
                            var err = "";
                            $.each(data.message, function (i, e) {
                                err += "<p>" + e + "</p>";
                            });

                            wrapper.innerHTML = err;
                            swal({
                                icon: "error",
                                text: "{{ __('Please fix following error!') }}",
                                content: wrapper,
                                type: "error",
                            });
                        }
                    }
                },
            });
        }

        function commonFunction(confirmation=false,target_url,return_url,fData,mthd,msg){
            if(confirmation)
            {
                swal({
                    text: msg,
                    icon: "warning",
                    buttons: {
                        cancel: "Cancel",
                        confirm: "OK"
                        },
                }).then((willDelete) => {
                    if (willDelete)
                    { 
                        $.ajax({
                            type: mthd,
                            url: target_url,
                            data: fData,
                            success: function(data) {
                                if(data.success==true){
                                    swal("success", data.message, "success").then((value) => {
                                        window.location = return_url;
                                    }); 
                                }else if(data.success==false){
                                    swal("warning", data.message, "warning").then((value) => {
                                        // window.location = return_url;
                                    }); 
                                }
                                    
                            }
                        });
                    } 
                });
            }else if(!confirmation){
                $.ajax({
                    type: mthd,
                    url: target_url,
                    data: fData,
                    success: function(data) {
                        if(data.success==true){
                            swal("success", data.message, "success").then((value) => {
                                window.location = return_url;
                            }); 
                        }else if(data.success==false){
                            swal("warning", data.message, "warning").then((value) => {
                                // window.location = return_url;
                            }); 
                        }
                            
                    }
                });
            }
        }

        function delete_resource(target_url,return_url){
            swal({
                text: 'Are you sure you want to delete?',
                icon: "warning",
                buttons: {
                    cancel: "Cancel",
                    confirm: "OK"
                    },
            }).then((willDelete) => {
                if (willDelete)
                { 
                    $.ajax({
                        type: 'post',
                        url: target_url,
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method:"delete"
                        },
                        success: function(data) {
                            swal("success", data.message, "success").then((value) => {
                                window.location = return_url;
                            });  
                        }
                    });
                } 
            });
        }

    </script>

    @yield('script')

</body>

</html>
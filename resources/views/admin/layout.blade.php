<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="no index no follow">
    <link rel="shortcut icon">
    <!-- <link rel="shortcut icon" href="img/indosat_favicon_32x32.ico"> -->
    <title>Admin | Gangga Express</title>

    <!--CSS-->
    <!--datatable-->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/dataTables.responsive.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/dataTables.fontAwesome.css') }}" type="text/css">
    <!--datatable end-->

    <!-- cropper -->
    <link rel="stylesheet" href="{{ asset('css/cropper.css') }}" crossorigin="anonymous">
    <!-- croppper end -->


    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <!-- Date time picker -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min') }}.css" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}" type="text/css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/skin-red-light.css') }}" type="text/css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/lightcase.css') }}" type="text/css">

    <link href="{{ asset('css/tmdrPreset.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" type="text/css">
    <!--CSS END-->

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700&display=swap" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head> 

<body class="hold-transition skin-red-light sidebar-mini">
    <div class="wrapper">
        @if (! Request::is('*/login'))
            <!--TOP-->
            <header class="main-header">
                <a href="dashboard.php" class="logo">
                    <span class="logo-mini"><img src="{{ asset('storage/images/admin/logo-white.png') }}" alt=""></span>
                    <span class="logo-lg"><img src="{{ asset('storage/images/admin/logo-white.png') }}" alt=""></span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('storage/images/admin/user-default.png') }}" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Hello {{ Auth::user()->name }}<i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                </a>
                                <ul class="dropdown-menu box-shadow">
                                    <li class="user-header">
                                        <img src="{{ asset('storage/images/admin/user-default.png') }}" class="img-circle" alt="User Image">
                                        <p>{{ Auth::user()->name }}</p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="text-center">
                                            <a class="btn btn-danger display-xs-block" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign Out</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--TOP END-->

            <!--lEFT-->
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu" data-widget="tree">
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Fastboat Schedule</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route('route', 'tribuana-sampalan') }}"> Tribuana Port - Sampalan</a></li>
                                <li><a href="{{ route('route', 'tribuana-buyuk') }}"> Tribuana Port - Buyuk</a></li>
                                <li><a href="{{ route('route', 'sampalan-tribuana') }}"> Sampalan - Tribuana Port</a></li>
                                <li><a href="{{ route('route', 'buyuk-tribuana') }}"> Buyuk - Tribuana Port</a></li>
                                <li><a href="{{ route('holiday') }}"> Holiday Date</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('destination') }}">
                                <i class="fa fa-compass" aria-hidden="true"></i> <span>Destination</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog') }}">
                                <i class="fa fa-book" aria-hidden="true"></i> <span>Blog</span>
                            </a>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-ship"></i>
                                <span>About Us</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route('company') }}"> The Company</a></li>
                                <li><a href="{{ route('boat') }}"> Our Boat</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">
                                <i class="fa fa-envelope" aria-hidden="true"></i> <span>Contact</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-red" id="contact-notif"></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('inquiry') }}">
                                <i class="fa fa-bell"></i> <span>Inquiry</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-red" id="inquiry-notif"></small>
                                </span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <!--lEFT END-->
        @endif

        @yield('content')
        
    </div>
</body>

<!-- jQuery 3 -->
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>


<!-- daterangepicker -->
<script src="{{ asset('js/moment.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/daterangepicker.js') }}" type="text/javascript"></script>

<!--datatable-->
<script src="{{ asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/dataTables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/dataTables.responsive.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/ellipses.js') }}" type="text/javascript"></script>
<!--datatable end-->

<!-- CKEditor -->
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
<!-- CKEditor END -->

<!--Bootstrap selectpicker-->
<script src="{{ asset('js/bootstrap-select.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/bootstrap-toggle.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery.shorten.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/lightcase.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/adminlte.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/textbox-input.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/cropper.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-cropper.js') }}" type="text/javascript"></script>

<script>
    $(document).ready(function() {

        $(".message").shorten({
            showChars: 100
        });

        $('[data-toggle="tooltip"]').tooltip();

    });

    jQuery(document).ready(function($) {
        $('a[data-rel^=lightcase]').lightcase();
    });
</script>

<!--temporary script, programmer can delete-->
<script>
    $(document).ready(function() {
        if (window.location.pathname == "/dashboard.php") {
            document.getElementsByTagName("a")[4].parentElement.setAttribute("class", "active");
        } else if (window.location.pathname == "/ongoing-test.php") {
            document.getElementsByTagName("a")[5].parentElement.setAttribute("class", "active treeview menu-open");
            document.getElementsByTagName("a")[6].parentElement.setAttribute("class", "active");
        } else if (window.location.pathname == "/past-test.php") {
            document.getElementsByTagName("a")[5].parentElement.setAttribute("class", "active treeview menu-open");
            document.getElementsByTagName("a")[7].parentElement.setAttribute("class", "active");
        } else if (window.location.pathname == "/test-instruction.php") {
            document.getElementsByTagName("a")[8].parentElement.setAttribute("class", "active treeview menu-open");
            document.getElementsByTagName("a")[9].parentElement.setAttribute("class", "active");
        } else if (window.location.pathname == "/test-packages.php" ||
            window.location.pathname == "/listening-package.php" ||
            window.location.pathname == "/reading-package.php" ||
            window.location.pathname == "/structure-package.php") {
            document.getElementsByTagName("a")[8].parentElement.setAttribute("class", "active treeview menu-open");
            document.getElementsByTagName("a")[10].parentElement.setAttribute("class", "active");
        } else if (window.location.pathname == "/bug-report.php") {
            document.getElementsByTagName("a")[11].parentElement.setAttribute("class", "active");
        } else if (window.location.pathname == "/feedback.php") {
            document.getElementsByTagName("a")[12].parentElement.setAttribute("class", "active");
        } else if (window.location.pathname == "/terms-conditions.php") {
            document.getElementsByTagName("a")[13].parentElement.setAttribute("class", "active");
        }
    });
</script>

<!-- CKEditor -->
<script>
    $('textarea.ckeditor').ckeditor({
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}',
    });
</script>
<!-- CKEditor END -->

<!-- Ajax request -->
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('notification') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}"
            },
            success:function(data) {
                if (data.inquiry > 0) {
                    $('#inquiry-notif').html(data.inquiry)
                }

                if (data.contact > 0) {
                    $('#contact-notif').html(data.contact)
                }
            }
        });
    });
</script>
<!-- Ajax request end -->


<script>
    // INPUT TYPE FILE
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    $(document).ready(function() {
        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

            if (input.length) {
                input.val(log);
            } else {}
        });
    });
</script>

<script>
    function imageCropper(input, parent) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                var image = parent.find('.image-preview').attr('src', e.target.result);
                var cropBoxWidth = 200;
                var cropBoxHeight = 100;

                image.cropper('destroy');

                image.cropper({
                    ready: function () {
                        var container = $(this).cropper('getContainerData');

                        $(this).cropper("setCropBoxData", {
                            width: cropBoxWidth, 
                            height: cropBoxHeight,
                            left: (container.width - cropBoxWidth) / 2,
                            top: (container.height - cropBoxHeight) / 2
                        });
                    },
                    crop: function(event) {
                        parent.find('.x-coordinate').val(event.detail.x);
                        parent.find('.y-coordinate').val(event.detail.y);
                        parent.find('.crop-width').val(event.detail.width);
                        parent.find('.crop-height').val(event.detail.height);
                    },
                    viewMode: 3,
                    cropBoxResizable: false,
                    minCropBoxWidth: cropBoxWidth,
                    minCropBoxHeight: cropBoxHeight,
                });
            }
            
            reader.readAsDataURL(input.files[0]);
        }
        
    }

    $(".image-name").change(function() {
        var parent = $(this).parent().parent().parent().parent().parent();

        imageCropper(this, parent);
    });
</script>

<!--temporary script end-->
@yield('script')
</html>
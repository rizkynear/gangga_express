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

    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
</head>

<body>

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


<!--Bootstrap selectpicker-->
<script src="{{ asset('js/bootstrap-select.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/bootstrap-toggle.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery.shorten.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/lightcase.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/adminlte.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/textbox-input.js') }}" type="text/javascript"></script>

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
<!--temporary script end-->

</html>
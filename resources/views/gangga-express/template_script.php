<!-- jQuery 3 -->
<script src="js/jquery.min.js" type="text/javascript"></script>

<!-- jQuery UI 1.11.4 -->
<script src="js/jquery-ui.min.js" type="text/javascript"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap.js" type="text/javascript"></script>


<!-- daterangepicker -->
<script src="js/moment.js" type="text/javascript"></script>
<script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="js/daterangepicker.js" type="text/javascript"></script>

<!--datatable-->
<script src="js/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="js/dataTables.responsive.js" type="text/javascript"></script>
<script src="js/ellipses.js" type="text/javascript"></script>
<!--datatable end-->
    

<!--Bootstrap selectpicker-->
<script src="js/bootstrap-select.min.js" type="text/javascript"></script>

<script src="js/bootstrap-toggle.js" type="text/javascript"></script>

<script src="js/jquery.shorten.js" type="text/javascript"></script>

<script src="js/lightcase.js" type="text/javascript"></script>

<script src="js/adminlte.js" type="text/javascript"></script>
<script src="js/textbox-input.js" type="text/javascript"></script>

<script>
  $(document).ready(function(){
    
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
  $(document).ready(function(){
    if (window.location.pathname=="/dashboard.php") {
      document.getElementsByTagName("a")[4].parentElement.setAttribute("class", "active");
    }
    else if (window.location.pathname=="/ongoing-test.php") {
      document.getElementsByTagName("a")[5].parentElement.setAttribute("class", "active treeview menu-open");
      document.getElementsByTagName("a")[6].parentElement.setAttribute("class", "active");
    }
    else if (window.location.pathname=="/past-test.php") {
      document.getElementsByTagName("a")[5].parentElement.setAttribute("class", "active treeview menu-open");
      document.getElementsByTagName("a")[7].parentElement.setAttribute("class", "active");
    }
    else if (window.location.pathname=="/test-instruction.php") {
      document.getElementsByTagName("a")[8].parentElement.setAttribute("class", "active treeview menu-open");
      document.getElementsByTagName("a")[9].parentElement.setAttribute("class", "active");
    }
    else if (window.location.pathname=="/test-packages.php"
            || window.location.pathname=="/listening-package.php"
            || window.location.pathname=="/reading-package.php"
            || window.location.pathname=="/structure-package.php") {
      document.getElementsByTagName("a")[8].parentElement.setAttribute("class", "active treeview menu-open");
      document.getElementsByTagName("a")[10].parentElement.setAttribute("class", "active");
    }
    else if (window.location.pathname=="/bug-report.php") {
      document.getElementsByTagName("a")[11].parentElement.setAttribute("class", "active");
    }
    else if (window.location.pathname=="/feedback.php") {
      document.getElementsByTagName("a")[12].parentElement.setAttribute("class", "active");
    }
    else if (window.location.pathname=="/terms-conditions.php") {
      document.getElementsByTagName("a")[13].parentElement.setAttribute("class", "active");
    }
  });
</script>
<!--temporary script end-->
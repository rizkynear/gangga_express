<!DOCTYPE html>
<html lang="en">
  <?php include 'template_head.php' ?>
  <body class="hold-transition skin-red-light sidebar-mini">
    <div class="wrapper">
      <?php include 'template_navigation.php' ?>
      <div class="content-wrapper">
        
        <section class="content-header">
          <h1 class="title-main">
            Detail Passenger
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="inquiry.php">Inquiry</a></li>
            <li class="active">Detail Passanger</li>
          </ol>
        </section>
        
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-danger">

                <div class="box-body">

                  <div class="table-responsive">

                  <table class="table table-striped">
                    <tr>
                      <td class="fourth">Name</td>
                      <td class="fourth">Nationality</td>
                      <td class="fourth">Age</td>
                      <td class="Message">Address</td>
                    </tr>
                    <tr>
                      <td class="fourth"><b>Adult</b></td>
                    </tr>
                    <?php for( $i=0; $i<3; $i++): ?>
                      <tr>
                        <td class="fourth">Andika</td>
                        <td>Indonesia</td>
                        <td>30</td>
                        <td>Jl Tukat Yeh Aye No 13, Renon, Denpasar</td>
                      </tr>
                    <?php endfor ?>

                    <tr>
                      <td class="fourth"><b>Child</b></td>
                    </tr>

                    <?php for( $i=0; $i<2; $i++): ?>
                      <tr>
                        <td class="fourth">Oyo</td>
                        <td>Indonesia</td>
                        <td>8</td>
                        <td>Jl Tukat Yeh Aye No 13, Renon, Denpasar</td>
                      </tr>
                    <?php endfor ?>

                    <tr>
                      <td class="fourth"><b>Infant</b></td>
                    </tr>

                    <?php for( $i=0; $i<1; $i++): ?>
                      <tr>
                        <td class="fourth">Tulo</td>
                        <td>Indonesia</td>
                        <td>1</td>
                        <td>Jl Tukat Yeh Aye No 13, Renon, Denpasar</td>
                      </tr>
                    <?php endfor ?>

                    <tr>
                      <td class="fourth text-uppercase"><b>Total</b></td>
                      <td class="text-right text-uppercase"><b>6 Pax</b></td>
                    </tr>
                  </table>
                  </div>
                  
                </div>
                
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
   
    <?php include 'template_script.php' ?>

  </body>
</html>
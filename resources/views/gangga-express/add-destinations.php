<!DOCTYPE html>
<html lang="en">
  <?php include 'template_head.php' ?>
  <body class="hold-transition skin-red-light sidebar-mini">
    <div class="wrapper">
      <?php include 'template_navigation.php' ?>
      <div class="content-wrapper">
        
        <section class="content-header">
          <h1 class="title-main">
            Add Destinations
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Destinations</li>
            <li class="active">Add Destinations</li>
          </ol>
        </section>
        
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-danger">
                
                <div class="box-header with-border">
                  <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-right">
                      <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#"><i class="fa fa-plus" aria-hidden="true"></i> Add Destinations</button> -->
                    </div>
                  </div>
                </div>
                
                <div class="box-body">
                  <form action="" method="post">
                    <div class="form-group">
                    <label class="required">Photo</label>
                    <div class="row row-custom">
                        <div class="col-sm-2">
                        <img class="img-responsive margin-bot-10" src="http://via.placeholder.com/158x181" alt="">
                        </div>
                        <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <span class="btn btn-primary btn-file">
                                <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image">
                            </span>
                            </span>
                            <input type="text" class="form-control" value="No file chosen" readonly="">
                        </div>
                        </div>
                    </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="required">Destination Name</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label class="required">Map Location</label>
                        <span class="text-muted">(Select the location by input the address or drag the red map marker to selected location)</span>
                        <input type="text" class="form-control" id="loc-address" placeholder="Property address">
                    </div>
                    <div class="form-group">
                        <div id="loc"></div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                    <button class="btn btn-default">Cancel</button>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
        </section>
        
      </div>
    </div>
    <?php include 'template_script.php' ?>

    <!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
    <!--MAP-->
    <script src="js/locationpicker.jquery.min.js" type="text/javascript"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false&libraries=places" type="text/javascript"></script>
    <!--MAP END-->

    <script type="text/javascript">
      $(document).ready(function(){
        
        // BOOTSTRAP LOCATION PICKER
        $('#loc').locationpicker({
          location: {latitude: -8.6821245, longitude: 115.1652808},
          radius: 300,
          inputBinding: {
            latitudeInput: $('#loc-lat'),
            longitudeInput: $('#loc-lon'),
            radiusInput: $('#loc-radius'),
            locationNameInput: $('#loc-address')
          },
          enableAutocomplete: true
        });
      });
    </script>
  </body>
</html>
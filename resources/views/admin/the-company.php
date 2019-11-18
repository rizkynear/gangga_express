<!DOCTYPE html>
<html lang="en">
  <?php include 'template_head.php' ?>
  <body class="hold-transition skin-red-light sidebar-mini">
    <div class="wrapper">
      <?php include 'template_navigation.php' ?>
      <div class="content-wrapper">
        
        <section class="content-header">
          <h1 class="title-main">
            The Company
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>About us</li>
            <li class="active">The Company</li>
          </ol>
        </section>
        
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-danger">
                
                <div class="box-header with-border">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- <form class="text-left form-inline" action="" method="post">
                        <div class="form-group form-group-inline">
                          <label class="sr-only">Search</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                              <button class="btn btn-danger" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i><span class="sr-only"></span>
                              </button>
                            </span>
                          </div>
                        </div>
                      </form> -->
                    </div>
                    <!-- <div class="col-sm-6 text-right">
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#"><i class="fa fa-plus" aria-hidden="true"></i> Add Destinations</button>
                    </div> -->
                  </div>
                </div>
                
                <div class="box-body">
                    <!--SAMPLE ALERT-->
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><i class="icon fa fa-check"></i> Data is successfully deleted</p>
                    </div>
                    <!--SAMPLE ALERT END-->
                    <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#desc-en"><img src="img/flag_gb.png" alt=""> English</a></li>
                    <li><a data-toggle="tab" href="#desc-id"><img src="img/flag_id.png" alt=""> Indonesia</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="desc-en" class="tab-pane fade in active">
                            <div class="box-body">
                                <!--FORM-->
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label class="required">Title</label>
                                        <input type="text" class="form-control" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label class="required">Sub Title</label>
                                        <input type="text" class="form-control" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label class="required">Content</label>
                                        <textarea id="about-text-en"></textarea>
                                        <script>
                                            ClassicEditor
                                            .create( document.querySelector( '#about-text-en' ), {
                                            removePlugins: [ 'Table', 'MediaEmbed' ]
                                            })
                                            .catch( error => {
                                            console.error( error );
                                            } );
                                        </script>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes</button>
                                    </div>
                                </form>
                                <!--FORM END-->
                            </div>
                        </div>

                        <div id="desc-id" class="tab-pane fade">
                            <div class="box-body">
                                 <!--FORM-->
                                 <form method="post" action="">
                                    <div class="form-group">
                                        <label class="required">Title</label>
                                        <input type="text" class="form-control" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label class="required">Sub Title</label>
                                        <input type="text" class="form-control" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label class="required">Content</label>
                                        <textarea id="about-text-id"></textarea>
                                        <script>
                                            ClassicEditor
                                            .create( document.querySelector( '#about-text-id' ), {
                                            removePlugins: [ 'Table', 'MediaEmbed' ]
                                            })
                                            .catch( error => {
                                            console.error( error );
                                            } );
                                        </script>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes</button>
                                    </div>
                                </form>
                                <!--FORM END-->
                            </div>
                        </div>
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
<!DOCTYPE html>
<html lang="en">
  <?php include 'template_head.php' ?>
  <body class="hold-transition skin-red-light sidebar-mini">
    <div class="wrapper">
      <?php include 'template_navigation.php' ?>
      <div class="content-wrapper">
        
        <section class="content-header">
          <h1 class="title-main">
            Blog
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Blog</li>
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
                      <a type="button" class="btn btn-default" href="add-blog.php"><i class="fa fa-plus" aria-hidden="true"></i> Add Blog</a>
                    </div>
                  </div>
                </div>
                
                <div class="box-body">
                  <!--SAMPLE ALERT-->
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-check"></i> New blog is successfully added!</p>
                  </div>
                  <!--SAMPLE ALERT END-->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 200px;">Image</th>
                          <th>Title & Date</th>
                          <th style="width: 150px;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for( $i=0; $i<10; $i++): ?>
                        <tr>
                          <td>
                            <img class="img-responsive img-xs" src="http://via.placeholder.com/700x400" alt="">
                          </td>
                          <td>
                            <span class="display-xs-block">Nusa Penida Guide</span>
                            <span class="display-xs-block">30 Nov 2019</span>
                          </td>
                          <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#resend-confirmation"><i class="fa fa-edit" aria-hidden="true"></i></button>                  
                            <span class="display-xs-inline-block" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-confirmation"><i class="fa fa-trash" aria-hidden="true"></i></button></span>
                          </td>
                        </tr>
                        <?php endfor ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </section>
        
        
        <!--MODAL DELETE-->
        <div class="modal fade" id="delete-confirmation" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="my-20">
                  <h4 class="title-main mt-0 mb-10">Delete?</h4>
                  <p>Are you sure want to delete this item?</p>
                </div>
                <button class="btn btn-danger mr-5" type="button" data-dismiss="modal"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <!--MODAL DELETE END-->
        
      </div>
    </div>
    <?php include 'template_script.php' ?>
  </body>
</html>
@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Our Boat
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Our Boat</li>
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
                            <div class="col-sm-6 text-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add-boat"><i class="fa fa-plus" aria-hidden="true"></i> Add Boat</button>
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <!--SAMPLE ALERT-->
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-check"></i> Data is successfully deleted</p>
                        </div>
                        <!--SAMPLE ALERT END-->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Boat name</th>
                                        <th>Engine</th>
                                        <th>Capacity</th>
                                        <th>Length</th>
                                        <th>Width</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 7; $i++) : ?>
                                        <tr>
                                            <td>
                                                <span class="display-xs-block">Gangga Express <?php echo $i + 1 ?> </span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">Suzuki DF352A</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">180</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">34</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">5.6</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-inline-block" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#resend-confirmation"><i class="fa fa-edit" aria-hidden="true"></i></button></span>
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
    <!--MODAL ADD BOAT-->
    <div class="modal fade" id="modal-add-boat" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="title-main">Add Boat</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="required">Photo</label>
                                <div class="row row-custom">
                                    <div class="col-sm-4">
                                        <img class="img-responsive margin-bot-10" src="http://via.placeholder.com/158x181" alt="">
                                    </div>
                                    <div class="col-sm-8">
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
                            <div class="form-group">
                                <label class="required">Boat Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="row row-custom">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="required">Boat Engine</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="required">Boat Capacity</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row row-custom">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="required">Boat Length</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="required">Boat Width</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        <button class="btn btn-default">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--MODAL ADD BOAT END-->

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
@endsection
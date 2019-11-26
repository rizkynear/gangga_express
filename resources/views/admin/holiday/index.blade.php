@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Holiday Date
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Fastboat Schedule</li>
            <li class="active">Holiday Date</li>
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
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add-holiday-date"><i class="fa fa-plus" aria-hidden="true"></i> Add Holiday Date</button>
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <!--SAMPLE ALERT-->
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-check"></i> New data is successfully added!</p>
                        </div>
                        <!--SAMPLE ALERT END-->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 200px;">Date</th>
                                        <th>Holiday Name</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 3; $i++) : ?>
                                        <tr>
                                            <td>
                                                <span class="display-xs-block">30 Maret 2020</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">Hari Raya Nyepi</span>
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

    <!--MODAL ADD HOLIDAY DATE-->
    <div class="modal fade" id="modal-add-holiday-date" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="title-main">Add Holiday Date</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="required">Holiday Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="required">Holiday Date </label>
                                <div style="overflow:hidden;">
                                    <div id="datetimepicker12"></div>
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
    <!--MODAL ADD HOLIDAY DATE END-->

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

@section('script')
<script type="text/javascript">
    $(function() {
        $('#datetimepicker12').datetimepicker({
            inline: true,
            format: 'L'
        });
    });
</script>
@endsection
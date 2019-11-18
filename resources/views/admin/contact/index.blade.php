@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Contact
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Contact</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">

                    <div class="box-body">

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-contact">
                                <thead>
                                    <tr>
                                        <th style="width: 120px;">Date</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th style="width: 300px;">Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 10; $i++) : ?>
                                        <tr>
                                            <td>
                                                <span class="display-xs-block">31 Nov 2019</span>
                                                <span class="display-xs-block">10:20</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">Steve</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">08412312366</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">steve@gmail.com</span>
                                            </td>
                                            <td>
                                                <span class="message">Lorem ipsum dolor si amet. Lorem ipsum dolor si amet Lorem ipsum dolor si amet. Lorem ipsum dolor si amet.</span>
                                            </td>
                                            <td>
                                                <span data-toggle="modal" data-target="#delete-confirmation">
                                                    <a class="btn btn-danger" title="Delete" data-toggle="tooltip" data-placement="top">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </span>
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
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        //tooltip button icon
        $('[data-toggle="tooltip"]').tooltip();

        //data table
        $('#table-contact').DataTable({
            "bSort": false,
            "pagingType": "full_numbers",
            "responsive": true,
            "lengthMenu": [
                [10, 25, 50],
                [10, 25, 50]
            ],
            "language": {
                "paginate": {
                    "first": "&nbsp;",
                    "last": "&nbsp;",
                    "previous": "&nbsp;",
                    "next": "&nbsp;"
                }
            },
            "sPaginationType": "ellipses"
        });

        $(".message").shorten({
            showChars: 70
        });
    });
</script>
@endsection
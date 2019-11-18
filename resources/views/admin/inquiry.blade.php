@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Inquiry
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Inquiry</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">

                    <div class="box-header with-border">
                        <div class="box-body">
                            <div class="row">
                                <form class="text-left form-inline" action="" method="post">
                                    <div class="form-group form-group-inline">
                                        <input type='text' class="form-control" id='inquiry-date' placeholder="Date">
                                    </div>
                                    <div class="form-group form-group-inline">
                                        <select class="form-control selectpicker">
                                            <option>All route</option>
                                            <option>Tribuana Port - Sampalan</option>
                                            <option>Tribuana Port - Buyuk</option>
                                            <option>Sampalan - Tribuana Port</option>
                                            <option>Buyuk - Tribuana Port</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-group-inline">
                                        <select class="form-control selectpicker">
                                            <option>All Schedule</option>
                                            <option>06.30 AM</option>
                                            <option>07.00 AM</option>
                                            <option>08.00 AM</option>
                                            <option>12.15 PM</option>
                                            <option>13.30 PM</option>
                                            <option>14.30 PM</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                                    <a type="button" class="btn btn-default" href="add-blog.php"><i class="fa fa-download" aria-hidden="true"></i> Export CSV</a>

                                </form>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <form text="text-right" class="form-inline" action="" method="post">
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
                                </form>

                            </div>
                            <!-- <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4">
                  </div> -->
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Date</th>
                                        <th>Contact Info</th>
                                        <th>Departure</th>
                                        <th>Return</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 10; $i++) : ?>
                                        <tr>
                                            <td>
                                                <span class="display-xs-block">B00<?php echo $i + 1 ?></span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">31 Nov 2019</span>
                                                <span class="display-xs-block">10:20</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">Steve</span>
                                                <span class="display-xs-block">08412312366</span>
                                                <span class="display-xs-block">steve@gmail.com</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">Tribuana Port(Bali) - Sampalan (Nusa Penida)
                                                    24 September 2019
                                                    06.30 to 7.30
                                                </span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">Buyuk (Nusa Penida) - Tribuana Port(Bali)
                                                    25 September 2019
                                                    06.30 to 7.30</span>
                                            </td>
                                            <td>
                                                <span>
                                                    <a class="btn btn-default" href="detail-passenger.php" title="View Passenger" data-toggle="tooltip" data-placement="top">
                                                        <i class="fa fa-address-book"></i>
                                                    </a>
                                                </span>
                                                <span data-toggle="modal" data-target="#detail-inquiry">
                                                    <a class="btn btn-default" title="Detail" data-toggle="tooltip" data-placement="top">
                                                        <i class="fa fa-bars"></i>
                                                    </a>
                                                </span>
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

    <!--MODAL DETAIL INQUIRY -->
    <div class="modal fade" id="detail-inquiry" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <div class="modal-body text-center"> -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <p class="modal-title content-title" id="deleteLabel">Detail Inquiry</p>
                </div>
                <div class="modal-body text-left">
                    <p><b>Personal Information</b></p>
                    <table class="table table-striped">
                        <tr>
                            <td class="fourth">DateBooking</td>
                            <td>31/11/2019</td>
                        </tr>
                        <tr>
                            <td class="fourth">Full Name</td>
                            <td>Steve</td>
                        </tr>
                        <tr>
                            <td class="fourth">Email</td>
                            <td>steve@gmail.com</td>
                        </tr>
                        <tr>
                            <td class="fourth">Phone</td>
                            <td>08412312366</td>
                        </tr>
                        <tr>
                            <td class="fourth">Address</td>
                            <td>Jl. Tukad Citarum Gg. DD 999</td>
                        </tr>
                        <tr>
                            <td class="fourth">Nationality</td>
                            <td>Australia</td>
                        </tr>
                    </table>
                    <p><b>Booking Information</b></p>
                    <table class="table table-striped">
                        <tr>
                            <td class="fourth">Type </td>
                            <td>Round Trip</td>
                        </tr>
                        <tr>
                            <td class="fourth">Departure Route </td>
                            <td>
                                <span class="display-xs-block">Tribuana Port(Bali) - Sampalan (Nusa Penida)</span>
                                <span class="display-xs-block">24 September 2019</span>
                                <span class="display-xs-block">06.30 to 7.30</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="fourth">Return Route </td>
                            <td>
                                <span class="display-xs-block">Buyuk (Nusa Penida) - Tribuana Port(Bali)</span>
                                <span class="display-xs-block">25 September 2019</span>
                                <span class="display-xs-block">06.30 to 7.30</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="fourth">Selected Activities</td>
                            <td>
                                <ul class="clearfix no-list">
                                    <li class="pull-left">Adult (x2)</li>
                                    <li class="pull-right">Rp. 120.000</li>
                                </ul>
                                <ul class="clearfix no-list">
                                    <li class="pull-left">Child (x2)</li>
                                    <li class="pull-right">Rp. 60.000</li>
                                </ul>
                                <ul class="clearfix no-list">
                                    <li class="pull-left">Infant (x2)</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="fourth text-uppercase"><b>Total</b></td>
                            <td class="text-right text-uppercase"><b>Rp. 180.000</b></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <!--MODAL DETAIL INQUIRY END-->
</div>
@endsection

@section('script')
<!-- <script>
      $(document).ready(function(){
        $('#report-date-range').daterangepicker({
          maxDate: moment(),
          "locale": {
            "format": "DD/MM/YYYY",
          }
        });
      });
    </script> -->

<script type="text/javascript">
    $(function() {
        $('#inquiry-date').datetimepicker({
            format: 'L'
        });
    });
</script>
@endsection
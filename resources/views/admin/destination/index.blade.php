@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Destinations
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="active">Destinations</li>
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
                                <a type="button" class="btn btn-default" href="{{ route('destination.add') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Destination</a>
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <!--SAMPLE ALERT-->
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-check"></i>{{ session('success') }}</p>
                            </div>
                        @endif
                        <!--SAMPLE ALERT END-->
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-contact">
                                <thead>
                                    <tr>
                                        <th style="width: 200px;">Image</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($destinations as $destination)
                                        <tr>
                                            <td>
                                                <img class="img-responsive img-xs" src="{{ asset('storage/images/destinations/thumbnail/' . $destination->image) }}" alt="">
                                            </td>
                                            <td>
                                                <span class="display-xs-block">{{ $destination->name }}</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">{{ $destination->location }}</span>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('destination.edit', $destination->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <span class="display-xs-inline-block" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger delete-destination" data-action="{{ route('destination.delete', $destination->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></button></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--MODAL DELETE-->
    <div class="modal fade" id="modal-delete-destination" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="my-20">
                        <h4 class="title-main mt-0 mb-10">Delete?</h4>
                        <p>Are you sure want to delete this item?</p>
                    </div>
                    <form action="" method="post" id="form-delete">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mr-5" type="submit"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
                    </form>
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

        $('.delete-destination').click(function() {
            var action = $(this).data('action');

            $('#form-delete').attr('action', action);
            $('#modal-delete-destination').modal();
        });

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
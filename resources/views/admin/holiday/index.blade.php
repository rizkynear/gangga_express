@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Holiday Date
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-check"></i>{{ session('success') }}</p>
                            </div>
                        @endif
                        <!--SAMPLE ALERT END-->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                @if ($holidays->isEmpty())
                                    <h2>No data found</h2>
                                @else
                                <thead>
                                    <tr>
                                        <th style="width: 200px;">Date</th>
                                        <th>Holiday Name</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($holidays as $holiday)
                                        <tr>
                                            <td>
                                                <span class="display-xs-block">{{ $holiday->date }}</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">{{ $holiday->name }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('holiday.edit', $holiday->id) }}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <span class="display-xs-inline-block" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger delete-holiday" data-action="{{ route('holiday.delete', $holiday->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></button></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                @endif
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
                    <form action="{{ route('holiday.store') }}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="required">Holiday Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <p class="small text-danger mt-5">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required">Holiday Date </label>
                                <div style="overflow:hidden;">
                                    <input type="hidden" id="datetimepicker12" name="date" value="{{ old('date') }}">
                                </div>
                                @if ($errors->has('date'))
                                    <p class="small text-danger mt-5">{{ $errors->first('date') }}</p>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--MODAL ADD HOLIDAY DATE END-->

    <!--MODAL DELETE-->
    <div class="modal fade" id="modal-delete-holiday" role="dialog">
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

@if ($errors->has('*'))
    <script>
        $('#modal-add-holiday-date').modal()
    </script>
@endif

<script type="text/javascript">
    $(document).ready(function() {
        $('.delete-holiday').click(function() {
            var action = $(this).data('action');

            $('#form-delete').attr('action', action);
            $('#modal-delete-holiday').modal();
        });

        $('#datetimepicker12').datetimepicker({
            inline: true,
            format: 'Y-M-D'
        });
    });
</script>
@endsection
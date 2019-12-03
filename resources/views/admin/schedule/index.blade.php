@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            {{ $route->departure }} - {{ $route->arrival }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Fastboat Schedule</li>
            <li class="active">{{ $route->departure }} - {{ $route->arrival }}</li>
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
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add-schedule"><i class="fa fa-plus" aria-hidden="true"></i> Add Schedule</button>
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
                            @if ($route->schedules->isEmpty())
                                <h2 class="text-center">No data found</h2>
                            @else
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Departure</th>
                                            <th>Arrival</th>
                                            <th>Quota</th>
                                            <th>Status</th>
                                            <th style="width: 150px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($route->schedules as $schedule)
                                            <tr>
                                                <td>
                                                    <span class="display-xs-block">{{ $schedule->departure }}</span>
                                                </td>
                                                <td>
                                                    <span class="display-xs-block">{{ $schedule->arrival }}</span>
                                                </td>
                                                <td>
                                                    <span class="display-xs-block">{{ $schedule->quota }}</span>
                                                </td>
                                                <td>
                                                    <span class="display-xs-block">{{ is_null($schedule->expired_date) || $schedule->expired_date > now() ? 'On' : 'Off'}}</span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('schedule.edit', ['route' => $schedule->route, 'id' => $schedule->id]) }}" method="get">
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                                        <span class="display-xs-inline-block" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger delete-schedule" data-action="{{ route('schedule.delete', ['route' => $schedule->route, 'id' => $schedule->id]) }}"><i class="fa fa-trash" aria-hidden="true"></i></button></span>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--MODAL ADD SCHEDULE-->
    <div class="modal fade" id="modal-add-schedule" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="title-main">Add Schedule</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('schedule.store', $route->route) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row row-custom">
                                <div class="col-md-6">
                                    <label class="required">Departure Time</label>
                                    <div style="overflow:hidden;">
                                        <input type="hidden" name="departure" id="datetimepicker12" value="{{ old('departure') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="required">Arrival Time</label>
                                    <div style="overflow:hidden;">
                                        <input type="hidden" name="arrival" id="datetimepicker11" value="{{ old('arrival') }}">
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('departure'))
                                <p class="small text-danger mt-5">{{ $errors->first('departure') }}</p>
                            @endif
                            @if ($errors->has('arrival'))
                                <p class="small text-danger mt-5">{{ $errors->first('arrival') }}</p>
                            @endif
                        </div>

                        <div class="row row-custom">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="required">Quota</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="quota" value="{{ old('quota') }}">
                                        <span class="input-group-addon">Pax</span>
                                    </div>
                                    @if ($errors->has('quota'))
                                        <p class="small text-danger mt-5">{{ $errors->first('quota') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row row-custom">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Expired Date </label>

                                    <div class="row row-custom">
                                        <div class="col-sm-9">
                                            <input type='text' class="form-control" id='news-date' name="expired_date" value="{{ old('expired_date') }}">
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="display-xs-inline-block" data-toggle="tooltip" title="Clear Expired"><button type="button" class="btn btn-danger" id="clear">Clear Expired</button></span>
                                        </div>
                                    </div>
                                    @if ($errors->has('expired_date'))
                                        <p class="small text-danger mt-5">{{ $errors->first('expired_date') }}</p>
                                    @endif
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
    <!--MODAL ADD SCHEDULE END-->

    <!--MODAL DELETE-->
    <div class="modal fade" id="modal-delete-schedule" role="dialog">
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
        $('#modal-add-schedule').modal();
    </script>
@endif
<script type="text/javascript">
    $(function() {
        $('#datetimepicker12').datetimepicker({
            inline: true,
            format: 'HH:mm:ss'
        });
        $('#datetimepicker11').datetimepicker({
            inline: true,
            format: 'HH:mm:ss'
        });
    });
</script>
<script type="text/javascript">
    $(function() {
        $('#news-date').datetimepicker({
            format: 'Y-M-D'
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.delete-schedule').click(function() {
            var action = $(this).data('action');

            $('#form-delete').attr('action', action);
            $('#modal-delete-schedule').modal();
        });

        $('#clear').click(function() {
            $('#news-date').val('');
        });
    })
</script>
@endsection
@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Edit Schedule
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <form action="{{ route('schedule.update', ['route' => $schedule->route, 'id' => $schedule->id]) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <div class="row row-custom">
                                    <div class="col-md-6">
                                        <label class="required">Departure Time</label>
                                        <div style="overflow:hidden;">
                                            <input type="hidden" name="departure" id="datetimepicker12" value="{{ $errors->has('departure') ? old('departure') : $schedule->departure }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="required">Arrival Time</label>
                                        <div style="overflow:hidden;">
                                            <input type="hidden" name="arrival" id="datetimepicker11" value="{{ $errors->has('arrival') ? old('arrival') : $schedule->arrival }}">
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
                                            <input type="number" class="form-control" name="quota" value="{{ $errors->has('quota') ? old('quota') : $schedule->quota }}">
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
                                                <input type='text' class="form-control" id='news-date' name="expired_date" value="{{ $errors->has('expired_date') ? old('expired_date') : $schedule->expired_date }}">
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
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                            <a href="{{ route('route', $schedule->route) }}" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')

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

        $('#clear').click(function() {
            $('#news-date').val('');
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

@endsection
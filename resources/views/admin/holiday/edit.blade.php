@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Edit Holiday
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <form action="{{ route('holiday.update', $holiday->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label class="required">Holiday Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $errors->has('name') ? old('name') : $holiday->name }}">
                                @if ($errors->has('name'))
                                    <p class="small text-danger mt-5">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required">Holiday Date </label>
                                <div style="overflow:hidden;">
                                    <input type="hidden" id="datetimepicker12" name="date" value="{{ $errors->has('date') ? old('date') : $holiday->date }}">
                                </div>
                                @if ($errors->has('date'))
                                    <p class="small text-danger mt-5">{{ $errors->first('date') }}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                            <a href="{{ route('holiday') }}" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script>
    $('#datetimepicker12').datetimepicker({
        inline: true,
        format: 'Y-M-D'
    });
</script>
@endsection
@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Edit Boat
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <form action="{{ route('boat.update', $boat->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label class="required">Photo</label>
                                <div class="row row-custom">
                                    <div class="col-sm-3">
                                        <img class="img-responsive margin-bot-10 image-preview" src="{{ asset('storage/images/boats/thumbnail/' . $boat->image) }}" alt="">
                                        <input type="hidden" class="x-coordinate" name="x_coordinate">
                                        <input type="hidden" class="y-coordinate" name="y_coordinate">
                                        <input type="hidden" class="crop-width" name="crop_width">
                                        <input type="hidden" class="crop-height" name="crop_height">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image" class="image-name">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" value="No file chosen" readonly="">
                                        </div>
                                        @if ($errors->has('image'))
                                            <p class="small text-danger mt-5">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="required">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $errors->has('name') ? old('name') : $boat->name }}">
                                @if ($errors->has('name'))
                                    <p class="small text-danger mt-5">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required">Engine</label>
                                <input type="text" class="form-control" name="engine" value="{{ $errors->has('engine') ? old('engine') : $boat->engine }}">
                                @if ($errors->has('engine'))
                                    <p class="small text-danger mt-5">{{ $errors->first('engine') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required">Capacity</label>
                                <input type="text" class="form-control" name="capacity" value="{{ $errors->has('capacity') ? old('capacity') : $boat->capacity }}">
                                @if ($errors->has('capacity'))
                                    <p class="small text-danger mt-5">{{ $errors->first('capacity') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required">Length</label>
                                <input type="text" class="form-control" name="length" value="{{ $errors->has('length') ? old('length') : $boat->length }}">
                                @if ($errors->has('length'))
                                    <p class="small text-danger mt-5">{{ $errors->first('length') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required">Width</label>
                                <input type="text" class="form-control" name="width" value="{{ $errors->has('width') ? old('width') : $boat->width }}">
                                @if ($errors->has('width'))
                                    <p class="small text-danger mt-5">{{ $errors->first('width') }}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                            <a href="{{ route('boat') }}" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
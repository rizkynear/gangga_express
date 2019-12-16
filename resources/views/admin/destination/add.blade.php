@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Add Destinations
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Destinations</li>
            <li class="active">Add Destinations</li>
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
                                <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#"><i class="fa fa-plus" aria-hidden="true"></i> Add Destinations</button> -->
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <form action="{{ route('destination.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="required">Photo</label>
                                <div class="row row-custom">
                                    <div class="col-sm-3">
                                        <img class="img-responsive margin-bot-10 image-preview" src="http://via.placeholder.com/400x300" alt="">
                                        <input type="hidden" class="x-coordinate" name="x_coordinate">
                                        <input type="hidden" class="y-coordinate" name="y_coordinate">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image" class="destination-image">
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
                            <hr>
                            <div class="form-group">
                                <label class="required">Destination Name</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <p class="small text-danger mt-5">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required">Map Location</label>
                                <span class="text-muted">(Set the location address manually to be more accurate)</span>
                                <input type="text" class="form-control" id="loc-address" name="location" value="{{ old('location') }}">
                                @if ($errors->has('location'))
                                    <p class="small text-danger mt-5">{{ $errors->first('location') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <div id="loc"></div>
                                <input type="hidden" name="latitude" id="loc-lat">
                                <input type="hidden" name="longitude" id="loc-lon">
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                            <a href="{{ route('destination') }}" class="btn btn-default">Cancel</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<!--MAP-->
<script src="{{ asset('js/locationpicker.jquery.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
<!--MAP END-->

<script type="text/javascript">
    $(document).ready(function() {

        // BOOTSTRAP LOCATION PICKER
        $('#loc').locationpicker({
            location: {
                latitude: "{{ old('latitude') ?? '-8.6821245'}}",
                longitude: "{{ old('longitude') ?? '115.1652808'}}"
            },
            radius: 300,
            inputBinding: {
                latitudeInput: $('#loc-lat'),
                longitudeInput: $('#loc-lon'),
                radiusInput: $('#loc-radius')
            },
            enableAutocomplete: true
        });

        $(".destination-image").change(function() {
            var parent = $(this).parent().parent().parent().parent().parent();
            var input = this;

            $.ajax({
                url: "{{ route('destination.cropBox') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success:function(data) {
                    imageCropper(input, parent, data.width, data.height);
                }
            });
        });
    });
</script>
@endsection
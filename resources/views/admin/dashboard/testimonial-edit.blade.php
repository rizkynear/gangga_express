@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Edit Testimonial
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <form action="{{ route('testimonial.update', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label class="required">Photo</label>
                                <div class="row row-custom">
                                    <div class="col-sm-3">
                                        <img class="img-responsive margin-bot-10 image-preview" src="{{ asset('storage/images/testimonials/thumbnail/' . $testimonial->image) }}" alt="">
                                        <input type="hidden" class="x-coordinate" name="x_coordinate">
                                        <input type="hidden" class="y-coordinate" name="y_coordinate">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image" class="testimonial-image">
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
                                <input type="text" class="form-control" name="name" value="{{ $errors->has('name') ? old('name') : $testimonial->name }}">
                                @if ($errors->has('name'))
                                    <p class="small text-danger mt-5">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required">Nationality</label>
                                <input type="text" class="form-control" name="nationality" value="{{ $errors->has('nationality') ? old('nationality') : $testimonial->nationality }}">
                                @if ($errors->has('nationality'))
                                    <p class="small text-danger mt-5">{{ $errors->first('nationality') }}</p>
                                @endif
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#testimonial-en"><img src="{{ asset('storage/images/admin/flag_gb.png') }}" alt=""> English</a></li>
                                <li><a data-toggle="tab" href="#testimonial-id"><img src="{{ asset('storage/images/admin/flag_id.jpg') }}" alt=""> Indonesia</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="testimonial-en" class="tab-pane fade in active">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Description</label>
                                            <textarea class="ckeditor" name="description_en">{{ $errors->has('description_en') ? old('description_en') : $testimonial->translate('en')->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="testimonial-id" class="tab-pane fade">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Description</label>
                                            <textarea class="ckeditor" name="description_id">{{ $errors->has('description_id') ? old('description_id') : $testimonial->translate('id')->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('description_en'))
                                    <p class="small text-danger mt-5">{{ $errors->first('description_en') }}</p>
                                @endif
                                @if ($errors->has('description_id'))
                                    <p class="small text-danger mt-5">{{ $errors->first('description_id') }}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-default">Cancel</a>
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
    $(document).ready(function() {
        $(".testimonial-image").change(function() {
            var parent = $(this).parent().parent().parent().parent().parent();
            var input = this;

            $.ajax({
                url: "{{ route('testimonial.cropBox') }}",
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
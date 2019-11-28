@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="font18 my-5">Image Slider</h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add-slider"><i class="fa fa-plus" aria-hidden="true"></i> Add Image</button>
                            </div>
                        </div>

                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 150px;">Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                    <tr>
                                        <td>
                                            <span class="display-xs-block"><img class="img-responsive img-xs" src="{{ asset('storage/images/sliders/thumbnail/' . $slider->image) }}" alt=""></span>
                                        </td>
                                        <td>
                                            <span class="display-xs-inline-block" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-primary edit-slider" data-id="{{ $slider->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></button></span>
                                            <span class="display-xs-inline-block" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger delete-slider" data-id="{{ $slider->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button></span>
                                            <form action="" method="post" style="display: inline-block">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $slider->id }}">
                                                <span class="display-xs-inline-block" data-toggle="tooltip" title="Up"><button type="submit" class="btn btn-direction" formaction="{{ route('slider.up') }}"><i class="fa fa-arrow-up" aria-hidden="true"></i></button></span>
                                                <span class="display-xs-inline-block" data-toggle="tooltip" title="Down"><button type="submit" class="btn btn-direction" formaction="{{ route('slider.down') }}"><i class="fa fa-arrow-down" aria-hidden="true"></i></button></span>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="font18 my-5">Second Section</h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-edit-image2"><i class="fa fa-plus" aria-hidden="true"></i> Edit Image 1</button>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-edit-image2"><i class="fa fa-plus" aria-hidden="true"></i> Edit Image 2</button>
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
                        @elseif ($errors->secondSectionSave->has('*'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                @foreach ($errors->secondSectionSave->all() as $error)
                                    <p><i class="icon fa fa-check"></i>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <!--SAMPLE ALERT END-->
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#desc-en"><img src="img/flag_gb.png" alt=""> English</a></li>
                            <li><a data-toggle="tab" href="#desc-id"><img src="img/flag_id.jpg" alt=""> Indonesia</a></li>
                        </ul>
                        <form method="post" action="{{ route('second-section.save') }}">
                            @csrf
                            <div class="tab-content">
                                <div id="desc-en" class="tab-pane fade in active">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            @if (is_null($secondSection))
                                                <input type="text" name="title_en" class="form-control" value="{{ '' ?? old('title_en') }}">
                                            @else 
                                                <input type="text" name="title_en" class="form-control" value="{{ $errors->secondSectionSave->has('title_en') ? old('title_en') : $secondSection->translate('en')->title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Sub Title</label>
                                            @if (is_null($secondSection))
                                                <input type="text" name="sub_title_en" class="form-control" value="{{ '' ?? old('sub_title_en') }}">
                                            @else
                                                <input type="text" name="sub_title_en" class="form-control" value="{{ $errors->secondSectionSave->has('sub_title_en') ? old('sub_title_en') : $secondSection->translate('en')->sub_title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Content</label>
                                            @if (is_null($secondSection))
                                                <textarea id="second-section-ckeditor-en" rows="5" name="content_en" class="form-controler"> {{ '' ?? old('content_en') }}</textarea>
                                            @else 
                                                <textarea id="second-section-ckeditor-en" rows="5" name="content_en" class="form-controler"> {{ $errors->secondSectionSave->has('content_en') ? old('content_en') : $secondSection->translate('en')->content }}</textarea>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div id="desc-id" class="tab-pane fade">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            @if (is_null($secondSection))
                                                <input type="text" name="title_id" class="form-control" value="{{ '' ?? old('title_id') }}">
                                            @else 
                                                <input type="text" name="title_id" class="form-control" value="{{ $errors->secondSectionSave->has('title_id') ? old('title_id') : $secondSection->translate('id')->title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Sub Title</label>
                                            @if (is_null($secondSection))
                                                <input type="text" name="sub_title_id" class="form-control" value="{{ '' ?? old('sub_title_id') }}">
                                            @else
                                                <input type="text" name="sub_title_id" class="form-control" value="{{ $errors->secondSectionSave->has('sub_title_id') ? old('sub_title_id') : $secondSection->translate('id')->sub_title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Content</label>
                                            @if (is_null($secondSection))
                                                <textarea id="second-section-ckeditor-id" rows="5" name="content_id" class="form-controler"> {{ '' ?? old('content_id') }}</textarea>
                                            @else 
                                                <textarea id="second-section-ckeditor-id" rows="5" name="content_id" class="form-controler"> {{ $errors->secondSectionSave->has('content_id') ? old('content_id') : $secondSection->translate('id')->content }}</textarea>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="font18 my-5">Testimonial</h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add-testimonial"><i class="fa fa-plus" aria-hidden="true"></i> Add Testimonial</button>
                            </div>
                        </div>

                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 250px;">Image</th>
                                        <th style="width: 450px;">Name</th>
                                        <th style="width: 450px;">Description</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $testimonial)
                                    <tr>
                                        <td>
                                            <span class="display-xs-block"><img class="img-responsive img-xs" src="{{ asset('storage/images/testimonials/thumbnail/' . $testimonial->image) }}" alt=""></span>
                                        </td>
                                        <td>
                                            <span class="display-xs-block"><strong>{{ $testimonial->name }}</strong></span>
                                            <span class="display-xs-block">{{ $testimonial->nationality }}</span>
                                        </td>
                                        <td>
                                            <span class="display-xs-block">{{ $testimonial->description }}</span>
                                        </td>
                                        <td>
                                            <span class="display-xs-inline-block" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-package"><i class="fa fa-pencil" aria-hidden="true"></i></button></span>
                                            <span class="display-xs-inline-block" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-confirmation"><i class="fa fa-trash" aria-hidden="true"></i></button></span>
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

    <!--MODAL ADD SLIDER-->
    <div class="modal fade" id="modal-add-slider" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="title-main">Add Image</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="required">Photo</label>
                            <div class="row row-custom">
                                <div class="col-sm-4">
                                    <img class="img-responsive margin-bot-10" src="http://via.placeholder.com/700x400" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" value="No file chosen" readonly="">
                                    </div>
                                    @if ($errors->sliderStore->has('image'))
                                        <p class="small text-danger mt-5">{{ $errors->sliderStore->first('image') }}</p>
                                    @endif
                                </div>
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
    <!--MODAL ADD SLIDER END-->

    <!--MODAL EDIT SLIDER-->
    <div class="modal fade" id="modal-edit-slider" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="title-main">Edit Image</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('slider.edit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="required">Photo</label>
                            <div class="row row-custom">
                                <div class="col-sm-4">
                                    <img id="edit-slider-image" class="img-responsive margin-bot-10" src="http://via.placeholder.com/700x400" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" value="No file chosen" readonly="">
                                    </div>
                                    @if ($errors->sliderEdit->has('image'))
                                        <p class="small text-danger mt-5">{{ $errors->sliderEdit->first('image') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <input type="hidden" id="edit-slider-id" name="id">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--MODAL EDIT SLIDER END-->

    <!--MODAL DELETE SLIDER-->
    <div class="modal fade" id="modal-delete-slider" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="my-20">
                        <h4 class="title-main mt-0 mb-10">Delete?</h4>
                        <p>Are you sure want to delete this item?</p>
                    </div>
                    <form action="{{ route('slider.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="delete-slider-id" value="">
                        <button class="btn btn-danger mr-5" type="submit"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        <button class="btn btn-default" type="submit" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--MODAL DELETE END-->

    <!--MODAL ADD TESTIMONI-->
    <div class="modal fade" id="modal-add-testimonial" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="title-main">Add Testimonial</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('testimonial.store') }}" method="post">
                        <div class="form-group">
                            <label class="required">Photo</label>
                            <div class="row row-custom">
                                <div class="col-sm-4">
                                    <img class="img-responsive margin-bot-10" src="http://via.placeholder.com/700x400" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" value="No file chosen" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="required">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label class="required">Nationality</label>
                            <input type="text" class="form-control" name="nationality" value="{{ old('nationality') }}">
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#testimonial-en"><img src="img/flag_gb.png" alt=""> English</a></li>
                            <li><a data-toggle="tab" href="#testimonial-id"><img src="img/flag_id.jpg" alt=""> Indonesia</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="testimonial-en" class="tab-pane fade in active">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="required">Description</label>
                                        <textarea id="testimonial-ckeditor-en" name="description_en"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div id="testimonial-id" class="tab-pane fade">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="required">Description</label>
                                        <textarea id="testimonial-ckeditor-id" name="description_id"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        <button type="button" data-dismiss="modal"class="btn btn-default">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--MODAL ADD TESTIMONI END-->

</div>
@endsection

@section('script')

@if ($errors->sliderStore->has('image'))
    <script>
        $('#modal-add-slider').modal();
    </script>
@elseif ($errors->sliderEdit->has('image'))
    <script>
        $('#modal-edit-slider').modal();
    </script>
@endif

<script>
    $(document).ready(function() {
        $('.edit-slider').click(function() {
            var id = $(this).data('id');

            $('#edit-slider-id').attr('value', id);
            $('#modal-edit-slider').modal();
        });

        $('.delete-slider').click(function() {
            var id = $(this).data('id');

            $('#delete-slider-id').attr('value', id);
            $('#modal-delete-slider').modal();
        });
    })
</script>

<!-- CKEditor -->
<script>
    CKEDITOR.replace('second-section-ckeditor-en', {
        filebrowserUploadUrl: "{{ route('second-section.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });
    
    CKEDITOR.replace('second-section-ckeditor-id', {
        filebrowserUploadUrl: "{{ route('second-section.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });

    CKEDITOR.replace('testimonial-ckeditor-en', {
        filebrowserUploadUrl: "{{ route('second-section.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });

    CKEDITOR.replace('testimonial-ckeditor-id', {
        filebrowserUploadUrl: "{{ route('second-section.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>
<!-- CKEditor END -->

@endsection
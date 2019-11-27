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
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add-image"><i class="fa fa-plus" aria-hidden="true"></i> Add Image</button>
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
                                                <input type="hidden" name="position" value="{{ $slider->position }}">
                                                <span class="display-xs-inline-block" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-image"><i class="fa fa-pencil" aria-hidden="true"></i></button></span>
                                                <span class="display-xs-inline-block" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-confirmation"><i class="fa fa-trash" aria-hidden="true"></i></button></span>
                                                <span class="display-xs-inline-block" data-toggle="tooltip" title="Up"><button type="button" class="btn btn-direction" data-toggle="modal" data-target="#"><i class="fa fa-arrow-up" aria-hidden="true"></i></button></span>
                                                <span class="display-xs-inline-block" data-toggle="tooltip" title="Down"><button type="button" class="btn btn-direction" data-toggle="modal" data-target="#"><i class="fa fa-arrow-down" aria-hidden="true"></i></button></span>
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
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-check"></i> Successfully Saved!</p>
                        </div>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-check"></i> Please fill all the required fields!</p>
                        </div>
                        <!--SAMPLE ALERT END-->
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#desc-en"><img src="img/flag_gb.png" alt=""> English</a></li>
                            <li><a data-toggle="tab" href="#desc-id"><img src="img/flag_id.jpg" alt=""> Indonesia</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="desc-en" class="tab-pane fade in active">
                                <div class="box-body">
                                    <!--FORM-->
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            <input type="text" name="title_en"class="form-control" value="{{ $secondSection->translate('en')->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Sub Title</label>
                                            <input type="text" name="sub_title_en" class="form-control" value="{{ $secondSection->translate('en')->sub_title }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Content</label>
                                            <textarea id="terms-conditions" rows="5" name="content_en">{{ $secondSection->translate('en')->content }}</textarea>
                                            <script>
                                                ClassicEditor
                                                    .create(document.querySelector('#terms-conditions'), {
                                                        removePlugins: ['Table', 'MediaEmbed']
                                                    })
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                            </script>
                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes</button>
                                        </div>
                                    </form>
                                    <!--FORM END-->

                                </div>
                            </div>
                            <div id="desc-id" class="tab-pane fade">
                                <div class="box-body">
                                    <!--FORM-->
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            <input type="text" name="title_id" class="form-control" value="{{ $secondSection->translate('id')->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Sub Title</label>
                                            <input type="text" name="sub_title_id" class="form-control" value="{{ $secondSection->translate('id')->sub_title }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Content</label>
                                            <textarea id="text-id" rows="5" name="content_id">{{ $secondSection->translate('id')->content }}</textarea>
                                            <script>
                                                ClassicEditor
                                                    .create(document.querySelector('#text-id'), {
                                                        removePlugins: ['Table', 'MediaEmbed']
                                                    })
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                            </script>
                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes</button>
                                        </div>
                                    </form>
                                    <!--FORM END-->

                                </div>
                            </div>
                        </div>
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

    <!--MODAL ADD IMAGE-->
    <div class="modal fade" id="modal-add-image" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="title-main">Add Image</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('slider.store') }}" method="post">
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
                                            <!-- <span class="btn btn-primary btn-file">
                                                <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="slider_image">
                                            </span> -->
                                            <input type="file" name="slider_image">
                                        </span>
                                        <!-- <input type="text" class="form-control" value="No file chosen" readonly=""> -->
                                    </div>
                                    @if ($errors->has('slider_image'))
                                        <p class="small text-danger mt-5">{{ $errors->first('slider_image') }}</p>
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
    <!--MODAL ADD IMAGE END-->

    <!--MODAL ADD IMAGE 2 -->
    <div class="modal fade" id="modal-edit-image2" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="title-main">Edit Image</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
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
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--MODAL ADD IMAGE END-->

    <!--MODAL ADD TESTIMONI-->
    <div class="modal fade" id="modal-add-testimonial" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="title-main">Add Testimonial</h4>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#testimonial-en"><img src="img/flag_gb.png" alt=""> English</a></li>
                        <li><a data-toggle="tab" href="#testimonial-id"><img src="img/flag_id.jpg" alt=""> Indonesia</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="testimonial-en" class="tab-pane fade in active">
                            <div class="box-body">
                                <form action="" method="post">
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
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="required">Nationality</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="required">Description</label>
                                        <textarea id="testimonial-text-en"></textarea>
                                        <script>
                                            ClassicEditor
                                                .create(document.querySelector('#testimonial-text-en'), {
                                                    removePlugins: ['Table', 'MediaEmbed']
                                                })
                                                .catch(error => {
                                                    console.error(error);
                                                });
                                        </script>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                    <button class="btn btn-default">Cancel</button>
                                </form>
                            </div>
                        </div>
                        <div id="testimonial-id" class="tab-pane fade">
                            <div class="box-body">
                                <form action="" method="post">
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
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="required">Nationality</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="required">Description</label>
                                        <textarea id="testimonial-text-id"></textarea>
                                        <script>
                                            ClassicEditor
                                                .create(document.querySelector('#testimonial-text-id'), {
                                                    removePlugins: ['Table', 'MediaEmbed']
                                                })
                                                .catch(error => {
                                                    console.error(error);
                                                });
                                        </script>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                    <button class="btn btn-default">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MODAL ADD TESTIMONI END-->

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
</div>
@endsection

@section('script')

@if (session('modal') === 'slider-modal')
    <script>
         $('#modal-add-image').modal();
    </script>
@endif

@endsection
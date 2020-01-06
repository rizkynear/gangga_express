@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            The Company
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li>About us</li>
            <li class="active">The Company</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">

                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="font18 my-5">First Section</h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                @if (is_null($companyFirst))
                                    <button type="button" class="btn btn-default edit-first-section-image"><i class="fa fa-plus" aria-hidden="true"></i> Edit Image</button>
                                @else
                                    <button type="button" class="btn btn-default edit-first-section-image" data-image="{{ $companyFirst->image }}"><i class="fa fa-plus" aria-hidden="true"></i> Edit Image</button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <!--SAMPLE ALERT-->
                        @if (session()->has('first-success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-check"></i>{{ session('first-success') }}</p>
                            </div>
                        @elseif ($errors->companyFirstSave->has('*'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                @foreach ($errors->companyFirstSave->all() as $error)
                                    <p><i class="icon fa fa-check"></i>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <!--SAMPLE ALERT END-->
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#first-en"><img src="{{ asset('storage/images/admin/flag_gb.png') }}" alt=""> English</a></li>
                            <li><a data-toggle="tab" href="#first-id"><img src="{{ asset('storage/images/admin/flag_id.jpg') }}" alt=""> Indonesia</a></li>
                        </ul>
                        <form method="post" action="{{ route('company.first.save') }}">
                            @csrf
                            <div class="tab-content">
                                <div id="first-en" class="tab-pane fade in active">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            @if (is_null($companyFirst) || is_null($companyFirst->translate()))
                                                <input type="text" name="first_title_en" class="form-control" value="{{ old('first_title_en') ?? '' }}">
                                            @else
                                                <input type="text" class="form-control" name="first_title_en" value="{{ $errors->has('first_title_en') ? old('first_title_en') : $companyFirst->translate('en')->title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Sub Title</label>
                                            @if (is_null($companyFirst) || is_null($companyFirst->translate()))
                                                <input type="text" name="first_sub_title_en" class="form-control" value="{{ old('first_sub_title_en') ?? '' }}">
                                            @else
                                                <input type="text" class="form-control" name="first_sub_title_en" value="{{ $errors->has('first_sub_title_en') ? old('first_sub_title_en') : $companyFirst->translate('en')->sub_title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Content</label>
                                            @if (is_null($companyFirst) || is_null($companyFirst->translate()))
                                                <textarea class="ckeditor" name="first_content_en">{{ old('first_content_en') ?? '' }}</textarea>
                                            @else
                                                <textarea class="ckeditor" name="first_content_en">{{ $errors->has('first_content_en') ? old('first_content_en') : $companyFirst->translate('en')->content }}</textarea>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div id="first-id" class="tab-pane fade">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            @if (is_null($companyFirst) || is_null($companyFirst->translate()))
                                                <input type="text" name="first_title_id" class="form-control" value="{{ old('first_title_id') ?? '' }}">
                                            @else
                                                <input type="text" class="form-control" name="first_title_id" value="{{ $errors->has('first_title_id') ? old('first_title_id') : $companyFirst->translate('id')->title }}">
                                            @endif    
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Sub Title</label>
                                            @if (is_null($companyFirst) || is_null($companyFirst->translate()))
                                                <input type="text" name="first_sub_title_id" class="form-control" value="{{ old('first_sub_title_id') ?? '' }}">
                                            @else
                                                <input type="text" class="form-control" name="first_sub_title_id" value="{{ $errors->has('first_sub_title_id') ? old('first_sub_title_id') : $companyFirst->translate('id')->sub_title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Content</label>
                                            @if (is_null($companyFirst) || is_null($companyFirst->translate()))
                                                <textarea class="ckeditor" name="first_content_id">{{ old('first_content_id') ?? '' }}</textarea>
                                            @else
                                                <textarea class="ckeditor" name="first_content_id">{{ $errors->has('first_content_id') ? old('first_content_id') : $companyFirst->translate('id')->content }}</textarea>
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
                                <h2 class="font18 my-5">Second Section</h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                @if (is_null($companySecond))
                                    <button type="button" class="btn btn-default edit-second-section-image"><i class="fa fa-plus" aria-hidden="true"></i> Edit Image</button>
                                @else
                                    <button type="button" class="btn btn-default edit-second-section-image" data-image="{{ $companySecond->image }}"><i class="fa fa-plus" aria-hidden="true"></i> Edit Image</button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <!--SAMPLE ALERT-->
                        @if (session()->has('second-success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-check"></i>{{ session('second-success') }}</p>
                            </div>
                        @elseif ($errors->companySecondSave->has('*'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                @foreach ($errors->companySecondSave->all() as $error)
                                    <p><i class="icon fa fa-check"></i>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <!--SAMPLE ALERT END-->
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#second-en"><img src="{{ asset('storage/images/admin/flag_gb.png') }}" alt=""> English</a></li>
                            <li><a data-toggle="tab" href="#second-id"><img src="{{ asset('storage/images/admin/flag_id.jpg') }}" alt=""> Indonesia</a></li>
                        </ul>
                        <form method="post" action="{{ route('company.second.save') }}">
                            @csrf
                            <div class="tab-content">
                                <div id="second-en" class="tab-pane fade in active">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            @if (is_null($companySecond) || is_null($companySecond->translate()))
                                                <input type="text" name="second_title_en" class="form-control" value="{{ old('second_title_en') ?? '' }}">
                                            @else
                                                <input type="text" class="form-control" name="second_title_en" value="{{ $errors->has('second_title_en') ? old('second_title_en') : $companySecond->translate('en')->title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Sub Title</label>
                                            @if (is_null($companySecond) || is_null($companySecond->translate()))
                                                <input type="text" name="second_sub_title_en" class="form-control" value="{{ old('second_sub_title_en') ?? '' }}">
                                            @else
                                                <input type="text" class="form-control" name="second_sub_title_en" value="{{ $errors->has('second_sub_title_en') ? old('second_sub_title_en') : $companySecond->translate('en')->sub_title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Content</label>
                                            @if (is_null($companySecond) || is_null($companySecond->translate()))
                                                <textarea class="ckeditor" name="second_content_en">{{ old('second_content_en') ?? '' }}</textarea>
                                            @else
                                                <textarea class="ckeditor" name="second_content_en">{{ $errors->has('second_content_en') ? old('second_content_en') : $companySecond->translate('en')->content }}</textarea>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div id="second-id" class="tab-pane fade">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            @if (is_null($companySecond) || is_null($companySecond->translate()))
                                                <input type="text" name="second_title_id" class="form-control" value="{{ old('second_title_id') ?? '' }}">
                                            @else
                                                <input type="text" class="form-control" name="second_title_id" value="{{ $errors->has('second_title_id') ? old('second_title_id') : $companySecond->translate('id')->title }}">
                                            @endif    
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Sub Title</label>
                                            @if (is_null($companySecond) || is_null($companySecond->translate()))
                                                <input type="text" name="second_sub_title_id" class="form-control" value="{{ old('second_sub_title_id') ?? '' }}">
                                            @else
                                                <input type="text" class="form-control" name="second_sub_title_id" value="{{ $errors->has('second_sub_title_id') ? old('second_sub_title_id') : $companySecond->translate('id')->sub_title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Content</label>
                                            @if (is_null($companySecond) || is_null($companySecond->translate()))
                                                <textarea class="ckeditor" name="second_content_id">{{ old('second_content_id') ?? '' }}</textarea>
                                            @else
                                                <textarea class="ckeditor" name="second_content_id">{{ $errors->has('second_content_id') ? old('second_content_id') : $companySecond->translate('id')->content }}</textarea>
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
        </div>
    </section>

    <!--MODAL EDIT FIRST SECTION IMAGE-->
    <div class="modal fade" id="modal-edit-first-section-image" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="title-main">Edit Image</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('company.first.edit-image') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="required">Photo</label>
                            <div class="row row-custom">
                                <div class="col-sm-4">
                                    <img class="img-responsive margin-bot-10 image-preview" id="first-section-image" src="http://via.placeholder.com/700x400" alt="">
                                    <input type="hidden" class="x-coordinate" name="x_coordinate">
                                    <input type="hidden" class="y-coordinate" name="y_coordinate">
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image" class="first-image">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" value="No file chosen" readonly="">
                                    </div>
                                    @if ($errors->companyFirstEditImage->has('*'))
                                        <p class="small text-danger mt-5">{{ $errors->companyFirstEditImage->first() }}</p>
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
    <!--MODAL EDIT FIRST SECTION END-->

    <!--MODAL EDIT SECOND SECTION IMAGE-->
    <div class="modal fade" id="modal-edit-second-section-image" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="title-main">Edit Image</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('company.second.edit-image') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="required">Photo</label>
                            <div class="row row-custom">
                                <div class="col-sm-4">
                                    <img class="img-responsive margin-bot-10 image-preview" id="second-section-image" src="http://via.placeholder.com/700x400" alt="">
                                    <input type="hidden" class="x-coordinate" name="x_coordinate">
                                    <input type="hidden" class="y-coordinate" name="y_coordinate">
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image" class="second-image">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" value="No file chosen" readonly="">
                                    </div>
                                    @if ($errors->companySecondEditImage->has('*'))
                                        <p class="small text-danger mt-5">{{ $errors->companySecondEditImage->first() }}</p>
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
    <!--MODAL EDIT SECOND SECTION END-->
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $(".first-image").change(function() {
            var parent = $(this).parent().parent().parent().parent().parent();
            var input = this;

            $.ajax({
                url: "{{ route('company.first.cropBox') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success:function(data) {
                    imageCropper(input, parent, data.width, data.height);
                }
            });
        });

        $(".second-image").change(function() {
            var parent = $(this).parent().parent().parent().parent().parent();
            var input = this;

            $.ajax({
                url: "{{ route('company.second.cropBox') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success:function(data) {
                    imageCropper(input, parent, data.width, data.height);
                }
            });
        });

        $('.edit-first-section-image').click(function() {
            $('#first-section-image').attr('src', "http://via.placeholder.com/500x400");
            
            if ($(this).data('image')) {
                var image = $(this).data('image');
                $('#first-section-image').attr('src', "{{ asset('storage/images/company-firsts/thumbnail') }}" + '/' + image);
            }

            $('#modal-edit-first-section-image').modal();
        });
        
        $('.edit-second-section-image').click(function() {
            $('#second-section-image').attr('src', "http://via.placeholder.com/1110x400");
            
            if ($(this).data('image')) {
                var image = $(this).data('image');
                $('#second-section-image').attr('src', "{{ asset('storage/images/company-seconds/thumbnail') }}" + '/' + image);
            }

            $('#modal-edit-second-section-image').modal();
        });
    });

</script>
@endsection
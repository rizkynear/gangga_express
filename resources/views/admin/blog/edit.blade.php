@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Edit Blog
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-body">
                        @if ($errors->has('*'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                @foreach ($errors->all() as $error)
                                    <p><i class="icon fa fa-check"></i>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label class="required">Photo</label>
                                <div class="row row-custom">
                                    <div class="col-sm-3">
                                        <img class="img-responsive margin-bot-10 image-preview" src="{{ asset('storage/images/blogs/thumbnail/' . $blog->image) }}" alt="">
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
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#desc-en"><img src="{{ asset('storage/images/admin/flag_gb.png') }}" alt=""> English</a></li>
                                <li><a data-toggle="tab" href="#desc-id"><img src="{{ asset('storage/images/admin/flag_id.jpg') }}" alt=""> Indonesia</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="blog-en" class="tab-pane fade in active">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            <input type="text" class="form-control" name="title_en" value="{{ $errors->has('title_en') ? old('title_en') : $blog->translate('en')->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Description</label>
                                            <textarea class="ckeditor" name="description_en">{{ $errors->has('description_en') ? old('description_en') : $blog->translate('en')->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="blog-id" class="tab-pane fade">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            <input type="text" class="form-control" name="title_id" value="{{ $errors->has('title_id') ? old('title_id') : $blog->translate('id')->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Description</label>
                                            <textarea class="ckeditor" name="description_id">{{ $errors->has('description_id') ? old('description_id') : $blog->translate('id')->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                            <a href="{{ route('blog') }}" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
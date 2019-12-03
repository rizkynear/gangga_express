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
                        <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label class="required">Photo</label>
                                <div class="row row-custom">
                                    <div class="col-sm-2">
                                        <img class="img-responsive margin-bot-10" src="{{ asset('storage/images/blogs/thumbnail/' . $blog->image) }}" alt="">
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image">
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
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#blog-en"><img src="img/flag_gb.png" alt=""> English</a></li>
                                <li><a data-toggle="tab" href="#blog-id"><img src="img/flag_id.jpg" alt=""> Indonesia</a></li>
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
                                @if ($errors->has('title_en'))
                                <p class="small text-danger mt-5">{{ $errors->first('title_en') }}</p>
                                @endif

                                @if ($errors->has('title_id'))
                                    <p class="small text-danger mt-5">{{ $errors->first('title_id') }}</p>
                                @endif

                                @if ($errors->has('description_en'))
                                <p class="small text-danger mt-5">{{ $errors->first('description_en') }}</p>
                                @endif

                                @if ($errors->has('description_id'))
                                <p class="small text-danger mt-5">{{ $errors->first('description_id') }}</p>
                                @endif
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
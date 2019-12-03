@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Add Blog
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('blog') }}">Blog</a></li>
            <li class="active">Add Blog</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">

                    <div class="box-body">
                        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="required">Photo</label>
                                <div class="row row-custom">
                                    <div class="col-sm-2">
                                        <img class="img-responsive margin-bot-10" src="http://via.placeholder.com/158x181" alt="">
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

                            <ul class="nav nav-tabs margin-top-30">
                                <li class="active"><a data-toggle="tab" href="#news-id"><img src="img/flag_id.jpg" alt=""> Indonesia</a></li>
                                <li><a data-toggle="tab" href="#news-en"><img src="img/flag_gb.png" alt=""> English</a></li>
                            </ul>
                            <div class="tab-content">
                                <!--INDONESIA-->
                                <div id="news-id" class="tab-pane fade in active">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            <input type="text" class="form-control" name="title_id" value="{{ old('title_id') }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Description</label>
                                            <textarea class="ckeditor" name="description_id">{{ old('description_id') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--INDONESIA END-->
                                <!--ENGLISH-->
                                <div id="news-en" class="tab-pane fade">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="title_en" value="{{ old('title_en') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="ckeditor" name="description_en">{{ old('description_en') }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <!--ENGLISH END-->
                                @if ($errors->has('title_id'))
                                    <p class="small text-danger mt-5">{{ $errors->first('title_id') }}</p>
                                @endif

                                @if ($errors->has('description_id'))
                                    <p class="small text-danger mt-5">{{ $errors->first('description_id') }}</p>
                                @endif

                                @if ($errors->has('title_en'))
                                    <p class="small text-danger mt-5">{{ $errors->first('title_en') }}</p>
                                @endif

                                @if ($errors->has('description_en'))
                                    <p class="small text-danger mt-5">{{ $errors->first('description_en') }}</p>
                                @endif
                            </div>
                            <div class="box-body">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                <a href="{{ route('blog') }}" class="btn btn-default">Cancel</a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            The Company
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
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
                        </div>
                    </div>

                    <div class="box-body">
                        <!--SAMPLE ALERT-->
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-check"></i>{{ session('success') }}</p>
                            </div>
                        @elseif ($errors->has('*'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                @foreach ($errors->all() as $error)
                                    <p><i class="icon fa fa-check"></i>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <!--SAMPLE ALERT END-->
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#desc-en"><img src="{{ asset('storage/images/admin/flag_gb.png') }}" alt=""> English</a></li>
                            <li><a data-toggle="tab" href="#desc-id"><img src="{{ asset('storage/images/admin/flag_id.jpg') }}" alt=""> Indonesia</a></li>
                        </ul>
                        <form method="post" action="{{ route('company.save') }}">
                            @csrf
                            <div class="tab-content">
                                <div id="desc-en" class="tab-pane fade in active">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            @if (is_null($company))
                                                <input type="text" name="title_en" class="form-control" value="{{ old('title_en') ?? '' }}">
                                            @else
                                                <input type="text" class="form-control" name="title_en" value="{{ $errors->has('title_en') ? old('title_en') : $company->translate('en')->title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Sub Title</label>
                                            @if (is_null($company))
                                                <input type="text" name="sub_title_en" class="form-control" value="{{ old('sub_title_en') ?? '' }}">
                                            @else
                                                <input type="text" class="form-control" name="sub_title_en" value="{{ $errors->has('sub_title_en') ? old('sub_title_en') : $company->translate('en')->sub_title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Content</label>
                                            @if (is_null($company))
                                                <textarea class="ckeditor" name="content_en">{{ old('content_en') ?? '' }}</textarea>
                                            @else
                                                <textarea class="ckeditor" name="content_en">{{ $errors->has('content_en') ? old('content_en') : $company->translate('en')->content }}</textarea>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div id="desc-id" class="tab-pane fade">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            @if (is_null($company))
                                                <input type="text" name="title_id" class="form-control" value="{{ old('title_id') ?? '' }}">
                                            @else
                                                <input type="text" class="form-control" name="title_id" value="{{ $errors->has('title_id') ? old('title_id') : $company->translate('id')->title }}">
                                            @endif    
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Sub Title</label>
                                            @if (is_null($company))
                                                <input type="text" name="sub_title_id" class="form-control" value="{{ old('sub_title_id') ?? '' }}">
                                            @else
                                                <input type="text" class="form-control" name="sub_title_id" value="{{ $errors->has('sub_title_id') ? old('sub_title_id') : $company->translate('id')->sub_title }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Content</label>
                                            @if (is_null($company))
                                                <textarea class="ckeditor" name="content_id">{{ old('content_id') ?? '' }}</textarea>
                                            @else
                                                <textarea class="ckeditor" name="content_id">{{ $errors->has('content_id') ? old('content_id') : $company->translate('id')->content }}</textarea>
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
</div>
@endsection
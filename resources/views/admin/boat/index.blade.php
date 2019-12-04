@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Our Boat
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="active">Our Boat</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">

                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add-boat"><i class="fa fa-plus" aria-hidden="true"></i> Add Boat</button>
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
                        @endif
                        <!--SAMPLE ALERT END-->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Boat name</th>
                                        <th>Engine</th>
                                        <th>Capacity</th>
                                        <th>Length</th>
                                        <th>Width</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($boats as $boat)
                                        <tr>
                                            <td>
                                                <span class="display-xs-block">{{ $boat->name }}</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">{{ $boat->engine }}</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">{{ $boat->capacity }}</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">{{ $boat->length }}</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">{{ $boat->width }}</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-inline-block" data-toggle="tooltip" title="Edit"><a href="{{ route('boat.edit', $boat->id) }}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a></span>
                                                <span class="display-xs-inline-block" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger delete-boat" data-action="{{ route('boat.delete', $boat->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></button></span>
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
    <!--MODAL ADD BOAT-->
    <div class="modal fade" id="modal-add-boat" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="title-main">Add Boat</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('boat.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="required">Photo</label>
                                <div class="row row-custom">
                                    <div class="col-sm-4">
                                        <img class="img-responsive margin-bot-10" src="http://via.placeholder.com/158x181" alt="">
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
                                        @if ($errors->has('image'))
                                            <p class="small text-danger mt-5">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="required">Boat Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <p class="small text-danger mt-5">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="row row-custom">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="required">Boat Engine</label>
                                        <input type="text" name="engine" class="form-control" value="{{ old('engine') }}">
                                        @if ($errors->has('engine'))
                                            <p class="small text-danger mt-5">{{ $errors->first('engine') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="required">Boat Capacity</label>
                                        <input type="text" name="capacity" class="form-control" value="{{ old('capacity') }}">
                                        @if ($errors->has('capacity'))
                                            <p class="small text-danger mt-5">{{ $errors->first('capacity') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row row-custom">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="required">Boat Length</label>
                                        <input type="text" name="length" class="form-control" value="{{ old('length') }}">
                                        @if ($errors->has('length'))
                                            <p class="small text-danger mt-5">{{ $errors->first('length') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="required">Boat Width</label>
                                        <input type="text" name="width" class="form-control" value="{{ old('width') }}">
                                        @if ($errors->has('width'))
                                            <p class="small text-danger mt-5">{{ $errors->first('width') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--MODAL ADD BOAT END-->

    <!--MODAL DELETE-->
    <div class="modal fade" id="modal-delete-boat" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="my-20">
                        <h4 class="title-main mt-0 mb-10">Delete?</h4>
                        <p>Are you sure want to delete this item?</p>
                    </div>
                    <form action="" method="post" id="form-delete">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mr-5" type="submit"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--MODAL DELETE END-->
</div>
@endsection

@section('script')

@if ($errors->has("*"))
    <script>
         $('#modal-add-boat').modal();
    </script>
@endif

<script>
    $(document).ready(function() {
        $('.delete-boat').click(function() {
            var action = $(this).data('action');

            $('#form-delete').attr('action', action);
            $('#modal-delete-boat').modal();
        });
    })
</script>

@endsection
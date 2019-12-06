@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Blog
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="active">Blog</li>
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
                                <a type="button" class="btn btn-default" href="{{ route('blog.add') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Blog</a>
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
                            <table class="table table-striped" id="table-blog">
                                <thead>
                                    <tr>
                                        <th style="width: 200px;">Image</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>
                                                <img class="img-responsive img-xs" src="{{ asset('storage/images/blogs/thumbnail/' . $blog->image) }}" alt="">
                                            </td>
                                            <td>
                                                <span class="display-xs-block">{{ $blog->translate('en')->title }}</span>
                                                //
                                                <span class="display-xs-block">{{ $blog->translate('id')->title }}</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">{{ $blog->created_at->format('d M Y') }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <span class="display-xs-inline-block" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger btn-delete" data-action="{{ route('blog.delete', $blog->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></button></span>
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


    <!--MODAL DELETE-->
    <div class="modal fade" id="modal-delete" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="my-20">
                        <h4 class="title-main mt-0 mb-10">Delete?</h4>
                        <p>Are you sure want to delete this item?</p>
                    </div>
                    <form action="" id="form-delete" method="post">
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

<script>
    $(document).ready(function() {
        $('.btn-delete').click(function() {
            var action = $(this).data('action');

            $('#form-delete').attr('action', action);
            $('#modal-delete').modal();
        });

        $('#table-blog').DataTable({
            "bSort": false,
            "pagingType": "full_numbers",
            "responsive": true,
            "lengthMenu": [
                [10, 25, 50],
                [10, 25, 50]
            ],
            "language": {
                "paginate": {
                    "first": "&nbsp;",
                    "last": "&nbsp;",
                    "previous": "&nbsp;",
                    "next": "&nbsp;"
                }
            },
            "sPaginationType": "ellipses"
        });
    });
</script>

@endsection
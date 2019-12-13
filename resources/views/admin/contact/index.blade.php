@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Contact
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="active">Contact</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">

                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <form text="text-right" class="form-inline" action="{{ route('contact.search') }}" method="get">
                                    <div class="form-group form-group-inline">
                                        <label class="sr-only">Search</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="keyword" value="{{ request()->get('keyword') }}" required>
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fa fa-search" aria-hidden="true"></i><span class="sr-only"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-check"></i>{{ session('success') }}</p>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-contact">
                                @if ($contacts->isEmpty())
                                    <h2 class="text-center">No data found</h2>
                                @else
                                    <thead>
                                        <tr>
                                            <th style="width: 120px;">Date</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th style="width: 300px;">Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>
                                                    <span class="display-xs-block">{{ $contact->created_at->format('d M Y') }}</span>
                                                    <span class="display-xs-block">{{ $contact->created_at->format('H:i') }}</span>
                                                </td>
                                                <td>
                                                    <span class="display-xs-block">{{ $contact->name }}</span>
                                                </td>
                                                <td>
                                                    <span class="display-xs-block">{{ $contact->phone }}</span>
                                                </td>
                                                <td>
                                                    <span class="display-xs-block">{{ $contact->email }}</span>
                                                </td>
                                                <td>
                                                    <span class="message">{{ $contact->message }}</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger delete-contact" data-action="{{ route('contact.delete', $contact->id) }}"  data-placement="top">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                            {{ $contacts->appends(Request::except('page'))->links() }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
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
<script type="text/javascript">
    $(document).ready(function() {
        $(".message").shorten({
            showChars: 70
        });

        $('.delete-contact').click(function() {
            var action = $(this).data('action');

            $('#form-delete').attr('action', action);
            $('#delete-confirmation').modal();
        });
    });
</script>
@endsection
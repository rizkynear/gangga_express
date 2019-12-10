@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Inquiry
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="active">Inquiry</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">

                    <div class="box-header with-border">
                        <div class="box-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <p><i class="icon fa fa-check"></i>{{ session('success') }}</p>
                                </div>
                            @endif
                            <div class="row">
                                <form class="text-left form-inline" method="get">
                                    <div class="form-group form-group-inline">
                                        <input type='text' class="form-control" id='inquiry-date' placeholder="Date" name="date" value="{{ request()->get('date') ?? '' }}">
                                    </div>
                                    <div class="form-group form-group-inline">
                                        <select class="form-control selectpicker" name="route">
                                            <option value="all" {{ request()->get('route') === 'all' ? 'selected' : '' }}>All route</option>
                                            <option value="tribuana-sampalan" {{ request()->get('route') === 'tribuana-sampalan' ? 'selected' : '' }}>Tribuana Port - Sampalan</option>
                                            <option value="tribuana-buyuk" {{ request()->get('route') === 'tribuana-buyuk' ? 'selected' : '' }}>Tribuana Port - Buyuk</option>
                                            <option value="sampalan-tribuana" {{ request()->get('route') === 'sampalan-tribuana' ? 'selected' : '' }}>Sampalan - Tribuana Port</option>
                                            <option value="buyuk-tribuana" {{ request()->get('route') === 'buyuk-tribuana' ? 'selected' : '' }}>Buyuk - Tribuana Port</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-group-inline">
                                        <select class="form-control selectpicker" name="schedule">
                                            <option value="all" {{ request()->get('schedule') === 'all' ? 'selected' : '' }}>All Schedule</option>
                                            <option value="06:30:00" {{ request()->get('schedule') === '06:30:00' ? 'selected' : '' }}>06.30 AM</option>
                                            <option value="07:00:00" {{ request()->get('schedule') === '07:00:00' ? 'selected' : '' }}>07.00 AM</option>
                                            <option value="07:30:00" {{ request()->get('schedule') === '07:30:00' ? 'selected' : '' }}>07.30 AM</option>
                                            <option value="08:00:00" {{ request()->get('schedule') === '08:00:00' ? 'selected' : '' }}>08.00 AM</option>
                                            <option value="09:00:00" {{ request()->get('schedule') === '09:00:00' ? 'selected' : '' }}>09.00 AM</option>
                                            <option value="10:00:00" {{ request()->get('schedule') === '10:00:00' ? 'selected' : '' }}>10.00 AM</option>
                                            <option value="12:15:00" {{ request()->get('schedule') === '12:15:00' ? 'selected' : '' }}>12.15 PM</option>
                                            <option value="13:30:00" {{ request()->get('schedule') === '13:30:00' ? 'selected' : '' }}>13.30 PM</option>
                                            <option value="14:30:00" {{ request()->get('schedule') === '14:30:00' ? 'selected' : '' }}>14.30 PM</option>
                                            <option value="16:00:00" {{ request()->get('schedule') === '16:00:00' ? 'selected' : '' }}>16.00 PM</option>
                                        </select>
                                    </div>
                                    <button formaction="{{ route('inquiry.search') }}" type="submit" class="btn btn-primary"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                                    <button formaction="{{ route('inquiry.export') }}" type="submit" class="btn btn-default"><i class="fa fa-download" aria-hidden="true"></i> Export CSV</button>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <form text="text-right" class="form-inline" action="{{ route('inquiry.search') }}" method="get">
                                    <div class="form-group form-group-inline">
                                        <label class="sr-only">Search Code</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Code" name="code" value="{{ request()->get('code') }}">
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

                        <div class="table-responsive">
                            <table class="table table-striped">
                         
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Date</th>
                                        <th>Contact Info</th>
                                        <th>Departure</th>
                                        <th>Return</th>
                                        <th>Price</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>
                                                <span class="display-xs-block">{{ $booking->code }}</span>
                                                @if ($booking->type === 'one-trip')
                                                    <span><i class="fa fa-long-arrow-right"></i></span>
                                                @elseif ($booking->type === 'round-trip')
                                                    <span><i class="fa fa-exchange"></i></span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="display-xs-block">{{ $booking->created_at->format('d M Y') }}</span>
                                                <span class="display-xs-block">{{ $booking->created_at->format('H:i') }}</span>
                                            </td>
                                            <td>
                                                <span class="display-xs-block">{{ $booking->contact->name }}</span>
                                                <span class="display-xs-block">{{ $booking->contact->phone }}</span>
                                                <span class="display-xs-block">{{ $booking->contact->email }}</span>
                                            </td>
                                            @foreach ($booking->schedules as $schedule)
                                                @if ($schedule->type === 'departure')
                                                    <td>
                                                        <span class="display-xs-block">{{ $schedule->departure_port }} - {{ $schedule->arrival_port }}</span>
                                                        <span class="display-xs-block">{{ $schedule->date }}</span>
                                                        <span class="display-xs-block">{{ str_limit($schedule->departure, 5, '') }} to {{ str_limit($schedule->arrival, 5, '') }}</span>
                                                    </td>
                                                @elseif ($schedule->type === 'return')
                                                    <td>
                                                        <span class="display-xs-block">{{ $schedule->departure_port }} - {{ $schedule->arrival_port }}</span>
                                                        <span class="display-xs-block">{{ $schedule->date }}</span>
                                                        <span class="display-xs-block">{{ str_limit($schedule->departure, 5, '') }} to {{ str_limit($schedule->arrival, 5, '') }}</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span>-</i></span>
                                                    </td>
                                                @endif
                                            @endforeach
                                            <td>
                                                <span class="display-xs-block">IDR</span>
                                                <span class="display-xs-block">{{ number_format($booking->price) }}</span>
                                            </td>
                                            <td>
                                                <span>
                                                    <a class="btn btn-default" href="{{ route('inquiry.detail-passenger', $booking->id) }}" title="View Passenger" data-toggle="tooltip" data-placement="top">
                                                        <i class="fa fa-address-book"></i>
                                                    </a>
                                                </span>
                                                <span>
                                                    <a class="btn btn-default" href="{{ route('inquiry.detail-inquiry', $booking->id) }}" title="Detail" data-toggle="tooltip" data-placement="top">
                                                        <i class="fa fa-bars"></i>
                                                    </a>
                                                </span>
                                                <span>
                                                    <button class="btn btn-danger delete-inquiry" title="Delete" data-toggle="tooltip" data-placement="top" type="button" data-action="{{ route('inquiry.delete', $booking->id) }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </span>
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
    $(function() {
        $('#inquiry-date').datetimepicker({
            format: 'Y-M-D'
        });
    });

    $('.delete-inquiry').click(function() {
        var action = $(this).data('action');

        $('#form-delete').attr('action', action);
        $('#delete-confirmation').modal();
    });
</script>
@endsection
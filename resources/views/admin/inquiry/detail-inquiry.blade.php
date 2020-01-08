@extends('admin.layout')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <h1 class="title-main">
            Detail Inquiry
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('inquiry') }}">Inquiry</a></li>
            <li class="active">Detail Inquiry</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">

                    <div class="box-body">

                        <div class="table-responsive">
                            <p><b>Booking Code : {{ $booking->code }}</b></p>
                            <p><b>Personal Information</b></p>
                            <table class="table table-striped">
                                <tr>
                                    <td class="fourth">DateBooking</td>
                                    <td>{{ $booking->created_at->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="fourth">Full Name</td>
                                    <td>{{ $booking->contact->name }}</td>
                                </tr>
                                <tr>
                                    <td class="fourth">Email</td>
                                    <td>{{ $booking->contact->email }}</td>
                                </tr>
                                <tr>
                                    <td class="fourth">Phone</td>
                                    <td>{{ $booking->contact->phone }}</td>
                                </tr>
                            </table>
                            <p><b>Booking Information</b></p>
                            <table class="table table-striped">
                                <tr>
                                    <td class="fourth">Type </td>
                                    <td>{{ $booking->type === 'round-trip' ? 'Round Trip' : 'One Trip' }}</td>
                                </tr>
                                <tr>
                                    <td class="fourth">Departure Route </td>
                                    <td>
                                        <span class="display-xs-block">{{ $booking->schedules->where('type', '=', 'departure')->first()->departure_port }} - {{ $booking->schedules->where('type', '=', 'departure')->first()->arrival_port }}</span>
                                        <span class="display-xs-block">{{ $booking->schedules->where('type', '=', 'departure')->first()->date }}</span>
                                        <span class="display-xs-block">{{ str_limit($booking->schedules->where('type', '=', 'departure')->first()->departure, 5, '') }} to {{ str_limit($booking->schedules->where('type', '=', 'departure')->first()->arrival, 5, '') }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fourth">Return Route </td>
                                    @if ($booking->schedules->where('type', '=', 'return')->isEmpty())
                                        <td>-</td>
                                    @else
                                        <td>
                                            <span class="display-xs-block">{{ $booking->schedules->where('type', '=', 'return')->first()->departure_port }} - {{ $booking->schedules->where('type', '=', 'return')->first()->arrival_port }}</span>
                                            <span class="display-xs-block">{{ $booking->schedules->where('type', '=', 'return')->first()->date }}</span>
                                            <span class="display-xs-block">{{ str_limit($booking->schedules->where('type', '=', 'return')->first()->departure, 5, '') }} to {{ str_limit($booking->schedules->where('type', '=', 'return')->first()->arrival, 5, '') }}</span>
                                        </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="fourth">Selected Activities</td>
                                    <td>
                                        <ul class="clearfix no-list">
                                            <li class="pull-left">Domestic Adult (x{{ $booking->details->where('category', '=', 'adult')->where('nationality', '=', 'indonesia')->count() }})</li>
                                            <li class="pull-right">Rp. {{ number_format($booking->details->where('category', '=', 'adult')->where('nationality', '=', 'indonesia')->count() * $domesticPrice->adult) }}</li>
                                        </ul>
                                        <ul class="clearfix no-list">
                                            <li class="pull-left">Foreigner Adult (x{{ $booking->details->where('category', '=', 'adult')->where('nationality', '=', 'foreigner')->count() }})</li>
                                            <li class="pull-right">Rp. {{ number_format($booking->details->where('category', '=', 'adult')->where('nationality', '=', 'foreigner')->count() * $foreignerPrice->adult) }}</li>
                                        </ul>
                                        <ul class="clearfix no-list">
                                            <li class="pull-left">Domestic Child (x{{ $booking->details->where('category', '=', 'child')->where('nationality', '=', 'indonesia')->count() }})</li>
                                            <li class="pull-right">Rp. {{ number_format($booking->details->where('category', '=', 'child')->where('nationality', '=', 'indonesia')->count() * $domesticPrice->child) }}</li>
                                        </ul>
                                        <ul class="clearfix no-list">
                                            <li class="pull-left">Foreigner Child (x{{ $booking->details->where('category', '=', 'child')->where('nationality', '=', 'foreigner')->count() }})</li>
                                            <li class="pull-right">Rp. {{ number_format($booking->details->where('category', '=', 'child')->where('nationality', '=', 'foreigner')->count() * $foreignerPrice->child) }}</li>
                                        </ul>
                                        <ul class="clearfix no-list">
                                            <li class="pull-left">Domestic Infant (x{{ $booking->details->where('category', '=', 'infant')->where('nationality', '=', 'indonesia')->count() }})</li>
                                            <li class="pull-right">Free</li>
                                        </ul>
                                        <ul class="clearfix no-list">
                                            <li class="pull-left">Foreigner Infant (x{{ $booking->details->where('category', '=', 'infant')->where('nationality', '=', 'foreigner')->count() }})</li>
                                            <li class="pull-right">Free</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fourth text-uppercase"><b>Total</b></td>
                                    <td class="text-right text-uppercase"><b>Rp. {{ number_format($booking->price) }}</b></td>
                                </tr>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
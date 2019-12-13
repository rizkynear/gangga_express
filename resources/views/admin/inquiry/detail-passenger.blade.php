@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Detail Passenger
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('inquiry') }}">Inquiry</a></li>
            <li class="active">Detail Passanger</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">

                    <div class="box-body">

                        <div class="table-responsive">

                            <table class="table table-striped">
                                <tr>
                                    <td class="fourth">Name</td>
                                    <td class="fourth">Nationality</td>
                                    <td class="fourth">Age</td>
                                    <td class="Message">Address</td>
                                </tr>
                                <tr>
                                    <td class="fourth"><b>Adult</b></td>
                                </tr>
                                @foreach ($booking->details as $detail)
                                    @if ($detail->category === 'adult')
                                        <tr>
                                            <td class="fourth">{{ $detail->name }}</td>
                                            <td>{{ $detail->nationality }}</td>
                                            <td>{{ $detail->age }}</td>
                                            <td>{{ $detail->address }}</td>
                                        </tr>
                                    @endif
                                @endforeach

                                <tr>
                                    <td class="fourth"><b>Child</b></td>
                                </tr>

                                @foreach ($booking->details as $detail)
                                    @if ($detail->category === 'child')
                                        <tr>
                                            <td class="fourth">{{ $detail->name }}</td>
                                            <td>{{ $detail->nationality }}</td>
                                            <td>{{ $detail->age }}</td>
                                            <td>{{ $detail->address }}</td>
                                        </tr>
                                    @endif
                                @endforeach

                                <tr>
                                    <td class="fourth"><b>Infant</b></td>
                                </tr>

                                @foreach ($booking->details as $detail)
                                    @if ($detail->category === 'infant')
                                        <tr>
                                            <td class="fourth">{{ $detail->name }}</td>
                                            <td>{{ $detail->nationality }}</td>
                                            <td>{{ $detail->age }}</td>
                                            <td>{{ $detail->address }}</td>
                                        </tr>
                                    @endif
                                @endforeach

                                <tr>
                                    <td class="fourth text-uppercase"><b>Total</b></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right text-uppercase"><b>{{ $booking->total }} Pax</b></td>
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
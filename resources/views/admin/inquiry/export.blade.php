<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Date</th>
            <th>Contact Info</th>
            <th>Departure</th>
            <th>Return</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
            <tr>
                <td>
                    <span>{{ $booking->code }}</span>
                </td>
                <td>
                    <span>{{ $booking->created_at->format('d M Y') }}</span>
                    <span>{{ $booking->created_at->format('H:i') }}</span>
                </td>
                <td>
                    <span>{{ $booking->contact->name }}</span>
                    <span>{{ $booking->contact->phone }}</span>
                    <span>{{ $booking->contact->email }}</span>
                </td>
                @if ($booking->type === 'round-trip')
                    @foreach ($booking->schedules as $schedule)
                        @if ($schedule->type === 'departure')
                            <td>
                                <span class="display-xs-block">{{ $schedule->departure_port }} - {{ $schedule->arrival_port }}</span>
                                <span class="display-xs-block">{{ $schedule->date }}</span>
                                <span class="display-xs-block">{{ str_limit($schedule->departure, 5, '') }} to {{ str_limit($schedule->arrival, 5, '') }}</span>
                            </td>
                        @else
                            <td>
                                <span class="display-xs-block">{{ $schedule->departure_port }} - {{ $schedule->arrival_port }}</span>
                                <span class="display-xs-block">{{ $schedule->date }}</span>
                                <span class="display-xs-block">{{ str_limit($schedule->departure, 5, '') }} to {{ str_limit($schedule->arrival, 5, '') }}</span>
                            </td>
                        @endif
                    @endforeach
                @else
                    @foreach ($booking->schedules as $schedule)
                        <td>
                            <span class="display-xs-block">{{ $schedule->departure_port }} - {{ $schedule->arrival_port }}</span>
                            <span class="display-xs-block">{{ $schedule->date }}</span>
                            <span class="display-xs-block">{{ str_limit($schedule->departure, 5, '') }} to {{ str_limit($schedule->arrival, 5, '') }}</span>
                        </td>
                        <td>-</td>
                    @endforeach
                @endif
                <td>
                    <span>IDR</span>
                    <span>{{ number_format($booking->price) }}</span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
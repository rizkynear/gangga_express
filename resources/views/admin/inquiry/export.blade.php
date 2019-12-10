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
            @foreach ($booking->schedules as $schedule)
            @if ($schedule->type === 'departure')
            <td>
                <span>{{ $schedule->departure_port }} - {{ $schedule->arrival_port }}</span>
                <span>{{ $schedule->date }}</span>
                <span>{{ str_limit($schedule->departure, 5, '') }} to {{ str_limit($schedule->arrival, 5, '') }}</span>
            </td>
            @elseif ($schedule->type === 'return')
            <td>
                <span>{{ $schedule->departure_port }} - {{ $schedule->arrival_port }}</span>
                <span>{{ $schedule->date }}</span>
                <span>{{ str_limit($schedule->departure, 5, '') }} to {{ str_limit($schedule->arrival, 5, '') }}</span>
            </td>
            @else
            <td>
                <span>-</i></span>
            </td>
            @endif
            @endforeach
            <td>
                <span>IDR</span>
                <span>{{ number_format($booking->price) }}</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
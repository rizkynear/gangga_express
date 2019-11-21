<?php

namespace App\Http\Resources;

use App\Http\Models\Booking;
use App\Http\Models\BookingSchedule;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($request->has('route')) {
            $bookingSchedules = BookingSchedule::where('route', '=', $request->route);
        }

        if ($request->has('date')) {
            $bookingSchedules->where('date', '=', $request->date);
        }

        $count = 0;
        $total = $request->passenger;

        foreach($bookingSchedules->get() as $bookingSchedule) {
            if ($this->departure == $bookingSchedule->departure) {
                $count += $bookingSchedule->booking->details->where('category', '!=', 'infant')->count();
                $total = $request->passenger + $count;
            }
        }

        return [
            'id'        => $this->id,
            'route'     => $this->route,
            'departure' => $this->departure,
            'arrival'   => $this->arrival,
            'status'    => $total > $this->quota ? 'full' : 'available',
        ];
    }
}

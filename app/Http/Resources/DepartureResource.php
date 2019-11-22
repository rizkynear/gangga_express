<?php

namespace App\Http\Resources;

use App\Http\Models\BookingSchedule;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $bookingSchedules = BookingSchedule::where('route', '=', $this->route);

        if ($request->has('departure_date')) {
            $bookingSchedules->where('date', '=', $request->departure_date);
        }

        $total = $this->checkTotal($request, $bookingSchedules);

        return [
            'id'        => $this->id,
            'route'     => $this->route,
            'departure' => $this->departure,
            'arrival'   => $this->arrival,
            'status'    => $total
        ];
    }

    private function checkTotal($request, $records)
    {   
        $count = 0;
        $total = $request->passenger;

        foreach($records->get() as $bookingSchedule) {
            if ($this->departure == $bookingSchedule->departure) {
                $count += $bookingSchedule->booking->details->where('category', '!=', 'infant')->count();
                $total = $request->passenger + $count;
            }
        }

        return $total;
    }
}

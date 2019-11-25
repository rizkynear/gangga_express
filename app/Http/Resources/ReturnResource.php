<?php

namespace App\Http\Resources;

use App\Http\Models\BookingSchedule;
use Illuminate\Http\Resources\Json\JsonResource;

class ReturnResource extends JsonResource
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

        if ($request->has('return_date')) {
            $bookingSchedules->where('departure', '=', $request->return_date);
        }

        $total = $this->checkTotal($request, $bookingSchedules);

        return [
            'id'        => $this->id,
            'route'     => $this->route,
            'departure' => $this->departure,
            'arrival'   => $this->arrival,
            'status'    => $total > $this->quota ? 'full' : 'available'
        ];
    }

    private function checkTotal($request, $bookingSchedules)
    {   
        $count = 0;
        $total = $request->adult + $request->child;

        foreach($bookingSchedules->get() as $bookingSchedule) {
            if ($this->departure == $bookingSchedule->departure) {
                $count += $bookingSchedule->booking->details->where('category', '!=', 'infant')->count();
                $total = $request->adult + $request->child + $count;
            }
        }

        return $total;
    }
}

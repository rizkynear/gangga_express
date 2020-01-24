<?php

namespace App\Http\Resources;

use App\Http\Models\Booking;
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
        $bookings = Booking::where('paid_status', '=', 1);
        
        if ($request->has('return_date')) {
            $bookings->whereHas('schedules', function($query) use($request) {
                $query->where('date', '=', $request->return_date);
            });
        }

        $bookings->whereHas('schedules', function($query) {
            $query->where('departure', '=', $this->departure);
        });

        $total = $this->checkTotal($request, $bookings->get());

        return [
            'id'        => $this->id,
            'route'     => $this->route,
            'departure' => str_limit($this->departure, 5, ''),
            'arrival'   => str_limit($this->arrival, 5, ''),
            'status'    => $total > $this->quota ? 'full' : 'available'
        ];
    }

    private function checkTotal($request, $bookings)
    {   
        $total = $request->adult + $request->child;

        foreach($bookings as $booking) {
            $total += $booking->adult + $booking->child;
        }

        return $total;
    }
}

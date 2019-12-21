<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RouteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'route'          => $this->route,
            'departure_port' => $this->departure,
            'arrival_port'   => $this->arrival,
            'schedules'      => ScheduleResource::collection($this->schedules)
        ];
    }
}

<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class BookingSchedule extends Model
{
    public $timestamps  = false;
    protected $fillable = ['date', 'route', 'departure', 'arrival', 'departure_port', 'arrival_port', 'type'];

    public function booking()
    {
        return $this->belongsTo('App\Http\Models\Booking');
    }
}

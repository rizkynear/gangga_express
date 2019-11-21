<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function contact()
    {
        return $this->hasOne('App\Http\Models\BookingContact');
    }

    public function details()
    {
        return $this->hasMany('App\Http\Models\BookingDetail');
    }

    public function schedules()
    {
        return $this->hasMany('App\Http\Models\BookingSchedule');
    }
}

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
        return $this->hasMany('App\Http\Models\BookingDetails');
    }

    public function departure()
    {
        return $this->hasOne('App\Http\Models\BookingDeparture');
    }

    public function return()
    {
        return $this->hasOne('App\Http\Models\BookingReturn');
    }
}

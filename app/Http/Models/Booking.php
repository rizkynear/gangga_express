<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function bookingContact()
    {
        return $this->hasOne('App\Http\Models\BookingContact');
    }

    public function bookingDetails()
    {
        return $this->hasMany('App\Http\Models\BookingDetails');
    }
}

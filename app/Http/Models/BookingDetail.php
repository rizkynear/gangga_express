<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    public $timestamps = false;

    public function booking()
    {
        return $this->belongsTo('App\Htpp\Models\Booking');
    }
}

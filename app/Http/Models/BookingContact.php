<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class BookingContact extends Model
{
    public $timestamps = false;

    public function booking()
    {
        return $this->belongsTo('App\Http\Models\Booking');
    }
}
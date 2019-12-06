<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['code', 'type', 'adult', 'child', 'infant', 'total', 'price'];
    
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

    public static function boot()
    {
        parent::boot();

        static::deleting(function($booking) {
            $booking->contact()->delete();
            $booking->details()->delete();
            $booking->schedules()->delete();
        });
    }
}

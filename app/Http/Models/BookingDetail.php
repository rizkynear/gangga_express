<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    public $timestamps  = false;
    protected $fillable = ['name', 'nationality', 'age', 'address', 'category'];

    public function booking()
    {
        return $this->belongsTo('App\Htpp\Models\Booking');
    }
}

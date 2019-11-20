<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['departure', 'arrival', 'quota', 'expired_date']; 

    public function route()
    {
        return $this->belongsTo('App\Http\Models\Route', 'route', 'route');
    }
}

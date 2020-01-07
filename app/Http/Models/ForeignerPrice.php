<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ForeignerPrice extends Model
{
    public $timestamps = false;

    public function price()
    {
        return $this->belongsTo('App\Http\Models\Price');
    }
}

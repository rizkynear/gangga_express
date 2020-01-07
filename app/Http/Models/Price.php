<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public function domestic()
    {
        return $this->hasOne('App\Http\Models\DomesticPrice');
    }

    public function foreigner()
    {
        return $this->hasOne('App\Http\Models\ForeignerPrice');
    }
}

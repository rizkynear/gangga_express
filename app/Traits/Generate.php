<?php

namespace App\Traits;

use App\Http\Models\Booking;

trait Generate
{
    public function generateCode() 
    {
        $code = mt_rand(10000000000, 100000000000);

        if ($this->codeExists($code)) {
            return generateCode();
        }

        return $code;
    }

    public function codeExists($code)
    {
        return Booking::whereCode($code)->exists();
    }
}
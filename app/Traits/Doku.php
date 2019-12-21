<?php

namespace App\Traits;

trait Doku
{
    protected function generateWords($request)
    {
        $words = sha1($request->AMOUNT . self::MALLID . self::SHAREDKEY . $request->TRANSIDMERCHANT . $request->RESULTMSG . $request->RESPONSECODE);

        return $words;
    }
}
<?php

namespace App\Util\Doku;

class Doku
{
    protected $mallId    = '209';
    protected $sharedKey = 'uUqPRAr689d0';

    protected function generateWords($request)
    {
        
        $words = sha1($request->AMOUNT . self::MALLID . self::SHAREDKEY . $request->TRANSIDMERCHANT . $request->RESULTMSG . $request->RESPONSECODE);

        return $words;
    }
}
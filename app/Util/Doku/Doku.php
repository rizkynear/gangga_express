<?php

namespace App\Util\Doku;

class Doku
{
    const MALLID    = '209';
    const SHAREDKEY = 'uUqPRAr689d0';

    public static function checkWords($request)
    {
        $words = sha1($request->AMOUNT . self::MALLID . self::SHAREDKEY . $request->TRANSIDMERCHANT . $request->RESULTMSG . $request->VERIFYSTATUS);

        if ($words === $request->WORDS) {
            return true;
        }

        return false;
    }

    public static function setPaymentParams($amount, $transId, $date, $currency, $name, $email, $basket)
    {
        if ($currency == 360) {
            $words = sha1(number_format($amount, 2, '.', '') . self::MALLID . self::SHAREDKEY . $transId);
        } else {
            $words = sha1(number_format($amount, 2, '.', '') . self::MALLID . self::SHAREDKEY . $transId . $currency);
        }
        
        return [
            'MALLID' => self::MALLID,
            'CHAINMERCHANT' => 'NA',
            'AMOUNT' => number_format($amount, 2, '.', ''),
            'PURCHASEAMOUNT' => number_format($amount, 2, '.', ''),
            'TRANSIDMERCHANT' => $transId,
            'WORDS' => $words,
            'REQUESTDATETIME' => $date,
            'CURRENCY' => $currency,
            'PURCHASECURRENCY' => $currency,
            'SESSIONID' => 'booking-ticket',
            'NAME' => $name,
            'EMAIL' => $email,
            'BASKET' => $basket
        ];
    }
}
<?php

namespace App\Util\Doku;

use App\Http\Models\Booking;
use App\Http\Models\Route;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    // public static function checkAvailable($transId)
    // {
    //     try {
    //         $booking = Booking::findOrFail($transId);
    //     } catch (ModelNotFoundException $e) {
    //         return false;
    //     }
        
        
    //     $reqPassenger = $booking->child + $booking->adult;
    //     $reqRoute     = $booking->schedule->route;
    //     $reqDate      = $booking->schedule->date;
    //     $reqTime      = $booking->schedule->departure;
        
    //     $route    = Route::where('route', '=', $reqRoute)->first();
    //     $bookings = Booking::where('paid_status', '=', 1);

    //     $schedule = $route->schedules->where('departure')->first();
        
    //     $bookings->whereHas('schedules', function($query) use ($reqTime, $reqRoute, $reqDate) {
    //         $query->where('route', '=', $reqRoute)->where('date', '=', $reqDate)->where('departure', '=', $reqTime);
    //     });

    //     $total = $this->checkTotalBooked($bookings->get()) + $reqPassenger;

    //     if ($total > $schedule->quota ) {
    //         return false;
    //     }

    //     return true;
    // }

    // private function checkTotalBooked($bookings)
    // {
    //     $total = 0;

    //     foreach($bookings as $booking) {
    //         $total += $booking->adult + $booking->child;
    //     }

    //     return $total;
    // }
}
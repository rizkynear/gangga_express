<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Booking;
use App\Util\Doku\Doku;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DokuController extends Controller
{
    public function notify(Request $request)
    {
        try {
            $booking = Booking::findOrFail($request->TRANSIDMERCHANT);
        } catch (ModelNotFoundException $e) {
            return 'stop';
        }

        $checkWords = Doku::checkWords($request);

        if ($checkWords === true && (int)$request->RESPONSECODE === 0000 && $request->RESULTMSG === 'SUCCESS' && $booking->paid_status !== 1) {
            $booking->update(['paid_status' => 1]);

            return 'continue';
        }

        return 'stop';
    }
}

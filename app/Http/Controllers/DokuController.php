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
            return 'STOP';
        }

        $checkWords     = Doku::checkWords($request);
        $checkAvailable = Doku::checkAvailable($request->TRANSIDMERCHANT);

        if ($checkWords === true && $checkAvailable === true && (int)$request->RESPONSECODE === 0000 && $request->RESULTMSG === 'SUCCESS' && $booking->paid_status !== 1) {
            $booking->update([
                'paid_status' => 1,
                'paid_at'     => now()
            ]);

            return 'CONTINUE';
        }

        return 'STOP';
    }

    public function redirect(Request $request)
    {
        dd($request->all());
    }
}

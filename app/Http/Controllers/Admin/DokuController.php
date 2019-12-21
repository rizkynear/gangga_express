<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Booking;
use App\Traits\Doku;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DokuController extends Controller
{
    use Doku;

    const MALLID    = '209';
    const SHAREDKEY = 'uUqPRAr689d0';

    public function setParams()
    {
        
    }

    public function notify(Request $request)
    {
        try {
            $booking = Booking::findOrFail($request->TRANSIDMERCHANT);
        } catch (ModelNotFoundException $e) {
            return 'stop';
        }

        if ($this->generateWords($request) === $request->WORDS && (int)$request->RESPONSECODE === 0000 && $request->RESULTMSG === 'SUCCESS' && $booking->paid_status !== 1) {
            $booking->update(['paid_status' => 1]);

            return 'continue';
        }

        return 'stop';
    }
}
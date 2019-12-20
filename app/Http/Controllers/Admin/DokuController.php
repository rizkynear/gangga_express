<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Booking;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DokuController extends Controller
{
    const MALLID    = '209';
    const SHAREDKEY = 'uUqPRAr689d0';

    public function notify(Request $request)
    {
        $words = sha1($request->AMOUNT . self::MALLID . self::SHAREDKEY . $request->TRANSIDMERCHANT . $request->RESULTMSG .$request->RESPONSECODE);

        if ($words === $request->WORDS) {
            if ((int)$request->RESPONSECODE === 0000 && $request->RESULTMSG === 'SUCCESS') {
                try {
                    Booking::findOrFail($request->TRANSIDMERCHANT);
                } catch (ModelNotFoundException $e) {
                    return dd('fail');
                }

                Booking::where('id', '=', $request->TRANSIDMERCHANT)->update(['paid_status' => 1]);

                return dd('success');
            }
        }

        return dd('fail');
    }
}

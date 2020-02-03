<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Booking;
use App\Mail\AfterPayMail;
use App\Util\Doku\Doku;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Mail;

class DokuController extends Controller
{
    public function notify(Request $request)
    {
        try {
            $booking = Booking::findOrFail($request->SESSIONID);
        } catch (ModelNotFoundException $e) {
            return 'STOP';
        }

        $checkWords = Doku::checkWords($request);

        if ($checkWords === true && (int)$request->RESPONSECODE === 0000 && $request->RESULTMSG === 'SUCCESS' && $booking->paid_status !== 1) {
            $booking->update([
                'paid_status' => 1,
                'paid_at'     => now()
            ]);

            $booking->with('details', 'contact', 'schedules');

            Mail::to($booking->contact->email)->send(new AfterPayMail($booking));

            return 'CONTINUE';
        }

        return 'STOP';
    }

    public function redirect(Request $request)
    {
        dd($request->all());
    }

    public function pay(Booking $booking)
    {
        $params = Doku::setPaymentParams($booking->price, $booking->code, $booking->created_at->format('YmdHis'), 360, $booking->contact->name, $booking->contact->email, $booking->basket, $booking->payment_channel, $booking->id);

        return view('doku.pay')->with(compact('params'));
    }
}

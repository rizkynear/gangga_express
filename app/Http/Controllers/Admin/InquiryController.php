<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Booking;
use App\Http\Models\DomesticPrice;
use App\Http\Models\ForeignerPrice;

class InquiryController extends Controller
{
    public function index()
    {
        Booking::where('read_status', '=', 0)->update(['read_status' => 1]);

        $bookings = Booking::all()->sortByDesc('id');

        return view('admin.inquiry.index')->with(compact('bookings'));
    }

    public function detailPassenger($id)
    {
        $booking = Booking::findOrFail($id);

        return view('admin.inquiry.detail-passenger')->with(compact('booking'));
    }

    public function detailInquiry($id)
    {
        $booking        = Booking::findOrFail($id);
        $domesticPrice  = DomesticPrice::first();
        $foreignerPrice = ForeignerPrice::first();

        return view('admin.inquiry.detail-inquiry')->with(compact('booking'))
                                                   ->with(compact('domesticPrice'))
                                                   ->with(compact('foreignerPrice'));
    }
}
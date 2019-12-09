<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Booking;
use App\Http\Models\DomesticPrice;
use App\Http\Models\ForeignerPrice;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        Booking::where('read_status', '=', 0)->update(['read_status' => 1]);
        
        $booking = Booking::where('total', '!=', 0);

        if (!empty($request->date)) {
            $booking->whereHas('schedules', function($query) use($request) {
                $query->where('date', '=', $request->date);
            });
        }

        if (!empty($request->route) && $request->route !== 'all') {
            $booking->whereHas('schedules', function($query) use($request) {
                $query->where('route', '=', $request->route);
            });
        }

        if (!empty($request->schedule) && $request->schedule !== 'all') {
            $booking->whereHas('schedules', function($query) use($request) {
                $query->where('departure', '=', $request->schedule);
            });
        }

        $bookings = $booking->latest()->paginate(10);

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

    public function delete($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted');
    }
}
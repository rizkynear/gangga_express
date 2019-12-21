<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BookingExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Booking;
use App\Http\Models\DomesticPrice;
use App\Http\Models\ForeignerPrice;
use Maatwebsite\Excel\Facades\Excel;

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

        if (!empty($request->code)) {
            $booking->where('code', '=', $request->code);
        }

        $bookings = $booking->latest()->paginate(10);

        return view('admin.inquiry.index')->with(compact('bookings'));
    }

    public function export(Request $request)
    {
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

        if (!empty($request->code)) {
            $booking->where('code', '=', $request->code);
        }

        $bookings = $booking->latest()->get();

        if ($booking->count() < 1) {
            return redirect()->back()->with('error', 'Cannot export because no data found');
        }

        return Excel::download(new BookingExport($bookings), 'inquiry.xlsx');
    }

    public function detailPassenger(Booking $booking)
    {
        $booking->with('details');

        return view('admin.inquiry.detail-passenger')->with(compact('booking'));
    }

    public function detailInquiry(Booking $booking)
    {
        $domesticPrice  = DomesticPrice::first();
        $foreignerPrice = ForeignerPrice::first();

        $booking->with('contact', 'schedules');

        return view('admin.inquiry.detail-inquiry')->with(compact('booking'))
                                                   ->with(compact('domesticPrice'))
                                                   ->with(compact('foreignerPrice'));
    }

    public function delete(Booking $booking)
    {
        $booking->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted');
    }
}
<?php

namespace App\Exports;

use App\Http\Models\Booking;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class BookingExport implements FromView
{
    private $bookings;

    public function __construct($bookings)
    {
        $this->bookings = $bookings;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('admin.inquiry.export', [
            'bookings' => $this->bookings
        ]);
    }
}

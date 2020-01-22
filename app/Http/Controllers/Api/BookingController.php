<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Booking;
use App\Http\Models\Holiday;
use App\Http\Models\Route;
use App\Http\Models\Schedule;
use App\Http\Requests\BookingStore;
use App\Http\Resources\DepartureCollection;
use App\Http\Resources\HolidayCollection;
use App\Http\Resources\ReturnCollection;
use App\Traits\Generate;
use App\Util\Doku\Doku;
use App\Util\Price\Price;
use Illuminate\Support\Facades\Mail;
use App\Mail\BeforePayMail;

class BookingController extends Controller
{
    use Generate;
    
    public function departure(Request $request)
    {
        if ($request->has('departure_date')) {
            $departure = Schedule::where('expired_date', '>', $request->departure_date)->orWhere('expired_date', '=', null);;
        }

        if ($request->has('departure_route')) {
            $departure->where('route', '=', $request->departure_route);
        }

        return new DepartureCollection($departure->get());
    }
    
    public function return(Request $request)
    {
        if ($request->has('return_date')) {
            $return = Schedule::where('expired_date', '>', $request->return_date)->orWhere('expired_date', '=', null);
        }
        
        if ($request->has('return_route')) {
            $return->where('route', '=', $request->return_route);
        }

        return new ReturnCollection($return->get());
    }

    public function holiday()
    {
        return new HolidayCollection(Holiday::all());
    }

    public function store(BookingStore $request)
    {
        $booking = new Booking();
        $port    = Route::where('route', '=', $request->departure_route)->first();

        $price = new Price();
        $total = $price->total($request);
        
        $booking->code   = $this->generateCode();
        $booking->type   = $request->booking_type;
        $booking->adult  = ($request->adult ?? 0);
        $booking->child  = ($request->child ?? 0);
        $booking->infant = ($request->infant ?? 0);
        $booking->total  = $request->total_passenger;
        $booking->price  = ($request->booking_type == 'round-trip' ? $total['totalPrice'] * 2 : $total['totalPrice']);
        $booking->save();

        $booking->contact()->create([
            'name'  => $request->contact_name,
            'phone' => $request->contact_phone,
            'email' => $request->contact_email
        ]);
        
        $booking->schedules()->create([
            'date'           => $request->departure_date,
            'route'          => $request->departure_route, 
            'departure'      => $request->departure_time,
            'arrival'        => $request->departure_arrival_time,
            'departure_port' => $port->departure,
            'arrival_port'   => $port->arrival,
            'type'           => 'departure'
        ]);
        
        if ($request->has('return_route')) {
            $port = Route::where('route', '=', $request->return_route)->first();

            $booking->schedules()->create([
                'date'           => $request->return_date,
                'route'          => $request->return_route, 
                'departure'      => $request->return_time,
                'arrival'        => $request->return_arrival_time,
                'departure_port' => $port->departure,
                'arrival_port'   => $port->arrival,
                'type'           => 'return'
            ]);           
        }

        for ($i = 0; $i < count($request->name); $i++) {
            $booking->details()->create([
                'name'        => $request->name[$i],
                'nationality' => $request->nationality[$i],
                'age'         => $request->age[$i],
                'address'     => $request->address[$i],
                'category'    => $request->category[$i]
            ]);
        }

        $params = Doku::setPaymentParams($booking->price, $booking->id, $booking->created_at->format('YmdHis'), $request->currency, $request->contact_name, $request->contact_email, $request->basket);
    
        Mail::to($request->contact_email)->send(new BeforePayMail($booking));

        return response()->json($params);
    }
}

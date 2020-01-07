<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\DomesticPrice;
use App\Http\Models\ForeignerPrice;
use App\Http\Resources\DomesticPriceCollection;
use App\Http\Resources\ForeignerPriceCollection;
use App\Util\Price\Price;

class PriceController extends Controller
{
    public function domestic()
    {
        return new DomesticPriceCollection(DomesticPrice::all());
    }

    public function foreigner()
    {
        return new ForeignerPriceCollection(ForeignerPrice::all());
    }
    
    public function total(Request $request)
    {
        $price = new Price();

        $total = $price->total($request);

        return response()->json([
            'data' => [
                'domesticAdultPrice'   => $total['domesticAdultPrice'],
                'domesticChildPrice'   => $total['domesticChildPrice'],
                'domesticInfantPrice'  => $total['domesticInfantPrice'],
                'foreignerAdultPrice'  => $total['foreignerAdultPrice'],
                'foreignerChildPrice'  => $total['foreignerChildPrice'],
                'foreignerInfantPrice' => $total['foreignerInfantPrice'],
                'totalPrice'           => $total['totalPrice']
            ]
        ]);
    }
}

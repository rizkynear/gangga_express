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
                [
                    'category'    => 'adult',
                    'nationality' => 'indonesia',
                    'total'       => $total['domesticAdultTotal'],
                    'price'       => $total['domesticAdultPrice']
                ], [
                    'category'    => 'child',
                    'nationality' => 'indonesia',
                    'total'       => $total['domesticChildTotal'],
                    'price'       => $total['domesticChildPrice']
                ], [
                    'category'    => 'infant',
                    'nationality' => 'indonesia',
                    'total'       => $total['domesticInfantTotal'],
                    'price'       => $total['domesticInfantPrice']
                ], [
                    'category'    => 'adult',
                    'nationality' => 'foreigner',
                    'total'       => $total['foreignerAdultTotal'],
                    'price'       => $total['foreignerAdultPrice']
                ], [
                    'category'    => 'child',
                    'nationality' => 'foreigner',
                    'total'       => $total['foreignerChildTotal'],
                    'price'       => $total['foreignerChildPrice']
                ], [
                    'category'    => 'infant',
                    'nationality' => 'foreigner',
                    'total'       => $total['foreignerInfantTotal'],
                    'price'       => $total['foreignerInfantPrice']
                ], [
                    'totalPrice' => $total['totalPrice']
                ]
            ] 
        ])->header('Access-Control-Allow-Origin', "*")
          ->header('Access-Control-Allow-', "*")
          ->header('Access-Control-Allow-Origin', "*");
    }
}

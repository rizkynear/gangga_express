<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\DomesticPrice;
use App\Http\Models\ForeignerPrice;
use App\Http\Resources\DomesticPriceCollection;
use App\Http\Resources\ForeignerPriceCollection;

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
}

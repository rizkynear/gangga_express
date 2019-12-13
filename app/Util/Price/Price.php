<?php

namespace App\Util\Price;

use App\Http\Models\DomesticPrice;
use App\Http\Models\ForeignerPrice;

class Price 
{
    public function total($request)
    {
        $domesticInfant  = 0;
        $domesticChild   = 0;
        $domesticAdult   = 0;
        $foreignerInfant = 0;
        $foreignerChild  = 0;
        $foreignerAdult  = 0;

        for ($i = 0; $i < count($request->category); $i++) {
            if ($request->category[$i] == 'infant') {
                if ($request->nationality[$i] == 'indonesia') {
                    $domesticInfant += 1;
                } else {
                    $foreignerInfant += 1;
                }
            }

            if ($request->category[$i] == 'child') {
                if ($request->nationality[$i] == 'indonesia') {
                    $domesticChild += 1;
                } else {
                    $foreignerChild += 1;
                }
            }

            if ($request->category[$i] == 'adult') {
                if ($request->nationality[$i] == 'indonesia') {
                    $domesticAdult += 1;
                } else {
                    $foreignerAdult += 1;
                }
            }
        }

        $domesticPrice  = $this->domestic($domesticInfant, $domesticChild, $domesticAdult);
        $foreignerPrice = $this->foreigner($foreignerInfant, $foreignerChild, $foreignerAdult);

        $total = $domesticPrice + $foreignerPrice;

        return $total;
    }

    private function domestic($infantTotal, $childTotal, $adultTotal)
    {
        $domestic = DomesticPrice::first();

        $infantPrice = $infantTotal * $domestic->infant;
        $childPrice  = $childTotal * $domestic->child;
        $adultPrice  = $adultTotal * $domestic->adult;

        $total = $infantPrice + $childPrice + $adultPrice;

        return $total;
    }

    private function foreigner($infantTotal, $childTotal, $adultTotal)
    {
        $foreigner = ForeignerPrice::first();

        $infantPrice = $infantTotal * $foreigner->infant;
        $childPrice  = $childTotal * $foreigner->child;
        $adultPrice  = $adultTotal * $foreigner->adult;

        $total = $infantPrice + $childPrice + $adultPrice;

        return $total;
    }
}
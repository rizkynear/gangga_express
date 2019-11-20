<?php

use App\Http\Models\DomesticPrice;
use App\Http\Models\ForeignerPrice;
use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domestic = new DomesticPrice;
        $foreigner = new ForeignerPrice;

        $domestic->infant = 0;
        $domestic->child = 50000;
        $domestic->adult = 100000;
        $domestic->save();

        $foreigner->infant = 0;
        $foreigner->child = 100000;
        $foreigner->adult = 150000;
        $foreigner->save();
    }
}

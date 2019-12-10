<?php

use App\Http\Models\Route;
use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $route = new Route();

        $data_1 = [
            'departure' => 'Tribuana',
            'arrival'   => 'Sampalan'
        ];

        $data_2 = [
            'departure' => 'Tribuana',
            'arrival'   => 'Buyuk'
        ];

        $data_3 = [
            'departure' => 'Sampalan',
            'arrival'   => 'Tribuana'
        ];

        $data_4 = [
            'departure' => 'Buyuk',
            'arrival'   => 'Tribuana'
        ];

        $route->create($data_1);
        $route->create($data_2);
        $route->create($data_3);
        $route->create($data_4);
    }
}

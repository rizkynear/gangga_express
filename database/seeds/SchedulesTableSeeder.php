<?php

use App\Http\Models\Route;
use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $route = new Route();

        $route->departure = 'Tribuana';
        $route->arrival = 'Sampalan';
        $route->save();

        for ($i = 1; $i <= 9; $i++) {
            $data = [
                'departure' => '0' . $i . ':00:00',
                'arrival' => now(),
                'quota' => 40,
                'expired_date' => now()
            ];

            $route->schedules()->create($data);
        }

        $route_2 = new Route();

        $route_2->departure = 'Sampalan';
        $route_2->arrival = 'Tribuana';
        $route_2->save();

        for ($i = 1; $i <= 9; $i++) {
            $data = [
                'departure' => '0' . $i . ':00:00',
                'arrival' => now(),
                'quota' => 40,
                'expired_date' => now()
            ];

            $route_2->schedules()->create($data);
        }
    }
}

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

        for ($i = 1; $i <= 10; $i++) {
            $data = [
                'departure' => now(),
                'arrival' => now(),
                'quota' => 40,
                'expired_date' => now()
            ];

            $route->schedules()->create($data);
        }
    }
}

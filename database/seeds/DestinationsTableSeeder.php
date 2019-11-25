<?php

use App\Http\Models\Destination;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            $data = [
                'name'      => 'pantai sanur',
                'location'  => $faker->address,
                'image'     => 'destination.jpg',
                'longitude' => $faker->longitude,
                'latitude'  => $faker->latitude
            ];

            Destination::create($data);
        }
    }
}

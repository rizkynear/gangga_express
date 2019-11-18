<?php

use App\Http\Models\Boat;
use Illuminate\Database\Seeder;

class BoatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) { 
            $data = [
                'name'     => 'gangga_1',
                'engine'   => 'Yamaha',
                'capacity' => 40,
                'length'   => 10,
                'width'    => 5.5,
                'image'    => 'boats.jpg'
            ];

            Boat::create($data);
        }
    }
}

<?php

use App\Http\Models\Slider;
use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            $data = [
                'position' => $i,
                'image' => 'slider.jpg',
            ];

            Slider::create($data);
        }
    }
}

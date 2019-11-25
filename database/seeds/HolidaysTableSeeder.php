<?php

use App\Http\Models\Holiday;
use Illuminate\Database\Seeder;

class HolidaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Hari raya nyepi',
            'date' => now()
        ];

        Holiday::create($data);
    }
}

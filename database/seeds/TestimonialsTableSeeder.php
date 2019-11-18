<?php

use App\Http\Models\Testimonial;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TestimonialsTableSeeder extends Seeder
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
                'name'        => 'john',
                'nationality' => 'indonesia',
                'image'       => 'testmonials.jpg',
                'en'          => ['description' => 'this is a description'],
                'id'          => ['description' => 'ini adalah deskripsi'],
            ];

            Testimonial::create($data);
        }
    }
}

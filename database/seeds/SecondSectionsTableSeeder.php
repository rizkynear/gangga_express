<?php

use App\Http\Models\SecondSection;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SecondSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'image_1' => 'second-sections.jpg',
            'image_2' => 'second-sections.jpg',
            'en'      => ['title' => 'this is a title', 'sub_title' => 'this is sub-title','content' => 'this is content'],
            'id'      => ['title' => 'ini adalah title', 'sub_title' => 'ini adalah sub title','content' => 'ini adalah content'],
        ];

        SecondSection::create($data);
    }
}

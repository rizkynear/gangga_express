<?php

use App\Http\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'en' => ['title' => 'this is a title', 'sub_title' => 'this is a sub title', 'content' => 'this is a content'],
            'id' => ['title' => 'ini adalah title', 'sub_title' => 'ini adalah sub title', 'content' => 'ini adalah content'],
        ];

        Company::create($data);
    }
}

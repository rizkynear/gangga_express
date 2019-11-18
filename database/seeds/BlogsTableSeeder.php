<?php

use App\Http\Models\Blog;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
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
                'image' => 'blogs.jpg',
                'en'    => ['title' => 'this is a title', 'description' => 'this is a description'],
                'id'    => ['title' => 'ini adalah judul', 'description' => 'ini adalah deskripsi'],
            ];

            Blog::create($data);
        }
    }
}

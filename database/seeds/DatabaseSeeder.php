<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BlogsTableSeeder::class);
        $this->call(RoutesTableSeeder::class);
        $this->call(PricesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}

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
        $this->call(BoatsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(SecondSectionsTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(SchedulesTableSeeder::class);
        $this->call(PricesTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(HolidaysTableSeeder::class);
        $this->call(DestinationsTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
    }
}

<?php

use App\Http\Models\Booking;
use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booking = new Booking;

        $booking->code = 001;
        $booking->type = 'round-trip';
        $booking->price = 150000;
        $booking->total = 5;
        $booking->save();

        $schedule = [
            'date'  => now(),
            'route' => 'tribuana-sampalan',
            'departure' => '01:00:00',
            'arrival'  => '11:00:00',
            'type'     => 'departure'
        ];

        $schedule_2 = [
            'date'  => now(),
            'route' => 'sampalan-tribuana',
            'departure' => '09:00:00',
            'arrival'  => '11:00:00',
            'type'     => 'return'
        ];

        $contact = [
            'name' => 'lenon',
            'phone' => '0887766676',
            'email' => 'lenon@timedoor.net'
        ];

        
        $booking->schedules()->create($schedule);
        $booking->schedules()->create($schedule_2);
        $booking->contact()->create($contact);

        for ($i = 1; $i <= 5; $i++)
        {
            $detail = [
                'name'  => 'john',
                'nationality' => 'indonesia',
                'age' => 30,
                'address' => 'jalan tukad yeh aya',
                'category' => 'adult'
            ];

            $booking->details()->create($detail);
        }
    }
}

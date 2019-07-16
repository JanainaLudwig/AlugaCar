<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Location::create([
            'user_id' => 1,
            'car_id' => 3,
            'loan_date' => '2019-06-20 12:30:00',
            'devolution_date' => '2019-06-20 18:00:00',
            'payment_method_id' => 1
        ]);

        \App\Location::create([
            'user_id' => 1,
            'car_id' => 1,
            'loan_date' => '2019-06-18 21:30:00',
            'devolution_date' => '2019-06-19 21:00:00',
            'payment_method_id' => 1
        ]);

        \App\Location::create([
            'user_id' => 1,
            'car_id' => 4,
            'loan_date' => '2019-07-10 23:00:00',
            'devolution_date' => '2019-07-15 17:00:00',
            'payment_method_id' => 1
        ]);
    }
}

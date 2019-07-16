<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = [
            ['name' => 'Cartão'],
            ['name' => 'Boleto'],
            ['name' => 'Dinheiro'],
            ['name' => 'Transferência'],
        ];

        DB::table('payment_methods')->insert($methods);
    }
}

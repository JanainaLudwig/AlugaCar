<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Janaina Ludwig',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
            'email' => 'janainaludwig@gmail.com',
        ]);

        $user->admin = true;
        $user->save();
    }
}

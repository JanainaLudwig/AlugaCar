<?php

namespace App\Http\Controllers;

use App\Car;
use App\Location;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $cars = Car::count();
        $users = User::count();

        $locations = Location::all();
        $money = 0;

        foreach ($locations as $location) {
            $money += $location->hours * $location->car->price;
        }

        $locations = Location::count();


        return view('admin.index', compact(['cars', 'users', 'locations', 'money']));
    }
}

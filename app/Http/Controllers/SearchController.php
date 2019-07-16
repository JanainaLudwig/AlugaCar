<?php

namespace App\Http\Controllers;

use App\Car;
use App\Facades\DateTime\DateTime;
use App\Location;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $loan_date = DateTime::createDateTime($request->rent_date, $request->rent_time);
        $devolution_date = DateTime::createDateTime($request->devolution_date, $request->devolution_time);

        $carsBeingUsed = Location::whereRaw(
            "('{$loan_date}' BETWEEN loan_date AND devolution_date)"
        )->orWhereRaw(
            "('{$devolution_date}' BETWEEN loan_date AND devolution_date)"
        )->orWhereRaw(
            "loan_date > '{$loan_date}' AND devolution_date < '$devolution_date'"
        )->get()->pluck('car_id')->toArray();

        $cars = Car::all()->except($carsBeingUsed);

        $hours = $loan_date->diffInMinutes($devolution_date) / 60;

        $initial['HH'] = $loan_date->format('H');
        $initial['mm'] = $loan_date->format('i');

        $finalTime['HH'] = $devolution_date->format('H');
        $finalTime['mm'] = $devolution_date->format('i');

        return view('search.index')
            ->with('cars', $cars)
            ->with('removalTime', json_encode($initial))
            ->with('devolutionTime', json_encode($finalTime))
            ->with('removalDate', json_encode($loan_date))
            ->with('removalDateForm', $loan_date->toIso8601String())
            ->with('devolutionDate', json_encode($devolution_date))
            ->with('devolutionDateForm', $devolution_date->toIso8601String())
            ->with('hours', $hours);
    }
}

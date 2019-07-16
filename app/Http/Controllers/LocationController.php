<?php

namespace App\Http\Controllers;

use App\Car;
use App\Facades\DateTime\DateTime;
use App\Location;
use App\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::where('user_id', auth()->user()->id)->orderByRaw("CASE WHEN DATE(loan_date) < DATE(now()) THEN 0 ELSE 1 END DESC, loan_date DESC")
            ->get();

        return view('location.index')->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function create(Request $request, Car $car)
    {
        $loan = new Carbon($request->rent_date);
        $devolution = new Carbon($request->devolution_date);

        $hours = $loan->diffInMinutes($devolution) / 60;

        $paymentMethods = PaymentMethod::all();

        return view('location.create')
            ->with('loan', $loan)
            ->with('devolution', $devolution)
            ->with('hours', $hours)
            ->with('car', $car)
            ->with('paymentMethods', $paymentMethods);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Car $car)
    {
        $location = new Location();

        $location->user_id = auth()->user()->id;
        $location->car_id = $car->id;
        $location->loan_date = $request->loan;
        $location->devolution_date = $request->devolution;
        $location->payment_method_id = $request->payment_method;

        $location->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param Location $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('location.show')
            ->with('location', $location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('home');
    }
}

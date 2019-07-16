<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests\StoreCar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cars = Car::paginate(16);

        $search = Input::get('search') ?? null;

        if ($search) {
            $cars = Car::where('name', 'LIKE', "%" . Input::get('search') ."%")->paginate(16);
        }

        return view('admin.cars.index')->with('cars', $cars)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(StoreCar $request)
    {
        $car = new Car();

        $car->name = $request->name;
        $car->price = $request->price;

        $car->save();

        $car->image = Storage::disk('public')->putFile("/cars/{$car->id}", $request->image);

        $car->save();

        return redirect()->route('admin.cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return Response
     */
    public function show(Car $car)
    {
        return view('admin.cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return Response
     */
    public function edit(Car $car)
    {
        return view('admin.cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return Response
     */
    public function update(Request $request, Car $car)
    {
        $car->name = $request->name;
        $car->price = $request->price;

        if ($request->hasFile('image')){
            Storage::disk('public')->delete($car->getAttributes()['image']);

            $car->image = Storage::disk('public')->putFile("/cars/{$car->id}", $request->image);
        }

        $car->save();

        return redirect()->route('admin.cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Car $car
     * @return Response
     * @throws \Exception
     */
    public function destroy(Car $car)
    {
        Storage::disk('public')->deleteDirectory("cars/{$car->id}");

        $car->delete();

        return redirect()->back();
    }
}

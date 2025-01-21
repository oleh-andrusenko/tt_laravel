<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;


class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('inRent', 0)
            ->orderBy('id', 'desc')
            ->paginate(12);
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));

    }

    public function update(Car $car)
    {

        $data = request()->validate([
            'brand' => '',
            'model' => '',
            'year' => '',
            'mileage' => '',
            'price' => '',
            'engine' => '',
            'body' => '',
            'description' => '',
            'transmission' => ''

        ]);
        $car->update($data);
        return redirect()->route('cars.show', $car['id']);

    }

    public function destroy(Car $car)
    {

        $car->delete();
        return redirect()->route('cars.index');

    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    public function table()
    {

        $cars = Car::all()->sortByDesc('created_at');
        return view('cars.table', compact('cars'));
    }

    public function rent(Car $car)
    {
        return view('cars.rent', compact('car'));
    }


    public function store()
    {
        $data = request()->validate([
            'brand' => '',
            'model' => '',
            'year' => '',
            'mileage' => '',
            'price' => '',
            'engine' => '',
            'body' => '',
            'description' => '',
            'transmission' => ''

        ]);
        $data['likes'] = rand(0, 10000);
//
//
        $photos = request()->file('photos');
        $photosPaths = [];
        foreach ($photos as $photo) {
            $fileName = uniqid() . '-' . $photo->getClientOriginalName();
            $photo->move(public_path('assets/carPhotos'), $fileName);
            $photosPaths[] = $fileName;
        }
        $data['photos'] = implode(';', $photosPaths);
        $file = request()->preview;
        $fileName = uniqid() . '-' . $file->getClientOriginalName();
        $file->move(public_path('assets/carsPreviews/'), $fileName);
        $data['preview'] = $fileName;
        Car::create($data);
        return redirect()->route('cars.index');

    }


    public function rent_proceed(Car $car)
    {
        $data = request()->validate([
            'endDate' => 'required|date',
            'startDate' => 'required|date',
            'price' => 'required',
            'duration' => 'required|integer',
        ]);


        $car->update([
            'inRent' => 1
        ]);
        $rent = Rent::create([
            'carId' => $car['id'],
            'userEmail' => auth('web')->user()->email,
            'start' => $data['startDate'],
            'end' => $data['endDate'],
            'duration' => $data['duration'],
            'price' => $data['price'],
        ]);
        if ($rent) {
            return redirect()->route('profiles.show', auth('web')->user()->id);

        }
    }

    public function release(Car $car)
    {
        $car->update(['inRent' => 0]);
        $rent = Rent::where('carId', $car['id'])->first();
        $rent->update([
            'rentStatus' => 'ended'
        ]);
        return redirect()->route('cars.table');
    }


}

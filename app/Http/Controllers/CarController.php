<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;


class CarController extends Controller
{
    public function index()
    {
        $cars = Car::withAverageRating()
            ->withReviewsCount()
            ->latest()->get();
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
            'model' => '',
            'year' => '',
            'mileage' => '',
            'rent_price' => '',
            'engine' => '',
            'body_type' => '',
            'transmission' => '',
            'drive'=>''

        ]);
        $photos = request()->file('photos');
        if($photos)
        {
            $photosPaths = [];
            foreach ($photos as $photo) {
                $fileName = uniqid() . '-' . $photo->getClientOriginalName();
                $photo->move(public_path('assets/carPhotos'), $fileName);
                $photosPaths[] = $fileName;
            }
            $data['photos'] = implode(';', $photosPaths);
        }
        $previewPhoto = request()->preview_photo;
        if($previewPhoto){
            $fileName = uniqid() . '-' . $previewPhoto->getClientOriginalName();
            $previewPhoto->move(public_path('assets/carsPreviews/'), $fileName);
            $data['preview_photo'] = $fileName;
        }
        $car->update($data);
        return redirect()->route('cars.show', $car['id']);

    }

    public function destroy(Car $car)
    {

        $car->delete();
        return redirect()->route('cars.index');

    }

    public function show(int $id)
    {
        $car = Car::with('reviews')->withAverageRating()->withReviewsCount()->findOrFail($id);
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
            'model' => 'required|string|max:64',
            'year' => 'required',
            'mileage' => 'required|unsignedBigInteger',
            'rent_price' => 'required|integer',
            'engine' => 'required|string|max:64',
            'body_type' => 'required|string|max:64',
            'transmission' => 'required|string|max:64',
            'drive'=>'required|string|max:64'
        ]);

//
//
        $photos = request()->file('photos');
        if($photos)
        {
            $photosPaths = [];
            foreach ($photos as $photo) {
                $fileName = uniqid() . '-' . $photo->getClientOriginalName();
                $photo->move(public_path('assets/carPhotos'), $fileName);
                $photosPaths[] = $fileName;
            }
            $data['photos'] = implode(';', $photosPaths);
        }
        $previewPhoto = request()->preview_photo;
        if($previewPhoto){
            $fileName = uniqid() . '-' . $previewPhoto->getClientOriginalName();
            $previewPhoto->move(public_path('assets/carsPreviews/'), $fileName);
            $data['preview_photo'] = $fileName;
        }else $data['preview_photo'] = 'default-preview.png';

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

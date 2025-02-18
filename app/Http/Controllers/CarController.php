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
        $data = request()
            ->validate([
            'model' => 'required|string|max:64',
            'year' => 'required',
            'mileage' => 'required|integer',
            'rent_price' => 'required|integer',
            'engine' => 'required|string|max:64',
            'body_type' => 'required|string|max:64',
            'transmission' => 'required|string|max:64',
            'drive'=>'required|string|max:64'
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
        return redirect()->back();
    }

    public function show(int $id)
    {
        $car = Car::with('reviews')
            ->withAverageRating()
            ->withReviewsCount()
            ->findOrFail($id);
        return view('cars.show', compact('car'));
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
            'mileage' => 'required|integer',
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
            'start'=>'',
            'end'=>'',
            'duration'=>'',
            'price'=>''
        ]);
        $data['car_id'] = $car->id;
        $data['user_id'] = auth()->user()->id;

        Rent::create($data);
       return redirect()->route('profile.show', auth()->user());
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
    public function available(Car $car)
    {
        return json_encode($car->rents);
    }
}

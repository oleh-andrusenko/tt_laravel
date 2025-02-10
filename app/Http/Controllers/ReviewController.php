<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //

    public function create(Car $car, Request $request)
    {
        return view('reviews.create', compact('car'));
    }

    public function store(Request $request, Car $car)
    {
        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string'

        ]);
        $data['user_id'] = $request->user()->id;
        $car->reviews()->create($data);
        return redirect()->route('cars.show', $car);
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->back();
    }
}

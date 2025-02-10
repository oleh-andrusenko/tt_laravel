<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function cars()
    {
        $cars = Car::all();
        return view('admin.cars', compact('cars'));
    }

    public function rents()
    {
        $rents = Rent::all();
        return view('admin.rents', compact('rents'));
    }

    public function reviews()
    {
        $reviews = Review::all();
        return view('admin.reviews', compact('reviews'));
    }
}

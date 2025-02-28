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

    public function dashboard()
    {
        $carsCount = Car::all()->count();
        $usersCount = User::all()->count();
        $rentsCount = Rent::all()->count();
        $reviewsCount = Review::all()->count();
        return view('admin.dashboard', compact('carsCount', 'usersCount', 'rentsCount', 'reviewsCount'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function cars()
    {
        $cars = Car::all()->sortByDesc('created_at');
        return view('admin.cars', compact('cars'));
    }

    public function rents()
    {
        $rents = Rent::with('user')->get();
        return view('admin.rents', compact('rents'));
    }

    public function reviews()
    {
        $reviews = Review::all();
        return view('admin.reviews', compact('reviews'));
    }
}

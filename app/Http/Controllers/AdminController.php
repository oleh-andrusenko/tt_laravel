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

    public function dashboard(Request $request){
        $filter = $request->input('tab', 'stats');



        $carsCount = Car::count();
        $rentsCount = Rent::count();
        $usersCount = User::count();
        $reviewsCount = Review::count();

        return view('admin.dashboard', compact('carsCount', 'rentsCount', 'usersCount', 'reviewsCount'));
    }
}

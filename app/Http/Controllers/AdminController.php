<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;
use App\Models\User;

class AdminController extends Controller
{
    //

    public function dashboard(){
        $carsCount = Car::count();
        $rentsCount = Rent::count();
        $usersCount = User::count();
        $freeCars = 1;
        return view('admin.dashboard', compact('carsCount', 'rentsCount', 'usersCount', 'freeCars'));
    }
}

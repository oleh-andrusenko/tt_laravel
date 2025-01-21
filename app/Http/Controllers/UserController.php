<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.table', compact('users'));


    }


    public function show(User $user)
    {
        if (auth('web')->check() && auth('web')->user()->id === $user['id']) {
            $rents = Rent::query()
                ->join('cars', 'rents.carId', '=', 'cars.id')
                ->where('userEmail', auth('web')->user()->email)->get();

            return view('users.profile', compact('user', 'rents'));
        } else return redirect(route('login'));


    }

}

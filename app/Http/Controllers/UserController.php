<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.table', compact('users'));
    }


    public function show(User $user)
    {
        return view('users.profile', compact('user'));
    }
}

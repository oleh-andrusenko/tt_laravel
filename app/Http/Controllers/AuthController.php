<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:32'
        ]);

        if(auth('web')->attempt($data)){
            return redirect('/');
        }
        return redirect(route("login"))
            ->withErrors(["email" => "User not found or password is wrong!"]);



//        $user = User::where('email', $data['email'])->first();
//        if (!is_null($user)) {
//            if (hash_equals(hash('sha256', $data['password']), $user->password)) {
//                session_start();
//                unset($user->password);
//                session()->put('email', $user->email);
//                session()->put('fullName', $user->fullName);
//                session()->put('isAdmin', $user->isAdmin);
//                session()->put('id', $user->id);
//                echo 'logged in';
//                return redirect()->route('cars.index');
//            } else return 'wrong password';
//        }
//
//        return redirect()->route('login');
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect(route("cars.index"));
    }

    public function register()
    {
        $data = request()->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:32',
            'fullName' => 'required|string|max:255',
            'birthDate' => 'required|date|before:today',
        ]);
        $data['password'] = bcrypt($data['password']);
        $avatar = request()->file('avatar');
        if($avatar){
            $fileName = uniqid() . '-' . $avatar->getClientOriginalName();
            $avatar->move(public_path('assets/userAvatars/'), $fileName);
            $data['avatar'] = $fileName;
        }
        $user = User::create($data);
        if($user) {
            auth("web")->login($user);
        }
        return redirect(route("cars.index"));
    }
}

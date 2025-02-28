<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{

    public function setLocale($lang)
    {

        if(in_array($lang, ['ua', 'en'])){
            App::setLocale($lang);
            Session::put('locale', $lang);
        }

        return back();
    }
}

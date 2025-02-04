<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('logo.png')}}" type="image/png">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{asset('js/datePicker.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <title>
        @yield('title', 'Renta Car - Rent your dream car with easy')
    </title>

</head>
<body>
<header
    class="h-16 bg-white/70 backdrop-blur px-8 py-2 flex items-center justify-between sticky top-0 z-20 border-b border-blue-500">
    <a href="{{ route('cars.index') }}" class="text-blue-500 font-bold text-3xl flex gap-4 ">
        <img class="h-8" src="{{asset('logo.png')}}" alt="RentaCar logo">Renta Car
    </a>
    @auth('web')
        <div class="border-l-2 flex items-center gap-4 ">
            @if(auth('web')->user()->isAdmin)
                <div class="pl-4 flex gap-2 items-center">
                    <a class="border-2 border-blue-500 p-1.5 flex items-center justify-center  rounded bg-blue-500 text-white hover:bg-white hover:text-blue-500" href="{{route('admin.dashboard')}}">
                        <i class="fa-solid fa-hammer"></i>
                    </a>



                </div>
            @endif
            <div
                class="ml-4 w-10 px-4 bg-[url({{asset('assets/userAvatars/'.auth('web')->user()->avatar)}})] h-10 bg-center bg-cover border flex items-center justify-center rounded-full">
            </div>
            <div class="text-sm text-slate-500">
                <a class="text-slate-900" href="{{route('profile.show', auth('web')->user()->id)}}">{{auth('web')->user()->fullName}}</a>
                <p>
                    {{auth('web')->user()->email}}
                </p>
            </div>
            <div>
                <a href="{{route('logout')}}"
                   class="px-2 py-1 border-2 border-slate-500 text-slate-500 rounded">
                    <i class="fa fa-sign-out"></i>
                </a>
            </div>

        </div>

    @endauth

    @guest('web')
        <div class="flex gap-6 items-center">
            <a href="{{route('login')}}"
               class="btn">
                @lang('actions.login')</a>
            @endguest
        </div>
        <div>
            <a href="{{route('locale.setLocale', 'ua')}}" class="btn">UA</a>
            <a href="{{route('locale.setLocale', 'en')}}" class="btn">EN</a>
        </div>
</header>

<main>

    <div id="content" class="bg-white rounded pb-8">
        @yield('content')
    </div>

</main>
</body>
</html>

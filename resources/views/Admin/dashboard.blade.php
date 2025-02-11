@extends('layouts.main')


@section('content')
    <div class="w-3/4 h-[550px] px-6 py-4 border rounded-lg  mt-4 grid grid-cols-1 grid-rows-7">
        <h1 class="font-bold text-2xl mb-6 row-span-1 text-center uppercase">Dashboard</h1>
        <div class="grid grid-cols-2 grid-rows-2 gap-3 row-span-2">
            <div class="dashboard-tab bg-blue-500 text-white border-blue-700">
                <i class="fa-regular fa-user text-3xl"></i>
                Users
                <span class="text-2xl">{{$usersCount}}</span>
            </div>
            <div class="dashboard-tab bg-fuchsia-500 text-white border-fuchsia-700">
                <i class="fa-solid fa-car  text-3xl"></i>
                Cars
                <span class="text-2xl">{{$carsCount}}</span>
            </div>

            <div class="dashboard-tab bg-lime-500 text-white border-lime-700">
                <i class="fa-solid fa-money-bill  text-3xl"></i>
                Rents
                <span class="text-2xl">{{$rentsCount}}</span>
            </div>
            <div class="dashboard-tab bg-red-500 text-white border-red-700">
                <i class="fa-regular fa-star  text-3xl"></i>
                Reviews
                <span class="text-2xl">{{$reviewsCount}}</span>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-3 row-span-4">
            <div>
                <h2 class="font-bold my-5">Users registering dynamic</h2>
                <div
                    class="w-full h-[100px] border-2 border-amber-200 flex items-center justify-center text-gray-700 rounded">
                    Graphic will appear here...
                </div>
            </div>
            <div>
                <h2 class="font-bold my-5">Rents proceeding dynamic</h2>
                <div
                    class="w-full h-[100px] border-2 border-teal-200 flex items-center justify-center text-gray-700 rounded">
                    Graphic will appear here...
                </div>
            </div>
        </div>
    </div>

@endsection


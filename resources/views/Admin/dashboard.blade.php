@extends('layouts.main')

@section('content')

    <div class="w-2/3 mx-auto py-4 px-6  h-[600px]">
        <div class="h-10 flex items-center gap-4 *:w-[250px]">
            <a class="block p-1.5 border-2 rounded-xl bg-teal-500 text-white text-center"
               href="{{route('users.index')}}">All users</a>
            <a class="block p-1.5 border-2 rounded-xl bg-blue-500 text-white text-center"
               href="{{route('cars.table')}}">All cars</a>
            <a class="block p-1.5 border-2 rounded-xl bg-orange-500 text-white text-center" href="{{route('rents.index')}}">All rents</a>
            <a class="block p-1.5 border-2 rounded-xl bg-teal-500 text-white text-center" href="{{route('register')}}">Add
                user</a>
            <a class="block p-1.5 border-2 rounded-xl bg-blue-500 text-white text-center"
               href="{{route('cars.create')}}">Add car</a>
            <a class="block p-1.5 border-2 rounded-xl bg-orange-500 text-white text-center"
               href="{{route('rents.index')}}">Add rent</a>
        </div>
        <div class="w-full grid grid-cols-2 grid-rows-3 items-center gap-6 mt-4">
            <div class="flex items-center  justify-between px-6 py-4 border-2 rounded-xl shadow-xl text-2xl h-full">
                <div class="w-1/3 h-full  flex justify-center items-center">
                    <p class="w-16 h-16 flex items-center justify-center text-orange-500 border-orange-500 p-2 border-2 rounded-full">
                        <i class="fa-solid fa-key"></i>
                    </p>
                </div>
                <div class="w-2/3 h-full text-gray-500 text-sm text-right">
                    <p class="mt-4 text-6xl  font-semibold text-orange-500">{{$rentsCount}}</p>
                    <p>Total rents records</p>
                </div>
            </div>
            <div class="flex items-center justify-between px-6 py-4 border-2 rounded-xl shadow-xl text-2xl ">
                <div class="w-1/3  flex justify-center items-center">
                    <p class="w-16 h-16 flex items-center justify-center text-teal-500 border-teal-500 p-2 border-2 rounded-full">
                        <i class="fa-solid fa-user"></i>
                    </p>
                </div>
                <div class="w-1/3 h-full text-gray-500 text-sm text-right">
                    <p class="mt-4 text-6xl font-semibold text-teal-500">{{$usersCount}}</p>
                    <p>Total users</p>
                </div>
            </div>

            <div class="flex items-center  justify-between px-6 py-4 border-2 rounded-xl shadow-xl text-2xl ">
                <div class="w-1/3 h-full  flex justify-center items-center">
                    <p class="w-16 h-16  flex items-center justify-center text-violet-500 border-violet-500 p-2 border-2 rounded-full">
                        <i class="fa-solid fa-car"></i>
                    </p>
                </div>
                <div class="w-1/3 h-full text-gray-500 text-sm text-right">
                    <p class="mt-4 text-6xl font-semibold text-violet-500">{{$carsCount}}</p>
                    <p>Total cars</p>
                </div>

            </div>
            <div class="flex items-center col-span-1 justify-between px-6 py-4 border-2 rounded-xl shadow-xl text-2xl ">
                <div class="w-1/3 h-full  flex justify-center items-center">
                    <p class="w-16 h-16 flex items-center justify-center text-blue-500 border-blue-500 p-2 border-2 rounded-full">
                        <i class="fa-solid fa-car-on"></i>
                    </p>
                </div>
                <div class="w-1/3 h-full text-gray-500 text-sm text-right">
                    <p class="mt-4 text-6xl font-semibold text-blue-500">{{$freeCars}}</p>
                    <p>Free cars</p>
                </div>
            </div>



        </div>

@endsection

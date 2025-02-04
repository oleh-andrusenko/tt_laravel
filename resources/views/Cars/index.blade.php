@extends('layouts.main')
@section('content')
    <div
        class="bg-[url('https://images.unsplash.com/photo-1653223582536-fee258221981?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] relative h-[200px] w-full bg-center flex justify-center items-center">
        <h1 class="text-white text-center text-6xl font-semibold absolute top-0 bottom-0 right-0 left-0 backdrop-blur-[2px] flex items-center justify-center">
            @lang('titles.hero') <span class="text-blue-500">
                &nbsp; Renta Car
            </span>.</h1>
    </div>
    <div class="px-16 py-10">
        <h2 class="text-4xl text-center uppercase font-semibold text-blue-500 my-6">@lang('titles.main')</h2>

        @if(count($cars) > 0 )
            <p class="ml-5 mb-4 text-lg text-blue-400"><span
                    class="font-semibold">@lang('titles.total') </span>{{count($cars)}}</p>
            <div class="px-5 py-3 grid grid-cols-3 gap-4">
                @foreach($cars as $car)
                    <div class="px-3 py-2 rounded border-2">
                        <div
                            class="mb-6 bg-[url({{asset("assets/carsPreviews/". $car['preview_photo'])}})] w-[400px] h-[300px] bg-center bg-cover rounded">

                        </div>

                        <div class="mb-4">
                            <p>
                                <span
                                    class="font-semibold text-2xl text-indigo-700">{{ $car-> brand }} {{ $car-> model }}</span>
                            </p>

                            <p>
                                <span class="font-semibold text-slate-700 text-sm"></span> {{ $car-> year }}
                            </p>
                            <div class="flex gap-2 items-center justify-between text-sm">
                                <p class="flex items-center gap-3">
                                    <img src="{{asset('assets/engine.png')}}" class="w-6 h-6">
                                    <span class="text-slate-700">
                                 {{ $car-> engine }}</span>
                                </p>
                                <p class="flex items-center gap-3">
                                    <img src="{{asset('assets/gearbox.png')}}" class="w-6 h-6">
                                    <span class=" text-slate-700"> {{ $car-> transmission }}</span>
                                </p>


                                <p class="flex items-center gap-3">
                                    <img src="{{asset('assets/price.png')}}" class="w-6 h-6">
                                    <span class="text-slate-700">${{ $car-> rent_price }}</span>
                                </p>
                            </div>


                        </div>
                        <a
                            href="{{ route('cars.show', $car['id']) }}"
                            class="block w-full text-center px-4 py-2 bg-blue-500 text-white rounded font-semibold border-2 border-blue-500 mt-2 hover:text-blue-500 hover:bg-white">@lang('titles.details')</a>
                    </div>

                @endforeach
            </div>
{{--            {{$cars->links()}}--}}
        @else

            <div
                class="px-10 py-6 bg-white rounded-lg shadow-lg shadow-gray-500 flex flex-col items-center text-center gap-4">
                <p class="p-4d">
                    <i class="fa-solid fa-face-sad-tear text-blue-500 text-6xl"></i>
                </p>
                <div>
                    <h2 class="text-2xl text-blue-500 font-semibold">Oops...</h2>
                    <p class="text-xl text-slate-500">There are no free cars available now... </p>
                    @auth('web')
                        @if(auth('web')->user()->isAdmin)
                            <div>
                                <a href="{{route('cars.create')}}"
                                   class="w-full flex justify-center border-2 border-green-600 items-center my-4 py-1.5 px-4 bg-green-600 rounded text-white hover:bg-white hover:text-green-600">+
                                    Add car</a>
                            </div>
                        @endif
                    @endauth

                </div>
            </div>
        @endif

    </div>
@endsection


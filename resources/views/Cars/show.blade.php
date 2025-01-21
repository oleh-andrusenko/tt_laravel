@extends('layouts.main')
@section('title')
    {{$car['brand'].' '.$car['model'].' '.$car['year']}}
@endsection
@section('content')
    <div class="w-full px-6 py-2 rounded border-2 flex gap-8  mt-6">
        <div class="flex w-full gap-8">
            <div
                class="w-1/3 h-[500px] bg-[url({{asset('assets/carsPreviews/'.$car['preview'])}})] bg-center bg-cover rounded ">

            </div>
            <div class="w-2/3">
                <h2 class="text-4xl text-blue-500 font-semibold">
                    {{$car->brand.' '.$car->model }}
                </h2>
                <p>
                    <span class="text-sm text-gray-400">ID: {{$car-> id}}</span>
                </p>

                <div class="flex w-full  gap-6 py-4   mt-8">
                    <div class="p-4 border-2 rounded-lg relative">
                        <p class="bg-white absolute -top-4 left-1 pl-4 pr-6 font-semibold">@lang('car.engine')</p>
                        <p class="text-xl text-blue-500 font-semibold">{{$car->engine}}</p>
                    </div>
                    <div class="p-4 border-2 rounded-lg relative flex-grow">
                        <p class="bg-white absolute -top-4 left-1 pl-4 pr-6 font-semibold">@lang('car.transmission')</p>
                        <p class="text-xl text-blue-500 font-semibold">{{$car->transmission}}</p>
                    </div>
                    <div class="p-4 border-2 rounded-lg relative">
                        <p class="bg-white absolute -top-4 left-1 px-4 font-semibold">@lang('car.mileage')</p>
                        <p class="text-xl text-blue-500 font-semibold">{{number_format($car->mileage)}} @lang('car.km')</p>
                    </div>
                    <div class="p-4 border-2 rounded-lg relative">
                        <p class="bg-white absolute -top-4 left-1 pl-4 pr-2 font-semibold">@lang('car.price') </p>
                        <p class="text-xl text-blue-500 font-semibold">${{ number_format($car-> price) }}</p>
                    </div>
                    <div class="p-4 border-2 rounded-lg relative ">
                        <p class="bg-white absolute -top-4 left-1 pl-4 pr-2 font-semibold">@lang('car.likes') </p>
                        <p class="text-blue-500 font-semibold flex gap-2 items-center">
                            <a href="#"><i
                                    class="fa-regular fa-heart text-xl text-blue-500 "></i></a> {{ $car-> likes }}
                        </p>
                    </div>

                </div>
                <div class="p-4 border-2 rounded-lg relative h-[200px] ">
                    <p class="bg-white absolute -top-4 left-1 pl-4 pr-2 font-semibold">@lang('car.description') </p>
                    <p class="text-gray-500  flex gap-2 items-center">
                        {{ $car-> description ?? 'No description' }}
                    </p>
                </div>


                <div class="py-4 flex gap-4">

                    @auth('web')
                        <a class="btn flex-grow text-center " href="{{route('cars.rent', $car['id'])}}">@lang('actions.rent')</a>
                        @if(auth('web')->user()->isAdmin)
                            <a class="btn flex-grow text-center" href="{{route('cars.edit', $car['id'])}}">@lang('actions.edit')</a>
                            <a class="btn flex-grow text-center" href="{{route('cars.destroy', $car['id'])}}">@lang('actions.delete')</a>
                        @endif

                    @endauth
                    @guest()
                        <p class="text-sm text-gray-600 text-left w-full">
                            Log in to rent car.
                        </p>
                    @endguest

                </div>


            </div>
        </div>

    </div>
    <div class="car-container grid grid-cols-2 gap-4 mt-10">
        <p class="col-span-2 text-3xl text-blue-500 font-semibold text-center my-4 border-b-2 pb-2">
            @lang('car.photos') @endlang {{$car->brand}} {{$car->model}} {{$car->year}}
        </p>
        @foreach(explode(';', $car['photos']) as $photo)
            <div

                class="car bg-[url({{asset('assets/carPhotos/'.$photo)}})] w-[500px] h-[300px] bg-center bg-cover ">

            </div>

        @endforeach
    </div>
<div id="modal">
1
</div>
@endsection

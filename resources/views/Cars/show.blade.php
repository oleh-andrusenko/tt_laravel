@extends('layouts.main')
@section('title')
    Rent a {{$car['model'].' '.$car['year']}} | RentaCar
@endsection
@section('content')
    <div class="w-full px-6 py-2 rounded border-2 flex gap-8  mt-6">
        <div class="flex w-full gap-8">
            <div
                class="w-1/3 h-[500px] bg-[url({{asset('assets/carsPreviews/'.$car['preview_photo'])}})] bg-cover bg-no-repeat bg-center rounded ">
            </div>
            <div class="w-2/3">
                <h2 class="text-4xl text-blue-500 font-semibold">{{$car->model }}, {{$car->year}}</h2>
                <p class="text-sm text-gray-400 my-5">ID: {{$car-> id}}</p>

                <div class="grid grid-cols-4 grid-rows-2 w-full  gap-6 py-4   mt-8">
                    <x-car-description title='Engine' :description="$car->engine"/>
                    <x-car-description title='Drive' :description="$car->drive"/>
                    <x-car-description title='Transmission' :description="$car->transmission"/>
                    <x-car-description title='Body type' :description="$car->body_type"/>
                    <x-car-description title='Mileage' :description="number_format($car->mileage) . ' km'"/>
                    <x-car-description title='Rent price' :description="'$' . number_format($car-> rent_price)"/>

                    <div class="px-4 py-2 border-2 col-span-2 rounded-lg relative">
                        <p class="bg-white absolute -top-4 left-1 pl-4 pr-2 font-semibold">Rating</p>
                        <p class="text-xl text-blue-500 font-semibold">
                            <x-star-rating :rating="$car->reviews_avg_rating"/>
                        <p class="text-sm text-slate-500 text-center">out of {{$car->reviews_count}} reviews</p>
                        </p>
                    </div>
                </div>
                {{--                                <div class="p-4 border-2 rounded-lg relative h-[200px] ">--}}
                {{--                                    <p class="bg-white absolute -top-4 left-1 pl-4 pr-2 font-semibold">@lang('car.description') </p>--}}
                {{--                                    <p class="text-gray-500  flex gap-2 items-center">--}}
                {{--                                        {{ $car->translations[0]->description  }}--}}
                {{--                                    </p>--}}
                {{--                                </div>--}}


                <div class="py-4 flex gap-4">
                    @auth('web')
                        <a class="btn flex-grow text-center "
                           href="{{route('cars.rent', $car['id'])}}">@lang('actions.rent')</a>

                        @if(auth('web')->user()->isAdmin)
                            <a class="btn flex-grow text-center"
                               href="{{route('cars.edit', $car['id'])}}">@lang('actions.edit')</a>
                            <a class="btn flex-grow text-center"
                               href="{{route('cars.destroy', $car['id'])}}">@lang('actions.delete')</a>
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
    <div class="w-full overflow-hidden">
        <h2 class="text-4xl font-semibold text-center py-8 text-blue-700">Photos of {{$car->model}} {{$car->year}}</h2>
        <x-photo-slider :photos="$car->photos"/>
    </div>
    <div class="flex flex-col items-center mt-12 px-10 py-6">
        <h2 class="text-center text-3xl font-semibold text-blue-700">
            Reviews of {{$car->model}}</h2>
        @auth('web')
            <div class="w-3/4 py-2 flex justify-end">
                <a class="btn" href="{{route('reviews.create', $car)}}">+ Add a review</a>
            </div>
        @endauth
        @forelse($car->reviews as $review)
            <div
                class="w-3/4 flex items-center justify-center gap-2 px-4 py-5 border-2 rounded my-6 text-center relative">
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 px-4 bg-[url({{asset('assets/userAvatars/'.$review->user->avatar)}})] h-12 bg-center bg-cover border flex items-center justify-center rounded-full">

                    </div>
                    <p class="text-slate-800">{{$review->user->fullName}}</p>
                    <x-star-rating :rating="$review->rating"/>
                    <p class="text-sm italic">{{$review->review}}</p>
                </div>
                <p class="text-[12px] text-right text-slate-600 absolute top-4 right-10">
                    🗓 {{$review->created_at->format('M j, Y')}}</p>
               @auth('web')
                   @if(auth('web')->user()->isAdmin)
                        <div class="absolute right-5 bottom-4">
                            <a class="text-red-400 underline" href="{{route('reviews.destroy', $review)}}">Delete</a>
                        </div>
                   @endif
                @endauth
            </div>
        @empty
            <p class="px-10 py-6 text-xl">No reviews of this car yet....</p>
        @endforelse

        <div id="modal">

        </div>
@endsection
